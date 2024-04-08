<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Books;


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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function books()
    {
        return $this->belongsTo(Books::class, 'book_id', 'id');
    }
}
