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

    public function getPages(): int
    {
        return $this->pages;
    }

    public function getBooksOver500pages(): array
    {
        return array_values(array_filter($this->books, function ($book) {
            return $book->getPages() > 500;
        }));
    }
}
