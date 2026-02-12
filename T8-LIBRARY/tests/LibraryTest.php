<?php

namespace LibraryApp\Tests;

use PHPUnit\Framework\TestCase;
use LibraryApp\Book;
use LibraryApp\Library;
use LibraryApp\Genre;

class LibraryTest extends TestCase
{
    //Afegeixin, esborrin i modifiquin un llibre de la llibreria.
    public function testAddBookToLibrary(): void
    {
        $library = new Library();
        $book = new Book("The Hobbit", "J.R.R. Tolkien", "9780261102217", Genre::Fantasy, 310);

        $library->addBook($book);
        $this->assertCount(1, $library->getBooks());
    }

    public function testLibraryStartsEmpty(): void
    {
        $library = new Library();
        $this->assertCount(0, $library->getBooks());
    }


    public function testRemoveBookByISBN(): void
    {
        $library = new Library();
        $isbn = "978-8408043645";
        $book = new Book("The Shadow of the Wind", "Carlos Ruiz Zafón", $isbn, Genre::Paranormal, 576);

        $library->addBook($book);

        $library->removeByISBN($isbn);

        $this->assertCount(0, $library->getBooks(), "El llibre no s'ha esborrat correctament.");
    }
    //Permetin consultar llibres per títol, gènere, ISBN o autor.

    //Retornar llibres grans (més de 500 pàgines).
    public function testFilterBooksOver500pages(): void
    {
        $library = new Library();
        $library->addBook(new Book("Limit Book", "Author", "1", Genre::Story, 500)); // Should NOT be in results
        $library->addBook(new Book("Large Book", "Author", "2", Genre::SYFY, 501)); // Should BE in results

        $largeBooks = $library->getBooksOver500pages();

        $this->assertCount(1, $largeBooks);
        $this->assertEquals("Large Book", $largeBooks[0]->getTitle());
    }
}
