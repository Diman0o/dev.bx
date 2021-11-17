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

//Pretend that out favorite movies is first 3 movies
$favoriteMovies = [];
foreach(range(0, 2) as $index)
{
    $favoriteMovies[] = $movies[$index];
}

// prepare page content
$favoritePage = renderTemplate("./templates/pages/movies_cards.php", [
    'movies' => $favoriteMovies,
    'config' => $config,
]);

// render layout
renderLayout($favoritePage, [
    'config' => $config,
    'genres' => $genres,
    'currentPage' => getFileName(__FILE__)
]);