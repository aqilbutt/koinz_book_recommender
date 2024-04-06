<?php

namespace App\Http\Controllers\Interval;

use App\Models\User;
use App\Models\Books;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function index(){
        $userData = User::pluck('name', 'id');
        $bookData = Books::pluck('book_name', 'id');

        $topBooks = Books::pluck('book_name', 'id');

        return view('interval-submission', compact('userData', 'bookData', 'topBooks'));
    }
}
