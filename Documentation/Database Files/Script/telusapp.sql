-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 03:53 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telusapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_country`
--

CREATE TABLE `t_country` (
  `country_id` bigint(20) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_country`
--

INSERT INTO `t_country` (`country_id`, `country_name`) VALUES
(1, 'El Salvador'),
(2, 'Guatemala'),
(3, 'Honduras'),
(4, 'Nicaragua'),
(5, 'Belize'),
(6, 'Peru'),
(7, 'Colombia'),
(8, 'Jamaica'),
(9, 'Kenya'),
(10, 'South Africa'),
(11, 'Argentina'),
(12, 'Paraguay'),
(13, 'Uruguay'),
(14, 'Mexico'),
(15, 'Venezuela'),
(16, 'Canada'),
(17, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `t_donation`
--

CREATE TABLE `t_donation` (
  `donation_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `institution_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `cc_number` varchar(20) DEFAULT NULL,
  `cc_type` varchar(2) DEFAULT NULL,
  `donation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_donation`
--

INSERT INTO `t_donation` (`donation_id`, `user_id`, `institution_id`, `amount`, `cc_number`, `cc_type`, `donation_date`) VALUES
(40, 43, 4, '450.00', '4242', 'Vi', '2019-04-17 22:41:32'),
(41, 43, 1, '150.00', '4242', 'Vi', '2019-05-27 00:25:43'),
(42, 43, 17, '777.00', '4444', 'Ma', '2019-05-27 01:14:49'),
(43, 43, 9, '950.75', '5100', 'Ma', '2019-05-27 01:15:54'),
(44, 43, 19, '250.00', '5100', 'Ma', '2019-05-27 01:16:50'),
(45, 45, 11, '2500.00', '1111', 'Vi', '2019-05-27 01:18:41'),
(46, 47, 12, '250000.00', '3237', 'Di', '2019-03-05 16:18:15'),
(47, 47, 17, '500000.00', '4444', 'Ma', '2019-04-13 01:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `t_institution`
--

CREATE TABLE `t_institution` (
  `institution_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `institution_name` varchar(100) DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_institution`
--

INSERT INTO `t_institution` (`institution_id`, `state_id`, `institution_name`, `registration_date`) VALUES
(1, 1, 'Instituto del Cáncer de El Salvador', '2019-05-26'),
(2, 2, 'Asociación Agape de El Salvador', '2019-05-26'),
(3, 3, 'ISSS San Vicente', '2019-05-26'),
(4, 4, 'Fundación Huellas El Salvador', '2019-05-26'),
(5, 3, 'Fundación Gloria de Kriete', '2019-05-26'),
(6, 5, 'Fundación Misionera de Guatemala', '2019-05-26'),
(7, 6, 'Misioneros de Izabal', '2019-05-26'),
(8, 7, 'Organización Cristo Para Todas Las Naciones', '2019-05-26'),
(9, 8, 'Fundación Rescata Un Felino', '2019-05-26'),
(10, 8, 'Hogar del niño Fátima', '2019-05-26'),
(11, 10, 'Venezuela sin límites', '2019-05-26'),
(12, 9, 'Ayudando a un Hermano', '2019-05-26'),
(13, 11, 'Fundación Manos por la Salud', '2019-05-26'),
(14, 19, 'Fundación Bill y Melinda Gates ', '2019-05-26'),
(15, 18, 'ACCO Children\'s Cancer Association', '2019-05-26'),
(16, 17, 'Sun Mycrosistems Fundation ', '2019-05-26'),
(17, 23, 'TELUS Friendly Future Foundation', NULL),
(18, 23, 'Children\'s Aid Foundation', NULL),
(19, 25, 'CISCO Foundation', NULL),
(20, 24, 'Big Brothers Big Sisters of Canada', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_person`
--

CREATE TABLE `t_person` (
  `user_id` bigint(20) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_person`
--

INSERT INTO `t_person` (`user_id`, `id_number`, `first_name`, `last_name`, `email`, `birthdate`, `registration_date`) VALUES
(0, '04542420-7', 'Eduardo', 'Cortez', 'eduardo@cortez.solutions', '1991-12-18', '2019-05-26 22:41:00'),
(0, '0454849781-7', 'Douglas', 'Ruiz', 'douglas@telus.com', '1988-05-20', '2019-05-27 01:35:31'),
(0, '0454948474-6', 'El', 'Salvador', 'elsalvador@gov.com.sv', '2019-09-15', '2019-05-27 00:01:37'),
(0, '0978-7897-878', 'United', 'States', 'donations@gov.us', '2019-05-15', '2019-05-27 01:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `t_state`
--

CREATE TABLE `t_state` (
  `state_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_state`
--

INSERT INTO `t_state` (`state_id`, `country_id`, `state_name`) VALUES
(1, 1, 'San Salvador'),
(2, 1, 'Santa Ana'),
(3, 1, 'San Vicente'),
(4, 1, 'Ahuachapan'),
(5, 2, 'Guatemala'),
(6, 2, 'Izabal'),
(7, 2, 'Quetzaltenango'),
(8, 3, 'Comayagua'),
(9, 3, 'Gracias a Dios'),
(10, 4, 'Managua'),
(11, 4, 'Masaya'),
(12, 5, 'Cayo'),
(13, 6, 'Lima'),
(14, 6, 'Ica'),
(15, 7, 'Antioquia'),
(16, 7, 'La Guajira'),
(17, 8, 'Trelawny'),
(18, 8, 'Kingston'),
(19, 14, 'Guerrero'),
(20, 14, 'Durango'),
(21, 15, 'Lara'),
(22, 9, 'Apure'),
(23, 16, 'Ontario'),
(24, 16, 'Quebec'),
(25, 16, 'Alberta'),
(26, 17, 'Texax'),
(27, 17, 'Florida');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_country` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `username`, `password`, `registration_date`, `is_country`) VALUES
(43, 'eduardo@cortez.solutions', '$2y$13$.mbMlxsludI.KZBTxw7ru.iZPuyKU8ilwGFLkZl24nI3ruO8Ee4J2', '2019-05-26 22:40:59', 0),
(45, 'elsalvador@gov.com.sv', '$2y$13$mAy8uNbcKdvLL1R47HHX9.S5pPWSEhJ6aJUElfYNpw3jqnMLYDWfS', '2019-05-27 00:01:37', 1),
(47, 'donations@gov.us', '$2y$13$DnG0joTwRF9jz8yaKx0Bg.YxwShoM.6lSeGxgzibw3L8Y2lvv1E8q', '2019-05-27 01:24:36', 1),
(48, 'douglas@telus.com', '$2y$13$E3Wfl8VH/LNSWu/S3x8Fou2h1axT502C2LLtKggHnBdP3CvMD1g42', '2019-05-27 01:35:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_country`
--
ALTER TABLE `t_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `t_donation`
--
ALTER TABLE `t_donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `fk_donation_user` (`user_id`),
  ADD KEY `fk_donation_institution` (`institution_id`);

--
-- Indexes for table `t_institution`
--
ALTER TABLE `t_institution`
  ADD PRIMARY KEY (`institution_id`),
  ADD KEY `fk_institution_state` (`state_id`);

--
-- Indexes for table `t_person`
--
ALTER TABLE `t_person`
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `fk_person_user` (`email`);

--
-- Indexes for table `t_state`
--
ALTER TABLE `t_state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `fk_country_state` (`country_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_donation`
--
ALTER TABLE `t_donation`
  MODIFY `donation_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_donation`
--
ALTER TABLE `t_donation`
  ADD CONSTRAINT `fk_donation_institution` FOREIGN KEY (`institution_id`) REFERENCES `t_institution` (`institution_id`),
  ADD CONSTRAINT `fk_donation_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_institution`
--
ALTER TABLE `t_institution`
  ADD CONSTRAINT `fk_institution_state` FOREIGN KEY (`state_id`) REFERENCES `t_state` (`state_id`);

--
-- Constraints for table `t_person`
--
ALTER TABLE `t_person`
  ADD CONSTRAINT `fk_person_user` FOREIGN KEY (`email`) REFERENCES `t_user` (`username`) ON UPDATE NO ACTION;

--
-- Constraints for table `t_state`
--
ALTER TABLE `t_state`
  ADD CONSTRAINT `fk_country_state` FOREIGN KEY (`country_id`) REFERENCES `t_country` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
