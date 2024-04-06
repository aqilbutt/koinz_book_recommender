<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBookReading extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'start_page',
        'end_page',
    ];

    protected $casts = [
        'start_page'    => 'integer',
        'end_page' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
