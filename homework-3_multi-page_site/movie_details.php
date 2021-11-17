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

$movieDetailsPage = '<h1>Movie not found</h1>';

if(isset($_GET['id']))
{
    $id = (int) escape($_GET['id']);
    $movie = selectMovie($movies, $id);
    if($movie != null)
    {
        // prepare page content
        $movieDetailsPage = renderTemplate("./templates/pages/movie_details.php", [
            'movie' => $movie,
            'config' => $config,
        ]);
    }
}

// render layout
renderLayout($movieDetailsPage, [
    'config' => $config,
    'genres' => $genres,
    'currentPage' => getFileName(__FILE__)
]);