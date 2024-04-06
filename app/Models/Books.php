<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'book_name',
        'num_of_read_pages',
    ];

    protected $casts = [
        'book_name'    => 'string',
        'end_page' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
