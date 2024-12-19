-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2024 at 05:52 PM
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
-- Database: `apartment-salles-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NIC` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NIC`, `username`, `password`, `name`, `email`) VALUES
('2003290111', 'Hirusha', 'password123', 'Hirusha Dilshan', 'hiru@gmail.com'),
('2003290222', 'Wethmi', 'password123', 'Wethmi Wijethilaka', 'wethmi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(20) NOT NULL,
  `apartment_name` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `images` varchar(300) NOT NULL,
  `district` varchar(30) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Apartment_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `apartment_name`, `price`, `location`, `description`, `images`, `district`, `NIC`, `Date`, `Apartment_type`) VALUES
(7, '', 1000000, 'Colombo', 'A Brand new apartment for those who looking for a luxury apartment.', '6703fd410518f_ap3.jpeg', 'Colombo', '1', '2024-10-07 15:43:33.395626', '300'),
(8, '', 400000, 'Kandy', 'A luxury apartment with all the facilities for a affordable price.', '6703fdd0d3a19_ap4.jpeg', 'Kandy', '1', '2024-10-07 15:43:44.797379', '450'),
(9, '', 5000000, 'Hikkaduwa', 'An apartment where you can experience various activities and provide facilities for health care.', '6703fea0403c0_ap5.jpeg', 'Galle', '1', '2024-10-07 15:43:53.854380', '500'),
(10, '', 6000000, 'Negambo', 'A very luxurious apartment with indoor activities and outdoor gardens and playgrounds.', '6703ff2bd64be_ap6.jpeg', 'Negambo', '1', '2024-10-07 15:44:01.533676', '250'),
(11, '', 200000, 'Matara', 'Affordable apartment with all the main facilities and great security.', '6703ff8600da5_ap7.jpeg', 'Matara', '1', '2024-10-07 15:44:26.244624', '400'),
(12, '', 300000, 'Kaluthara', 'An affordable apartment with selective facilities provided. ', '670400078098a_ap8.jpeg', 'Kaluthara', '1', '2024-10-07 15:44:16.050739', '350');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `NIC` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`NIC`, `first_name`, `last_name`, `email`, `username`, `phone_number`, `password`) VALUES
('978524163V', 'Kamal', 'Gamage', 'kamal@gmail.com', 'KamalGamage', 770315125, '$2y$10$kd3sb9XN4Zl55'),
('9974123568V', 'Nimal', 'Perera', 'nimal@gmail.com', 'NimalPerera', 789631245, '$2y$10$RSm6EYp9iBaxi');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `NIC` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`NIC`, `name`, `phone`, `email`, `location`, `message`) VALUES
(2003290111, 'Hirusha', 2147483647, 'hirusha@gmail.com', 'Colombo, Sri Lanka', 'Looking for a 2-bedroom apartment.'),
(2003290222, 'Wethmi', 2147483647, 'wethmi@gmail.com', 'Galle, Sri Lanka', 'Interested in renting a furnished apartment.'),
(2003290333, 'Dushani', 2147483647, 'dushani@gmail.com', 'Kandy, Sri Lanka', 'Need a pet-friendly apartment.'),
(2003290444, 'Dilshara', 2147483647, 'dilshara@gmail.com', 'Jaffna, Sri Lanka', 'Looking for a long-term lease option.'),
(2003290555, 'Navanjana', 2147483647, 'navanjana@gmail.com', 'Negombo, Sri Lanka', 'Searching for a beachfront property.');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `NIC` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact_no` int(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`NIC`, `Username`, `Email`, `Contact_no`, `password`) VALUES
('2003290111', 'Wethmi', 'wethmi@gmail.com', 0, 'password123'),
('2003290222', 'Dushani', 'dushani@gmail.com', 0, 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) NOT NULL,
  `tittle` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `tittle`, `description`, `date`) VALUES
(1, 'new year offer', 'buy one get one.', '2024-10-07 04:30:00.000000'),
(2, '20% discount', 'enjoy season', '2024-10-08 05:30:00.000000'),
(3, 'new apartment complex', 'reserved your place', '2024-10-09 06:30:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `reservation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `contact_no`, `email`, `reservation_date`) VALUES
(1, 'Dilshara', 771111111, 'dilshara@gmail.com', '2024-10-15'),
(2, 'Dushani', 772222222, 'dushani@gmail.com', '2024-10-20'),
(3, 'Navanjana', 773333333, 'navanjana@gmail.com', '2024-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `first_name` varchar(20) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`first_name`, `NIC`, `last_name`, `Email`, `username`, `phone_number`, `password`) VALUES
('Kylie', '2000985321746', 'Mass', 'Kylie@gmail.com', 'KylieMass', 2147483647, '$2y$10$Is2nqHnHSl2ET'),
('Ama', '200178985241', 'Johns', 'ama@gmail.com', 'AmaJohns', 2147483647, '$2y$10$cJJ1CgWgAq5eh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`NIC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `NIC` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2003290556;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
