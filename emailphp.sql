-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3307
-- Generation Time: Jul 13, 2020 at 03:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emailphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `mobile`, `password`, `cpassword`, `token`, `status`) VALUES
(1, 'wd', 'ck@dm.xekn', '6494', '$2y$10$R5SCWMbmnmTqll2XdOR4TeOllIV5n4fFdjtQ1HzDC5WfOBRsOCqz6', '$2y$10$Crhe7.0v9Q/fbjalb2N.bOOQpOh2L6WGuOx5zpDU1TTVCKN6jBWxK', '712b4d1f993c752d406da1b10e12d1', 'inactive'),
(2, 'gvgaxf', 'gf@hh.jchyf', '94466', '$2y$10$zKM9V7WDFOHPzgYMaIBuUeBtrXv8PCAWEzZxMnQGrpsCwjL5KaCb2', '$2y$10$x8mfoTUTjnYEfIQp.5UcuedKSufFqsXnEAjaSS75EbijeEKAQY6dq', '5b2826a5066102e27ae501911f8a82', 'inactive'),
(3, 'ncgf', 'bbfc@g.hv', '32631', '$2y$10$UtBAXh/sgiIU6C9XVy5cPOibaNjrNylF75g9GddqZXB1i8OlfCpIa', '$2y$10$WWd5mS1PmdBH6nDO532H1OwABjS0AU/cOD3xXJ490GL/zJSyoJvTa', '8ea70a6953107f2890ffd66f9bff8d', 'inactive'),
(4, 'World', 'destroyerorld@gmail.com', '12345', '$2y$10$OYltb6yWFyE0MJKQMFTIp.jKSiNJ2BG6wa.oi2D06gYFc1EKBhdEC', '$2y$10$bz1BuD00GWt2bDfwNSLDCu/1tQzy/3oxsqAL6DeYiIh9IjKycEzaK', '591028f126e50fc98d1f900fd2ff45', 'active'),
(5, 'Atin', 'atin@atin.com', '2164969746', '$2y$10$zMeGMj.ZyPahqIEKtNi1zexvf6YZLlncJtdS2/Sj50ugiqp1NrsBq', '$2y$10$MMFazYHIsYmyuBN36V0W9.LlrqFfWk5Rk74jtIredoQ4T5I3b2e3u', '5516f06acc1a1d2b4a882a84758ff2', 'inactive'),
(6, 'Atin', 'ayangift1999@gmail.com', '6791649', '$2y$10$ZkwHciFkXvm24LIUDyWp7uZUMdTRrFfIQoM3p/glaEY84.uK293gm', '$2y$10$pf9zZOq1MvQdviC4CM7HQ.ObKgDSXhKW5Xbe0A/VwGPzR69Dg8rBK', '761b030baa55b1e31c0cc526545676', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
