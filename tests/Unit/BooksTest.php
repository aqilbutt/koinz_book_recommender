<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Books;

class BooksTest extends TestCase
{
    /**
     * verify fillable matches or not
     *
     * @return void
     */
    public function testVerifyFillables()
    {
        $fillable = ['book_name', 'num_of_read_pages'];
        $bookObj = new Books();
        $this->assertEquals($fillable, $bookObj->getFillable());
    }
}
