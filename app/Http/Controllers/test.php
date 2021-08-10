<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
class test{
public function a(){

    $client = ClientBuilder::create()->build();
    $user = Book::cursor();
    foreach($user as $users){
$params = [
    'index' => $users->getTable(),
    'id'    => $users->getKey(),
    'body'  => [
        'id' => $users->id,
        'author_id' => $users->author_id,
        'book_name' => $users->book_name,
    ]
];
    
$response = $client->index($params);

dd($response);
    }
}

public function b(string $query=''){
    $client = ClientBuilder::create()->build();
    $params = [
        'index' => 'my_index',
        'body'  => [
            'query' => [
                'match' => [
                    'testField' => 'book_name'
                  
                ]
            ]
        ]
    ];
    
    $response = $client->search($params);
    dd($response); die;
}
}
?>