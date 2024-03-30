-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 mai 2022 à 09:42
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'bendhiefeya69@gmail.com', 'eyaeyaeya'),
(2, 'syrineyoussfi@gmail.com', 'syrinesyrine\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `inscri`
--

CREATE TABLE `inscri` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `familyname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscri`
--

INSERT INTO `inscri` (`id`, `name`, `familyname`, `email`, `role`, `password`, `image`) VALUES
(1, 'amine', 'ard', 'amine@gmail.com', 'student', 'xzabam', '');

-- --------------------------------------------------------

--
-- Structure de la table `petition`
--

CREATE TABLE `petition` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `petition`
--

INSERT INTO `petition` (`id`, `title`, `content`, `date`, `name`, `fname`) VALUES
(3, 'motivation', '\r\nEtant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de (emploi).\r\n\r\n \r\nEn effet, mon profil correspond à la description recherchée sur l’offre d’emploi (préciser où l’annonce a été vue). (Si le candidat possède peu d’expérience professionnelle) Ma formation en (préciser la formation) m\'a permis d\'acquérir de nombreuses compétences parmi celles que vous recherchez. Je possède tous les atouts qui me permettront de réussir dans le rôle que vous voudrez bien me confier. Motivation, rigueur et écoute sont les maîtres mots de mon comportement professionnel.\r\n\r\n(Si le candidat possède une expérience significative dans le poste à pourvoir). Mon expérience en tant que (emploi) m’a permis d’acquérir toutes les connaissances nécessaires à la bonne exécution des tâches du poste à pourvoir. Régulièrement confronté aux aléas du métier, je suis capable de répondre aux imprévus en toute autonomie.\r\n\r\nIntégrer votre entreprise représente pour moi un réel enjeu d’avenir dans lequel mon travail et mon honnêteté pourront s’exprimer pleinement.\r\n \r\n\r\nRestant à votre disposition pour toute information complémentaire, je suis disponible pour vous rencontrer lors d’un entretien à votre convenance\r\n \r\n\r\nVeuillez agréer, (Madame, Monsieur), l’expression de mes sincères salutations.\r\n\r\n \r\n\r\nSignature', '2022-05-18', 'eya', 'bendhief'),
(4, 'letter', 'For eya, the Employee complaint letter can be written by two people: the employer and the employee. As an employee, if you want to make a formal complaint about something which has happened at work, you should raise a grievance.A few tips you could use when drafting an Employee complaint letter include:Identify exactly the kind of workplace harassment that took place.Write down the details about the harassment.Introduce yourself and your purpose.Present the facts of the harassment.Explain in great detail how you responded.Proffer a solution to the issue.Avoid using offensive language.How to Write a Complaint Letter (Etiquette & Sample)Step 1: Start off with a greetingWhen writing a complaint letter, it is important that it is addressed to the relevant authority. The letter of complaint is channeled to the customer care department or Human Resource person, whichever is the case. This is because the main function of customer care/ HR support is to deal with whatever issues the customers may have. If you have a contact person, you can start the letter with an address like Dear Sir/Ma/ Ma’am/ or Dear Mr/Miss/Ms./Mrs.Step 2: Explain what you’re complaining aboutGive details about the reason for your complaint. You want to be as straightforward as possible in this step because not everyone has time to go through the details of a super long letter. So start with something like; I’m writing to complain about the poorly packaged delivery I got from your logistics chain on the 18th of October 202XStep 3: If you’ve taken any prior ste', '2022-06-05', 'syrine ', 'youssfi');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `idpet` int(100) NOT NULL,
  `iduser` int(100) NOT NULL,
  `situation` varchar(100) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscri`
--
ALTER TABLE `inscri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `petition`
--
ALTER TABLE `petition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD KEY `idpet` (`idpet`),
  ADD KEY `iduser` (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inscri`
--
ALTER TABLE `inscri`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `petition`
--
ALTER TABLE `petition`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`idpet`) REFERENCES `petition` (`id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `inscri` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
