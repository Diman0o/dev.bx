<?php
/** @var array $movies */
/** @var array $config */
?>
<div class="content">
    <div class="movie-list">
        <?php foreach ($movies as $movie): ?>
            <div class="movie-card">
                <div class="movie-card-overlay">
                    <a href="movie_details.php?id=<?= $movie['id'] ?>" class="movie-card-overlay-more"><?= $config['details-header'] ?></a>
                </div>
                <img src="./resources/images/posters/<?= $movie['id'] ?>.jpg">
                <p class="movie-card-name"><?= $movie['title'] ?></p>
                <p class="movie-card-name-en"><?= $movie['original-title'] ?></p>
                <div class="movie-card-description"><?= $movie['description'] ?></div>
                <div class="movie-card-info">
                    <img src="./resources/images/icons/clock.png">
                    <p class="movie-card-info-time"><?= $movie['duration'] ?> мин. / <?= formatTimeToString($movie['duration']) ?></p>
                    <p class="movie-card-info-genre"><?= join(", ", $movie['genres']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>