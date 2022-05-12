-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 04:43 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shivam`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(5) NOT NULL,
  `Useruser_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `Useruser_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(5) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `Vehicle_rto_number` varchar(12) NOT NULL,
  `staffstaff_id` int(3) NOT NULL,
  `customercustomer_id` int(5) NOT NULL,
  `statusstatus_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `app_date`, `app_time`, `Vehicle_rto_number`, `staffstaff_id`, `customercustomer_id`, `statusstatus_id`) VALUES
(1, '2021-10-25', '07:00:00', ' DL-14201100', 1, 1, 2),
(2, '2021-08-21', '15:20:00', 'MH1420110062', 1, 2, 2),
(3, '2021-08-21', '15:20:00', 'MH1420110062', 1, 5, 2),
(4, '2021-08-21', '15:20:00', 'MH1420110062', 1, 10, 2),
(5, '2021-10-25', '12:00:00', 'gj-01-sp-881', 1, 9, 2),
(14, '2022-02-17', '18:34:00', 'MH1420110062', 4, 5, 1),
(37, '2022-02-18', '22:01:00', 'njm', 4, 8, 2),
(38, '2022-02-19', '18:43:00', 'GJ1PX7679', 4, 14, 2),
(39, '2022-02-25', '00:54:00', 'GJ1PX8817', 4, 2, 2),
(48, '2022-03-27', '01:00:00', 'BR-01DB-60', 1, 10, 2),
(49, '2022-02-27', '12:00:00', 'IND-123-34', 4, 16, 2),
(50, '2022-03-02', '01:00:00', 'WB 06F 920', 4, 8, 2),
(51, '2022-03-16', '01:00:00', 'MH1420110062', 4, 5, 5),
(52, '2022-03-16', '09:00:00', 'GJ1PX7812', 4, 5, 1),
(53, '2022-03-17', '04:00:00', 'WB 06F 920', 4, 8, 2),
(54, '2022-04-23', '03:00:00', 'GJ01SP8817', 1, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blog_img`
--

CREATE TABLE `blog_img` (
  `blog_img_id` int(1) NOT NULL,
  `blog_img_path` varchar(200) DEFAULT NULL,
  `Blogblog_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_img`
--

INSERT INTO `blog_img` (`blog_img_id`, `blog_img_path`, `Blogblog_id`) VALUES
(3, 'C:\\xampp\\htdocs\\sdp\\admin\\blog\\blog-img\\Manual-Center-locking.jpg', 1),
(4, 'C:\\xampp\\htdocs\\sdp\\admin\\blog\\blog-img\\Touchscreen-without-navigation.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cancel_appmnt`
--

CREATE TABLE `cancel_appmnt` (
  `cancel_appmnt_id` int(5) NOT NULL,
  `cancel_reason` varchar(1000) NOT NULL,
  `appoimentappointment_id` int(5) NOT NULL,
  `can_app_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel_appmnt`
--

INSERT INTO `cancel_appmnt` (`cancel_appmnt_id`, `cancel_reason`, `appoimentappointment_id`, `can_app_date`) VALUES
(1, 'not able to visit the garage', 1, '2021-10-26'),
(3, 'itit', 51, '2022-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `car_type_id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`car_type_id`, `name`) VALUES
(1, 'Coupe'),
(2, 'SUV'),
(3, 'Convertible'),
(4, 'Pickup'),
(20, 'Sedan'),
(22, 'Hatchback'),
(29, 'MPV(multi-purpose vehicle)'),
(35, 'Crossover');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(50) NOT NULL,
  `telephone1l` int(10) NOT NULL,
  `telephone2` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `last_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `website`, `telephone1l`, `telephone2`, `email`, `address`, `city`, `pincode`, `last_modified`) VALUES
(10, 'Shivam car service', 'www.shivamcar.com', 2147483647, 0, 'prajapatiyash8817@gmial.com', '13/1 , Gokuldham society ', 'Ahmedabad ', 380059, '2021-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `Useruser_id` int(5) NOT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `Useruser_id`, `reg_date`) VALUES
(1, 3, '2022-02-10'),
(2, 4, '2022-02-18'),
(5, 17, '2022-02-23'),
(8, 20, '2022-02-20'),
(9, 22, '2022-02-20'),
(10, 23, '2022-02-20'),
(14, 27, '2022-02-20'),
(15, 29, '2022-02-20'),
(16, 34, '0000-00-00'),
(23, 41, '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `job_card`
--

CREATE TABLE `job_card` (
  `jobcard_id` int(5) NOT NULL,
  `jobcard_date` date NOT NULL,
  `jobcard_time` time NOT NULL,
  `price` int(5) NOT NULL,
  `appointmentappointment_id` int(5) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `completed_date` date DEFAULT NULL,
  `labour_charge` int(11) NOT NULL,
  `complete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_card`
--

INSERT INTO `job_card` (`jobcard_id`, `jobcard_date`, `jobcard_time`, `price`, `appointmentappointment_id`, `status`, `completed_date`, `labour_charge`, `complete`) VALUES
(1, '2021-08-21', '12:20:00', 1249, 1, 1, '2022-03-26', 100, 1),
(2, '2022-02-07', '03:13:44', 15499, 2, 1, '2022-03-26', 0, 0),
(3, '2022-02-17', '06:36:17', 12900, 14, 0, '2021-03-10', 0, 0),
(4, '2022-02-18', '10:01:52', 14700, 37, 1, '2022-03-26', 0, 0),
(5, '2022-02-18', '10:33:37', 12950, 5, 1, '2022-04-20', 0, 0),
(9, '2022-02-18', '10:35:15', 19650, 4, 0, '2021-02-25', 0, 0),
(24, '2022-02-18', '11:13:55', 13988, 3, 1, '2022-03-26', 0, 0),
(25, '2022-02-19', '01:44:05', 2600, 38, 1, '0000-00-00', 0, 0),
(39, '2022-02-27', '07:24:41', 12950, 49, 1, '2021-03-05', 0, 0),
(40, '2022-03-03', '04:47:00', 200, 50, 1, '2022-03-03', 0, 0),
(41, '2022-03-03', '04:47:07', 650, 39, 1, '2022-03-26', 0, 0),
(86, '2022-03-26', '06:20:20', 0, 48, 0, '0000-00-00', 0, 0),
(87, '2022-04-23', '06:55:38', 10400, 54, 1, '2022-04-23', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_card_parts`
--

CREATE TABLE `job_card_parts` (
  `Job_cardjobcard_id` int(5) NOT NULL,
  `partsparts_id` int(3) NOT NULL,
  `part_used_qty` int(2) NOT NULL,
  `price` int(5) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_card_parts`
--

INSERT INTO `job_card_parts` (`Job_cardjobcard_id`, `partsparts_id`, `part_used_qty`, `price`, `status`) VALUES
(1, 2, 1, 150, 0),
(1, 4, 1, 300, 0),
(2, 4, 1, 400, 0),
(2, 5, 1, 2300, 0),
(3, 4, 1, 400, 0),
(3, 5, 1, 2300, 0),
(4, 4, 1, 400, 0),
(4, 5, 1, 2300, 0),
(5, 2, 1, 150, 0),
(5, 5, 1, 2300, 0),
(5, 6, 3, 300, 0),
(9, 4, 1, 400, 0),
(9, 5, 4, 9200, 0),
(24, 8, 1, 3988, 0),
(25, 5, 1, 2300, 0),
(25, 6, 1, 100, 0),
(39, 2, 1, 150, 0),
(39, 5, 1, 2500, 0),
(39, 6, 1, 100, 0),
(41, 2, 3, 450, 0),
(87, 2, 1, 400, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_card_servics`
--

CREATE TABLE `job_card_servics` (
  `Job_cardjobcard_id` int(5) NOT NULL,
  `Servicsservice_id` int(2) NOT NULL,
  `price` int(4) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_card_servics`
--

INSERT INTO `job_card_servics` (`Job_cardjobcard_id`, `Servicsservice_id`, `price`, `status`) VALUES
(1, 1, 599, 1),
(1, 2, 200, 1),
(2, 1, 599, 0),
(2, 2, 200, 0),
(2, 3, 10000, 0),
(2, 4, 2000, 0),
(3, 2, 200, 0),
(3, 3, 10000, 0),
(4, 3, 10000, 0),
(4, 4, 2000, 0),
(5, 2, 200, 0),
(5, 3, 10000, 0),
(9, 3, 10000, 0),
(9, 32, 50, 0),
(24, 3, 10000, 0),
(25, 2, 200, 0),
(39, 2, 200, 0),
(39, 3, 10000, 0),
(40, 2, 200, 0),
(41, 2, 200, 0),
(86, 3, 10000, 0),
(87, 3, 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `maker_id` int(2) NOT NULL,
  `maker_name` varchar(20) NOT NULL,
  `car_typecar_type_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maker`
--

INSERT INTO `maker` (`maker_id`, `maker_name`, `car_typecar_type_id`) VALUES
(1, 'Audi A3 Cabriolet', 1),
(2, 'Mahindra ', 2),
(3, 'Maruti Suzuki  ', 4),
(4, 'Tata', 4),
(6, 'datsun', 22),
(7, 'Renault', 22),
(8, 'Hyundai ', 22),
(9, 'Volkswagen ', 22),
(17, 'Toyota', 29),
(18, 'Maruti Suzuki ', 29),
(22, 'Nissan ', 2),
(23, 'Maruti Suzuki ', 35);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(5) NOT NULL,
  `customercustomer_id` int(5) NOT NULL,
  `membership_details_id` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` int(1) NOT NULL,
  `payment` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `customercustomer_id`, `membership_details_id`, `start_date`, `end_date`, `is_active`, `payment`) VALUES
(1, 5, 2, '2021-12-25', '2022-03-25', 1, 13000),
(2, 8, 2, '2022-03-26', '2022-06-26', 1, 13000),
(7, 5, 1, '2022-03-27', '2022-06-27', 1, 7999),
(10, 8, 3, '2022-03-27', '2022-06-27', 1, 5000),
(11, 5, 3, '2022-04-22', '2022-07-22', 1, 5000),
(12, 23, 1, '2022-04-23', '2022-07-23', 1, 7999);

-- --------------------------------------------------------

--
-- Table structure for table `membership_details`
--

CREATE TABLE `membership_details` (
  `mem_details_id` int(5) NOT NULL,
  `mem_duration` int(2) NOT NULL,
  `mem_desc` varchar(100) NOT NULL,
  `Labour_discount` float NOT NULL,
  `all_filter_check` int(1) NOT NULL,
  `tire_rotation` int(1) NOT NULL,
  `no_road_assist` int(1) NOT NULL,
  `price` int(4) NOT NULL,
  `mem_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_details`
--

INSERT INTO `membership_details` (`mem_details_id`, `mem_duration`, `mem_desc`, `Labour_discount`, `all_filter_check`, `tire_rotation`, `no_road_assist`, `price`, `mem_name`) VALUES
(1, 3, '          By the Month is a monthly car subscription program. You can subscribe to your favorite car', 5, 0, 0, 0, 7999, 'simple service  for car'),
(2, 6, '          Three months best membership for your car service', 20, 1, 1, 1, 13000, 'Superior Service for you'),
(3, 2, 'PLATINUM MEMBERSHIP for cars', 10, 1, 1, 1, 5000, 'PLATINUM MEMBERSHIP');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `car_model_id` int(2) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `Makermaker_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`car_model_id`, `model_name`, `Makermaker_id`) VALUES
(2, 'SUPER CARRY', 3),
(3, 'Yodha', 4),
(4, 'redi-GO', 6),
(5, 'Renault Kwid', 7),
(6, 'Hyundai i20', 8),
(7, 'Volkswagen Polo', 9),
(19, 'S-Cross Alpha', 23),
(24, 'Yodha', 4);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(1) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `offer_disscount` int(10) NOT NULL,
  `is_active` int(1) NOT NULL,
  `offer_name` varchar(255) DEFAULT NULL,
  `offer_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_start_date`, `offer_end_date`, `offer_disscount`, `is_active`, `offer_name`, `offer_desc`) VALUES
(2, '2022-02-18', '2022-02-19', 15, 1, 'Great saving opportunity', 'When these new products are on sale, you can think of them as doubling your happiness. '),
(3, '2022-08-26', '2022-09-13', 15, 1, 'early Diwali discount ', 'In a nutshell, Diwali is the perfect festival of joy and happiness. So, this is the perfect time for e-commerce websites to run their huge sales. Now, happiness comes when you buy new products for your loved ones.'),
(4, '2022-06-08', '2022-09-13', 5, 0, 'monsoon special wash', 'get rid of that unclear car with our special monsoon car wash');

-- --------------------------------------------------------

--
-- Table structure for table `offer_servics`
--

CREATE TABLE `offer_servics` (
  `offeroffer_id` int(1) NOT NULL,
  `Servicsservice_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `parts_id` int(3) NOT NULL,
  `part_name` varchar(20) NOT NULL,
  `part_desc` varchar(100) NOT NULL,
  `part_price` int(3) NOT NULL,
  `purchase_date` date NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`parts_id`, `part_name`, `part_desc`, `part_price`, `purchase_date`, `qty`) VALUES
(2, 'STP Engine Oil High ', '                                                                      STP high mileage motor oil con', 400, '2021-12-10', 38),
(4, 'GM Genuine Parts 177', 'Inspected for balance, resulting in smooth brake operation and noise reduction\r\nGM-recommended repla', 1200, '2021-01-15', 26),
(5, 'Exide Battery', '                    Capacity: 60Ah Warranty: 48 Months Exide Car Battery, Model Name/Number: Mileage', 8000, '2022-02-10', 2),
(6, 'Clutch Kit ', '                                                                                Clutch Kit for HYUND', 1889, '2022-02-07', 10),
(8, 'Amaron WagonR Car Ba', 'Warranty: 55 Months (30 Months Free of Cost + 25 Months Pro Rata)\r\n\r\nBattery Type : Amaron-FL-00042B', 3988, '2022-03-01', 29);

-- --------------------------------------------------------

--
-- Table structure for table `part_img`
--

CREATE TABLE `part_img` (
  `part_img_id` int(1) NOT NULL,
  `part_img_path` varchar(200) NOT NULL,
  `partsparts_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_img`
--

INSERT INTO `part_img` (`part_img_id`, `part_img_path`, `partsparts_id`) VALUES
(4, 'Part-images/1647765731-cluth.jpg', 6),
(6, 'Part-images/1647768210-stp_oil.jpg', 2),
(9, 'Part-images/1647765893-Exide Battery.jpg', 5),
(10, 'Part-images/1647764225-Amaron WagonR Car Battery.png', 8),
(11, 'Part-images/1647768435-Front Disc Brake Rotor.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(5) NOT NULL,
  `amount` int(5) NOT NULL,
  `payment_date` date NOT NULL,
  `Job_cardjobcard_id` int(5) NOT NULL,
  `staffstaff_id` int(3) NOT NULL,
  `membershipmembership_id` int(5) DEFAULT NULL,
  `typepayment_type_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `payment_date`, `Job_cardjobcard_id`, `staffstaff_id`, `membershipmembership_id`, `typepayment_type_id`) VALUES
(3, 1215, '2021-10-26', 1, 1, 1, 1),
(11, 15499, '2022-03-26', 2, 1, NULL, 1),
(12, 15499, '2022-03-26', 2, 1, NULL, 1),
(13, 12950, '2022-04-20', 5, 1, NULL, 1),
(14, 10400, '2022-04-23', 87, 1, NULL, 1),
(15, 10500, '2022-04-23', 87, 1, NULL, 1),
(16, 10500, '2022-04-23', 87, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qands`
--

CREATE TABLE `qands` (
  `id` int(5) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Administratoradmin_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qands`
--

INSERT INTO `qands` (`id`, `heading`, `description`, `Administratoradmin_id`) VALUES
(1, 'Do i have to visit garage? ', '                      No , with shivam car service you dont have to visit the garage as we are specially providing service from door  service  ,                  ', 1),
(2, 'how much time it will take to do service?', 'It usually takes around 3-4 hours to get your car serviced. However, the time taken for your car service totally depends upon what all repairs you have opted for.', 1),
(3, 'Does a car need to be serviced?', '                      Yes, of course. Your car definitely needs a car service from time to time. According to us, you should get a basic service for your car every 5000kms. Remember, if you continue to spend minor amounts on car service, you can escape huge repair costs that would incur if you don\'t get your car serviced frequently and regularly. All the fluids and filters inside your car come with a limited lifespan and need to be replaced regularly to ensure the proper functioning of the vehic', 1),
(4, 'What happens if you dont service your car?', '                      If you don\'t service your car, be ready for huge repair bills coming your way. If you continue using your vehicle with the same old fluids and filters, it will not be able to function properly after a particular time. Also, it can be dangerous for your car\'s engine to run with such fluids inside.                    ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `q_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `uphone` int(10) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`q_id`, `name`, `email`, `uphone`, `message`, `status`) VALUES
(20, 'Prajapati Yash', 'prajapatiyash8817@gmail.com', 2147483647, 'do i have to visit garage ', 1),
(21, 'Prajapati Yash', 'prajapatiyash8817@gmail.com', 2147483647, 'do you provide home service\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `servics`
--

CREATE TABLE `servics` (
  `service_id` int(2) NOT NULL,
  `service_name` varchar(20) NOT NULL,
  `service_desc` varchar(100) NOT NULL,
  `service_price` int(4) NOT NULL,
  `service_diss` float NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servics`
--

INSERT INTO `servics` (`service_id`, `service_name`, `service_desc`, `service_price`, `service_diss`, `is_active`) VALUES
(1, 'Car wash', 'the full car wash with doors and matt', 599, 0, 1),
(2, 'oil change', 'removing old, dirty oil in a vehicle and replacing it with clean oil The car needs an oil change', 200, 0, 1),
(3, 'New tires', 'change old tires with the nest grip tires', 10000, 0, 1),
(4, 'Engine air filter re', 'The purpose of the engine air filter is to prevent dust, dirt and other environmental contaminants f', 2000, 0, 1),
(31, 'oil filter check', 'oil check', 50, 0, 1),
(32, 'air filter check', 'air filter check', 150, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(3) NOT NULL,
  `Useruser_id` int(5) NOT NULL,
  `job_desc` varchar(30) NOT NULL,
  `hire_date` date NOT NULL,
  `salary` int(5) NOT NULL,
  `is_mechanic` int(1) NOT NULL,
  `is_attendee` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `Useruser_id`, `job_desc`, `hire_date`, `salary`, `is_mechanic`, `is_attendee`) VALUES
(1, 4, '          attendee        ', '2022-02-17', 45000, 0, 1),
(2, 5, 'mechanic', '2021-10-10', 15000, 1, 0),
(4, 23, 'attendee', '2022-02-02', 15000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'pending'),
(2, 'accept'),
(3, 'deny'),
(4, 'Done'),
(5, 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `payment_type_id` int(1) NOT NULL,
  `payment_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`payment_type_id`, `payment_type`) VALUES
(1, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(40) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_add` varchar(255) NOT NULL,
  `user_phone` bigint(10) DEFAULT NULL,
  `user_sec_ques` varchar(50) NOT NULL,
  `user_sec_ans` varchar(20) NOT NULL,
  `companycompany_id` int(5) NOT NULL,
  `otp` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_add`, `user_phone`, `user_sec_ques`, `user_sec_ans`, `companycompany_id`, `otp`) VALUES
(1, 'Yash88117', 'yash8817', 'prajapatiyash8817@gmail.com', '13/1 , khodiyar nagara, thaltej', 9537496805, 'In what city were you born?', 'thaltej', 10, 71953),
(2, 'vk1710', 'vrushik1', 'ravalvrushik171001@gmail.com', '312/3 , suchita apartment, gota', 826422978, 'In what state were you born?', 'gota', 10, 47457),
(3, 'rudra1710', 'rudra360', 'panchalrudra36@gmail.com', '13/2 , jay ambe apartment , vastral', 7778043212, 'In what city were you born?', 'vastral', 10, 0),
(4, 'pranav1710', 'pranav1710', 'pranav45@gmail.com', '450/1 , galaxy apartment , sarkhej', 9510020989, 'In what city were you born?', 'sarkhej', 10, 0),
(5, 'Jayesh1710', 'jayesh8817', 'jayesh4@gmail.com', '14,4/ jayraj society , gota', 9585758974, 'In what city were you born?', 'gota', 10, 44589),
(17, 'prajapati mahesh', 'yash', 'mahes8817@gmail.com', 'sg highway , Ahmedabad ', 9537496805, 'In what city were you born?', 'thaltej', 10, 47986),
(20, 'sush yohan', 'yash', 'sunix@gmail.com', 'sush', 9584759535, 'In what city were you born?', 'as', 10, 0),
(21, 'pranav1710', '', 'parmarpranav45@gmail.com', '', 9510020989, '', '', 10, 0),
(22, 'Prajapati Yash', 'yash8817', 'www.prajapatiyash.8817@gmail.com', 'Thaltej', 9725507683, 'In what city were you born?', 'thaltej', 10, 16208),
(23, 'shivam bhai ', 'yash8817', 'shivamcar78@gmail.com', 'thaltej , Ahmedabad ', 9858748585, 'In what city were you born?', 'thaltej', 10, 87143),
(27, 'vrushik raval', 'vishal8817', 'ravalvrushik3612@gmail.com', 'gota', 9904976141, 'In what city were you born?', 'gota', 10, 20173),
(28, 'pranav1710', '', 'parmarpranav45@gmail.com', '', 9510020989, '', '', 10, NULL),
(29, 'ravindra lohar', 'Ravi@8817', 'ravi85@gmail.com', 'gota', 9898879887, 'In what city were you born?', 'gota', 10, NULL),
(34, 'William T. Driskell', 'oonoF4Mod3M', 'WilliamTDriskell@armyspy.com', '2051 Alpaca Way\r\nOrange, CA 92668', 9898785487, 'In what city were you born?', 'thaltej', 10, NULL),
(41, 'Rajkumar Rao', 'Yash8817!@#', 'yashprajapati8817@gmail.com', 'thaltej , Ahmedabad ', 8956896589, 'In what city were you born?', 'thaltej', 10, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user report`
-- (See below for the actual view)
--
CREATE TABLE `user report` (
`appointment_id` int(5)
,`app_date` date
,`app_time` time
,`Vehicle_rto_number` varchar(12)
,`staffstaff_id` int(3)
,`customercustomer_id` int(5)
,`statusstatus_id` int(1)
,`customer_id` int(5)
,`Useruser_id` int(5)
,`reg_date` date
,`user_id` int(5)
,`user_name` varchar(30)
,`user_pass` varchar(40)
,`user_email` varchar(50)
,`user_add` varchar(255)
,`user_phone` bigint(10)
,`user_sec_ques` varchar(50)
,`user_sec_ans` varchar(20)
,`companycompany_id` int(5)
,`otp` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_report`
-- (See below for the actual view)
--
CREATE TABLE `user_report` (
`user_name` varchar(30)
,`user_pass` varchar(40)
,`user_email` varchar(50)
,`user_add` varchar(255)
,`customer_id` int(5)
,`Useruser_id` int(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `rto_number` varchar(12) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `chassis_no` varchar(20) NOT NULL,
  `veh_color_id` int(2) NOT NULL,
  `modelcar_model_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`rto_number`, `customer_id`, `chassis_no`, `veh_color_id`, `modelcar_model_id`) VALUES
(' DL-14201100', 1, '1GNC18Z3M0115561', 4, 3),
('BR-01DB-60', 10, 'MA3EUA61S00A98803', 4, 7),
('gj-01-sp-881', 9, '1GNC18Z3M0115574', 2, 3),
('GJ01SP8817', 23, 'HAN45SD8RAS45ERE7', 3, 3),
('GJ02SA8574', 23, 'GADCBMANDCADC4564', 2, 5),
('GJ1PX7679', 14, '1HGBH41JXMN109186', 4, 3),
('GJ1PX7812', 5, 'JN3MS37A9PW202929', 2, 3),
('GJ1PX8817', 2, 'MA3EFJC1S00167015', 2, 5),
('IND-123-34', 16, '1HGBH41JXMN109186', 4, 3),
('MH1420110062', 5, 'MA6MFBC1BBT096358', 3, 2),
('njm', 8, 'yash', 5, 2),
('WB 06F 920', 8, 'WAUZZZ8R8A 042836', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `veh_color`
--

CREATE TABLE `veh_color` (
  `veh_color_id` int(2) NOT NULL,
  `color_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veh_color`
--

INSERT INTO `veh_color` (`veh_color_id`, `color_name`) VALUES
(1, 'Yellow'),
(2, 'Silver'),
(3, 'Purple'),
(4, 'white'),
(5, 'black');

-- --------------------------------------------------------

--
-- Structure for view `user report`
--
DROP TABLE IF EXISTS `user report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user report`  AS  select `appointment`.`appointment_id` AS `appointment_id`,`appointment`.`app_date` AS `app_date`,`appointment`.`app_time` AS `app_time`,`appointment`.`Vehicle_rto_number` AS `Vehicle_rto_number`,`appointment`.`staffstaff_id` AS `staffstaff_id`,`appointment`.`customercustomer_id` AS `customercustomer_id`,`appointment`.`statusstatus_id` AS `statusstatus_id`,`customer`.`customer_id` AS `customer_id`,`customer`.`Useruser_id` AS `Useruser_id`,`customer`.`reg_date` AS `reg_date`,`user`.`user_id` AS `user_id`,`user`.`user_name` AS `user_name`,`user`.`user_pass` AS `user_pass`,`user`.`user_email` AS `user_email`,`user`.`user_add` AS `user_add`,`user`.`user_phone` AS `user_phone`,`user`.`user_sec_ques` AS `user_sec_ques`,`user`.`user_sec_ans` AS `user_sec_ans`,`user`.`companycompany_id` AS `companycompany_id`,`user`.`otp` AS `otp` from ((`appointment` join `customer` on(`customer`.`customer_id` = `appointment`.`customercustomer_id`)) join `user` on(`user`.`user_id` = `customer`.`Useruser_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_report`
--
DROP TABLE IF EXISTS `user_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_report`  AS  select `user`.`user_name` AS `user_name`,`user`.`user_pass` AS `user_pass`,`user`.`user_email` AS `user_email`,`user`.`user_add` AS `user_add`,`customer`.`customer_id` AS `customer_id`,`customer`.`Useruser_id` AS `Useruser_id` from (`user` join `customer` on(`user`.`user_id` = `customer`.`customer_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `FKAdministra539792` (`Useruser_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `FKappointmen417715` (`staffstaff_id`),
  ADD KEY `FKappointmen269093` (`Vehicle_rto_number`),
  ADD KEY `FKappointmen517925` (`customercustomer_id`),
  ADD KEY `FKappointmen123187` (`statusstatus_id`);

--
-- Indexes for table `blog_img`
--
ALTER TABLE `blog_img`
  ADD PRIMARY KEY (`blog_img_id`),
  ADD KEY `FKblog_img706484` (`Blogblog_id`);

--
-- Indexes for table `cancel_appmnt`
--
ALTER TABLE `cancel_appmnt`
  ADD PRIMARY KEY (`cancel_appmnt_id`),
  ADD KEY `FKcancel_app357422` (`appoimentappointment_id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`car_type_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `FKcustomer904171` (`Useruser_id`);

--
-- Indexes for table `job_card`
--
ALTER TABLE `job_card`
  ADD PRIMARY KEY (`jobcard_id`),
  ADD KEY `FKJob_card367855` (`appointmentappointment_id`);

--
-- Indexes for table `job_card_parts`
--
ALTER TABLE `job_card_parts`
  ADD PRIMARY KEY (`Job_cardjobcard_id`,`partsparts_id`),
  ADD KEY `FKJob_card_p430982` (`partsparts_id`);

--
-- Indexes for table `job_card_servics`
--
ALTER TABLE `job_card_servics`
  ADD PRIMARY KEY (`Job_cardjobcard_id`,`Servicsservice_id`),
  ADD KEY `FKJob_card_S584237` (`Servicsservice_id`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`maker_id`),
  ADD KEY `FKMaker617367` (`car_typecar_type_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `FKmembership651146` (`membership_details_id`),
  ADD KEY `FKmembership271395` (`customercustomer_id`);

--
-- Indexes for table `membership_details`
--
ALTER TABLE `membership_details`
  ADD PRIMARY KEY (`mem_details_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`car_model_id`),
  ADD KEY `FKmodel221832` (`Makermaker_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `offer_servics`
--
ALTER TABLE `offer_servics`
  ADD PRIMARY KEY (`offeroffer_id`,`Servicsservice_id`),
  ADD KEY `FKoffer_Serv87455` (`Servicsservice_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`parts_id`);

--
-- Indexes for table `part_img`
--
ALTER TABLE `part_img`
  ADD PRIMARY KEY (`part_img_id`),
  ADD KEY `have` (`partsparts_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FKpayment12616` (`Job_cardjobcard_id`),
  ADD KEY `FKpayment103068` (`staffstaff_id`),
  ADD KEY `FKpayment354982` (`membershipmembership_id`),
  ADD KEY `FKpayment98566` (`typepayment_type_id`);

--
-- Indexes for table `qands`
--
ALTER TABLE `qands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKBlog117040` (`Administratoradmin_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `servics`
--
ALTER TABLE `servics`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `FKstaff514370` (`Useruser_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FKUser735957` (`companycompany_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`rto_number`),
  ADD KEY `FKVehicle226241` (`customer_id`),
  ADD KEY `FKVehicle530670` (`veh_color_id`),
  ADD KEY `FKVehicle386157` (`modelcar_model_id`);

--
-- Indexes for table `veh_color`
--
ALTER TABLE `veh_color`
  ADD PRIMARY KEY (`veh_color_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `blog_img`
--
ALTER TABLE `blog_img`
  MODIFY `blog_img_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cancel_appmnt`
--
ALTER TABLE `cancel_appmnt`
  MODIFY `cancel_appmnt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `car_type_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `job_card`
--
ALTER TABLE `job_card`
  MODIFY `jobcard_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `maker_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `membership_details`
--
ALTER TABLE `membership_details`
  MODIFY `mem_details_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `car_model_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `parts_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `part_img`
--
ALTER TABLE `part_img`
  MODIFY `part_img_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `qands`
--
ALTER TABLE `qands`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `servics`
--
ALTER TABLE `servics`
  MODIFY `service_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `payment_type_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `veh_color`
--
ALTER TABLE `veh_color`
  MODIFY `veh_color_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `FKAdministra539792` FOREIGN KEY (`Useruser_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FKappointmen123187` FOREIGN KEY (`statusstatus_id`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `FKappointmen269093` FOREIGN KEY (`Vehicle_rto_number`) REFERENCES `vehicle` (`rto_number`),
  ADD CONSTRAINT `FKappointmen417715` FOREIGN KEY (`staffstaff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `FKappointmen517925` FOREIGN KEY (`customercustomer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `blog_img`
--
ALTER TABLE `blog_img`
  ADD CONSTRAINT `FKblog_img706484` FOREIGN KEY (`Blogblog_id`) REFERENCES `qands` (`id`);

--
-- Constraints for table `cancel_appmnt`
--
ALTER TABLE `cancel_appmnt`
  ADD CONSTRAINT `FKcancel_app357422` FOREIGN KEY (`appoimentappointment_id`) REFERENCES `appointment` (`appointment_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FKcustomer904171` FOREIGN KEY (`Useruser_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `job_card`
--
ALTER TABLE `job_card`
  ADD CONSTRAINT `FKJob_card367855` FOREIGN KEY (`appointmentappointment_id`) REFERENCES `appointment` (`appointment_id`);

--
-- Constraints for table `job_card_parts`
--
ALTER TABLE `job_card_parts`
  ADD CONSTRAINT `FKJob_card_p344671` FOREIGN KEY (`Job_cardjobcard_id`) REFERENCES `job_card` (`jobcard_id`),
  ADD CONSTRAINT `FKJob_card_p430982` FOREIGN KEY (`partsparts_id`) REFERENCES `parts` (`parts_id`);

--
-- Constraints for table `job_card_servics`
--
ALTER TABLE `job_card_servics`
  ADD CONSTRAINT `FKJob_card_S10644` FOREIGN KEY (`Job_cardjobcard_id`) REFERENCES `job_card` (`jobcard_id`),
  ADD CONSTRAINT `FKJob_card_S584237` FOREIGN KEY (`Servicsservice_id`) REFERENCES `servics` (`service_id`);

--
-- Constraints for table `maker`
--
ALTER TABLE `maker`
  ADD CONSTRAINT `FKMaker617367` FOREIGN KEY (`car_typecar_type_id`) REFERENCES `car_type` (`car_type_id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `FKmembership271395` FOREIGN KEY (`customercustomer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FKmembership651146` FOREIGN KEY (`membership_details_id`) REFERENCES `membership_details` (`mem_details_id`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FKmodel221832` FOREIGN KEY (`Makermaker_id`) REFERENCES `maker` (`maker_id`);

--
-- Constraints for table `offer_servics`
--
ALTER TABLE `offer_servics`
  ADD CONSTRAINT `FKoffer_Serv67558` FOREIGN KEY (`offeroffer_id`) REFERENCES `offer` (`offer_id`),
  ADD CONSTRAINT `FKoffer_Serv87455` FOREIGN KEY (`Servicsservice_id`) REFERENCES `servics` (`service_id`);

--
-- Constraints for table `part_img`
--
ALTER TABLE `part_img`
  ADD CONSTRAINT `have` FOREIGN KEY (`partsparts_id`) REFERENCES `parts` (`parts_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FKpayment103068` FOREIGN KEY (`staffstaff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `FKpayment12616` FOREIGN KEY (`Job_cardjobcard_id`) REFERENCES `job_card` (`jobcard_id`),
  ADD CONSTRAINT `FKpayment354982` FOREIGN KEY (`membershipmembership_id`) REFERENCES `membership` (`membership_id`),
  ADD CONSTRAINT `FKpayment98566` FOREIGN KEY (`typepayment_type_id`) REFERENCES `type` (`payment_type_id`);

--
-- Constraints for table `qands`
--
ALTER TABLE `qands`
  ADD CONSTRAINT `FKBlog117040` FOREIGN KEY (`Administratoradmin_id`) REFERENCES `administrator` (`admin_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FKstaff514370` FOREIGN KEY (`Useruser_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKUser735957` FOREIGN KEY (`companycompany_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `FKVehicle226241` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FKVehicle386157` FOREIGN KEY (`modelcar_model_id`) REFERENCES `model` (`car_model_id`),
  ADD CONSTRAINT `FKVehicle530670` FOREIGN KEY (`veh_color_id`) REFERENCES `veh_color` (`veh_color_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
