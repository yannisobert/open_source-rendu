<?php

use PHPUnit\Framework\TestCase;
use Yannisobert\OpenSourceRendu\Catalogue;

class CatalogueTest extends TestCase
{
    public function testGetCatalogue()
    {
        $catalogue = new Catalogue();

        $this->assertIsArray($catalogue->getCatalogue());
    }

    public function testGetBooks()
    {
        $catalogue = new Catalogue();

        $url = "https://www.editionslibertalia.com/catalogue/";
        $html = (string)file_get_contents($url);

        $this->assertIsArray($catalogue->getBooks($html));
    }

    public function testGetAuthors()
    {
        $catalogue = new Catalogue();

        $url = "https://www.editionslibertalia.com/catalogue/";
        $html = (string)file_get_contents($url);

        $this->assertIsArray($catalogue->getAuthors($html, $catalogue->getBooks($html)));
    }
}