-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 29. 09 2016 kl. 15:06:36
-- Serverversion: 10.1.10-MariaDB
-- PHP-version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profiler`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Navn` varchar(25) NOT NULL,
  `Brugernavn` varchar(25) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `Navn`, `Brugernavn`, `Password`, `Email`) VALUES
(12, '2', '2', '$2y$10$ya/Jp.0SXLuj3r2u1e6cROetFRhyOZzObHZvGHfDGJ9a6Bs1veJ7K', '2'),
(13, 'x', 't', '$2y$10$H5lyK8Zfh3YFzEl3KpqtiO8GjOx6a73lssTYy9LLXqi0a9zuMJMJK', '5'),
(14, 'r', 'r', '$2y$10$zlASKbCPvBvrAN.C/iQwU.6qj/IcFr8v0CqA/SdTwIt1MKLG9J9g6', '3'),
(15, 'f', 'd', '$2y$10$Joszkhy4dyDEmfAP6SRRveg5T/Ezws9UHXIT5CFJZhydMjZfbzDzK', 'f');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Brugernavn` (`Brugernavn`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
