<?php

use App\Book;
use App\BookList;

function runTest()
{
    echo "Autoincrement Id Test" . PHP_EOL;
    $book1 = (new Book());
    $book2 = (new Book());
    echo "Ожидается: IdBook1: 1, IdBook2: 2" . PHP_EOL;
    echo "Получено: IdBook1: " . $book1->getId() . ", " . "IdBook2: " . $book2->getId() . PHP_EOL;
    echo PHP_EOL;

    echo "Title test" . PHP_EOL;
    $book1->setTitle("PHP forever");
    echo "Ожидается: PHP forever" . PHP_EOL;
    echo "Получено: " . $book1->getTitle() . PHP_EOL;
    echo PHP_EOL;

    echo "Authors test" . PHP_EOL;
    $book1->setPublisher("O'Reily");
    echo "Ожидается: O'Reily" . PHP_EOL;
    echo "Получено: " . $book1->getPublisher() . PHP_EOL;
    echo PHP_EOL;

    echo "Publisher test" . PHP_EOL;
    $book1->setPublisher("O'Reily");
    echo "Ожидается: O'Reily" . PHP_EOL;
    echo "Получено: " . $book1->getPublisher() . PHP_EOL;
    echo PHP_EOL;

    echo "Year test" . PHP_EOL;
    $book1->setYear(2020);
    echo "Ожидается: 2020" . PHP_EOL;
    echo "Получено: " . $book1->getYear() . PHP_EOL;
    echo PHP_EOL;

    echo "String representation test" . PHP_EOL;
    $book1->setTitle("PHP forever")
        ->setAuthors(["Gates B.", "Smith J."])
        ->setPublisher("O'Reily")
        ->setYear(2020);

    echo "Ожидается:" . PHP_EOL .
    "Id: 1" . PHP_EOL .
    "Название: PHP forever" . PHP_EOL .
    "Автор1: Gates B." . PHP_EOL .
    "Автор2: Smith J." . PHP_EOL .
    "Издательство: O'Reily" . PHP_EOL .
    "Год: 2020" . PHP_EOL;
    echo PHP_EOL;
    echo "Получено:" . PHP_EOL . $book1;
    echo PHP_EOL;

    $booksList = new BookList();
    $booksList->add($book1);
    $booksList->add($book2);

    echo "Counting books from booklist test" . PHP_EOL;
    echo "Ожидается: 2" . PHP_EOL;
    echo "Получено: " . $booksList->count() . PHP_EOL;
    echo PHP_EOL;

    echo "Getting book from booklist test" . PHP_EOL;
    echo "Ожидается:" . PHP_EOL .
    "Id: 1" . PHP_EOL .
    "Название: PHP forever" . PHP_EOL .
    "Автор1: Gates B." . PHP_EOL .
    "Автор2: Smith J." . PHP_EOL .
    "Издательство: O'Reily" . PHP_EOL .
    "Год: 2020" . PHP_EOL;
    echo PHP_EOL;
    echo "Получено:" . PHP_EOL . $booksList->get(1) . PHP_EOL;
    echo PHP_EOL;

    echo "Writing file test" . PHP_EOL;
    $book2->setTitle("Python Principles")
        ->setAuthors(["Brown A."])
        ->setPublisher("Packt")
        ->setYear(2019);
    $booksList->store('books_data.txt');
    echo 'Check file "books_data.txt"' . PHP_EOL;
    echo PHP_EOL;

    echo "Reading file test" . PHP_EOL;
    $booksList->load('books_data.txt');
    print_r($booksList);
}
