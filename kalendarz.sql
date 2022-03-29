-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Mar 2022, 11:26
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kalendarz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kalendarze`
--

CREATE TABLE `kalendarze` (
  `id` int(11) NOT NULL,
  `kolor` varchar(255) NOT NULL,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kalendarze`
--

INSERT INTO `kalendarze` (`id`, `kolor`, `nazwa`) VALUES
(1, '#ffffff', 'cal1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydarzenia`
--

CREATE TABLE `wydarzenia` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `opis` mediumtext NOT NULL,
  `powtarzanie` set('week','month','year') DEFAULT NULL,
  `kalendarz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zadania`
--

CREATE TABLE `zadania` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `opis` mediumtext NOT NULL,
  `waga` set('normal','high','veryhigh') NOT NULL DEFAULT 'normal',
  `kalendarz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zadania`
--

INSERT INTO `zadania` (`id`, `nazwa`, `data`, `opis`, `waga`, `kalendarz_id`) VALUES
(1, 'zad1', '2022-07-05', 'xd', 'normal', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kalendarze`
--
ALTER TABLE `kalendarze`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kalendarz_id_wydarzenia` (`kalendarz_id`);

--
-- Indeksy dla tabeli `zadania`
--
ALTER TABLE `zadania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kalendarz_id` (`kalendarz_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kalendarze`
--
ALTER TABLE `kalendarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zadania`
--
ALTER TABLE `zadania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  ADD CONSTRAINT `FK_kalendarz_id_wydarzenia` FOREIGN KEY (`kalendarz_id`) REFERENCES `kalendarze` (`id`);

--
-- Ograniczenia dla tabeli `zadania`
--
ALTER TABLE `zadania`
  ADD CONSTRAINT `FK_kalendarz_id` FOREIGN KEY (`kalendarz_id`) REFERENCES `kalendarze` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
