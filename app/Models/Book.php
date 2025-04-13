<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'author_id',
        'publisher',
        'publication_date',
        'genre',
        'pages',
        'language',
        'cover_url',
        'description',
        'stock',
        'is_available',
    ];

    public function authors(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Author::class, 'author_id', 'id');
    }

    public function borrowedBooks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\BorrowedBook::class);
    }
}
