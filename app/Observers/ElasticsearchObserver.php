<?php

namespace App\Observers;

use App\CustomRepo;
use App\Registration;
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
     * Handle the Registration "created" event.
     *
     * @param  \App\Models\Registration  $Registration
     * @return void
     */
    public function created()
    {
        //
    }

    /**
     * Handle the Registration "updated" event.
     *
     * @param  \App\Models\Registration  $Registration
     * @return void
     */
    public function updated()
    {
        //
    }

    /**
     * Handle the Registration "deleted" event.
     *
     * @param  \App\Models\Registration  $Registration
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
     * Handle the Registration "restored" event.
     *
     * @param  \App\Models\Registration  $Registration
     * @return void
     */
    public function restored()
    {
        //
    }

    /**
     * Handle the Registration "force deleted" event.
     *
     * @param  \App\Models\Registration  $Registration
     * @return void
     */
    public function forceDeleted()
    {
        //
    }
}
