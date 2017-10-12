-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 okt 2017 kl 11:15
-- Serverversion: 10.1.19-MariaDB
-- PHP-version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `annonser`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `annons`
--

CREATE TABLE `annons` (
  `ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `telnr` text NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `category` text,
  `description` text,
  `picture` text,
  `price` decimal(10,0) NOT NULL,
  `date` date DEFAULT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `annons`
--

INSERT INTO `annons` (`ID`, `email`, `telnr`, `name`, `title`, `category`, `description`, `picture`, `price`, `date`, `Password`) VALUES
(1, 'perolaf@Dad.dad', '666420690071232425', 'Per Olaf Dadson', 'toaletstol', 'För Hemmet', 'en toalett', 'dad.png', '456', '2017-10-04', '123'),
(2, 'perolaf@gmail.com', '65124216216521', 'Per Olaf Jansson', 'Toalettstol', 'För Hemmet', 'En fin toalettstol gjord för en tysk Federation', 'Per.png', '899', '2017-10-09', '1234'),
(5, 'James.GoodBoi@Gmail.cot', '+1135624624', 'James McGareth', '50 Caliber Sniper Rifle', 'Fritid Och Hobby', 'A McMillan TAC-50 made out of wood from the great southern United States', 'jpg.png', '125234', '2017-10-11', '123'),
(3, 'rameneater@japan.jp', '+8161325125125465', 'Jake Hirohito', 'Hentai Collection', 'Personligt', 'a nice collection of high tech hentai', 'tentacle.png', '1500', '2017-10-25', '123'),
(4, '	perolaf@gmail.com', '1234125612', 'PER DEN Lille', 'påskbrev', 'Fritid Och Hobby', 'ett vanligt påskbrev', 'brev.jpeg', '10000', '2018-04-02', '123');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `annons`
--
ALTER TABLE `annons`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `annons`
--
ALTER TABLE `annons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
