<?php
function selectMovie(array $movies, int $id)
{
    //Pretend that we select movie by id from database
    return $movies[$id - 1];
}

function filterMoviesByGenre(array $movies, array $availableGenres, string $genreCode)
{
    if (array_key_exists($genreCode, $availableGenres))
    {
        $genre = $availableGenres[$genreCode];

        $filteredMovies = [];
        foreach($movies as $movie)
        {
            if (in_array($genre, $movie['genres']))
            {
                $filteredMovies[] = $movie;
            }
        }

        return $filteredMovies;
    }
    return $movies;
}