<?php

namespace App\Console\Commands;

use App\CustomRepo;
use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\Author;
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
        $this->info('Indexing all Data. This might take a while...');

        $user = Book::cursor();
        foreach ($user as $users)
        
    {
               
            $this->elasticsearch->index([
                'index' => $users->getSearchIndex(),
                'type' => $users->getSearchType(),
                'id' => $users->getKey(),
                'body' => $users->toSearchArray(),
            ]);
            // print_r( $users->getKey());
            print_r($users->toSearchArray());
                       
                    //    print_r($users->getSearchIndex());
        }
        
        $this->info("\nDone!");
        return 0;
    }
}



 // foreach (Author::cursor() as $users)
        // {              
        //             print_r($users->toSearchArray());
        //            // print_r( $users->getSearchType());
        //            // print_r($users->getSearchIndex());
        //             print_r( $users->getKey());
        //     $this->elasticsearch->index([
        //         'index' => $users->getSearchIndex(),
        //         'type' => $users->getSearchType(),
        //         'id' => $users->getKey(),
        //         'body' => $users->toSearchArray(),
        //     ]);
        //     $this->output->write('.');
        // }
?>