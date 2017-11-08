<?php

use Solid\Book;
use PHPUnit\Framework\TestCase;

class SrpTest extends TestCase
{
    public function test_if_book_can_be_printed_to_txt()
    {
        $book = new Book();
        $this->assertEquals('Book: Clean Code - Uncle Bob', $book->print());
    }

    public function test_if_book_can_be_printed_to_json()
    {
        $book = new Book();
        $this->assertEquals('{"Book":{"author":"Uncle Bob","title":"Clean Code"}}', $book->printJson());
    }

    public function test_if_book_can_be_printed_to_xml()
    {
        $book = new Book();
        $this->assertEquals('<?xml version="1.0"?>
<Book><Author>Uncle Bob</Author><Title>Clean Code</Title></Book>
', $book->printXml());
    }

    public function test_if_book_can_be_printed_to_array()
    {
        $book = new Book();
        $result = $book->printAsArray();
        $this->assertArrayHasKey('Book', $result);
        $this->assertArrayHasKey('title', $result['Book']);
        $this->assertArrayHasKey('author', $result['Book']);
        $this->assertEquals('Clean Code', $result['Book']['title']);
    }

    public function test__if_library_location_is_right()
    {
        $book = new Book();
        $location = $book->getLocation();
        $this->assertEquals('Library 1A - Shelf 3', $location);
    }

    public function test_if_book_can_be_saved_as_pdf()
    {
        $book = new Book();
        $saved = $book->save();
        $this->assertEquals('Book.pdf', $saved);
    }

}
