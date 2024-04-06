<?php

namespace App\Http\Controllers\Interval;

use App\Models\User;
use App\Models\Books;
use App\Http\Controllers\Controller;

/**
 * Class responsible for handling retirval of data
 * and displaying it to the view
 */
class ShowController extends Controller
{
    /**
     * function to retrieve the collection of resources
     * from database model and display to main view
     *
     * @return View
     */
    public function index(){
        $userData = User::pluck('name', 'id');
        $bookData = Books::pluck('book_name', 'id');
        $topBooks = Books::pluck('book_name', 'id');

        return view('main-view', compact('userData', 'bookData', 'topBooks'));
    }
}
