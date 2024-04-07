<?php

namespace App\Http\Controllers\KBR;

use App\Models\User;
use App\Models\Books;
use App\Models\UserBookReading;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class responsible for handling creation and retirval of data
 * and displaying it to the view
 */
class MainController extends Controller
{
    /**
     * Redirect to default route
     */
    public function redirectToDefault()
    {
        return redirect()->route('kbr.index');
    }

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

    public function store(Request $request){
        $customMessages = [
            'userId.required' => 'Please select a user.',
            'bookId.required' => 'Please select a book.',
            'start_page.*.required' => 'Please enter start page number.',
            'start_page.*.required' => 'Please enter start page as integer value.',
            'end_page.*.required' => 'Please enter end page number.',
            'end_page.*.required' => 'Please enter end page as integer value.',
        ];

        // Validate the form data
        $request->validate([
            'userId' => 'required',
            'bookId' => 'required',
            'start_page.*' => 'required|numeric',
            'end_page.*' => 'required|numeric',
        ], $customMessages);

        // Loop through the submitted intervals and store them
        foreach ($request->start_page as $key => $startPage) {
            $userBookReading = new UserBookReading();
            $userBookReading->user_id = $request->userId;
            $userBookReading->book_id = $request->bookId;
            $userBookReading->start_page = $startPage;
            $userBookReading->end_page = $request->end_page[$key];
            $userBookReading->save();
        }

        // Redirect back or to a success page
        return redirect()->route('kbr.index')->with('success', 'Information has been stored.');
    }
}
