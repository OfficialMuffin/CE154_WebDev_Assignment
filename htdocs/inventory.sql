-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2018 at 05:04 PM
-- Server version: 5.7.14
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lw17894`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_code` char(8) NOT NULL,
  `item_name` varchar(40) DEFAULT NULL,
  `item_description` varchar(140) DEFAULT NULL,
  `item_author` varchar(60) DEFAULT NULL,
  `item_image_loc` varchar(140) DEFAULT NULL,
  `item_group` int(11) DEFAULT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `item_stock_location` varchar(10) DEFAULT NULL,
  `item_stock_count` int(11) DEFAULT NULL,
  `item_order_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_code`, `item_name`, `item_description`, `item_author`, `item_image_loc`, `item_group`, `item_price`, `item_stock_location`, `item_stock_count`, `item_order_count`) VALUES
('AA01-001', 'The Maze Runner', 'When the doors of the lift crank open, the only thing Thomas can remember is his first name.', 'James Dashner', 'aa01-001.jpg', 1001, '3.55', 'Colchester', 1, 15),
('AA01-002', 'The Catcher in the Rye', 'Holden narrates the story of a couple of days in his 16-year-old life, just after he has been expelled from school', 'J. D. Salinger', 'aa01-002.jpg', 1001, '4.99', 'Southend', 0, 5),
('AA01-003', 'The Fault in Our Stars', 'Hazel Grace has terminal cancer. When Hazel attends a Cancer Kid Support Group she meets Augustus Waters', 'John Green', 'aa01-003.jpg', 1001, '3.99', 'Colchester', 5, 0),
('AA01-004', 'Paris', 'This epic novel weaves a gripping tale of four families across the centuries', 'Edward Rutherfurd', 'aa01-004.jpg', 1001, '8.83', 'Southend', 12, 10),
('AA01-005', 'Star Wars: Phasma', 'Discover Captain Phasma\'s mysterious history in this \"Journey to Star Wars: The Last Jedi\" novel.', 'Delilah S.Dawson', 'aa01-005.jpg', 1001, '9.99', 'Southend', 3, 10),
('AA01-006', 'Star Wars: The Last Jedi', 'This official adaptation of Star Wars: The Last Jedi movie', 'Jason Fry', 'aa01-006.jpg', 1001, '6.99', 'Colchester', 5, 11),
('AA01-007', 'Purpose', 'His fourth studio album', 'Justin Bieber', 'aa01-007.jpg', 1002, '9.99', 'Colchester', 1, 15),
('AA01-008', 'Netsky', 'A drum and bass album that can stand up to regular playing', 'Netsky', 'aa01-008.jpg', 1002, '6.99', 'Southend', 0, 10),
('AA01-009', 'Queen of the Clouds', 'Debut studio album by the Swedish recording artist', 'Tove Lo', 'aa01-009.jpg', 1002, '4.99', 'Colchester', 4, 15),
('AA01-010', 'Skream', 'Much more of a reggae (even ska) feel than some other dubstep', 'Skream', 'aa01-010.jpg', 1002, '9.99', 'Southend', 2, 0),
('AA01-011', 'Now That\'s What I Call Music! 98', 'Rock & Pop\r\n', 'Variable Artists', 'aa01-011.jpg', 1002, '12.99', 'Colchester', 10, 5),
('AA01-012', 'Divide', 'Third studio album from the English singer-songwriter which debuted in the UK Albums Chart at #1.', 'Ed Sheeran', 'aa01-012.jpg', 1002, '12.99', 'Southend', 12, 7),
('AA01-013', 'Minecraft', 'A game which has something for everyone and offers hundreds of hours of fun', 'Mojang', 'aa01-013.jpg', 1003, '14.00', 'Colchester', 1, 10),
('AA01-014', 'FIFA 16', 'FIFA 16 innovates across the entire pitch to deliver a balanced, authentic, and exciting football experience', 'Electronic Arts', 'aa01-014.jpg', 1003, '32.85', 'Southend', 0, 15),
('AA01-015', 'Madden NFL 16', 'Be the playmaker from the draft room to the gridiron', 'Electronic Arts', 'aa01-015.jpg', 1003, '29.99', 'Colchester', 10, 15),
('AA01-016', 'DiRT 3', 'Boasts more cars, more locations, more routes and more events than any other game in the series', 'Codemasters Limited', 'aa01-016.jpg', 1003, '37.50', 'Southend', 10, 15),
('AA01-017', 'Star Wars battlefront II (2017)', 'Embark on an all-new Battlefront experience from the bestselling Star Wars HD game franchise of all time.', 'Electronic Arts', 'aa01-017.jpg', 1003, '49.99', 'Southend', 15, 8),
('AA01-018', 'Destiny 2', 'From the makers of the acclaimed hit game Destiny, comes the much-anticipated sequel. An action shooter that takes you on an epic journey', 'Bungie', 'aa01-018.jpg', 1003, '44.99', 'Colchester', 12, 6),
('AA01-019', 'Star Wars: The Force Awakens', '135 minutes of glorious Star Wars escapism', 'Walt Disney Studios Home Entertainment', 'aa01-019.jpg', 1004, '15.99', 'Colchester', 10, 15),
('AA01-020', 'Inception', 'Blockbuster sci-fi thriller', 'Warner Home Video', 'aa01-020.jpg', 1004, '4.97', 'Southend', 0, 4),
('AA01-021', 'The Big Bang Theory - Season 8', 'Leonard and Sheldon are brilliant physicists but socially challenged otherwise', 'Warner Home Video', 'aa01-021.jpg', 1004, '12.99', 'Colchester', 6, 20),
('AA01-022', 'Suits', 'In the high-stakes legal world, contentment does not last long', 'Universal Pictures UK', 'aa01-022.jpg', 1004, '10.00', 'Colchester', 3, 10),
('AA01-023', 'Dunkirk', 'Christopher Nolan writes and directs this war drama that tells the story of the Dunkirk evacuation during the Second World War.', 'Warner Bros', 'aa01-023.jpg', 1004, '12.99', 'Southend', 15, 7),
('AA01-024', 'Victoria and Abdul', 'Judi Dench and Eddie Izzard star in this historical drama directed by Stephen Frears. ', 'Universal Pictures', 'aa01-024.jpg', 1004, '7.99', 'Colchester', 12, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_code`),
  ADD KEY `item_group` (`item_group`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`item_group`) REFERENCES `inventory_group` (`group_code`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
