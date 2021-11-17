<?php
/** @var array $movie */
/** @var array $config */
?>

<div class="content">
    <div class="movie-page">
        <div class="movie-header">
            <img src="./resources/images/icons/empty_like.png" onclick='this.src="./resources/images/icons/filled_like.png"' class="movie-page-image-like">
            <p class="movie-page-title"><?= $movie['title'] ?></p>
            <p class="movie-page-title-en"><?= $movie['original-title'] ?></p>
            <img src="./resources/images/icons/age_restriction.png" class="movie-page-age-limit">
        </div>
        <div class="movie-page-content">
            <img src="./resources/images/posters/<?= $movie['id']?>.jpg" class="movie-page-poster">
            <div class="movie-page-info">
                <div class="movie-page-rating">
                    <ul class="movie-page-rating-scale">
                        <?php foreach(range(1,10) as $rating_index): ?>
                            <li class="movie-page-rating-scale-square <?= $rating_index <= $movie['rating'] ? "movie-page-rating-scale-square--active" : "" ?>"></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="movie-page-rating-ellipse"><?= $movie['rating'] ?></div>
                </div>
                <p class="movie-page-about-film"><?= $config['about-movie-text'] ?></p>
                <ul>
                    <li class="movie-page-about-film">
                        <p class="movie-page-about-film-title"><?= $config['release-date-text'] ?></p>
                        <p class="movie-page-about-film-item"><?= $movie['release-date'] ?></p>
                    </li>
                    <li class="movie-page-about-film">
                        <p class="movie-page-about-film-title"><?= $config['director-text'] ?></p>
                        <p class="movie-page-about-film-item"><?= $movie['director'] ?></p>
                    </li>
                    <li class="movie-page-about-film">
                        <p class="movie-page-about-film-title"><?= $config['cast-text'] ?></p>
                        <p class="movie-page-about-film-item"><?= join(", ", $movie['cast']) ?></p>
                    </li>
                </ul>
                <p class="movie-page-description"><?= $config['description-text'] ?></p>
                <p class="movie-page-info-description"><?= $movie['description'] ?></p>
            </div>
        </div>
    </div>
</div>