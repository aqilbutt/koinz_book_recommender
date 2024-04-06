<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data
        $books = [
            [
                'book_name' => 'Harry Potter',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'Clean Code',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'The Kite Runner',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'The Great Gatsby',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'Hamlet',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'The Almchemist',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'War and Peace by Leo',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'A Tale of Two Cities',
                'num_of_read_pages' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert sample data into the books table
        DB::table('books')->insert($books);
    }
}
