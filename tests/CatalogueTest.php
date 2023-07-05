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
}