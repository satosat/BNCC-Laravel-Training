<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'book_id',
        'comment',
    ];

    // Inverse of One-to-Many relationship with Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Inverse of One-to-Many relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
