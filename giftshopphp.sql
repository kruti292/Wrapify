
--
-- Database: `giftshopphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
create database giftshopphp;
use giftshopphp;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminname` varchar(30) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`adminname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bookingdate` varchar(50) DEFAULT NULL,
  `customername` varchar(30) DEFAULT NULL,
  `emailid` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `productname` varchar(30) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `quantity` varchar(5) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(40) DEFAULT NULL,
  `image` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`, `image`) VALUES
(9, 'Cakes', 'uploadimage/Cake.gif'),
(10, 'Flowers', 'uploadimage/flowers.webp'),
(11, 'Teddies', 'uploadimage/teddies.webp'),
(12, 'Chocolates', 'uploadimage/chocgift.jpg');
(13, 'Gadgets', 'uploadimage/watch1.jpg');
(14, 'For Him' ,'uploadimage/him.webp');
(15, 'For Her' ,'uploadimage/girls.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `emailid` varchar(40) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `ymsg` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `mobileno`, `emailid`, `date`, `ymsg`) VALUES
(1, 'Deep', '9809083459', 'shapdeep@gmail.com', '10-2-2023', 'Your Products were amazing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `image` longtext,
  `category` varchar(30) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `category`, `price`, `description`) VALUES
(1, 'BirthDayCake', 'uploadimage/cake2.jpg', '5', '400', 'hdkdk d');

-- --------------------------------------------------------

--
-- Table structure for table `siteuser`
--

CREATE TABLE IF NOT EXISTS `siteuser` (
  `username` varchar(40) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `emailid` varchar(50) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteuser`
--

INSERT INTO `siteuser` (`username`, `pwd`, `city`, `address`, `emailid`, `contact`) VALUES
('harish', '1234', 'Bhopal', 'indrapuri c sector', 'harish@gmail.com', '8752768256');


alter table siteuser add code varchar(10);
alter table siteuser add updated_time timestamp;

CREATE TABLE IF NOT EXISTS `addtocart` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `productname` varchar(30) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `quantity` varchar(5) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `customername` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `booking1` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `productname` varchar(30) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `quantity` varchar(5) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `customername` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
);