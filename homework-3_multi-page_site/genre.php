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

$genre = NULL;
if(isset($_GET['genre']))
{
    $genre = escape($_GET['genre']);
    $movies = filterMoviesByGenre($movies, $genres, $genre);
}

// prepare page content
$mainPage = renderTemplate("./templates/pages/movies_cards.php", [
    'movies' => $movies,
    'config' => $config,
]);

// render layout
renderLayout($mainPage, [
    'config' => $config,
    'genres' => $genres,
    'genre' => $genre,
    'currentPage' => getFileName(__FILE__)
]);