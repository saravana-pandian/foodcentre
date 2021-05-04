-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 08:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodcentre`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(63, '34', '35', '19ca14e7ea6328a42e0eb13d585e4c22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(18, 'Pizza', 'Food_Category_604.jpg', 'Yes', 'Yes'),
(19, 'Burger', 'Food_Category_31.jpg', 'Yes', 'Yes'),
(20, 'Puffs', 'Food_Category_485.jpg', 'Yes', 'Yes'),
(21, 'Cakes', 'Food_Category_940.jpg', 'Yes', 'Yes'),
(22, 'Drinks', 'Food_Category_366.webp', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prize` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `prize`, `image_name`, `category_id`, `featured`, `active`) VALUES
(12, 'Sweet Pizza', 'Best Tassty Cooked By XXXXXX foods', '500', 'Food-Name-1525.jpg', 18, 'Yes', 'Yes'),
(13, 'Tomato Pizza', 'Best Tassty Cooked By XXXXXX foods', '200', 'Food-Name-8895.jpg', 18, 'Yes', 'Yes'),
(14, 'bulk Pizza', 'Best Tassty Cooked By XXXXXX foods', '800', 'Food-Name-193.jpg', 18, 'Yes', 'Yes'),
(15, 'Chicken Burger', 'Best Tassty Cooked By XXXXXX foods', '600', 'Food-Name-7288.jpg', 19, 'Yes', 'Yes'),
(16, 'Jumbo Burger', 'Best Tassty Cooked By XXXXXX foods', '900', 'Food-Name-7911.jpg', 19, 'Yes', 'Yes'),
(17, 'sweet Burger', 'Best Tassty Cooked By XXXXXX foods', '300', 'Food-Name-9953.jpg', 19, 'Yes', 'Yes'),
(18, 'loofy Burger', 'Best Tassty Cooked By XXXXXX foods', '500', 'Food-Name-5896.jpg', 19, 'Yes', 'Yes'),
(19, 'Spicy puff', 'Best Tassty Cooked By XXXXXX foods', '150', 'Food-Name-2847.jpg', 20, 'Yes', 'Yes'),
(20, 'Egg Puff', 'Best Tassty Cooked By XXXXXX foods', '450', 'Food-Name-1477.jpg', 20, 'No', 'No'),
(21, 'SWeet Puff', 'Best Tassty Cooked By XXXXXX foods', '900', 'Food-Name-804.jpg', 20, 'Yes', 'Yes'),
(22, 'Love Layered Cake', 'Best Tassty Cooked By XXXXXX foods', '900', 'Food-Name-8859.jpg', 21, 'Yes', 'Yes'),
(23, 'Choclate Mixed cake', 'Best Tassty Cooked By XXXXXX foods', '700', 'Food-Name-549.jpg', 21, 'Yes', 'Yes'),
(24, 'Candy Cakes', 'Best Tassty Cooked By XXXXXX foods', '1200', 'Food-Name-7502.jpg', 21, 'Yes', 'Yes'),
(25, 'Creamie Cazke', 'Best Tassty Cooked By XXXXXX foods', '2000', 'Food-Name-5294.png', 21, 'Yes', 'No'),
(26, 'Lemon Juice', 'Best Juice Made with Fresh juice', '15', 'Food-Name-2580.webp', 22, 'Yes', 'Yes'),
(27, 'Pomegranate Juice', 'Best Tasty food ever made made', '300', 'Food-Name-6952.jpg', 22, 'Yes', 'Yes'),
(28, 'Apple Juice', 'One of the apple with lovely taste', '400', 'Food-Name-9313.jpg', 22, 'Yes', 'Yes'),
(29, 'Orange Juice', 'TAstyiest food ever made in this world', '600', 'Food-Name-3258.jpg', 22, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Chicken Pizza', '500', 4, '2000', '2021-02-20 08:19:46', 'On Delivery', 'saravanadd', '984321324799', 'google@hhh.com', 'anuppanadi'),
(2, 'Chicken Pizza', '500', 1, '500', '2021-02-20 08:28:27', 'Delivered', 'sarvana', '234234234', 'Hi@gm.com', 'dadasda'),
(3, 'Tomato Pizza', '200', 13, '2600', '2021-02-20 08:29:13', 'Canceled', 'gogle', '3245234r23', 'sfas@gm.com', 'faugmarion'),
(4, 'loofy Burger', '500', 2, '1000', '2021-02-21 05:14:58', 'Ordered', 'Dharshini', '8370696', 'saravana@gmail.com', 'banglore, india'),
(5, 'Spicy puff', '150', 3, '450', '2021-04-02 07:34:47', 'On Delivery', 'saravana', '99990ujjj', 'ghgfh@hhh.com', 'sgsdfdfsdfs'),
(6, 'Lemon Juice', '15', 1, '15', '2021-04-17 07:47:28', 'ordered', 'love', '3234234', 'fASDfa@gkg.com', 'ahelliasdlasmdmabscfkjasdfc asljc asc'),
(7, 'Jumbo Burger', '900', 1, '900', '2021-04-17 07:51:54', 'ordered', 'love', '87687687687', 'asdmhas@gmai.com', ',.asmdbafyudvas\r\n'),
(8, 'Jumbo Burger', '900', 1, '900', '2021-04-17 07:52:55', 'ordered', 'love', '87687687687', 'asdmhas@gmai.com', ',.asmdbafyudvas\r\n'),
(9, 'Jumbo Burger', '900', 1, '900', '2021-04-17 08:05:52', 'ordered', 'karnan', '234234324', 'asdasd@fds.com', 'valimangalum'),
(10, 'Tomato Pizza', '200', 1, '200', '2021-04-17 08:08:07', 'ordered', 'adasdwdawdqdawdq2e12', '1231231', 'kjbds@hg.com', 'klnkjhjhjl'),
(11, 'Sweet Pizza', '500', 1, '500', '2021-04-17 08:16:19', 'ordered', 'r', '4', 's@f.com', 'love'),
(12, 'Jumbo Burger', '900', 1, '900', '2021-04-17 08:19:00', 'ordered', 'm', '3', 'g@h.com', 'dasdasdaaaa'),
(13, 'Tomato Pizza', '200', 1, '200', '2021-04-17 08:19:52', 'ordered', 'hello', '8768678', 'sandbkjabsd@h.com', 'jsdnajsbdjla'),
(14, 'Sweet Pizza', '500', 1, '500', '2021-04-17 08:21:06', 'ordered', 'ssdsds', 'sad', '23e@gma.com', 'wdawsd'),
(15, 'Chicken Burger', '600', 1, '600', '2021-04-17 08:21:41', 'ordered', 'd', '3', 'ws@h.com', '23'),
(16, 'Chicken Burger', '600', 1, '600', '2021-04-17 08:22:37', 'ordered', 'helname', '342432', 'f@g.com', 'sdsdsdsdsdsd'),
(17, 'Chicken Burger', '600', 1, '600', '2021-04-17 08:26:20', 'ordered', 'gm', '43', 'f@g.com', 'dsdasdasdas'),
(18, 'Chicken Burger', '600', 1, '600', '2021-04-17 08:27:58', 'ordered', 'gm', '43', 'f@g.com', 'dsdasdasdas'),
(19, 'Chicken Burger', '600', 1, '600', '2021-04-17 08:28:14', 'ordered', 're', '34', 'd@j.com', 'sds'),
(20, 'Chicken Burger', '600', 1, '600', '2021-04-17 08:29:32', 'ordered', 're', '34', 'd@j.com', 'sds'),
(21, 'Chicken Burger', '600', 1, '600', '2021-04-17 08:30:22', 'ordered', 'sda', '343', 'h@j.com', 'kjgtyi'),
(22, 'Sweet Pizza', '500', 1, '500', '2021-04-17 08:31:48', 'ordered', 'lok', '989898', 'h@g.com', 'l'),
(23, 'Sweet Pizza', '500', 1, '500', '2021-04-17 08:32:23', 'ordered', 'kjhjhj', '5476576', 'h@k.com', 'u');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `email_id`, `password`) VALUES
(11, 's', 'd', 'da@gmail.com', '1aabac6d068eef6a7bad3fdf50a05cc8'),
(16, 'google', 'gl', 'g@gmai.com', 'b765db41a014320d9458b8ea2eb0c028');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
