-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2024 at 07:33 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Cozy_rentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `Admin_email` varchar(50) NOT NULL,
  `Employee_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`Admin_email`, `Employee_id`) VALUES
('admin1@gmail.com', 365),
('admin2@gmail.com', 505),
('admin3@gmail.com', 999);

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `User_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`User_email`) VALUES
('user1@gmail.com'),
('user2@gmail.com'),
('user3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Interior Design`
--

CREATE TABLE `Interior Design` (
  `Property_id` int NOT NULL,
  `interior_design` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Interior Design`
--

INSERT INTO `Interior Design` (`Property_id`, `interior_design`) VALUES
(101, 'East Asian'),
(102, 'European'),
(103, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `Own`
--

CREATE TABLE `Own` (
  `owner_email` varchar(50) NOT NULL,
  `property_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Own`
--

INSERT INTO `Own` (`owner_email`, `property_id`) VALUES
('owner1@gmail.com', 102),
('owner2@gmail.com', 101),
('owner3@gmail.com', 103),
('owner2@gmail.com', 104),
('owner4@gmail.com', 105),
('owner5@gmail.com', 106),
('owner1@gmail.com', 107);

-- --------------------------------------------------------

--
-- Table structure for table `Owner`
--

CREATE TABLE `Owner` (
  `Email` varchar(50) NOT NULL,
  `Phone_no` int NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Owner`
--

INSERT INTO `Owner` (`Email`, `Phone_no`, `FName`, `LName`) VALUES
('owner1@gmail.com', 403712345, 'Martin', 'Junior'),
('owner2@gmail.com', 413256999, 'Ricardo', 'Kaka'),
('owner3@gmail.com', 523789654, 'Jeanette', 'Henry'),
('owner4@gmail.com', 403546145, 'Tery', 'Jackson'),
('owner5@gmail.com', 513897654, 'Neymar', 'Jr');

-- --------------------------------------------------------

--
-- Table structure for table `Pay`
--

CREATE TABLE `Pay` (
  `Clients_email` varchar(50) NOT NULL,
  `payment_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pay`
--

INSERT INTO `Pay` (`Clients_email`, `payment_id`) VALUES
('user2@gmail.com', 502);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Payment_id` int NOT NULL,
  `amount` int NOT NULL,
  `card_num` bigint NOT NULL,
  `exp_date` int NOT NULL,
  `cvc` int NOT NULL,
  `property_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`Payment_id`, `amount`, `card_num`, `exp_date`, `cvc`, `property_id`) VALUES
(502, 900, 5463718277438902, 911, 202, 102);

-- --------------------------------------------------------

--
-- Table structure for table `Property`
--

CREATE TABLE `Property` (
  `Property_id` int NOT NULL,
  `Size` int NOT NULL,
  `Property_type` varchar(50) NOT NULL,
  `Pet` varchar(15) NOT NULL,
  `Smoke` varchar(15) NOT NULL,
  `Cost_Per_Month` int NOT NULL,
  `Utility` varchar(50) NOT NULL,
  `Furnish` varchar(25) NOT NULL,
  `District` varchar(50) NOT NULL,
  `No.` int NOT NULL,
  `Street` varchar(100) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `num_bedrooms` int NOT NULL,
  `num_bathrooms` int NOT NULL,
  `rental_status` varchar(20) NOT NULL,
  `admin_who_post` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Property`
--

INSERT INTO `Property` (`Property_id`, `Size`, `Property_type`, `Pet`, `Smoke`, `Cost_Per_Month`, `Utility`, `Furnish`, `District`, `No.`, `Street`, `PostalCode`, `Province`, `num_bedrooms`, `num_bathrooms`, `rental_status`, `admin_who_post`) VALUES
(101, 2010, 'Apartment', 'Yes', 'No', 1700, 'No', 'No', 'NW', 7821, '1st street Homwlander', 'T2K 5Y1', 'AB', 3, 1, 'yes', 'admin2@gmail.com'),
(102, 1032, 'Condo', 'Yes', 'Yes', 900, 'No', 'No', 'SW', 1919, '31st Homeland Street', 'T2N 1Y2', 'AB', 1, 1, 'Yes', 'admin3@gmail.com'),
(103, 2500, 'House', 'No', 'Yes', 2499, 'Yes', 'Yes', 'NE', 2515, '3 avenue Debee Street', 'T2N 1Q1', 'AB', 3, 3, 'No', 'admin1@gmail.com'),
(104, 6600, 'Mansion', 'Yes', 'No', 4500, 'Yes', 'No', 'SW', 11, '1st Street Mansionvilla', 'T1D E1O', 'AB', 6, 6, 'Yes', 'admin1@gmail.com'),
(105, 900, 'Basement', 'No', 'Yes', 890, 'No', 'No', 'SE', 1715, '17 Street 15 Avenue Entehome', 'T5D L8R', 'AB', 1, 1, 'Yes', 'admin3@gmail.com'),
(106, 2550, 'Duplex', 'No', 'Yes', 1400, 'No', 'Yes', 'NE', 2322, '9th Street 23 Avenue Johnpark', 'T5B 4J9', 'AB', 2, 1, 'Yes', 'admin3@gmail.com'),
(107, 3200, 'Apartment', 'Yes', 'Yes', 2100, 'No', 'Yes', 'NE', 555, '7th Street Teripath', 'T5E 7W8', 'AB', 2, 2, 'Yes', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Receive`
--

CREATE TABLE `Receive` (
  `Owner_email` varchar(50) NOT NULL,
  `payment_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Receive`
--

INSERT INTO `Receive` (`Owner_email`, `payment_id`) VALUES
('owner1@gmail.com', 502);

-- --------------------------------------------------------

--
-- Table structure for table `Rent`
--

CREATE TABLE `Rent` (
  `client_email` varchar(50) NOT NULL,
  `Property_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rent`
--

INSERT INTO `Rent` (`client_email`, `Property_id`) VALUES
('user2@gmail.com', 102);

-- --------------------------------------------------------

--
-- Table structure for table `Showlist`
--

CREATE TABLE `Showlist` (
  `Client_email` varchar(50) NOT NULL,
  `Booking_id` int NOT NULL,
  `type` varchar(50) NOT NULL,
  `month` int NOT NULL,
  `day` int NOT NULL,
  `time` time NOT NULL,
  `property_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Showlist`
--

INSERT INTO `Showlist` (`Client_email`, `Booking_id`, `type`, `month`, `day`, `time`, `property_id`) VALUES
('user2@gmail.com', 901, 'In-person', 9, 25, '12:30:00', 101),
('user1@gmail.com', 902, 'Virtual', 5, 15, '05:00:00', 103),
('user2@gmail.com', 903, 'In-Person', 10, 12, '13:41:29', 102);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Email` varchar(100) NOT NULL,
  `Phone_no` int NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Email`, `Phone_no`, `Password`, `FName`, `LName`) VALUES
('admin1@gmail.com', 381546378, 'admin1@pss', 'Thomas ', 'Terry'),
('admin2@gmail.com', 403746365, 'admin2@gmail.com', 'Toni', 'Kross'),
('admin3@gmail.com', 435123478, 'admin@123', 'Lional', 'Messi'),
('user1@gmail.com', 403918123, 'user1@pss', 'Will', 'Smith'),
('user2@gmail.com', 888900471, 'user2@pss', 'Christian', 'Bale'),
('user3@gmail.com', 501378947, 'user3@qw', 'John', 'smith');

-- --------------------------------------------------------

--
-- Table structure for table `Watchlist`
--

CREATE TABLE `Watchlist` (
  `Client_email` varchar(50) NOT NULL,
  `property_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Watchlist`
--

INSERT INTO `Watchlist` (`Client_email`, `property_id`) VALUES
('user1@gmail.com', 102),
('user3@gmail.com', 101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`Admin_email`);

--
-- Indexes for table `Property`
--
ALTER TABLE `Property`
  ADD PRIMARY KEY (`Property_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
