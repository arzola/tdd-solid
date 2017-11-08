<?php
namespace Solid;

/**
 *  Ejercicio Single Responsability Principle
 *  Puede que parezca razanoable que todos los métodos son parte de un libro
 *  sin embargo si análizamos el contexto nos daremos cuenta de que no necesariamente
 *  y que hay responsabilidades que están fuera del alcance de un "Libro".
 */

class Book
{
    private $currentPage = 1;

    public function getTitle()
    {
        return 'Clean Code';
    }

    public function getAuthor()
    {
        return 'Uncle Bob';
    }

    public function turnPage()
    {
        $this->currentPage++;
    }

    public function print()
    {
        return "Book: {$this->getTitle()} - {$this->getAuthor()}";
    }

    public function printJson()
    {
        return json_encode(['Book' => ['author' => $this->getAuthor(), 'title' => $this->getTitle()]]);
    }

    public function printXml()
    {
        $xml = new \SimpleXMLElement('<Book/>');
        $xml->addChild('Author', $this->getAuthor());
        $xml->addChild('Title', $this->getTitle());

        return $xml->asXML();
    }

    public function printAsArray()
    {
        return ['Book' => ['title' => $this->getTitle(), 'author' => $this->getAuthor()]];
    }

    public function getLocation()
    {
        return 'Library 1A - Shelf 3';
    }

    public function save()
    {
        return 'Book.pdf';
    }

}