-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2026 at 09:27 PM
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
-- Database: `easycart`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `hometown` varchar(150) DEFAULT NULL,
  `mob` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `country`, `state`, `city`, `hometown`, `mob`) VALUES
(14, '53', 'India', 'Punjab', 'Gurdaspur', 'BCET', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sr` int(10) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `admin_mob` varchar(15) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sr`, `shop_name`, `admin_name`, `admin_id`, `admin_mob`, `admin_email`, `admin_pass`, `datetime`) VALUES
(1, 'sahil', 'sahil', 'sahil', '123', 'sahil@gmail.com', 'sahil', '2022-11-27 12:30:40'),
(2, 'SAHIL2', 'sahil2', 'sahil2', '123', 'sahil2@gmail.com', 'sahil', '2022-11-27 12:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`) VALUES
(26, 'Computers', 'computers', '../images/Catagory_images/computersicon copy.png'),
(27, 'Mobile phones', 'best price smart phone', '../images/Catagory_images/5521112.png'),
(28, 'Laptop', 'best gaming laptop', '../images/Catagory_images/428001.png'),
(30, 'Accessories', 'Electronics ', '../images/Catagory_images/accessories icon copy.png'),
(34, ' SMART TV ', 'disount and sales', '../images/Catagory_images/TV.png'),
(35, 'Mens ', 'cloths and accessories', '../images/Catagory_images/men icon .png'),
(36, 'Women', 'disount and sales', '../images/Catagory_images/women icon .png'),
(37, 'iPhone', 'iPhones', '../images/Catagory_images/iPhonecatagory.png'),
(38, 'Samsung', 'Samsung Primiam Mobiles', '../images/Catagory_images/SamsungS23Ultra.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Sr` int(5) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `mob` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Sr`, `userid`, `fname`, `sname`, `mob`, `email`, `pass`) VALUES
(53, 'sahil', 'sahil', 'kumar', '12346', 'sahil@sahil.com', 'sahil');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(10) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `item_price` int(10) NOT NULL,
  `price_offer` int(10) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `category_id`, `item_price`, `price_offer`, `image`, `description`) VALUES
(8, 'DZAB Assemble Core i3 ', '26', 12999, 9999, '../images/item_images/di3-4gb-500-15-4-dzab-original-imagcf9hgvgz3uzd.webp', '4 GB DDR3/500 GB/\r\nWindows 7 Home Basic/\r\n15.1 Inch Screen/dI3/\r\n4GB/500/15.1'),
(9, 'syska power bank 1000Mh', '29', 700, 500, '../images/item_images/syska power bank 1000mh.jpg', 'best'),
(10, 'samsung adapter 25w', '30', 999, 899, '../images/item_images/samsung adapter 25w 999 .png', 'Wall Charger\r\nSuitable For: Mobile\r\nNo Cable Included\r\nUniversal Voltage\r\nOutput Current : 3 A'),
(11, 'Ptron bass buds ', '30', 1500, 1200, '../images/item_images/ptron bass budds plus .png', 'with Mic:Yes\r\nConnector type: No\r\nMade in India True Wireless Earbuds with Bluetooth 5.1, Quick-pairing, 10M Seamless Wireless Range, Wide Compatibility with Smartphones/Tablets | Ergo-fit & Lightweight Earphones'),
(12, 'Elv car mount', '30', 700, 400, '../images/item_images/elv car mount .jpg', 'Color: Black, White\r\nType: AC Vent\r\nMount Type: Dashboard, AC Ven'),
(13, 'Thegiftkart tough amor ', '30', 500, 300, '../images/item_images/thegiftkart tough amor .png', 'best cover and solid '),
(14, 'boat cable ', '30', 200, 150, '../images/item_images/boat cable rs99.jpg', 'Length 2 m\r\nRound Cable\r\nConnector One: USB Type A|Connector Two: Type-C\r\nCable Speed: 480 Mbps\r\nMobile, Tablet'),
(15, 'i phone 14 pro max ', '37', 150000, 130000, '../images/item_images/i phone 14.jpg', '128 GB ROM\r\n17.02 cm (6.7 inch) Super Retina XDR Display\r\n48MP + 12MP + 12MP | 12MP Front Camera\r\nA16 Bionic Chip, 6 Core Processor Processo'),
(16, 'one plus 11R 5G', '27', 40000, 35000, '../images/item_images/one plus .jpg', '8 GB RAM | 128 GB ROM\r\n17.02 cm (6.7 inch) Display\r\n50MP Rear Camera\r\n5000 mAh Battery'),
(17, 'Realme 50A', '27', 10000, 7000, '../images/item_images/realme 50a .jpg', '3 GB RAM | 32 GB ROM\r\n16.51 cm (6.5 inch) Display\r\n8MP Rear Camera | 5MP Front Camera\r\n5000 mAh Battery\r\nUnisoc T612 processor Processor'),
(18, 'redmi 12C', '', 12000, 10000, '../images/item_images/redmi 12c .jpg', '6 GB RAM | 128 GB ROM\r\n17.04 cm (6.71 inch) Display\r\n50MP Rear Camera\r\n5000 mAh Battery'),
(19, 'asus', '28', 335000, 300000, '../images/item_images/assus rog.jpg', '18 Inch FHD+, 165Hz, 85/85/85/85, IPS-level, 300, 1000:1, 72.00%, 100.00%, 75.35%, \r\nAnti-glare display\r\nLight Laptop without Optical Disk Drive\r\nPreloaded with MS Office'),
(20, 'Macbook ', '28', 90000, 70000, '../images/item_images/macbook .jpg', 'Stylish & Portable Thin and Light Laptop\r\n13.3 inch Quad LED Backlit IPS Display (227 PPI, 400 nits Brightness, Wide Colour (P3), True Tone Technology)\r\nLight Laptop without Optical Disk Drive'),
(21, 'Hp 5 hexa core', '28', 55000, 50000, '../images/item_images/hp15s .jpg', 'NVIDIA GeForce GTX 1650\r\n15.6 Inch FHD,IPS, micro-edge, anti-glare,Brightness: 250 nits, 141 ppi, Color Gamut: 45% NTSC\r\nLight Laptop without Optical Disk Drive\r\nPreloaded with MS Office'),
(22, 'leveno legicon 5 pro', '28', 150000, 100000, '../images/item_images/lenovo legion5pro .jpg', '15.6 Inch WQHD IPS 300nits Anti-glare, 165Hz, 100% sRGB,\r\n Dolby Vision, Free-Sync, G-Sync, DC dimmer\r\nLight Laptop without Optical Disk Drive\r\nPreloaded with MS Office'),
(23, 'Dell insprion', '28', 50000, 48000, '../images/item_images/dell inspiron 3525 .jpg', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD, \r\nWVAAG Narrow Border, \r\nRefresh Rate: 120 Hz, Brightness: 250 nits\r\nLight Laptop without Optical Disk Drive'),
(24, 'asus vivo v241', '26', 50000, 48000, '../images/item_images/assus vivo v241.webp', 'Windows 11 Home\r\nIntel Core i3\r\nRAM 8 GB DDR4\r\n23.8 Inch Display'),
(25, 'Entwino core', '26', 12000, 10000, '../images/item_images/Entwino intel core.webp', 'Processor Type: Intel 2.8 GHz\r\n4 GB Nvidia 730 Graphics\r\nQuad Core Mid Tower\r\n16 GB DDR3 RAM\r\nHard Disk Capacity: 1 TB\r\nSSD Capacity: 120 GB'),
(26, 'zebronics cpu ', '26', 17000, 15000, '../images/item_images/f1-4gb-500gb-i3-530-zoonis-.webp', 'intel Core i5 (8 GB / 500 GB / Windows 10)\r\n Assembled Desktop Computer\r\n  (17 inch Display)'),
(27, 'Punta seltos ', '26', 20000, 18000, '../images/item_images/gaming-desktop-punta-.jpeg', 'Windows 10 Pro\r\nIntel Core i5\r\nHDD Capacity 500 GB\r\nRAM 8 GB DDR3\r\n18.5 inch Display'),
(28, 'Apple 2021 i mac ', '26', 150000, 130000, '../images/item_images/mgtf3hn-a-apple 2021.webp', 'Mac OS Big Sur\r\nApple M1\r\nRAM 8 GB Unified\r\n24 inch Display'),
(29, 'LED', '31', 20000, 15000, '../images/item_images/28055f4aaa1c07298a6e568faa28ff8a.jpg', 'Best Led in the world'),
(30, 'SAMSUNG 80 cm (32 Inch) HD Ready LED Smart Tizen TV with Bezel-free Design  (UA32T4380AKXXL)', '34', 15000, 12000, '../images/item_images/samsung80 cm .jpg', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Tizen\r\n'),
(31, 'SAMSUNG Crystal 4K Neo Series 108 cm (43 inch) Ultra HD (4K) LED Smart Tizen TV with Voice Search  (UA43AUE65AKXXL)', '34', 30000, 25000, '../images/item_images/samsung 4k .jpg', 'SAMSUNG Crystal 4K Neo Series 108 cm (43 inch) Ultra HD (4K) LED Smart Tizen TV with Voice Search  (UA43AUE65AKXXL)\r\nSupported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Tizen\r\nResolution: Ultra HD (4K) Crystal 4K FE UHD (3840 x 2160) Pixels\r\nSound Output: 20 W\r\nRefresh Rate: 50 Hz\r\n'),
(32, 'Blaupunkt 139 cm (55 inch) QLED Ultra HD (4K) Smart Google TV With Dolby Atmos & Far-Field Mic  (55QD7020)', '34', 40000, 38000, '../images/item_images/blaupunkt.png', 'Blaupunkt 139 cm (55 inch) QLED Ultra HD (4K) Smart Google TV With Dolby Atmos & Far-Field Mic  (55QD7020)\r\nSupported Apps: Netflix|Prime Video|Disney+Hotstar\r\nOperating System: Google TV\r\n'),
(33, 'SONY Bravia 163.9 cm (65 inch) Ultra HD (4K) LED Smart Google TV  (KD-65X75K)', '30', 75000, 70000, '../images/item_images/sony 4k .jpg', 'SONY Bravia 163.9 cm (65 inch) Ultra HD (4K) LED Smart Google TV  (KD-65X75K)\r\nSupported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Google TV\r\n'),
(34, 'Men Regular Fit Washed Cut Away Collar Casual Shirt					', '35', 499, 0, '../images/item_images/topwear.png', 'Men Regular Fit Washed Cut Away Collar Casual Shirt					\r\n'),
(35, '\"Men Printed Hooded Neck Dark Blue T-Shirt 399\"', '35', 499, 399, '../images/item_images/prited hoodded .png', '\"Men Printed Hooded Neck Dark Blue T-Shirt\r\n\r\n'),
(36, 'Men Color Block Round Neck Blue, Black T-Shirt', '35', 599, 399, '../images/item_images/round neck .png', 'Men Color Block Round Neck Blue, Black T-Shirt\r\n'),
(37, 'Men Regular Fit Solid Button Down Collar Formal Shirt', '35', 499, 399, '../images/item_images/Men Regular Fit Solid Button Down Collar Formal Shirt.png', 'Men Regular Fit Solid Button Down Collar Formal Shirt\r\n'),
(38, 'Embellished Banarasi Jacquard Saree  (Light Blue)', '36', 999, 799, '../images/item_images/Band collar Women Blouse.png', 'Embellished Banarasi Jacquard Saree  (Light Blue)\r\n'),
(40, 'Band collar Women Blouse', '', 2000, 1500, '../images/item_images/saree .png', 'Band collar Women Blouse\r\n'),
(41, 'Women Kurta and Trousers Set Cotton Blend', '36', 999, 699, '../images/item_images/Women Kurta and Trousers Set Cotton Blend.png', 'Women Kurta and Trousers Set Cotton Blend\r\n'),
(42, 'Embellished Banarasi Jacquard Saree  (Light Blue)', '36', 1200, 999, '../images/item_images/Women Printed Viscose Rayon Straight Kurta  (Blue).png', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `address_id` varchar(100) NOT NULL,
  `order_time` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoping_cart`
--

CREATE TABLE `shoping_cart` (
  `Sr.` int(10) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `item_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoping_wishlist`
--

CREATE TABLE `shoping_wishlist` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `Sr` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sr`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Sr`),
  ADD UNIQUE KEY `mob` (`mob`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_customers` (`userid`);

--
-- Indexes for table `shoping_cart`
--
ALTER TABLE `shoping_cart`
  ADD PRIMARY KEY (`Sr.`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`Sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Sr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `shoping_cart`
--
ALTER TABLE `shoping_cart`
  MODIFY `Sr.` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `Sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`userid`) REFERENCES `customers` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
