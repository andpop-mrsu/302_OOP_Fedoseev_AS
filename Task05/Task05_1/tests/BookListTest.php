<?php

namespace App;

use App\Book;
use App\BookList;
use PHPUnit\Framework\TestCase;

class BookListTest extends TestCase
{
    public function testCurrentAndNext(): void
    {
        $bookFirst = new Book();
        $bookFirst->setTitle('Вторая')->setAuthors(['Первый'])->setPublisher('Саранск')->setYear(2000);

        $bookSecond = new Book();
        $bookSecond->setTitle('Третья')->setAuthors(['Второй', 'Третий'])->setPublisher('Рузаева')->setYear(2003);

        $bookThird = new Book();
        $bookThird->setTitle('Первая')->setAuthors(['Первый', 'Второй'])->setPublisher('Сочи')->setYear(1896);

        $booksList = new BookList();
        $booksList->add($bookFirst);
        $booksList->add($bookSecond);
        $booksList->add($bookThird);

        $this->assertSame($bookFirst, $booksList->current());
        $booksList->next();
        $this->assertSame($bookSecond, $booksList->current());
    }

    public function testKey(): void
    {
        $bookFirst = new Book();
        $bookFirst->setTitle('Вторая')->setAuthors(['Первый'])->setPublisher('Саранск')->setYear(2000);

        $bookSecond = new Book();
        $bookSecond->setTitle('Третья')->setAuthors(['Второй', 'Третий'])->setPublisher('Самара')->setYear(2003);

        $bookThird = new Book();
        $bookThird->setTitle('Первая')->setAuthors(['Первый', 'Второй'])->setPublisher('Саратов')->setYear(1896);

        $booksList = new BookList();
        $booksList->add($bookFirst);
        $booksList->add($bookSecond);
        $booksList->add($bookThird);

        $this->assertSame($bookFirst->getId(), $booksList->key());
    }

    public function testRewind(): void
    {
        $bookFirst = new Book();
        $bookFirst->setTitle('Вторая')->setAuthors(['Первый'])->setPublisher('Саранск')->setYear(2000);

        $bookSecond = new Book();
        $bookSecond->setTitle('Третья')->setAuthors(['Второй', 'Третий'])->setPublisher('Самара')->setYear(2003);

        $bookThird = new Book();
        $bookThird->setTitle('Первая')->setAuthors(['Первый', 'Второй'])->setPublisher('Саратов')->setYear(1896);

        $booksList = new BookList();
        $booksList->add($bookFirst);
        $booksList->add($bookSecond);
        $booksList->add($bookThird);

        $booksList->next();
        $booksList->next();
        $booksList->rewind();

        $this->assertSame($bookFirst, $booksList->current());
    }

    public function testValid(): void
    {
        $bookFirst = new Book();
        $bookFirst->setTitle('Вторая')->setAuthors(['Первый'])->setPublisher('Саранск')->setYear(2000);

        $bookSecond = new Book();
        $bookSecond->setTitle('Третья')->setAuthors(['Второй', 'Третий'])->setPublisher('Самара')->setYear(2003);

        $bookThird = new Book();
        $bookThird->setTitle('Первая')->setAuthors(['Первый', 'Второй'])->setPublisher('Саратов')->setYear(1896);

        $booksList = new BookList();
        $booksList->add($bookFirst);
        $booksList->add($bookSecond);
        $booksList->add($bookThird);

        $booksList->next();
        $booksList->next();
        $booksList->next();

        $this->assertFalse($booksList->valid());
    }
}