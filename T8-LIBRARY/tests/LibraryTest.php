<?php

namespace LibraryApp\Tests;

use PHPUnit\Framework\TestCase;
use LibraryApp\Book;
use LibraryApp\Library;

class LibraryTest extends TestCase
{

    public function testAddBookToLibrary(): void
    {
        $library = new Library();
        $book = new Book("The Hobbit", "Tolkien", "123", "Fantàstic", 310);

        $library->addBook($book);
        $this->assertCount(1, $library->getBooks());
    }

    public function testLibraryStartsEmpty(): void
    {
        $library = new Library();
        $this->assertCount(0, $library->getBooks());
    }

    public function testFilterBooksOver500pages(): void
    {
        $library = new Library();
        $library->addBook(new Book("Limit Book", "Author", "1", "Conte", 500)); // Should NOT be in results
        $library->addBook(new Book("Large Book", "Author", "2", "Fantàstic", 501)); // Should BE in results

        $largeBooks = $library->getBooksOver500pages();

        $this->assertCount(1, $largeBooks);
        $this->assertEquals("Large Book", $largeBooks[0]->getTitle());
    }
}
