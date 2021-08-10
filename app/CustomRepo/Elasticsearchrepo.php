<?php

namespace App\CustomRepo;

use App\Models\Book;
use App\Models\Author;
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
        

        $model = new Book;
            $items = $this->elasticsearch->search([
            'index' =>$model->getSearchIndex(),
            'type'  => $model->getSearchType(),
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'fields'  => ['author_name^4', 'price','book_name^5','email','contact'],
                        'query'   => $query,
                    ],
                ],
            ],
        ]);
       dd($items);
       return $items;
    }

    private function buildCollection(array $items): Collection
    {  // print_r($items);
        $sources = Arr::pluck($items['hits']['hits'], '_source'); 
        //print_r($sources);
        $ids = Arr::pluck($sources, 'id'); 
        //print_r($ids);die;
    $a= Book::findMany($ids)
                ->sortBy(function ($users) use ($ids) {
               return array_search($users->getKey(), $ids);
            });
   print($a); die;
// return $a;
    }
}


    //     $model2 = new Author;
    //     $items2 = $this->elasticsearch->search([
    //     'index' => $model2->getSearchIndex(),
    //     'type' => $model2->getSearchType(),
    //     'body' => [
    //         'query' => [
    //             'multi_match' => [
    //                 'fields' => ['author_name^5', 'email','contact'],
    //                 'query' => $query,
    //             ],
    //         ],
    //     ],
    // ]);
    // foreach($items1 as $item) {
    //     $items2->add($item);
    // }
//    $items= array_merge($items1,$items2);
?>





