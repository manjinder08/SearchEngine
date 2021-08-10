<?php
namespace App\CustomRepo;

 use App\Models\Book;
 use App\Models\Author;
 use Illuminate\Database\Eloquent\Collection;

 class Eloquentrepo implements Searchrepo
 {
    public function search(string $query=''): Collection
    { //echo $query; die;
        return Book::query()
            ->join('authors','authors.id','=','books.author_id')
            ->Where('book_name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('author_name', 'LIKE', "%{$query}%")
            ->orWhere('price', 'LIKE', "%{$query}%")
            ->get();
    }
 } 
 ?>