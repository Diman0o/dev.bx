<?php
/** @var array $config */
/** @var string $content */
/** @var array $genres */
/** @var string $currentPage */
/** @var string|null $genre */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitflix</title>
    <link rel="stylesheet" href="./resources/css/reset.css">
    <link rel="stylesheet" href="./resources/css/style_layout.css">
    <link rel="stylesheet" href="./resources/css/<?= $config['css-file'][$currentPage] ?>">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <img src="./resources/images/icons/bitflix.png">
        <ul class="left-menu">
            <li class="left-menu-item <?= $currentPage == 'main' ? "left-menu-item--active" : ""?>">
                <a href="main.php"><?= $config['menu']['main'] ?></a>
            </li>
            <?php foreach ($genres as $genre_key => $genre_value): ?>
                <li class="left-menu-item <?= $genre_key == $genre ? "left-menu-item--active" : "" ?>">
                    <a href="genre.php?genre=<?= $genre_key ?>"><?= $genre_value ?></a>
                </li>
            <?php endforeach; ?>
            <li class="left-menu-item <?= $currentPage == 'favorite' ? "left-menu-item--active" : ""?>">
                <a href="favorite.php"><?= $config['menu']['favorite'] ?></a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="header-search">
                <div class="header-catalog-search">
                    <img src="./resources/images/icons/search.png">
                    <input type="text" placeholder="<?= $config['search-placeholder'] ?>" class="header-catalog-search-input">
                </div>
                <input type="button" value="<?= $config['search-button-text'] ?>" class="header-button-search">
                <a href="add_movie.php" class="header-add-movie"><?= $config['add-movie-text'] ?></a>
            </div>
        </div>
        <?= $content ?>
    </div>
</div>
</div>
</body>
</html>
