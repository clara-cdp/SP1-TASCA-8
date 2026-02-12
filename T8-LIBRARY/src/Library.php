<?php

namespace LibraryApp;

class Library
{
    private array $books = [];

    public function getBooks(): array
    {
        return $this->books;
    }

    //add and remove:
    public function addBook(Book $newBook): void
    {
        foreach ($this->books as $book) {
            if ($book->getIsbn() === $newBook->getIsbn()) {
                throw new \Exception("El llibre amb aquest ISBN ja existeix.");
            }
        }

        $this->books[] = $newBook;
    }

    public function removeByISBN(string $isbn): void
    {
        foreach ($this->books as $key => $book) {
            if ($book->getIsbn() === $isbn) {
                unset($this->books[$key]);
                $this->books = array_values($this->books);
                break;
            }
        }
    }

    //find Books:

    public function findByGenre(Genre $genre): array
    {
        $bookList = [];
        foreach ($this->books as $book) {
            if ($book->getGenre() === $genre) {
                $bookList[] = $book;
            }
        }

        return $bookList;
    }

    public function findByAuthor(string $author): array
    {
        $bookList = [];
        foreach ($this->books as $book) {
            if ($book->getAuthor() === $author) {
                $bookList[] = $book;
            }
        }

        return $bookList;
    }

    public function findByTitle(string $title): array
    {
        $bookList = [];
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                $bookList[] = $book;
            }
        }

        return $bookList;
    }

    public function findByIsbn(string $isbn): ?Book
    {
        foreach ($this->books as $book) {
            if ($book->getIsbn() === $isbn) {
                return $book;
            }
        }
        return null;
    }

    //modify book
    public function editTitleByIsbn(string $isbn, string $newTitle): void
    {
        foreach ($this->books as $book) {
            if ($book->getIsbn() === $isbn) {
                $book->setTitle($newTitle);
                return;
            }
        }
    }

    //check book has pages over500
    public function getBooksOver500pages(): array
    {
        $booksList = array_values(array_filter($this->books, function ($book) {
            return $book->getPagesNum() > 500;
        }));

        return $booksList;
    }
}
