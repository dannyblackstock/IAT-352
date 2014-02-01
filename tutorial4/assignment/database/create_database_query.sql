-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2014 at 07:53 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tutorial`
--
CREATE DATABASE IF NOT EXISTS `tutorial` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tutorial`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `firstName`, `lastName`, `email`) VALUES
(1, 'Faye', 'Holt', 'fholt@acme.com'),
(2, 'Damon', 'Howard', 'dhowaard@acme.com'),
(3, 'Thomas', 'French', 'tfrench@acme.com'),
(4, 'Natasha', 'Pierce', 'npierce@acme.com'),
(5, 'Homer', 'Reyes', 'hreyes@acme.com'),
(6, 'Gerardo', 'Martinez', 'gmartinez@acme.com'),
(7, 'Jenny', 'Mann', 'jmann@acme.com'),
(8, 'Sheryl', 'Erickson', 'serickson@acme.com'),
(9, 'Stella', 'Fuller', 'sfuller@acme.com'),
(10, 'Victoria', 'Wilson', 'vwilson@acme.com');