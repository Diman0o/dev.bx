<?php
declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
/** @var array $genres */
/** @var array $movies */
require_once "./data/movies.php";
require_once "./lib/utils.php";
require_once "./lib/movies-functions.php";
require_once "./lib/template-functions.php";

// prepare page content
$addMoviePage = renderTemplate("./templates/pages/add_movie.php", [
    'config' => $config,
]);

// render layout
renderLayout($addMoviePage, [
    'config' => $config,
    'genres' => $genres,
    'currentPage' => getFileName(__FILE__)
]);