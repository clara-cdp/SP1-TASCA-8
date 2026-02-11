<?php

declare(strict_types=1);

namespace LibraryApp\Tests; // Changed to \Tests to be cleaner

use PHPUnit\Framework\TestCase;
use LibraryApp\Book; // This imports your class from src/Book.php


class BookTest extends TestCase
{

        public function testBookCanBeInstatiated(): void
        {

                $title = "The Shadow of the Wind";
                $author = "Carlos Ruiz Zafón";
                $ISBN = "978-8408043645";
                $genre = "Paranormal";
                $pageNum = 576;

                $book = new Book($title, $author, $ISBN, $genre, $pageNum);

                $this->assertEquals($title, $book->getTitle());
        }
}
