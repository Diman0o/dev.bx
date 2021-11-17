# 1. Вывести список фильмов, в которых снимались
# одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
SELECT
       ma.MOVIE_ID,
       mt.TITLE,
       d.NAME
FROM movie_actor ma
    INNER JOIN movie_title mt on ma.MOVIE_ID = mt.MOVIE_ID
    INNER JOIN movie m on ma.MOVIE_ID = m.ID
    INNER JOIN director d on m.DIRECTOR_ID = d.ID
WHERE ACTOR_ID IN (1, 3) AND LANGUAGE_ID = 'ru'
GROUP BY ma.MOVIE_ID, mt.TITLE, d.NAME
HAVING COUNT(*) = 2;

SELECT
    DISTINCT ma.MOVIE_ID,
    mt.TITLE,
    d.NAME
FROM movie_actor ma
         INNER JOIN movie_title mt on ma.MOVIE_ID = mt.MOVIE_ID
         INNER JOIN movie m on ma.MOVIE_ID = m.ID
         INNER JOIN director d on m.DIRECTOR_ID = d.ID
WHERE ma.MOVIE_ID IN (
    SELECT MOVIE_ID
    FROM movie_actor
    WHERE ACTOR_ID = 1)
AND ma.MOVIE_ID IN (
    SELECT MOVIE_ID
    FROM movie_actor
    WHERE ACTOR_ID = 3)
AND LANGUAGE_ID = 'ru';

# 2.  Вывести список названий фильмов на английском языке
# с "откатом" на русский, в случае если название на английском не задано.
SELECT
    m.ID,
    IFNULL(mt.TITLE, mt2.TITLE)
FROM movie m
    LEFT JOIN movie_title mt on m.ID = mt.MOVIE_ID AND mt.LANGUAGE_ID = 'en'
    INNER JOIN movie_title mt2 on m.ID = mt2.MOVIE_ID AND mt2.LANGUAGE_ID = 'ru'
ORDER BY m.ID;

# 3. Вывести самый длительный фильм Джеймса Кэмерона*.
SELECT
    m.ID,
    TITLE,
    LENGTH
FROM movie m LEFT JOIN movie_title on m.ID = MOVIE_ID
WHERE DIRECTOR_ID = 1 AND LANGUAGE_ID = 'ru'
AND LENGTH = (SELECT(MAX(LENGTH)) FROM movie);

# 4. Вывести список фильмов с названием, сокращённым
# до 10 символов. Если название короче 10 символов –
# оставляем как есть. Если длиннее – сокращаем до 10 символов
# и добавляем многоточие.
SELECT
    MOVIE_ID,
    IF(CHAR_LENGTH(TITLE)<=10, TITLE, CONCAT(LEFT(TITLE, 10), '...'))
FROM movie_title;

# 5. Вывести количество фильмов, в которых снимался каждый актёр.
SELECT
    a.NAME AS ACTOR_NAME,
    COUNT(MOVIE_ID) AS COUNT_MOVIES
FROM actor a INNER JOIN movie_actor ma on a.ID = ACTOR_ID
GROUP BY ACTOR_ID;

# 6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
SELECT
    DISTINCT g.ID,
    g.NAME
FROM genre g
    INNER JOIN movie_genre mg on g.ID = mg.GENRE_ID
    INNER JOIN movie_actor ma on mg.MOVIE_ID = ma.MOVIE_ID
WHERE g.ID NOT IN(
    SELECT GENRE_ID
    FROM movie_genre mg2 INNER JOIN movie_actor ma2 on mg2.MOVIE_ID = ma2.MOVIE_ID
    WHERE ACTOR_ID = 1
    );

# 7. Вывести список фильмов, у которых больше 3-х жанров.
SELECT
    mt.MOVIE_ID,
    TITLE
FROM movie_title mt INNER JOIN movie_genre mg on mt.MOVIE_ID = mg.MOVIE_ID
WHERE LANGUAGE_ID = 'ru'
GROUP BY mt.MOVIE_ID, TITLE
HAVING COUNT(GENRE_ID) > 3;

# 8. Вывести самый популярный жанр для каждого актёра.
SELECT
    ACTOR_NAME,
    GENRE_NAME,
    MAX(COUNT_GENRE) AS MAX_GENRE
FROM(
    SELECT
        a.NAME AS ACTOR_NAME,
        g.NAME AS GENRE_NAME,
        COUNT(GENRE_ID) AS COUNT_GENRE
    FROM movie_actor ma
        INNER JOIN actor a on ma.ACTOR_ID = a.ID
        INNER JOIN movie_genre mg on ma.MOVIE_ID = mg.MOVIE_ID
        INNER JOIN genre g on mg.GENRE_ID = g.ID
    GROUP BY  ACTOR_NAME, GENRE_NAME
    ORDER BY COUNT_GENRE DESC) t
GROUP BY ACTOR_NAME, GENRE_NAME;