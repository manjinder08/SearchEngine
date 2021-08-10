<?php

namespace App\Observers;

use App\CustomRepo;
use App\Book;
use Elasticsearch\Client;

class ElasticsearchObserver
{   private $elasticsearch;
    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }
    
    public function saved($model)
    {
        $this->elasticsearch->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
             'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ]);
        
    }
    /**
     * Handle the Book "created" event.
     *
     * @param  \App\Models\Book  $Book
     * @return void
     */
    public function created()
    {
        //
    }

    /**
     * Handle the Book "updated" event.
     *
     * @param  \App\Models\Book  $Book
     * @return void
     */
    public function updated()
    {
        //
    }

    /**
     * Handle the Book "deleted" event.
     *
     * @param  \App\Models\Book  $Book
     * @return void
     */
    public function deleted($model)
    {
        $this->elasticsearch->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
        ]);
    }

    /**
     * Handle the Book "restored" event.
     *
     * @param  \App\Models\Book  $Book
     * @return void
     */
    public function restored()
    {
        //
    }

    /**
     * Handle the Book "force deleted" event.
     *
     * @param  \App\Models\Book  $Book
     * @return void
     */
    public function forceDeleted()
    {
        //
    }
}
