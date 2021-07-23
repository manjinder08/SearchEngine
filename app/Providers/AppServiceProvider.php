<?php

namespace App\Providers;
use App\CustomRepo;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomRepo\Searchrepo::class, function ($app) {

            if (!config('services.search.enabled')) {
                return new CustomRepo\Eloquentrepo();
            }

            return new CustomRepo\Elasticsearchrepo(
                $app->make(Client::class)
            );
        });

        $this->bindSearchClient();
    }
    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
