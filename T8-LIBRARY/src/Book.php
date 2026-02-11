<?php

namespace LibraryApp;

class Book
{

    public function __construct(
        private string $title,
        private string $author,
        private string $isbn,
        private string $genre,
        private int $pages
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }
}
