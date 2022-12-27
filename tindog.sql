-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 03:04 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12
SET
	SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
	time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tindog`
--
-- --------------------------------------------------------
--
-- Table structure for table `dog_master`
--
CREATE TABLE
	`dog_master` (
		`dog_id` int (11) NOT NULL,
		`user_id` int (11) NOT NULL,
		`breed` varchar(200) NOT NULL,
		`height` varchar(100) NOT NULL,
		`weight` varchar(100) NOT NULL,
		`behaviour` varchar(200) NOT NULL,
		`age` int (11) NOT NULL,
		`color` varchar(200) NOT NULL,
		`image_url` varchar(200) NOT NULL,
		`active_status` tinyint (4) NOT NULL
	) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `dog_master`
--
INSERT INTO
	`dog_master` (
		`dog_id`,
		`user_id`,
		`breed`,
		`height`,
		`weight`,
		`behaviour`,
		`age`,
		`color`,
		`image_url`,
		`active_status`
	)
VALUES
	(
		1,
		2,
		'Pug',
		'2\'3\"',
		'30kg',
		'Enthusiastic',
		2,
		'White',
		'83CBDE86-7FC3-4328-8074-9B2D19B7E3FE-20200421105730',
		1
	),
	(
		2,
		2,
		'Golden Retrieve',
		'3\'1\"',
		'40kg',
		'Playful, Caring',
		3,
		'Golden (Obviously)',
		'6B0BE6B4-C012-47F0-A445-6AD6CC73B430-20200421105826',
		1
	),
	(
		3,
		1,
		'Beagle',
		'2\'4\"',
		'20kg',
		'Playful',
		2,
		'Brown',
		'8A4A0704-5493-410D-B365-E99371176338-20200421105959',
		1
	),
	(
		4,
		1,
		'Labrador Retrieve',
		'1\'5\"',
		'7kg',
		'Playful, funny',
		1,
		'White',
		'83C2D353-9B44-400E-91D3-02C360317406-20200422131355',
		1
	),
	(
		5,
		1,
		'American Pitbull',
		'1\'8\"',
		'12 kg',
		'Playful, Aggressive',
		1,
		'White & Brown',
		'9EBD395A-6838-4C73-9E88-ADF4AF998B3E-20200422132303',
		1
	),
	(
		6,
		4,
		'Paper',
		'2cm',
		'Null',
		'Does nothing',
		1,
		'White',
		'F7C90454-C6AB-4E56-B65B-9E8863568E0F-20200423103219',
		0
	),
	(
		7,
		3,
		'German shepherd',
		'26\"',
		'16 kg',
		'aggressive',
		5,
		'black ',
		'305B5EA9-0FEC-4B7F-9381-5F325893E6E9-20220414143442',
		0
	),
	(
		8,
		3,
		'pug',
		'12',
		'56',
		'silent',
		2,
		'white',
		'A7FAC8DA-66B5-4AB5-8260-9345F330ACA5-20220428071218',
		0
	),
	(
		9,
		3,
		'pug',
		'1\'2\'\'',
		'23',
		'playful',
		1,
		'white',
		'A67179A2-122C-4637-8F46-CD60BDD1D704-20220428075832',
		0
	);

-- --------------------------------------------------------
--
-- Table structure for table `user_master`
--
CREATE TABLE
	`user_master` (
		`user_id` int (11) NOT NULL,
		`firstname` varchar(100) NOT NULL,
		`lastname` varchar(100) NOT NULL,
		`email` varchar(320) NOT NULL,
		`phone` varchar(10) NOT NULL,
		`password` varchar(200) NOT NULL,
		`account_status` tinyint (4) NOT NULL,
		`creation_date` datetime NOT NULL,
		`updation_date` datetime NOT NULL
	) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `user_master`
--
INSERT INTO
	`user_master` (
		`user_id`,
		`firstname`,
		`lastname`,
		`email`,
		`phone`,
		`password`,
		`account_status`,
		`creation_date`,
		`updation_date`
	)
VALUES
	(
		1,
		'Palak',
		'Desai',
		'palak.desai4501@gmail.com',
		'6354475749',
		'25d55ad283aa400af464c76d713c07ad',
		1,
		'2022-04-19 14:25:49',
		'2022-04-20 16:44:47'
	),
	(
		2,
		'Aastha',
		'Savaliya',
		'aastha@gmail.com',
		'9748953489',
		'577e1e0b5e084bcb60d9eaf7908b4770',
		1,
		'2022-04-19 14:26:37',
		'2022-04-20 14:26:37'
	),
	(
		3,
		'Shreya',
		'Jagani',
		'shreyajagani@gmail.com',
		'8976567898',
		'68da0d135cc3549f278557c77ed44f2b',
		1,
		'2022-04-20 19:08:48',
		'2022-04-28 10:57:44'
	),
	(
		4,
		'Shahrukh',
		'Patel',
		'hello@gmail.com',
		'9638527410',
		'81dc9bdb52d04dc20036dbd8313ed055',
		1,
		'2022-04-24 13:47:46',
		'2022-04-25 13:47:46'
	),
	(
		5,
		'Kahan',
		'Sonani',
		'kahansonani1008@gmail.com',
		'6353628816',
		'0dd6c12c389d928f0d03eed89fd4c894',
		1,
		'2022-04-27 10:50:23',
		'2022-04-27 10:50:23'
	);

--
-- Indexes for dumped tables
--
--
-- Indexes for table `dog_master`
--
ALTER TABLE `dog_master` ADD PRIMARY KEY (`dog_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master` ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `dog_master`
--
ALTER TABLE `dog_master` MODIFY `dog_id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master` MODIFY `user_id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;