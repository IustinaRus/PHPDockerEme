-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Mar 19, 2024 at 08:14 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogs`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`%` PROCEDURE `deleteDog` (IN `strImage` VARCHAR(255))   BEGIN
    DELETE FROM dogs WHERE image = strImage;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `InsertDog` (IN `strImg` VARCHAR(255), IN `strDetails` VARCHAR(255), IN `strPrice` INT)   BEGIN
    INSERT INTO dogs (image, details,price) VALUES (strImg, strDetails, strPrice);
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `updateDog` (IN `strDetails` VARCHAR(255), IN `strImage` VARCHAR(255), IN `strPrice` INT, IN `intID` INT)   BEGIN
    IF strImage IS NOT NULL THEN
        UPDATE dogs SET details = strDetails, image = strImage, price = strPrice WHERE id = intID;
    ELSE
        UPDATE dogs SET details = strDetails, rice = strPrice WHERE id = intID;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `image`, `details`, `price`) VALUES
(12, 'portfolio-2.jpg', 'o poza cu un catel', 200),
(13, 'portfolio-3.jpg', 'Nume: Tony; Varsta: 2 luni; Talie: Medie', 100);

--
-- Triggers `dogs`
--
DELIMITER $$
CREATE TRIGGER `AfterInsertTrigger` AFTER INSERT ON `dogs` FOR EACH ROW BEGIN 
    INSERT INTO dog_update(image, details, price, edtime) VALUES (NEW.image, 'INSERTED', NEW.price, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterUpdateTrigger` AFTER UPDATE ON `dogs` FOR EACH ROW BEGIN
    INSERT INTO dog_update(image, details, price, edtime) VALUES (NEW.details, 'UPDATED', NEW.price, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BeforeDeleteTrigger` BEFORE DELETE ON `dogs` FOR EACH ROW BEGIN
        INSERT INTO dog_update(image, details, price, edtime) VALUES (OLD.image, 'DELETED', OLD.price, NOW());
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BeforeInsertTrigger` BEFORE INSERT ON `dogs` FOR EACH ROW BEGIN 
SET NEW.price=UPPER(NEW.price);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BeforeUpdateTrigger` BEFORE UPDATE ON `dogs` FOR EACH ROW BEGIN
    SET NEW.details = LOWER(NEW.details);
    SET NEW.price = LOWER(NEW.price);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dog_update`
--

CREATE TABLE `dog_update` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` int NOT NULL,
  `edtime` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dog_update`
--

INSERT INTO `dog_update` (`id`, `image`, `details`, `price`, `edtime`) VALUES
(10, 'caine1.jpg', 'INSERTED', 250, '2024-03-19 19:14:15'),
(11, 'portfolio-2.jpg', 'DELETED', 100, '2024-03-19 19:14:25'),
(12, 'o poza cu un catel', 'UPDATED', 250, '2024-03-19 19:32:42'),
(13, 'o poza cu un catel', 'UPDATED', 200, '2024-03-19 19:33:22'),
(14, 'portfolio-3.jpg', 'INSERTED', 100, '2024-03-19 19:38:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dog_update`
--
ALTER TABLE `dog_update`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dog_update`
--
ALTER TABLE `dog_update`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
