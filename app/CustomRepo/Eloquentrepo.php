<?php
namespace App\CustomRepo;

 use App\Models\Registration;
 use Illuminate\Database\Eloquent\Collection;

 class Eloquentrepo implements Searchrepo
 {
     public function search(string $query=''): Collection
     {
        return Registration::query()
             
            ->Where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

     }
 } 
 ?>