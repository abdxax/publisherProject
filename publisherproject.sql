-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 أبريل 2018 الساعة 03:03
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publisherproject`
--

-- --------------------------------------------------------

--
-- بنية الجدول `accept`
--

CREATE TABLE `accept` (
  `id_accept` int(11) NOT NULL,
  `id_statu` int(11) NOT NULL,
  `id_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `accept`
--

INSERT INTO `accept` (`id_accept`, `id_statu`, `id_date`) VALUES
(10, 15, 3),
(11, 16, 7);

-- --------------------------------------------------------

--
-- بنية الجدول `date`
--

CREATE TABLE `date` (
  `id_dates` int(11) NOT NULL,
  `Day` int(11) NOT NULL,
  `Month` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `datepublisher`
--

CREATE TABLE `datepublisher` (
  `id_date` int(11) NOT NULL,
  `Day` int(11) NOT NULL,
  `Month` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `datepublisher`
--

INSERT INTO `datepublisher` (`id_date`, `Day`, `Month`, `Year`) VALUES
(1, 21, 3, 2020),
(2, 5, 3, 2020),
(3, 2, 3, 2017),
(4, 21, 5, 2020),
(5, 7, 3, 2020),
(6, 25, 3, 2020),
(7, 1, 3, 2020);

-- --------------------------------------------------------

--
-- بنية الجدول `details`
--

CREATE TABLE `details` (
  `idDetails` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `Degree` text COLLATE utf8_unicode_ci NOT NULL,
  `majer` text COLLATE utf8_unicode_ci NOT NULL,
  `job` text COLLATE utf8_unicode_ci NOT NULL,
  `paths` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `details`
--

INSERT INTO `details` (`idDetails`, `email`, `name`, `Degree`, `majer`, `job`, `paths`) VALUES
(1, 'aa@aa.a', 'aaasdddddsss', 'aaaa', 'aaaa', 'aaaaa', '../../images/aa@aa.a_ab.jpg'),
(2, 'bb@bb.b', 'Abdulrahman ', 'B.S', 'SWE', 'Developer', '../../images/bb@bb.b_ab.jpg'),
(3, 'asw@ss.s', 'Ali', '', '', '', '../../images/asw@ss.s_happy.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `publishers`
--

CREATE TABLE `publishers` (
  `id_publish` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `viewed` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `publishers`
--

INSERT INTO `publishers` (`id_publish`, `email`, `title`, `abstract`, `viewed`) VALUES
(1, 'aa@aa.a', 'cscscs', '', ''),
(2, 'aa@aa.a', 'cscscs', 'cscscscs', ''),
(3, 'aa@aa.a', 'First', 'Hello for every one this is first publisher for me Thank you for every think', 'Done'),
(4, 'aa@aa.a', 'dsdaaaaaaaaaaaa', 'dddddddddddddddddda', 'Done'),
(5, 'aa@aa.a', 'test3', '333', 'Done'),
(6, 'asw@ss.s', 'sdsd', 'ssss', 'Done');

-- --------------------------------------------------------

--
-- بنية الجدول `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `admin_email` text COLLATE utf8_unicode_ci NOT NULL,
  `id_pus` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `daypublsher` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `status`
--

INSERT INTO `status` (`id_status`, `admin_email`, `id_pus`, `note`, `status`, `daypublsher`) VALUES
(14, 'bb@bb.b', 3, 'ssassa', 'Acceptable', ''),
(15, 'sdsdsd', 2, 'sdsdsd', 'Acceptable', 'Done'),
(16, 'bb@bb.b', 4, 'dfdfdfdfdf', 'Acceptable', 'Done'),
(17, 'bb@bb.b', 5, 'bad ', 'Rejected', ''),
(18, 'bb@bb.b', 6, 'bad ', 'Rejected', '');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`email`, `password`, `role`) VALUES
('aa@aa.a', '202cb962ac59075b964b07152d234b70', 'user'),
('asw@ss.s', '202cb962ac59075b964b07152d234b70', 'user'),
('bb@bb.b', '202cb962ac59075b964b07152d234b70', 'admin'),
('ss@ss.s', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept`
--
ALTER TABLE `accept`
  ADD PRIMARY KEY (`id_accept`),
  ADD UNIQUE KEY `id_statu` (`id_statu`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id_dates`);

--
-- Indexes for table `datepublisher`
--
ALTER TABLE `datepublisher`
  ADD PRIMARY KEY (`id_date`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`idDetails`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id_publish`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `id_pus` (`id_pus`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept`
--
ALTER TABLE `accept`
  MODIFY `id_accept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id_dates` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datepublisher`
--
ALTER TABLE `datepublisher`
  MODIFY `id_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `idDetails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id_publish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
