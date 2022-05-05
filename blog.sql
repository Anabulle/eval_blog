-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 mai 2022 à 11:36
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `img_article` varchar(50) NOT NULL,
  `title_article` varchar(255) NOT NULL,
  `content_article` text NOT NULL,
  `auteur_article` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `img_article`, `title_article`, `content_article`, `auteur_article`, `id_user`) VALUES
(3, 'Jade orlagrèss337883.jpeg', 'Les dernières découvertes sur les mythes grecs!', 'Lorem ipsum dolor sit amet. Est tempora omnis et atque cumque eos doloremque nemo qui facere rerum eos deleniti assumenda? Cum officiis nostrum ut eaque animi ex voluptatem laborum non reprehenderit galisum ut enim culpa ut incidunt enim. Et saepe saepe et voluptas officiis qui unde dignissimos. Id vitae enim aut molestiae saepe At consequatur totam aut tempora nobis.\r\n\r\nEt expedita quam qui exercitationem asperiores et esse dolorum sit voluptatem voluptas nam odit sint et adipisci nemo cum explicabo consectetur. Est modi iusto ut possimus reprehenderit in velit possimus.\r\n\r\nUt voluptas omnis ut magni rerum et eius impedit est voluptatem rerum ut deleniti quam hic dicta voluptas id sint voluptas! Ut cumque galisum et modi placeat quo pariatur amet? Quo voluptas officiis quo nobis asperiores eum sunt nisi.', 'Jade orlagrèss', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_user` varchar(50) NOT NULL,
  `mdp_user` varchar(255) NOT NULL,
  `role_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `pseudo_user` (`pseudo_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `pseudo_user`, `mdp_user`, `role_user`) VALUES
(3, 'pouet', '$2y$10$vADpFMgpuDyP07YR.4s.9e2QSrAq3yaOIIDobe6vot4GPMpaKVJ5a', 2),
(4, 'admin', '$2y$10$Kc8HE7ItKbEyb77tgKbvLOv64Yi15L987FHXRipmMXU/kEcqE2S9W', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
