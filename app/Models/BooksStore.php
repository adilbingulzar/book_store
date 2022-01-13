<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'book_name',
        'publish_year',
        'best_seller'
    ];
}
