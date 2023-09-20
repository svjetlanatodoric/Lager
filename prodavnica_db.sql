-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 11:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodavnica_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

CREATE TABLE `artikal` (
  `ArtikalId` int(11) NOT NULL,
  `Sifra` varchar(50) DEFAULT NULL,
  `Naziv` varchar(50) DEFAULT NULL,
  `JedinicaMjere` char(3) DEFAULT NULL,
  `Barkod` varchar(50) DEFAULT NULL,
  `PLU_KOD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`ArtikalId`, `Sifra`, `Naziv`, `JedinicaMjere`, `Barkod`, `PLU_KOD`) VALUES
(1, '98', 'Jabuka', 'kg', '111222333444', '12212'),
(9, '12', 'Kruska', 'kg', '9998887776661', '12123');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `KorisnikId` int(11) NOT NULL,
  `KorisnickoIme` varchar(50) DEFAULT NULL,
  `Sifra` varbinary(65000) DEFAULT NULL,
  `RolaId` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`KorisnikId`, `KorisnickoIme`, `Sifra`, `RolaId`) VALUES
(167, 'ceca', 0x243279243130247a38423479737a6e6179567872355459796641764e2e764a64545a4d32702e656437314e424b454b6e3950747a544f765676707232, 1),
(196, 'goca ', 0x2432792431302431477669756e55453272764f322f6c327967444262755941544b3979655043637177644c764b555571625665306856704c645a7632, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lager`
--

CREATE TABLE `lager` (
  `LagerId` int(11) NOT NULL,
  `ArtikalId` int(11) DEFAULT NULL,
  `RaspolozivaKolicina` decimal(6,2) DEFAULT NULL,
  `Lokacija` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lager`
--

INSERT INTO `lager` (`LagerId`, `ArtikalId`, `RaspolozivaKolicina`, `Lokacija`) VALUES
(15, 1, '300.00', ' Derventa');

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE `racun` (
  `RacunId` int(11) NOT NULL,
  `RadnikIdIzdao` int(11) NOT NULL,
  `DatumRacuna` datetime NOT NULL,
  `BrojRacuna` varchar(30) DEFAULT NULL,
  `UkupniIznos` decimal(18,2) DEFAULT NULL,
  `IznosPDV` decimal(18,2) DEFAULT NULL,
  `IznosBezPDV` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `racun`
--

INSERT INTO `racun` (`RacunId`, `RadnikIdIzdao`, `DatumRacuna`, `BrojRacuna`, `UkupniIznos`, `IznosPDV`, `IznosBezPDV`) VALUES
(35, 5, '2023-02-20 05:44:16', '0', NULL, NULL, NULL),
(60, 5, '2023-02-20 06:10:58', NULL, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `racunstavka`
--

CREATE TABLE `racunstavka` (
  `RacunId` int(11) NOT NULL,
  `StavkaId` int(11) NOT NULL,
  `ArtikalId` int(11) DEFAULT NULL,
  `Kolicina` decimal(18,2) DEFAULT NULL,
  `Cijena` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `racunstavka`
--

INSERT INTO `racunstavka` (`RacunId`, `StavkaId`, `ArtikalId`, `Kolicina`, `Cijena`) VALUES
(35, 23, 1, '30.00', '3.50');

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

CREATE TABLE `radnik` (
  `RadnikId` int(11) NOT NULL,
  `Ime` varchar(50) DEFAULT NULL,
  `Prezime` varchar(50) DEFAULT NULL,
  `BrojTelefona` varchar(50) DEFAULT NULL,
  `Adresa` varchar(100) DEFAULT NULL,
  `Grad` varchar(50) DEFAULT NULL,
  `Email` varbinary(100) DEFAULT NULL,
  `JMBG` char(13) DEFAULT NULL,
  `KorisnikId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`RadnikId`, `Ime`, `Prezime`, `BrojTelefona`, `Adresa`, `Grad`, `Email`, `JMBG`, `KorisnikId`) VALUES
(5, 'Svjetlana', 'Jaćimović', '065345345', 'G. Barica 56', 'B. Brod', 0x63656361406d61696c, '1116667', 167),
(6, 'Gordana', 'Milovanović', '065333333', '1. Maja bb', 'Derventa', '', '123123123121', 196);

-- --------------------------------------------------------

--
-- Table structure for table `rola`
--

CREATE TABLE `rola` (
  `RolaId` int(11) NOT NULL,
  `NazivRole` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`RolaId`, `NazivRole`) VALUES
(1, 'Admin'),
(2, 'Radnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikal`
--
ALTER TABLE `artikal`
  ADD PRIMARY KEY (`ArtikalId`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`KorisnikId`),
  ADD KEY `RolaId` (`RolaId`);

--
-- Indexes for table `lager`
--
ALTER TABLE `lager`
  ADD PRIMARY KEY (`LagerId`),
  ADD KEY `ArtikalId` (`ArtikalId`);

--
-- Indexes for table `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`RacunId`),
  ADD KEY `RadnikIdIzdao` (`RadnikIdIzdao`);

--
-- Indexes for table `racunstavka`
--
ALTER TABLE `racunstavka`
  ADD PRIMARY KEY (`StavkaId`),
  ADD KEY `ArtikalId` (`ArtikalId`),
  ADD KEY `RacunId` (`RacunId`);

--
-- Indexes for table `radnik`
--
ALTER TABLE `radnik`
  ADD PRIMARY KEY (`RadnikId`),
  ADD KEY `KorisnikId` (`KorisnikId`);

--
-- Indexes for table `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`RolaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `ArtikalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `KorisnikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `lager`
--
ALTER TABLE `lager`
  MODIFY `LagerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `racun`
--
ALTER TABLE `racun`
  MODIFY `RacunId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `racunstavka`
--
ALTER TABLE `racunstavka`
  MODIFY `StavkaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `radnik`
--
ALTER TABLE `radnik`
  MODIFY `RadnikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
  MODIFY `RolaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `rola_korisnika` FOREIGN KEY (`RolaId`) REFERENCES `rola` (`RolaId`);

--
-- Constraints for table `lager`
--
ALTER TABLE `lager`
  ADD CONSTRAINT `artikal_u_lageru` FOREIGN KEY (`ArtikalId`) REFERENCES `artikal` (`ArtikalId`);

--
-- Constraints for table `racun`
--
ALTER TABLE `racun`
  ADD CONSTRAINT `racun_izdao_radnik` FOREIGN KEY (`RadnikIdIzdao`) REFERENCES `radnik` (`RadnikId`);

--
-- Constraints for table `racunstavka`
--
ALTER TABLE `racunstavka`
  ADD CONSTRAINT `artikal_stavka` FOREIGN KEY (`ArtikalId`) REFERENCES `artikal` (`ArtikalId`),
  ADD CONSTRAINT `racun` FOREIGN KEY (`RacunId`) REFERENCES `racun` (`RacunId`);

--
-- Constraints for table `radnik`
--
ALTER TABLE `radnik`
  ADD CONSTRAINT `radnik-je-korisnik` FOREIGN KEY (`KorisnikId`) REFERENCES `korisnik` (`KorisnikId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
