<?php

declare(strict_types=1);

namespace LibraryApp\Tests;

use PHPUnit\Framework\TestCase;
use LibraryApp\Book;
use LibraryApp\Genre;


class BookTest extends TestCase
{
        public function testBookCanBeInstatiated(): void
        {

                $title = "The Shadow of the Wind";
                $author = "Carlos Ruiz Zafón";
                $ISBN = "978-8408043645";
                $genre = Genre::Paranormal;
                $pageNum = 576;

                $book = new Book($title, $author, $ISBN, $genre, $pageNum);

                $this->assertEquals($title, $book->getTitle());
                $this->assertSame(Genre::Paranormal, $book->getGenre());
                $this->assertEquals("Paranormal", $book->getGenre()->value);
        }
}
