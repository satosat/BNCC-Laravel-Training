<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'description',
        'length',
        'publisher',
        'stock',
        'price',
    ];
}
