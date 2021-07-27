<?php

namespace App\CustomRepo;

use App\Models\Registration;
use Elasticsearch\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;

class Elasticsearchrepo implements Searchrepo
{
    private $elasticsearch;
    
    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }
    public function search(string $query = ''): Collection
    {
        $items = $this->searchOnElasticsearch($query);

        return $this->buildCollection($items);
    }
    private function searchOnElasticsearch(string $query = ''): array
    { 
        $model = new Registration;
            $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['name^5', 'email'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);
       return $items;
    }

    private function buildCollection(array $items): Collection
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');

        return Registration::findMany($ids)
            ->sortBy(function ($users) use ($ids) {
                return array_search($users->getKey(), $ids);
            });
    }
}
?>