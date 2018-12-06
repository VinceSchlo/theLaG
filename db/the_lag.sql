-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 06 Décembre 2018 à 17:39
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

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
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour les tables exportées
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
  ADD PRIMARY KEY (`idgames`);

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
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pour les tables exportées
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
  MODIFY `idgames` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `fk_availabilities_users1` FOREIGN KEY (`users_idusers`) REFERENCES `mydb`.`users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sessions_availabilities1` FOREIGN KEY (`availabilities_idavailabilities`) REFERENCES `availabilities` (`idavailabilities`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sessions_games1` FOREIGN KEY (`games_idgames`) REFERENCES `games` (`idgames`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sessions_users` FOREIGN KEY (`partcipant_id`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sessions_users1` FOREIGN KEY (`coach_id`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
