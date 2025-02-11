-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 05:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `DealerID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`DealerID`, `Name`, `Number`) VALUES
(17, 'hassan', '3456789'),
(18, 'naseer', '65432');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MedicineID` int(11) NOT NULL,
  `MedicineName` varchar(255) DEFAULT NULL,
  `Manufacturer` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MedicineID`, `MedicineName`, `Manufacturer`, `Price`, `Status`, `Quantity`, `Total`) VALUES
(1, 'panadol', 'ppppp', '30.00', 0, 0, 0),
(2, 'Getryl', 'FFSK', '210.00', 1, 2, 420),
(3, 'Omnidoll', 'OMNI', '980.00', 0, 0, 0),
(4, 'Raizik', 'SNGPL', '190.00', 0, 0, 0),
(5, 'Flagel', 'GFSK', '40.00', 0, 0, 0),
(6, 'Fedroll', 'IIUI', '600.00', 0, 0, 0),
(7, 'Dispreen', 'Disk.com', '20.00', 0, 0, 0),
(8, 'Emitrol', 'Goodrox', '320.00', 0, 0, 0),
(9, 'Bascopan', 'GSK', '120.00', 1, 3, 0),
(10, 'Nerobian', 'WWER', '1120.00', 0, 0, 0),
(11, 'Niproksan', 'QSDF', '110.00', 0, 0, 0),
(12, 'MIST', 'GSK', '80.00', 1, 4, 0),
(13, 'Bismol', 'GSK', '330.00', 0, 0, 0),
(14, 'ibuprofen', 'ADWIL', '90.00', 0, 0, 0),
(15, 'Floraptic', 'AWMU', '600.00', 0, 0, 0),
(16, 'Panadol', 'GSK', '30.00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `ID` int(11) NOT NULL,
  `ShopID` int(11) NOT NULL,
  `Profit_amount` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profit`
--

INSERT INTO `profit` (`ID`, `ShopID`, `Profit_amount`, `Date`) VALUES
(1, 1, 100000, '2023-06-01'),
(2, 2, 250000, '2023-06-02'),
(3, 3, 100000, '2023-06-01'),
(4, 4, 250000, '2023-06-02'),
(5, 5, 20000, '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `ShopID` int(11) DEFAULT NULL,
  `MedicineID` int(11) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SalesID` int(11) NOT NULL,
  `ShopID` int(11) DEFAULT NULL,
  `MedicineID` int(11) DEFAULT NULL,
  `SaleDate` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SalesID`, `ShopID`, `MedicineID`, `SaleDate`, `Quantity`, `TotalAmount`) VALUES
(2, 4, 1, '2023-06-06', 1, '2500.00'),
(3, 1, 1, '2023-06-06', 1, '2100.00'),
(4, 4, 2, '2023-06-06', 12, '2500.00'),
(5, 4, 2, '2023-06-06', 12, '2500.00'),
(6, 3, 9, '2023-06-06', 2, '25000.00'),
(7, 1, 3, '2023-06-06', 50, '1500.00'),
(8, 1, 13, '2023-06-06', 50, '100.00'),
(9, 2, 15, '2023-06-06', 5, '6700.00'),
(10, 1, 6, '2023-06-06', 5, '670.00'),
(11, 2, 1, '2023-06-06', 1, '67.00'),
(12, 1, 10, '2023-06-06', 12, '210.00'),
(13, 1, 12, '2023-06-13', 3, '240.00'),
(14, 1, 1, '0000-00-00', 1, '30.00'),
(15, 1, 12, '0000-00-00', 3, '240.00'),
(27, 1, 12, '2023-06-13', 3, '240.00'),
(28, 1, 1, '2023-06-13', 1, '30.00'),
(29, 1, 12, '2023-06-13', 3, '240.00');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `ShopID` int(11) NOT NULL,
  `ShopName` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`ShopID`, `ShopName`, `Location`, `ContactNumber`) VALUES
(1, 'malik', 'GT road Haripur', '03365752033'),
(2, 'wickey', 'mankara road Haripur', '03088085065'),
(3, 'ayub', 'darband Haripur', '44552'),
(4, 'noori', 'tehsil road Haripur', '777331'),
(5, 'aljanat', 'pindi road Haripur', '777331');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `StockID` int(11) NOT NULL,
  `ShopID` int(11) DEFAULT NULL,
  `MedicineID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `DealerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`StockID`, `ShopID`, `MedicineID`, `Quantity`, `Date`, `DealerID`) VALUES
(1, 4, 1, 5, '2023-06-06', NULL),
(2, 3, 1, 10, '2023-06-12', NULL),
(3, 3, 1, 10, '1900-01-16', NULL),
(4, 3, 1, 20, '1900-01-31', NULL),
(5, 3, 1, 15, '1900-01-26', NULL),
(6, 1, 16, 70, '2023-06-13', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Passwords` varchar(255) DEFAULT NULL,
  `Number` int(14) DEFAULT NULL,
  `UserType` varchar(255) DEFAULT NULL,
  `shop_ID` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Passwords`, `Number`, `UserType`, `shop_ID`, `Image`, `Address`) VALUES
(1, 'uzair', 'uzair', 336552, 'Admin', 1, 'NO-IMAGE-AVAILABLE.jpg', 'Pindi'),
(2, 'jawad', 'jawad', 88085065, 'Admin', 2, '0', 'Islamabad'),
(4, 'hassan', 'hassan', 113344, 'staff', 2, 'NO-IMAGE-AVAILABLE.jpg', 'mankarae'),
(5, 'mohiz', 'mohiz', 2331, 'Manager', 1, 'NO-IMAGE-AVAILABLE.jpg', 'kangara'),
(6, 'naveed', 'naveed', 113344, 'staff', 2, 'NO-IMAGE-AVAILABLE.jpg', 'mankarae'),
(7, 'Ahmed', 'Ahmed', 113344, 'staff', 2, 'NO-IMAGE-AVAILABLE.jpg', 'Haripur'),
(8, 'Mohib', 'Mohib', 113344, 'staff', 4, 'NO-IMAGE-AVAILABLE.jpg', 'Haripur'),
(9, 'sheryar', 'sheryar', 35677654, 'Manager', 3, 'NO-IMAGE-AVAILABLE.jpg', 'haripur'),
(10, 'anees', 'anees', 35677654, 'Manager', 4, 'NO-IMAGE-AVAILABLE.jpg', 'haripur'),
(11, 'Qasim', 'Qasim', 35677654, 'Manager', 2, 'NO-IMAGE-AVAILABLE.jpg', 'haripur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`DealerID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MedicineID`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `profit_ibfk_1` (`ShopID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `ShopID` (`ShopID`),
  ADD KEY `MedicineID` (`MedicineID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SalesID`),
  ADD KEY `ShopID` (`ShopID`),
  ADD KEY `MedicineID` (`MedicineID`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`ShopID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`StockID`),
  ADD KEY `ShopID` (`ShopID`),
  ADD KEY `MedicineID` (`MedicineID`),
  ADD KEY `DealerID` (`DealerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `DealerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MedicineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `ShopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `StockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profit`
--
ALTER TABLE `profit`
  ADD CONSTRAINT `profit_ibfk_1` FOREIGN KEY (`ShopID`) REFERENCES `shops` (`ShopID`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`ShopID`) REFERENCES `shops` (`ShopID`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`ShopID`) REFERENCES `shops` (`ShopID`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`ShopID`) REFERENCES `shops` (`ShopID`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`DealerID`) REFERENCES `dealer` (`DealerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
