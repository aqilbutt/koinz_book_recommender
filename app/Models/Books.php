<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserBookReading;

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

    public function userBookReading()
    {
        return $this->hasMany(UserBookReading::class, 'book_id', 'id');
    }
}
