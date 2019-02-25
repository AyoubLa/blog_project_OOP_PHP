-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 fév. 2019 à 10:27
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Developpement'),
(2, 'Conception');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` longtext,
  `post_date` date DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_date`, `category_id`) VALUES
(4, 'first great title', 'Lorem ipsum dolor sit amet, no duo lorem oratio commodo, pro ne tation persius ullamcorper. Te usu vide placerat cotidieque, no has vide scripta delenit. His omnis suavitate abhorreant ei, id has fabulas meliore perfecto, pro ut eleifend suscipiantur. Pri odio choro intellegat ea, ne vel feugiat dissentiet.', '2019-02-05', 1),
(5, 'Seconde great title', 'Lorem ipsum dolor sit amet, no duo lorem oratio commodo, pro ne tation persius ullamcorper. Te usu vide placerat cotidieque, no has vide scripta delenit. His omnis suavitate abhorreant ei, id has fabulas meliore perfecto, pro ut eleifend suscipiantur. Pri odio choro intellegat ea, ne vel feugiat dissentiet.', '2019-02-06', 2),
(6, 'An other Title', 'Lorem ipsum dolor sit amet, no duo lorem oratio commodo, pro ne tation persius ullamcorper. Te usu vide placerat cotidieque, no has vide scripta delenit. His omnis suavitate abhorreant ei, id has fabulas meliore perfecto, pro ut eleifend suscipiantur. Pri odio choro intellegat ea, ne vel feugiat dissentiet.', '2019-02-07', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `category_posts_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
