<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\Searchable;

class Book extends Model
{
    use HasFactory , Searchable;
    protected $fillable = [
        'book_name',
        'price',
    ];
    public function author(){
        return $this->belongsTo(Author::class);
    }
}
