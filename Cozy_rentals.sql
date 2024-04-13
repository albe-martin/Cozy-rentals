-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 07:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cozy_rentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_email` varchar(50) NOT NULL,
  `Employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_email`, `Employee_id`) VALUES
('admin1@gmail.com', 365),
('admin2@gmail.com', 505),
('admin3@gmail.com', 999);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `User_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`User_email`) VALUES
('user1@gmail.com'),
('user2@gmail.com'),
('user3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `interior design`
--

CREATE TABLE `interior design` (
  `Property_id` int(11) NOT NULL,
  `interior_design` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `interior design`
--

INSERT INTO `interior design` (`Property_id`, `interior_design`) VALUES
(101, 'East Asian'),
(102, 'European'),
(103, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `own`
--

CREATE TABLE `own` (
  `owner_email` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `own`
--

INSERT INTO `own` (`owner_email`, `property_id`) VALUES
('owner1@gmail.com', 102),
('owner1@gmail.com', 107),
('owner2@gmail.com', 101),
('owner2@gmail.com', 104),
('owner3@gmail.com', 103),
('owner4@gmail.com', 105),
('owner5@gmail.com', 106);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Email` varchar(50) NOT NULL,
  `Phone_no` int(11) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Email`, `Phone_no`, `FName`, `LName`) VALUES
('owner1@gmail.com', 403712345, 'Martin', 'Junior'),
('owner2@gmail.com', 413256999, 'Ricardo', 'Kaka'),
('owner3@gmail.com', 523789654, 'Jeanette', 'Henry'),
('owner4@gmail.com', 403546145, 'Tery', 'Jackson'),
('owner5@gmail.com', 513897654, 'Neymar', 'Jr');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `Clients_email` varchar(50) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`Clients_email`, `payment_id`) VALUES
('user2@gmail.com', 502);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `exp_date` int(11) NOT NULL,
  `cvc` int(11) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `amount`, `card_num`, `exp_date`, `cvc`, `property_id`) VALUES
(502, 900, 5463718277438902, 911, 202, 102);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `Property_id` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  `Property_type` varchar(50) NOT NULL,
  `Pet` varchar(15) NOT NULL,
  `Smoke` varchar(15) NOT NULL,
  `Cost_Per_Month` int(11) NOT NULL,
  `Utility` varchar(50) NOT NULL,
  `Furnish` varchar(25) NOT NULL,
  `District` varchar(50) NOT NULL,
  `No.` int(11) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `num_bedrooms` int(11) NOT NULL,
  `num_bathrooms` int(11) NOT NULL,
  `rental_status` varchar(20) NOT NULL,
  `admin_who_post` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`Property_id`, `Size`, `Property_type`, `Pet`, `Smoke`, `Cost_Per_Month`, `Utility`, `Furnish`, `District`, `No.`, `Street`, `PostalCode`, `Province`, `num_bedrooms`, `num_bathrooms`, `rental_status`, `admin_who_post`) VALUES
(101, 2010, 'Apartment', 'Yes', 'No', 1700, 'No', 'No', 'NW', 7821, '1st street Homwlander', 'T2K 5Y1', 'AB', 3, 1, 'yes', 'admin2@gmail.com'),
(102, 1032, 'Condo', 'Yes', 'Yes', 900, 'No', 'No', 'SW', 1919, '31st Homeland Street', 'T2N 1Y2', 'AB', 1, 1, 'Yes', 'admin3@gmail.com'),
(103, 2500, 'House', 'No', 'Yes', 2499, 'Yes', 'Yes', 'NE', 2515, '3 avenue Debee Street', 'T2N 1Q1', 'AB', 3, 3, 'No', 'admin1@gmail.com'),
(104, 6600, 'Mansion', 'Yes', 'No', 4500, 'Yes', 'No', 'SW', 11, '1st Street Mansionvilla', 'T1D E1O', 'AB', 6, 6, 'Yes', 'admin1@gmail.com'),
(105, 900, 'Basement', 'No', 'Yes', 890, 'No', 'No', 'SE', 1715, '17 Street 15 Avenue Entehome', 'T5D L8R', 'AB', 1, 1, 'Yes', 'admin3@gmail.com'),
(106, 2550, 'Duplex', 'No', 'Yes', 1400, 'No', 'Yes', 'NE', 2322, '9th Street 23 Avenue Johnpark', 'T5B 4J9', 'AB', 2, 1, 'Yes', 'admin3@gmail.com'),
(107, 3200, 'Apartment', 'Yes', 'Yes', 2100, 'No', 'Yes', 'NE', 555, '7th Street Teripath', 'T5E 7W8', 'AB', 2, 2, 'Yes', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `Owner_email` varchar(50) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`Owner_email`, `payment_id`) VALUES
('owner1@gmail.com', 502);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `client_email` varchar(50) NOT NULL,
  `Property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`client_email`, `Property_id`) VALUES
('user2@gmail.com', 102);

-- --------------------------------------------------------

--
-- Table structure for table `showlist`
--

CREATE TABLE `showlist` (
  `Client_email` varchar(50) NOT NULL,
  `Booking_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `time` time NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `showlist`
--

INSERT INTO `showlist` (`Client_email`, `Booking_id`, `type`, `year`, `month`, `day`, `time`, `property_id`) VALUES
('user2@gmail.com', 901, 'In-person', 2024, 9, 25, '12:30:00', 101),
('user1@gmail.com', 902, 'Virtual', 2024, 5, 15, '05:00:00', 103),
('user2@gmail.com', 903, 'In-Person', 2024, 10, 12, '13:41:29', 102);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(100) NOT NULL,
  `Phone_no` int(11) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Phone_no`, `Password`, `FName`, `LName`) VALUES
('admin1@gmail.com', 381546378, 'admin1@pss', 'Thomas ', 'Terry'),
('admin2@gmail.com', 403746365, 'admin2@gmail.com', 'Toni', 'Kross'),
('admin3@gmail.com', 435123478, 'admin@123', 'Lional', 'Messi'),
('user1@gmail.com', 403918123, 'user1@pss', 'Will', 'Smith'),
('user2@gmail.com', 888900471, 'user2@pss', 'Christian', 'Bale'),
('user3@gmail.com', 501378947, 'user3@qw', 'John', 'smith');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `Client_email` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`Client_email`, `property_id`) VALUES
('user1@gmail.com', 101),
('user1@gmail.com', 102),
('user1@gmail.com', 104),
('user3@gmail.com', 101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_email`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`User_email`);

--
-- Indexes for table `interior design`
--
ALTER TABLE `interior design`
  ADD PRIMARY KEY (`Property_id`,`interior_design`);

--
-- Indexes for table `own`
--
ALTER TABLE `own`
  ADD PRIMARY KEY (`owner_email`,`property_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`Clients_email`,`payment_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`Property_id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`Owner_email`,`payment_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`client_email`,`Property_id`);

--
-- Indexes for table `showlist`
--
ALTER TABLE `showlist`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`Client_email`,`property_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
