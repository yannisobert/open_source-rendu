<?php

declare(strict_types=1);

namespace Yannisobert\OpenSourceRendu;

use Symfony\Component\DomCrawler\Crawler;

class Catalogue
{
    public function getCatalogue(): array
    {
        $catalogues = [];
        $url = "https://www.editionslibertalia.com/catalogue/";

        $html = (string)file_get_contents($url);

        $books = $this->getBooks($html);
        $authors = $this->getAuthors($html, $books);

        $i = 0;

        foreach ($authors as $author) {
            $catalogues[] = [
                'author' => $author,
                'book' => $books[$i]
            ];
            $i++;
        }

        return $catalogues;
    }

    public function getBooks(string $html): array
    {
        $books = [];
        $crawler = new Crawler($html);

        $crawler = $crawler->filterXPath('descendant-or-self::h2/strong');

        foreach ($crawler as $domElement) {
            $books[] = $domElement->nodeValue;
        }

        return $books;
    }

    public function getAuthors(string $html, array $books): array
    {
        $authors = [];
        $crawler = new Crawler($html);

        $crawler = $crawler->filterXPath('descendant-or-self::h2');

        $i = 0;

        foreach ($crawler as $domElement) {
            $author = preg_replace("/[^A-Za-z ]/", '', str_replace($books[$i], '', (string)$domElement->nodeValue));
            $authors[] = $author;
            $i++;
        }

        return $authors;
    }
}