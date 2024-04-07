<?php

namespace App\Helper\RecommendedBooksHelper;

use App\Models\UserBookReading;
use App\Models\Books;

/**
 * Class responsible to handle methods related to 
 * recommended books usecases
 */
class RecommendedBooksHelper
{
    /**
     * Store user submitted interval
     * 
     * @param int $userId
     * @param int $bookId
     * @param array $startPages
     * @param array $endPages
     */
    public function storeIntervals($userId, $bookId, $startPages, $endPages){
        // Loop through the submitted intervals and store them
        foreach ($startPages as $key => $startPage) {
            $userBookReading = new UserBookReading();
            $userBookReading->user_id = $userId;
            $userBookReading->book_id = $bookId;
            $userBookReading->start_page = $startPage;
            $userBookReading->end_page = $endPages[$key];
            $userBookReading->save();
        }
    }

    /**
     * calculate number of read lines per book
     * 
     * @param int $bookId
     * @return int $total
     */
    public function calculateReadLinesPerBook($bookId){
        $userBookReadings = UserBookReading::where('book_id', $bookId)->get();
        $readLines = [];
        $total = 0;
        foreach ($userBookReadings as $userBookReading) {
            for($i=$userBookReading->start_page; $i < ($userBookReading->end_page+1); $i++){
                $readLines[$i] = 1;
            }
        }
        foreach($readLines as $value){
            $total += $value;
        }
        return $total;
    }

    public function setNumberOfReadPages($readLines, $bookId){
        $userBookReading = UserBookReading::find($bookId);
    }
}
