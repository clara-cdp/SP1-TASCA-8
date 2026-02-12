<?php

namespace LibraryApp\Tests;

use PHPUnit\Framework\TestCase;
use LibraryApp\Book;
use LibraryApp\Library;
use LibraryApp\Genre;

class LibraryTest extends TestCase
{

    private Library $library;

    protected function setUp(): void
    {
        $this->library = new Library();
        $this->library->addBook(new Book("Dune", "Herbert", "978-0801950773", Genre::SYFY, 600));
        $this->library->addBook(new Book("The Hobbit", "Tolkien", "9780261102217", Genre::Fantasy, 310));
        $this->library->addBook(new Book("The Shadow of the Wind", "Carlos Ruiz Zafón", '9788408043645', Genre::Paranormal, 576));
        $this->library->addBook(new Book("La cúpula", "Stephen King", "9788401337635", Genre::SYFY, 500)); //large book limit
        $this->library->addBook(new Book("La nit de l'escola", "Karl Ove Knausgård", "9780525562078", Genre::Paranormal, 501)); //book over 500 pgs
    }

    //Afegeixin, esborrin (i modifiquin) un llibre de la llibreria.
    public function testAddBookToLibrary(): void
    {
        $newBook = new Book("1984", "George Orwell", "9780451524935", Genre::Dystopian, 328);

        $this->library->addBook($newBook);
        $this->assertCount(6, $this->library->getBooks());
    }

    //-> NEW TEST. what happens i add a bokk that alreay exists?? 
    public function testAddBookDuplicateBookException(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("El llibre amb aquest ISBN ja existeix.");

        $book1 = new Book("Cròniques de la veritat oculta", "Pere Calders", "9788472221659", Genre::Story, 192);
        $book2 = new Book("The Hobbit", "Tolkien", "9780261102217", Genre::Fantasy, 310); //already exists

        $this->library->addBook($book1);
        $this->library->addBook($book2); // exception case
    }

    public function testLibraryStartsEmpty(): void
    {
        $library = new Library();
        $this->assertCount(0, $library->getBooks());
    }

    public function testRemoveBookByISBN(): void
    {
        $isbn = "9788408043645";
        $this->library->removeByISBN($isbn);

        $this->assertCount(4, $this->library->getBooks(), "El llibre no s'ha esborrat correctament.");
    }

    //Permetin consultar llibres per títol, gènere, ISBN o autor.
    public function testFindByTitle(): void
    {
        $results = $this->library->findByTitle("Dune");

        $this->assertCount(1, $results);
        $this->assertEquals("Dune", $results[0]->getTitle());
    }

    public function testFindByGenre(): void
    {
        $genre = Genre::SYFY;
        $results = $this->library->findByGenre($genre);

        $this->assertCount(2, $results);
        $this->assertEquals("Dune", $results[0]->getTitle());
    }

    public function testFindByISBN(): void
    {
        $ISBN = "9780261102217";
        $result = $this->library->findByISBN($ISBN);

        $this->assertInstanceOf(Book::class, $result);
        $this->assertEquals("The Hobbit", $result->getTitle());
    }

    public function testFindByAuthor(): void
    {
        $author = "Tolkien";
        $results = $this->library->findByAuthor($author);

        $this->assertCount(1, $results);
        $this->assertEquals("The Hobbit", $results[0]->getTitle());
    }


    //Retornar llibres grans (més de 500 pàgines).
    public function testFilterBooksOver500pages(): void
    {
        $largeBooks = $this->library->getBooksOver500pages();

        $this->assertCount(3, $largeBooks);

        $titles = array_map(fn($book) => $book->getTitle(), $largeBooks);

        $this->assertContains("La nit de l'escola", $titles);
        $this->assertContains("Dune", $titles);
        $this->assertContains("The Shadow of the Wind", $titles);
    }
}
