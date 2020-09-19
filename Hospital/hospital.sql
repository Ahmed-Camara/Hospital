-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 19 sep. 2020 à 18:02
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hospital`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin123@gmail.com', '$2y$10$o7tCAAY/KpgjWOr7ft4pYe4GeUKuoWx.nCuBIS1q3cma6R99oqxJ2');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `doctor_id` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_phone` varchar(255) NOT NULL,
  `doctor_specialization` varchar(255) NOT NULL,
  `Appointment_date` date NOT NULL,
  `Appointment_time` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `doctor_name`, `doctor_email`, `doctor_phone`, `doctor_specialization`, `Appointment_date`, `Appointment_time`, `status`) VALUES
(21, 'Ahme-1477', 'Card-5618', 'Youssouf', 'youssouf@gmail.com', '008801639486294', 'Cardiologists', '2020-09-17', '22:26', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Structure de la table `appointment_user`
--

CREATE TABLE `appointment_user` (
  `patient_id` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appointment_user`
--

INSERT INTO `appointment_user` (`patient_id`, `patient_name`, `email`, `phone`) VALUES
('Ahme-1477', 'Ahmed', 'camarahmed12398@gmail.com', '0088016394862949');

-- --------------------------------------------------------

--
-- Structure de la table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `message_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `doctors`
--

CREATE TABLE `doctors` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `specialisation` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `registrationDate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialisation`, `dateOfBirth`, `registrationDate`, `email`, `address`, `phone`, `gender`, `password`) VALUES
('Alle-2285', 'Souleymane Souleymane', 'Allergists', '2020-09-24', '2020-09-10', 'souleymane@gmail.com', 'Bangladesh,Dhaka', '008801639486288', 'MALE', '$2y$10$QY10diccMsgbAHsn39CRR.solFjMOwW3VbaJLMMUja7E00Rkj9YKa'),
('Alle-9702', 'Ali Abdallah', 'Allergists', '2020-10-01', '2020-09-16', 'ali@gmail.com', 'Bangladesh,Dhaka', '008801639486800', 'MALE', '$2y$10$ZKbrmkhluLVxVa1ZayouRetYn1YXBn7Z6mg.PPqba/UjuPrTwb8KC'),
('Card-5618', 'Youssouf', 'Cardiologists', '2020-09-23', '2020-09-18', 'youssouf@gmail.com', 'Bangladesh,Dhaka, Gazipur,Board Bazar', '008801639486294', 'MALE', '$2y$10$KHaQBTb3v2xfxWc6oq8DSuwUnxMe.MLilOUWNpErPeoAcDcfX1jK6'),
('Card-5637', 'Hussein Hussein', 'Cardiologists', '2020-09-22', '2020-09-25', 'hussein@gmail.com', 'Board Bazar', '008801639486601', 'MALE', '$2y$10$51VD7YqcQLcAJCYGUS4V.OJlAzsvmrPjBTpzHZsFUAVJdjJd1G57W'),
('Card-9153', 'Syed Ibrahim', 'Cardiologists', '2020-09-23', '2020-09-18', 'syed@gmail.com', 'Bangladesh,Dhaka Gazipur', '008801639486293', 'MALE', '$2y$10$xqsYWSNtAQE/dP1f0tvCEuHOfLycC/OIU9Uo0nqlBAyAO7l59muNC'),
('Derm-6367', 'Syed Atiqul Ahmed', 'Dermatologists', '2020-09-17', '2020-09-12', 'muhamadsamir75@gmail.com', 'Bangladesh,Dhaka', '008801639486290', 'MALE', '$2y$10$jsY/B9/Dp0SUP6JXefNIzuG1LG77CoZGWUSVW1u4L25flvrxlr0T2'),
('Derm-8246', 'Kalipha Kalipha', 'Dermatologists', '2020-09-24', '2020-09-10', 'kalipha@gmail.com', 'Bangladesh,Dhaka', '008801639486289', 'MALE', '$2y$10$kTvFRCjFIr9/vQR0eYuDoeiMvTwsveMX89HKqq958osIXSLf85UN2'),
('gyne-3288', 'Safia Safia', 'gynecologue', '2020-09-30', '2020-09-12', 'safia@gmail.com', 'chittagong', '008801639486291', 'FEMALE', '$2y$10$7mjvrxvPaqRu7R5Y4UcQRecz74/y9umC6TAjrzfXlMkxtjNvvhwKm');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `permanentAddress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `firstName`, `lastName`, `permanentAddress`, `email`, `phone`, `dateOfBirth`, `bloodGroup`, `password`) VALUES
('Ahme-1477', 'Ahmed', 'Camara', 'IUT,Board Bazar', 'camarahmed12398@gmail.com', '0088016394862949', '2020-09-22', 'O+', '$2y$10$V7QQ6WkbHQc8QHXrDTyHQuM8OCQubGr/EZvbTobPEXQjEHYFSTqfW');

-- --------------------------------------------------------

--
-- Structure de la table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_phone` varchar(255) NOT NULL,
  `doctor_id` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(300) NOT NULL,
  `prescription` varchar(300) NOT NULL,
  `cost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient_data`
--

INSERT INTO `patient_data` (`id`, `patient_id`, `patient_name`, `doctor_email`, `doctor_phone`, `doctor_id`, `doctor_name`, `date`, `details`, `prescription`, `cost`) VALUES
(23, 'Ahme-1477', 'Ahmed Camara', 'youssouf@gmail.com', '008801639486294', 'Card-5618', 'Youssouf', '2020-09-24', 'sdfsdfgsdgfgvdfgdf', 'sdgfsgdfagvdfgdf', '2000 TK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appointment_user`
--
ALTER TABLE `appointment_user`
  ADD PRIMARY KEY (`patient_id`);

--
-- Index pour la table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
