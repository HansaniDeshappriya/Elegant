-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2021 at 12:47 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elegantstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'open',
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `customerId`, `status`) VALUES
(1, 1, 'close'),
(2, 1, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

DROP TABLE IF EXISTS `cartitem`;
CREATE TABLE IF NOT EXISTS `cartitem` (
  `cartItemId` int(11) NOT NULL AUTO_INCREMENT,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`cartItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`cartItemId`, `cartId`, `productId`, `qty`, `date`) VALUES
(5, 1, 3, 1, '2021-01-06'),
(4, 1, 1, 1, '2021-01-06'),
(6, 2, 2, 1, '2021-01-06'),
(7, 2, 6, 1, '2021-01-06'),
(8, 2, 4, 1, '2021-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catId` int(4) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `categoryName`) VALUES
(1, 'Dresses'),
(2, 'Tops'),
(3, 'Work wear');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `checkoutId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cartId` int(11) NOT NULL,
  `amount` float(15,2) NOT NULL,
  PRIMARY KEY (`checkoutId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkoutId`, `date`, `cartId`, `amount`) VALUES
(1, '2021-01-06', 1, 4750.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `addressL1` varchar(40) NOT NULL,
  `addressL2` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `phoneNo` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `fName`, `lName`, `email`, `addressL1`, `addressL2`, `city`, `phoneNo`, `password`) VALUES
(1, 'user', 'one', 'example@user.com', '29/B dhwuidh', 'bhjdghgsf', 'gdhsghds', '1325546', '0192023a7bbd73250516f069df18b500'),
(2, 'shgfjdgsf', 'sfjdgsfd', 'user@sjaddsd.com', 'sfkjdhjfdgsjgjsd', 'sfjdgjfds', 'fhsdsj', '6347842', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proName` varchar(50) NOT NULL,
  `proDesc` varchar(255) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` float(11,2) NOT NULL,
  `catId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catId` (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `proName`, `proDesc`, `quantity`, `price`, `catId`, `image`) VALUES
(1, 'LIVING ICONS', 'Material : 100% Polyester Length : Midi Length - (43 inches) Sleeve : Long Sleeve Neck: -  With Collar Front Open Buttons on Front Pockets & Cuffs Fabric Belt With Front Tie Knot Seam Pockets Semi Fitted Stripe Woven Fabric', 15, 2000.00, 1, 'images/pro-img/dress1.jpg\r\n'),
(2, 'CHANGING LIFE STYLES', 'Material :100% Polyester Length :Maxi Length ( \"53\'\' Inches) Sleeve :Elbow Sleeve Neck : _ Front Over Lap Gold Colour Metal D Ring Buckle on Waist Front Wrapped Buttons on Cuffs & Waist Printed Woven Fabric', 12, 3000.00, 1, 'images/pro-img/dress3.jpg'),
(3, 'VINTAGE DREAM DRESS', 'Material :100% Polyester Length : Short Length( \"34.5\'\' Inches) Sleeve :Long Sleeve Neck : High Neck DTM Lace Trim On Neck Mushroom Button On Back Neck Side Invisible Zipper Fabric Belt Elasticated Long Sleeve Solid Woven Fabric', 10, 2500.00, 1, 'images/pro-img/dress2.jpg'),
(4, 'BUTTERFLY TOUCH ON ME LINEN DRESS', 'Material :Linen 55% Cotton 45% Length :Knee (\"38\" Inches) Sleeve :Elbow Neck : _ Back Trim Turn Up Sleeve One Side Slit', 14, 3950.00, 1, 'images/pro-img/dress4.jpg'),
(5, 'FRILLY WRAP AROUND TOP', 'Material :100% Polyester  Length : Normal ( \"23.5\" Inches) Sleeve :Long Sleeve  Neck : V neck Wrap Top with tie up Cuff Button Detail Sattin Top', 20, 1750.00, 2, 'images/pro-img/top1.jpg'),
(6, 'GORGEOUS BODYCON DRESS', 'Material : 69% Tencil 28%Rayon 3%spandex  Length : Knee ( 34 inches)   Sleeve : Long Sleeve Neck : Square Neck Basic Dress Body fitted Black Knit Llong sleeve', 15, 2250.00, 1, 'images/pro-img/dress5.jpg'),
(7, 'RISING STAR', 'Material composition : 100% Polyester', 20, 3000.00, 1, 'images/pro-img/dress6.jpg'),
(8, 'WRAP WAIST TYE DRESS', 'Material composition : 100% polyester', 10, 2300.00, 1, 'images/pro-img/dress7.jpg'),
(9, 'LOVING MEMORIES', 'Material :  100% Polyester Length : Maxi Sleeve : Sleeveless Neck :_ Semi Fitted Crew neck gathereing Side loops with belt Left side invisible zipper Back key hole with 1 button maxi dress', 13, 4000.00, 1, 'images/pro-img/dress8.jpg'),
(10, '80\'S BACK', 'Material composition : 100% Polyester', 15, 3500.00, 1, 'images/pro-img/dress9.jpg'),
(11, 'BOLD & BEAUTIFUL TOP', 'Material :62% Polyester 33% Rayon 5% Spandex Length : Crop Length( \"16.5\'\' Inches) Sleeve :Long Sleeve Neck : High Neck Back Neck Gold Colour Exposed Metal Zipper Body Fitted Solid Knitted Fabric', 10, 1800.00, 2, 'images/pro-img/top2.jpg'),
(12, 'PRINTED SMOCKED TOP', 'Material :  100% Polyester', 10, 1590.00, 2, 'images/pro-img/top3.jpg'),
(13, 'SWEET & SASSY CASUAL TOP', 'Material :  100% Rayon Length :Normal Length Sleeve :Elbow Sleeve Neck : Round Neck Flared Sleeve Embeoider On Sleeve Back Keyhole with Button Solid Woven Fabric Semi Fitted', 8, 1500.00, 2, 'images/pro-img/top4.jpg'),
(14, 'IN BLOOM NIGHT TOP', 'Material :  60% Nylon 40% cotton Length : Crop Sleeve : Long Neck :_ Trim Detail Lace Fabrics Side zipper detail', 10, 1750.00, 2, 'images/pro-img/top5.jpg'),
(15, 'FLORALS', 'Material composition : 100% Rayon', 10, 1990.00, 2, 'images/pro-img/top6.jpg'),
(16, 'CHECKED TOP', 'Material composition : 100% Rayon', 15, 1600.00, 2, 'images/pro-img/top7.jpg'),
(17, 'SKY AND EARTH LINEN TOP', 'Material : Linen 55%, Cotton 45% Length : Normal Sleeve : Elbow Neck :_ Fit Type :_ Color Combo Top Sleeve Tie Detail DTM Buttons', 10, 2100.00, 2, 'images/pro-img/top8.jpg'),
(18, 'SERENA SLEEVE PRINTED TOP', 'Material composition : 100% polyester', 12, 1450.00, 2, 'images/pro-img/top9.jpg'),
(19, 'ROSES CROSS WW TOP', 'Material : 100% Polyester  Length : Normal  Sleeve : Long Sleeve  Neck: -  Front Plastic Buttons  Silver Eyelet in Cuff', 20, 1600.00, 3, 'images/pro-img/ww1.jpg'),
(20, 'BOSS LADY WW DRESS', 'Material : 100% Cotton Length : Knee  Sleeve : 3/4\'\' Neck: V Neck Semi Fitted Waist Belt', 15, 3200.00, 3, 'images/pro-img/ww2.jpg'),
(21, 'WORK LADY BLAZER', 'Material : 100% Polyester Length : Normal ( \"23.625\" Inches) Sleeve : Long Neck: - Front Dtm Button Detail', 10, 4000.00, 3, 'images/pro-img/ww3.jpg'),
(22, 'ALWAYS TRENDY WW SKIRT', 'Material : 100% Polyester Length : Knee Length   Sleeve : - Neck: - Short skirt with Side Zipper', 20, 2500.00, 3, 'images/pro-img/ww4.jpg'),
(23, 'WALK TO SUCCESS WW PANT', 'Material : 100% Polyester Length : Normal Length - Inseam (\"27 inches\") Basic WW Pant', 25, 2750.00, 3, 'images/pro-img/ww5.jpg'),
(26, 'ENTHUSIASTIC EDGE TOP', 'Material : 100% Polyester Length : Normal (22.75 inches) Sleeve : Long Neck: - Contrast Detail Matt Button Detail Collar Detail', 15, 2100.00, 3, 'images/pro-img/ww6.jpg'),
(27, 'BOSS VIBES DRESS', 'Material : Cotton 68% Polyester 30% Spandex 2%   Length :Normal Sleeve :Long Neck :_ Fabric Covered Buckle Detail Belt Eyelet Detail ', 15, 3600.00, 3, 'images/pro-img/ww7.jpg'),
(28, 'SHOULDER PINTUCK DETAIL WW TOP', 'Material composition : 100% Polyester', 25, 2200.00, 3, 'images/pro-img/ww8.jpg'),
(29, 'STRIPE LINE COMBO WW JUMPSUIT', 'Material composition : 100% Polyester', 20, 3750.00, 3, 'images/pro-img/ww8.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
