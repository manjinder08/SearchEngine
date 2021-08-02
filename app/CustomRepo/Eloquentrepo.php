<?php
namespace App\CustomRepo;

 use App\Models\Book;
 use App\Models\Author;
 use Illuminate\Database\Eloquent\Collection;

 class Eloquentrepo implements Searchrepo
 {
     public function search(string $query=''): Collection
     {
        return Book::query()->with('book.author.name','book.author.email')
             
            ->Where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('edition', 'LIKE', "%{$query}%")
            ->orWhere('price', 'LIKE', "%{$query}%")
            ->get();

     }
 } 
 ?>