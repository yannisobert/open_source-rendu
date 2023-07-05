# open_source-rendu

## Explaination

This package sends you all the catalog of the <a href="https://www.editionslibertalia.com/catalogue/">Libertalia</a> library with the names of these authors.

## Install

```bash
composer require yannisobert/open_source-rendu
```

## Usage

To render the list of the catalogue :

```bash
mkdir build
```

Create index.php in build folder and add this code:
```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

$api = new \Yannisobert\OpenSourceRendu\Catalogue();
var_dump($api->getCatalogue());
```

Run the command : 
```bash
php build/index.php
```


## Local development

```bash
   composer install
```

## Linter & Test
<hr>

```bash
   composer phpstan
```

```bash
   composer test
```

## License

<hr>
The MIT License. Please see License File for more information.