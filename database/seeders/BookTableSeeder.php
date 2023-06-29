<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Books;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFilePath = storage_path()."/app/json/books1.json";
        $bookData = json_decode(file_get_contents($jsonFilePath), true);

        foreach ($bookData as $book) {
            Books::create([
                'title' => $book['title'],
                'author' => $book['author'],
                'publisher' => $book['publisher'],
                'publication_date' => $book['publication_date'],
                'isbn' => $book['isbn'],
                'price' => $book['price'],
                'genre' => json_encode($book['genre']),
                'summary' => $book['summary'],
                'quantity' => $book['quantity'],
            ]);
        }
    }
}
