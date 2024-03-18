<?php

namespace App;

use App\Book;

class BookList
{
    private $books = [];

    public function add(Book $book)
    {
        $this->books[$book->getId()] = $book;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): Book
    {
        if ($n >= 0 && $n < count($this->books)) {
            return $this->books[$n];
        }
        return null;
    }

    public function store(string $fileName)
    {
        file_put_contents($fileName, serialize($this->books));
    }

    public function load(string $fileName)
    {
        if (file_exists($fileName)) {
            $this->books = unserialize(file_get_contents($fileName));
        }
    }
}
