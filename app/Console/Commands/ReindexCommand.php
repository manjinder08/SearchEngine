<?php

namespace App\Console\Commands;

use App\CustomRepo;
use Illuminate\Console\Command;
use App\Models\Registration;
use Elasticsearch\Client;

class ReindexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexes all Users to Elasticsearch';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $elasticsearch;
    public function __construct(Client $elasticsearch)
    {
        parent::__construct();
        $this->elasticsearch= $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Indexing all Registrations. This might take a while...');
        foreach (Book::cursor() as $users)
        {
            $this->elasticsearch->index([
                'index' => $users->getSearchIndex(),
                'type' => $users->getSearchType(),
                'id' => $users->getKey(),
                'body' => $users->toSearchArray(),
            ]);
            $this->output->write('.');
        }
        $this->info("\nDone!");
        return 0;
    }
}
?>