-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 05:33 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--
CREATE DATABASE IF NOT EXISTS `pms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pms`;

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `ItemID` int(20) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `UnitPrice` varchar(255) NOT NULL,
  `SupplierID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`ItemID`, `ItemName`, `Description`, `UnitPrice`, `SupplierID`) VALUES
(1, 'Gadget A', ' High-quality widget', '100', 1),
(2, 'Gadget B', 'Durable and versatile widget', '150', 2),
(3, 'Gadget C', 'Compact and feature-rich gadget', '200', 1),
(4, 'Gadget D', 'Cutting-edge gizmo', '120', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_logout`
--

CREATE TABLE `login_logout` (
  `Username` varchar(256) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_logout`
--

INSERT INTO `login_logout` (`Username`, `Password`) VALUES
('Adya', 'adya123'),
('Arya', 'arya456'),
('Alok', 'alok789'),
('Ram', 'ram1');

-- --------------------------------------------------------

--
-- Table structure for table `new_purchase_order`
--

CREATE TABLE `new_purchase_order` (
  `POID` int(20) NOT NULL,
  `SupplierName` varchar(255) NOT NULL,
  `PODate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `Status` varchar(255) NOT NULL,
  `ShippingAddress` varchar(255) NOT NULL,
  `BillingAddress` varchar(255) NOT NULL,
  `ContactPerson` varchar(255) NOT NULL,
  `ItemID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_purchase_order`
--

INSERT INTO `new_purchase_order` (`POID`, `SupplierName`, `PODate`, `DeliveryDate`, `Status`, `ShippingAddress`, `BillingAddress`, `ContactPerson`, `ItemID`) VALUES
(1, 'ABC Supplier', '2023-06-01', '2023-06-15', 'Pending', '123 Main St, Anytown, USA', '456 Broadway, Anytown, USA', 'John Doe', '1'),
(2, 'XYZ Corporation', '2023-06-02', '2023-06-18', 'In Progress', '789 Oak Ave, Another City, USA', '321 Elm St, Another City, USA', 'Jane Smith', '2'),
(3, 'PQR Manufacturing', '2023-06-03', '2023-06-20', 'Completed', '555 Maple Rd, Someplace, USA', '888 Pine St, Someplace, USA', 'Robert Johnson', '3'),
(4, 'LMN Distributor', '2023-06-04', '2023-06-22', 'Pending', '999 Walnut Dr, Elsewhere, USA', '111 Cedar Ave, Elsewhere, USA', 'Sarah Williams', '2'),
(5, 'PQR Manufacturing', '2022-04-04', '2022-04-12', 'Completed', '456 Oak Avenue, Springfield, USA', '789 Maple Lane, Riverside, USA', 'John Doe', '3');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `SupplierID` int(100) NOT NULL,
  `SupplierName` varchar(255) NOT NULL,
  `ContactPersonName` varchar(255) NOT NULL,
  `ContactEmail` varchar(255) NOT NULL,
  `ContactPhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_list`
--

INSERT INTO `supplier_list` (`SupplierID`, `SupplierName`, `ContactPersonName`, `ContactEmail`, `ContactPhoneNumber`, `Address`, `Status`) VALUES
(2, 'XYZ Corporation', 'Jane Smith', 'jane@example.com', '5559876543', 'Texas, United States', 'Active'),
(3, 'PQR Manufacturing', 'Robert Johnson', 'robert@example.com', '5554567890', 'Newyork, United States', 'Inactive'),
(4, 'LMN Distributor', 'Sarah Williams', 'sarah@example.com', '5557891234', 'Florida, United States', 'Active'),
(1, 'ABC Supplier', 'John Doe', 'john@example.com', '5551234567', 'California, United States', 'Active'),
(7, '123 Electronics', 'Mike Johnson', 'mike.johnson@123electronics.com', '5557891234', '789 Oak Avenue, Villagetown', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `ID` int(100) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `CreatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`ID`, `Username`, `Email`, `FullName`, `Address`, `PhoneNumber`, `CreatedDate`) VALUES
(1, 'Adya', 'adya@example.com', 'Adya Sharma', '123 Main Street', '1234567890', '2022-05-15'),
(2, 'Arya', 'arya@example.com', 'Arya Singh', '456 Elm Avenue', '2345678901', '2022-06-20'),
(3, 'Alok', 'alok@example.com', 'Alok Verma', '789 Oak Boulevard', '3456789012', '2022-08-10'),
(4, 'Ram', 'ram@xyz.com', 'Ram Raghav', '234 Lakeside Okla Avenue', '1234365734', '2023-08-03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;