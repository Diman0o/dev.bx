CREATE TABLE language
(
    ID varchar(2) not null,
    NAME varchar(255) not null,
    PRIMARY KEY (ID)
);

CREATE TABLE movie_title
(
    MOVIE_ID int not null,
    LANGUAGE_ID varchar(2) not null,
    TITLE varchar(255) not null,
    FOREIGN KEY FK_MT_MOVIE (MOVIE_ID)
        REFERENCES movie(ID)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT,
    FOREIGN KEY FK_MT_LANGUAGE (LANGUAGE_ID)
        REFERENCES language(ID)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
);

INSERT INTO language (ID, NAME)
VALUES ('ru', 'Русский'),
       ('en', 'English'),
       ('fr', 'Français');

INSERT INTO movie_title (MOVIE_ID, LANGUAGE_ID, TITLE)
SELECT ID, 'ru', TITLE
FROM movie;

ALTER TABLE movie DROP COLUMN TITLE;
