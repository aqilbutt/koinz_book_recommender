<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Books;

class UserBookReadingTest extends TestCase
{
    /**
     * matches relationship key
     *
     * @return void
     */
    public function testVerifyRelationShipKey()
    {
        $user = new User();
        $books = new Books();
        $user_related = $user->userBookReading();
        $books_related = $books->userBookReading();
        $user_key = $user->getForeignKey(); //user_id
        $this->assertEquals($user_key, $user_related->getForeignKeyName());
        $this->assertEquals('book_id', $books_related->getForeignKeyName());
    }
}
