-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2016 at 07:16 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meterc_vprasalnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `pregovori`
--

CREATE TABLE `pregovori` (
  `id` int(11) NOT NULL,
  `pregovor` text COLLATE utf8_bin NOT NULL,
  `odg_1` float(3,1) NOT NULL DEFAULT '0.0',
  `odg_2` float(3,1) NOT NULL DEFAULT '0.0',
  `odg_3` float(3,1) NOT NULL DEFAULT '0.0',
  `odg_4` float(3,1) NOT NULL DEFAULT '0.0',
  `odg_5` float(3,1) NOT NULL DEFAULT '0.0',
  `odg_125` float(3,1) NOT NULL DEFAULT '0.0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pregovori_resevalci`
--

CREATE TABLE `pregovori_resevalci` (
  `resevalec` smallint(4) NOT NULL,
  `pregovor` smallint(4) NOT NULL,
  `vrstni_red` smallint(4) NOT NULL,
  `odgovor` tinyint(2) DEFAULT NULL,
  `cas` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pregovori_variante`
--

CREATE TABLE `pregovori_variante` (
  `uporabnik` smallint(4) NOT NULL,
  `pregovor` smallint(4) NOT NULL,
  `varianta` text COLLATE utf8_bin NOT NULL,
  `cas` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `resevalci`
--

CREATE TABLE `resevalci` (
  `id` int(11) NOT NULL,
  `spol` varchar(1) COLLATE utf8_bin NOT NULL,
  `rojen` int(11) NOT NULL,
  `odrascal` varchar(64) COLLATE utf8_bin NOT NULL,
  `zivi` varchar(64) COLLATE utf8_bin NOT NULL,
  `izobrazba` varchar(128) COLLATE utf8_bin NOT NULL,
  `koda` varchar(6) COLLATE utf8_bin NOT NULL,
  `vnesen` datetime NOT NULL,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL,
  `reseno` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `vnos_extra`
--

CREATE TABLE `vnos_extra` (
  `resevalec` smallint(6) NOT NULL,
  `tip` tinyint(4) NOT NULL,
  `vnos` text COLLATE utf8_bin NOT NULL,
  `cas` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uporabnik` varchar(32) COLLATE utf8_bin NOT NULL,
  `geslo` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `pregovori`
--
ALTER TABLE `pregovori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pregovori_resevalci`
--
ALTER TABLE `pregovori_resevalci`
  ADD PRIMARY KEY (`resevalec`,`pregovor`),
  ADD KEY `vrstni_red` (`vrstni_red`),
  ADD KEY `resevalec` (`resevalec`,`odgovor`),
  ADD KEY `odgovor` (`odgovor`),
  ADD KEY `pregovor` (`pregovor`);

--
-- Indexes for table `pregovori_variante`
--
ALTER TABLE `pregovori_variante`
  ADD PRIMARY KEY (`uporabnik`,`pregovor`),
  ADD KEY `pregovor` (`pregovor`);

--
-- Indexes for table `resevalci`
--
ALTER TABLE `resevalci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `koda` (`koda`);
ALTER TABLE `resevalci` ADD FULLTEXT KEY `koda_2` (`koda`);

--
-- Indexes for table `vnos_extra`
--
ALTER TABLE `vnos_extra`
  ADD PRIMARY KEY (`resevalec`,`tip`),
  ADD KEY `resevalec` (`resevalec`);
  
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);
  

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resevalci`
--
ALTER TABLE `resevalci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
