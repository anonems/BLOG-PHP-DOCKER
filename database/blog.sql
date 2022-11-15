-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 15 nov. 2022 à 13:31
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.24

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

CREATE TABLE `article` (
  `id` int NOT NULL,
  `author` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(30) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `illustration` varchar(1000) NOT NULL,
  `descript` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `author`, `title`, `content`, `pubdate`, `category`, `statut`, `illustration`, `descript`) VALUES
(2, 'test', 'Lorem Ipsum Dolor', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man wh', '2022-10-14 12:56:04', '', 1, 'https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759872/kuldar-kalvik-799168-unsplash.webp', 'Lorem Ipsum Dolor'),
(3, 'test', 'Lorem Ipsum Dolor2', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"', '2022-10-14 12:57:54', 'Choice', 1, 'https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759871/jason-leung-798979-unsplash.webp', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate repellendus magni illo ea animi?'),
(4, 'test', 'Lorem Ipsum Dolor3', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"', '2022-10-14 12:58:48', 'Choice', 1, 'https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1535759871/alessandro-capuzzi-799180-unsplash.webp', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate repellendus magni illo ea animi?'),
(9, 'hetic', 'Bachelor développeur web', 'La formation prépare à l\'obtention de la certification Concepteur développeur de solutions digitales.   A l’issue de la formation, vous serez capable de :  Traduire la demande d’un client interne ou externe en une solution digitale opérationnelle  Conceptualisation d’une solution digitale sur la base des besoins exprimés par un client, des usages et des fonctionnalités possibles dans le respect du droit en vigueur. Définition des options techniques principales de la solution digitale en fonction des attentes du client et intégrant les contraintes de coût, de qualité et de délai. Créer un prototype et la représentation graphique de la solution digitale  Plan fonctionnel d’une interface web en fonction des parcours utilisateur attendus et des options ergonomiques, en prenant en compte les bonnes pratiques, la cible et l’approche sectorielle. Représentation visuelle de l’interface web ou mobile à l’aide d’un logiciel de création graphique prenant en compte l’univers du projet et les caractéristiques de la cible utilisateurs. Développer la solution digitale à l’aide des langages informatiques adaptés  Organisation logique et efficiente des étapes de développement de la solution digitale en cycles, de manière à produire une version fonctionnelle de l’interface web ou mobile.  Conception d’une stratégie de développement pour une interface web ou mobile propice au travail collaboratif d’une équipe de développeurs et respectant les éventuelles contraintes multiplateformes. Rédaction des lignes de code dans le langage informatique le plus adapté pour le développement de l’interface du produit en utilisant, le cas échéant, des ensembles de lignes de code préexistants. Rédaction des lignes de code nécessaires à l’implémentation des bases de données et/ou de l’API nécessaires à l’interaction de l’interface avec des données.   Connection d’une interface web avec une base de données de manière à obtenir une interaction dynamique en ligne.  Réalisation des tests d’usage et de fonctionnement d’une solution digitale afin de pouvoir apporter les corrections nécessaires à son fonctionnement optimal.', '2022-10-16 18:28:04', 'ecolo', 1, 'https://www.hetic.net/sites/default/files/news/home/developpeur_web.jpg', ' Le Bachelor Développeur web forme des développeurs informatiques spécialisés dans la technologie d’internet, du web et du mobile, polyvalents, capables de travailler en équipe et de prendre du recul sur leurs propres pratiques.');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(1000) NOT NULL,
  `joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `pwd`, `joindate`) VALUES
(2, 'test', '$2y$10$a9cfOKzgPrqb6jHlZaJJwe/6Bfhlurw3UUoRN8dfGb2y7C342dB9q', '2022-10-14 08:15:32'),
(4, 'test2', '$2y$10$k7bShltP13FtLtW6SBzNAuonVEo5e1oG86QhRx3op61pQvpfTAuw6', '2022-10-15 20:52:45'),
(19, 'hetic', '$2y$10$03I8cIYJ/u66KXaI4ZsjruXKkBUH2/.za0kVWTy3l0mg5p4sIEayS', '2022-10-16 18:26:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
