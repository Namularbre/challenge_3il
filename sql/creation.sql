
CREATE DATABASE IF NOT EXISTS scierie
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE scierie;

START TRANSACTION;

CREATE TABLE home (
                      id INT NOT NULL AUTO_INCREMENT,
                      titre VARCHAR(255) NOT NULL,
                      description VARCHAR(500) NOT NULL,
                      img VARCHAR(500) NOT NULL,
                      PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO home (id, titre, description, img) VALUES
                                                   (2, 'Vous recherchez la meilleure essence de bois pour vos parquets ou lambris ?',
                                                    'La SCIERIE DU FARGAL vous donne toutes les solutions...', 'img2.jpg'),
                                                   (3, 'Votre expert en bois dans l\'Aveyron',
                                                    'Nous avons le sens du service...', 'img4.jpg');

CREATE TABLE produits (
                          id INT NOT NULL AUTO_INCREMENT,
                          titre VARCHAR(255) NOT NULL,
                          description VARCHAR(500) NOT NULL,
                          img VARCHAR(500) NULL,
                          PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO produits (id, titre, description, img) VALUES
                                                       (1, 'Le séchoir à bois', 'Le séchage naturel du bois...', 'sechoir.jpeg'),
                                                       (2, 'Les poutres', 'Grosse pièce de bois...', 'poutre.jpg'),
                                                       (3, 'Les lambourdes', 'Poutrelle indispensable...', 'lambourde.jpg');

CREATE TABLE support (
                         id INT NOT NULL AUTO_INCREMENT,
                         nom VARCHAR(255) NOT NULL,
                         email VARCHAR(255) NOT NULL,
                         sub VARCHAR(255) NOT NULL,
                         message VARCHAR(500) NOT NULL,
                         PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO support (nom, email, sub, message) VALUES
                                                   ('Hugo', 'hugo-vican@hotmail.fr', 'Test', 'Ceci est un message de test'),
                                                   ('Hugo', 'hugo-vican@hotmail.fr', 'Avis', 'Super le nouveau site!');

CREATE TABLE users (
                       id VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (id, password) VALUES
                                     ('Admin', 'md5hash'),
                                     ('Paul', 'md5hash');

COMMIT;
