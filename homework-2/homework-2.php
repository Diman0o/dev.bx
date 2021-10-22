<?php
include_once "movies (1).php";

function validateUserAge($userAge)
{
    if (is_numeric($userAge)) {
        $userAge = intval($userAge);
        if ($userAge >= 0 && $userAge < 122) {
            return $userAge;
        }
    }
    exit("User age is not valid");
}

function readUserAge()
{
    echo "Enter user age: ";
    return readline();
}

function filterMoviesByUserAge($movies, $userAge)
{
    $filteredMovies = [];
    foreach ($movies as $movie)
    {
        if ($userAge >= $movie["age_restriction"])
        {
            $filteredMovies[] = $movie;
        }
    }
    return $filteredMovies;
}

function printMovie($movie, $index)
{
    $title = $movie["title"];
    $releaseYear = $movie["release_year"];
    $ageRestriction = $movie["age_restriction"];
    $rating = $movie["rating"];
    echo "{$index}. {$title} ({$releaseYear}), {$ageRestriction}+. Rating - {$rating}\n";
}

function printMovies($movies)
{
    $count = count($movies);
    for ($i = 0; $i < $count; $i++)
    {
        printMovie($movies[$i], $i + 1);
    }
}

$userAge = validateUserAge(readUserAge());
$filteredMovies = filterMoviesByUserAge($movies, $userAge);
printMovies($filteredMovies);