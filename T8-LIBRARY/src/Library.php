<?php

namespace LibraryApp;

class Library
{
    private array $books = [];

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function getBooks(): array
    {
        return $this->books;
    }

    public function getBooksOver500pages(): array
    {
        $booksList = array_values(array_filter($this->books, function ($book) {
            return $book->getPages() > 500;
        }));

        return $booksList;
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
}
