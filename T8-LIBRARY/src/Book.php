<?php

namespace LibraryApp;

use LibraryApp\Genre;

class Book
{

    public function __construct(
        private string $title,
        private string $author,
        private string $isbn,
        private Genre $genre,
        private int $pageNum
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function getIsbn(): string
    {
        return $this->isbn;
    }
    public function getGenre(): Genre
    {
        return $this->genre;
    }
    public function getPagesNum(): int
    {
        return $this->pageNum;
    }
}
