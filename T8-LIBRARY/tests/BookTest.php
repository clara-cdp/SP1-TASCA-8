<?php

declare(strict_types=1);

namespace LibraryApp\Tests;

use PHPUnit\Framework\TestCase;
use LibraryApp\Book;


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
