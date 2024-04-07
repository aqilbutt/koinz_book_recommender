<?php

namespace App\Helper\BooksHelper;

use App\Models\Books;

/**
 * Class responsible to handle methods related to 
 * books usecases
 */
class BooksHelper
{
    /**
     * calculate number of read lines per book
     * 
     * @param int $bookId
     * @return int $total
     */
    public function setNumberOfReadPages($readLines, $bookId){
        $bookObj = Books::find($bookId);
        $bookObj->num_of_read_pages = $readLines;
        $bookObj->save();
    }

    /**
     * get top 5 recommended books
     * 
     * @return array $topBooks
     */
    public function getTopRecommendedBooks(){
        $topBooks = Books::orderBy('num_of_read_pages', 'desc')
            ->take(5)
            ->select('id', 'book_name', 'num_of_read_pages')
            ->get();
        return $topBooks;
    }

    /**
     * get overall book names to show in dropdown
     * 
     * @return array $topBooks
     */
    public function pluckBookNames(){
        return Books::pluck('book_name', 'id');
    }
}
