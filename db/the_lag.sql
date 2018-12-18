-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 18 déc. 2018 à 10:57
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `the_lag`
--

-- --------------------------------------------------------

--
-- Structure de la table `availabilities`
--

CREATE TABLE `availabilities` (
  `idavailabilities` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `users_idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `idgames` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`idgames`, `name`, `idType`) VALUES
(1, 'Fortnite', 1),
(2, 'League of Legends', 2),
(3, 'Mortal Kombat', 3);

-- --------------------------------------------------------

--
-- Structure de la table `list_game`
--

CREATE TABLE `list_game` (
  `idUser` int(11) NOT NULL,
  `idGame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `list_game`
--

INSERT INTO `list_game` (`idUser`, `idGame`) VALUES
(1, 1),
(2, 1),
(1, 2),
(1, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `idsession` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `partcipant_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `games_idgames` int(11) NOT NULL,
  `availabilities_idavailabilities` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_game`
--

CREATE TABLE `type_game` (
  `idType` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_game`
--

INSERT INTO `type_game` (`idType`, `name`) VALUES
(1, 'FPS'),
(2, 'MOBA'),
(3, 'Combat');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `login`, `password`, `email`, `firstname`, `lastname`) VALUES
(1, 'IV', 'RP7BLOa', 'jglide0@list-manage.com', 'Jerrilee', 'Glide'),
(2, 'Jr', 'NoUfoNZ', 'zrosenboim1@about.com', 'Zita', 'Rosenboim'),
(3, 'Jr', 'pFP63ZYjUrQ', 'kwrathall2@yolasite.com', 'Kelsi', 'Wrathall'),
(4, 'IV', '2gr2x7Rtec', 'bcrouse3@ebay.co.uk', 'Berry', 'Crouse'),
(5, 'Sr', 'PDO9eiO5Cx8Q', 'twardingly4@howstuffworks.com', 'Trumaine', 'Wardingly'),
(6, 'Jr', 'HRReoXBA', 'ltrye5@boston.com', 'Leah', 'Trye'),
(7, 'II', 'bHKelhWpujc', 'dbedberry6@desdev.cn', 'Daphne', 'Bedberry'),
(8, 'Jr', 'aS3D3DAz4Y', 'zsouthard7@hexun.com', 'Zuzana', 'Southard'),
(9, 'Sr', 'YsnQ5d', 'gbreitler8@springer.com', 'Gusti', 'Breitler'),
(10, 'III', 'JjHehA1', 'acurnick9@free.fr', 'Antonino', 'Curnick'),
(11, 'IV', 'JBHw5Q8IU', 'tmcmurraya@amazon.co.uk', 'Tabb', 'McMurray'),
(12, 'III', 'hnA8Gcw3ZIz', 'gewerb@cisco.com', 'Gaultiero', 'Ewer'),
(13, 'Sr', 'lhcAbljMdTus', 'acommuccic@infoseek.co.jp', 'Adelina', 'Commucci'),
(14, 'II', 'wTZLDvoM', 'bdavissond@fotki.com', 'Burk', 'Davisson'),
(15, 'II', 'LD75l6oK', 'cmatiewee@marketwatch.com', 'Colin', 'Matiewe'),
(16, 'Jr', 'oOtAmTz', 'rzorenf@yolasite.com', 'Rickert', 'Zoren'),
(17, 'II', 'tPjwP3bb6271', 'yeddollsg@alibaba.com', 'Yuri', 'Eddolls'),
(18, 'II', 'HsclpHuei6XH', 'gtrittonh@twitter.com', 'Georg', 'Tritton'),
(19, 'IV', 'xSslPIe3Rx', 'epybusi@ucoz.ru', 'Ellene', 'Pybus'),
(20, 'IV', 'hIgdYl3abso', 'mgaskingj@123-reg.co.uk', 'Myrta', 'Gasking'),
(21, 'II', '3qQPo2', 'lseiffertk@seesaa.net', 'Ludovika', 'Seiffert'),
(22, 'III', 'e78whBZM', 'sjezardl@microsoft.com', 'Sidnee', 'Jezard'),
(23, 'Sr', 'Lx3WOPrxh6a', 'gpancastm@meetup.com', 'Gaye', 'Pancast'),
(24, 'IV', 'oxmYkjcH', 'dbrosion@dagondesign.com', 'Dannye', 'Brosio'),
(25, 'II', 'GPQ5eOT', 'rmangeneyo@army.mil', 'Rafa', 'Mangeney'),
(26, 'Sr', '0nXvupMQ32TI', 'jhanstockp@virginia.edu', 'Jens', 'Hanstock'),
(27, 'Jr', 'Nfwz0Z', 'ipecheq@pbs.org', 'Ingeborg', 'Peche'),
(28, 'III', 'TBdkrN', 'agaggr@nymag.com', 'Alyce', 'Gagg'),
(29, 'IV', 'mN2rmNQ4Yl', 'odawdrys@blogtalkradio.com', 'Otis', 'Dawdry'),
(30, 'IV', 'IKtPqLlsI1', 'mharkinst@chronoengine.com', 'Michal', 'Harkins'),
(31, 'Sr', 'gQAOrpua8', 'aoxboroughu@gizmodo.com', 'Alie', 'Oxborough'),
(32, 'Jr', 'DPyjzfVqEk', 'hloftv@furl.net', 'Herbert', 'Loft'),
(33, 'IV', 'ziY1d1oxO', 'mmawnew@slashdot.org', 'Matthaeus', 'Mawne'),
(34, 'IV', 'Mp0xUYpIX', 'sdmiterkox@unesco.org', 'Shandra', 'Dmiterko'),
(35, 'II', 'UZDVzcu', 'lborrowsy@facebook.com', 'Lefty', 'Borrows'),
(36, 'Sr', '4XgePCHck', 'elindmanz@theglobeandmail.com', 'Eugenia', 'Lindman'),
(37, 'IV', 'nB5S2r', 'nrippen10@unblog.fr', 'Niel', 'Rippen'),
(38, 'Sr', 'wxbIPztSg', 'lfifoot11@yellowbook.com', 'Latrena', 'Fifoot'),
(39, 'Sr', 'V20txFZeDsH', 'jgoublier12@linkedin.com', 'Julie', 'Goublier'),
(40, 'IV', 'eSK6zV1E4vG', 'tveasey13@cnbc.com', 'Trumann', 'Veasey'),
(41, 'IV', 'W1xELyx', 'vsankey14@europa.eu', 'Vanna', 'Sankey'),
(42, 'III', 'I1pl0BsDQg', 'chouselee15@youtu.be', 'Connor', 'Houselee'),
(43, 'III', '7PYi7u1YD', 'ehydechambers16@miibeian.gov.cn', 'Edan', 'Hyde-Chambers'),
(44, 'Sr', 'Q3k0d07h', 'nhardcastle17@oracle.com', 'Nerte', 'Hardcastle'),
(45, 'IV', 'TZfin2EX', 'jnorkutt18@trellian.com', 'Jessamyn', 'Norkutt'),
(46, 'Sr', 'sWs6Jrn6', 'diapico19@shop-pro.jp', 'Della', 'Iapico'),
(47, 'Sr', 'WV81k6F', 'ljeannenet1a@drupal.org', 'Lauralee', 'Jeannenet'),
(48, 'Jr', '8Qt8Lm', 'tflaunier1b@purevolume.com', 'Tracie', 'Flaunier'),
(49, 'IV', '0ooVJK', 'iqusklay1c@livejournal.com', 'Isidor', 'Qusklay'),
(50, 'IV', 'Qhr0x3kODTT6', 'ctumayan1d@pen.io', 'Christin', 'Tumayan');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`idavailabilities`),
  ADD KEY `fk_availabilities_users1_idx` (`users_idusers`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`idgames`),
  ADD KEY `idType` (`idType`);

--
-- Index pour la table `list_game`
--
ALTER TABLE `list_game`
  ADD PRIMARY KEY (`idUser`,`idGame`),
  ADD KEY `idGame` (`idGame`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`idsession`),
  ADD KEY `fk_sessions_users_idx` (`partcipant_id`),
  ADD KEY `fk_sessions_users1_idx` (`coach_id`),
  ADD KEY `fk_sessions_games1_idx` (`games_idgames`),
  ADD KEY `fk_sessions_availabilities1_idx` (`availabilities_idavailabilities`);

--
-- Index pour la table `type_game`
--
ALTER TABLE `type_game`
  ADD PRIMARY KEY (`idType`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `idavailabilities` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `idgames` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_game`
--
ALTER TABLE `type_game`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `type_game` (`idType`);

--
-- Contraintes pour la table `list_game`
--
ALTER TABLE `list_game`
  ADD CONSTRAINT `list_game_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idusers`),
  ADD CONSTRAINT `list_game_ibfk_2` FOREIGN KEY (`idGame`) REFERENCES `games` (`idgames`),
  ADD CONSTRAINT `list_game_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `users` (`idusers`);
