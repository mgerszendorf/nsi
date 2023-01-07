-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Sty 2023, 19:17
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `school`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(38) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `admissions`
--

INSERT INTO `admissions` (`id`, `name`, `email`, `phone`, `message`) VALUES
(5, 'Jan Nowak', 'jan@gmail.com', 463974209, 'Proszę o przyjęcie :('),
(6, 'Ania Doruch ', 'ania@gmail.com', 2147483647, 'Hej, jestem zainteresowana. ;)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `course`
--

CREATE TABLE `course` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `start`, `end`, `link`) VALUES
(7, 'Podstawy PHP', 'PHP (Hypertext Preprocessor) jest językiem skryptowym, który jest szeroko stosowany w tworzeniu stron internetowych. Jest on zazwyczaj używany do dodawania dynamicznej funkcjonalności do stron WWW, takiej jak pobieranie danych z bazy danych, obsługa formularzy i inne.', '2023-02-07', '2023-02-14', 'https://www.youtube.com/watch?v=tD0Q5QwoQJI'),
(8, 'Podstawy HTML', 'HTML (Hypertext Markup Language) jest językiem znaczników, który służy do tworzenia i strukturyzacji treści na stronach internetowych. Jest to podstawowy język, z którego korzysta się przy tworzeniu stron WWW.', '2023-02-07', '2023-02-14', 'https://www.youtube.com/watch?v=opNgrPv3Qw8'),
(9, 'Zaawansowany kurs PHP', 'Zaawansowany kurs PHP jest przeznaczony dla programistów, którzy już posiadają podstawową wiedzę z zakresu języka PHP i chcą rozszerzyć swoje umiejętności.\r\n\r\nTematy, które mogą być poruszane w zaawansowanym kursie PHP, to m.in.:\r\n\r\nObsługa baz danych za pomocą PDO (PHP Data Objects)\r\nObsługa plików i funkcje zaawansowanej obsługi plików\r\nTworzenie aplikacji internetowych z wykorzystaniem frameworków takich jak Laravel, Symfony lub Zend', '2023-02-01', '2025-12-24', 'https://www.youtube.com/watch?v=57qh-c1kZm0'),
(10, 'Praktyczne zastosowanie memów ', 'Memy są zazwyczaj obrazkami lub filmami z humorystycznym lub ironicznym podpisem, które są rozpowszechniane w internecie. Są one często używane w mediach społecznościowych, takich jak Facebook, Instagram i Twitter, do rozrywki i przekazywania pewnych idei lub punktów widzenia.', '2023-02-08', '2023-02-23', 'https://i1.kwejk.pl/k/obrazki/2019/02/UD0YilpnI7UW1a0D.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `usertype`, `password`, `phone`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin', 0),
(14, 'Marek Gerszendorf', 'marek@gmail.com', 'student', 'student', 724234101),
(15, 'Eryk Dolajzer', 'eryk@gmail.com', 'student', 'student', 575430298),
(16, 'Kamil Gołębiowski', 'kamil@gmail.com', 'student', 'student', 890512130);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `course`
--
ALTER TABLE `course`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
