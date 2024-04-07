<?php

namespace App\Http\Controllers\KBR;

use App\Http\Controllers\Controller;
use App\Helper\RecommendedBooksHelper\RecommendedBooksHelper;
use App\Helper\BooksHelper\BooksHelper;
use App\Helper\UserHelper\UserHelper;
use Illuminate\Http\Request;

/**
 * Class responsible for handling creation and retirval of data
 * and displaying it to the view
 */
class MainController extends Controller
{
    protected $rbaHelper;
    protected $bookHelper;
    protected $userHelper;

    /**
     * constructor
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->rbaHelper = new RecommendedBooksHelper();
        $this->bookHelper = new BooksHelper();
        $this->userHelper = new UserHelper();
    }

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
        $userData = $this->userHelper->pluckUserNames();
        $bookData = $this->bookHelper->pluckBookNames();
        $topBooks = $this->bookHelper->getTopRecommendedBooks();

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
            'end_page.*.gt' => 'End page should be greater than start page number.',
            'end_page.*.min' => 'End Page value should be positive.',
            'start_page.*.min' => 'Start Page value should be positive.',
        ];

        // Validate the form data
        $request->validate([
            'userId' => 'required',
            'bookId' => 'required',
            'start_page.*' => 'required|numeric|min:0',
            'end_page.*' => 'required|numeric|min:0|gt:start_page.*',
        ], $customMessages);

        //store the interval into DB
        $this->rbaHelper->storeIntervals($request->userId, $request->bookId,
            $request->start_page, $request->end_page);

        // get total number of read lines
        $total = $this->rbaHelper->calculateReadLinesPerBook($request->bookId);

        // save the total
        $this->bookHelper->setNumberOfReadPages($total, $request->bookId);

        // Redirect back or to a success page
        return redirect()->route('kbr.index')->with('success', 'Information has been stored.');
    }
}
