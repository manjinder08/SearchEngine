<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\Searchable;

class Author extends Model
{
    use HasFactory , Searchable;

    protected $fillable = [
        'author_name',
        'email',
        'contact',
    ];
    public function books(){
        return $this->hasMany(Book::class);
     }
}
