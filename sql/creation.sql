CREATE DATABASE IF NOT EXISTS scierie
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE scierie;

START TRANSACTION;

CREATE TABLE home (
  id INT NOT NULL AUTO_INCREMENT,
  titre TEXT NOT NULL,
  descr TEXT NOT NULL,
  img TEXT NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO home (id, titre, descr, img) VALUES
(2, 'Vous recherchez la meilleure essence de bois pour vos parquets ou lambris ?', 
 'La SCIERIE DU FARGAL vous donne toutes les solutions...', 'img2.jpg'),
(3, 'Votre expert en bois dans l\'Aveyron',
 'Nous avons le sens du service...', 'img4.jpg');

CREATE TABLE produits (
  id INT NOT NULL AUTO_INCREMENT,
  titre TEXT NOT NULL,
  descr TEXT NOT NULL,
  img TEXT NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO produits (id, titre, descr, img) VALUES
(1, 'Le séchoir à bois', 'Le séchage naturel du bois...', 'sechoir.jpeg'),
(2, 'Les poutres', 'Grosse pièce de bois...', 'poutre.jpg'),
(3, 'Les lambourdes', 'Poutrelle indispensable...', 'lambourde.jpg');

CREATE TABLE support (
  suId INT NOT NULL AUTO_INCREMENT,
  suNom VARCHAR(255) NOT NULL,
  suEmail VARCHAR(255) NOT NULL,
  suSub TEXT NOT NULL,
  suMsg TEXT NOT NULL,
  PRIMARY KEY (suId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO support (suNom, suEmail, suSub, suMsg) VALUES
('Hugo', 'hugo-vican@hotmail.fr', 'Test', 'Ceci est un message de test'),
('Hugo', 'hugo-vican@hotmail.fr', 'Avis', 'Super le nouveau site!');

CREATE TABLE users (
  userId VARCHAR(255) NOT NULL,
  userPwd VARCHAR(255) NOT NULL,
  PRIMARY KEY (userId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (userId, userPwd) VALUES
('Admin', 'md5hash'),
('Paul', 'md5hash');

COMMIT;
