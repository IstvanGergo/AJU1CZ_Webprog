-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 11. 12:52
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `handyman searcher`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cities`
--

CREATE TABLE `cities` (
  `City_ID` int(11) NOT NULL,
  `City_Name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `cities`
--

INSERT INTO `cities` (`City_ID`, `City_Name`) VALUES
(2, 'Budapest'),
(4, 'Debrecen'),
(3, 'Fót'),
(7, 'Győr'),
(1, 'Kecskemét'),
(8, 'Nyíregyháza'),
(6, 'Pécs'),
(5, 'Szeged'),
(9, 'Székesfehérvár'),
(10, 'Szombathely');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cities_handymans`
--

CREATE TABLE `cities_handymans` (
  `Handyman_ID` int(11) NOT NULL,
  `City_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `cities_handymans`
--

INSERT INTO `cities_handymans` (`Handyman_ID`, `City_ID`) VALUES
(118, 1),
(118, 2),
(118, 3),
(119, 4),
(119, 5),
(120, 6),
(121, 7),
(121, 8),
(122, 9),
(123, 10),
(124, 1),
(124, 3),
(124, 5),
(125, 2),
(125, 4),
(125, 6),
(126, 7),
(126, 9),
(127, 8),
(127, 10),
(128, 1),
(128, 2),
(128, 3),
(129, 4),
(129, 5),
(130, 6),
(130, 7),
(131, 8),
(132, 9),
(133, 10),
(134, 1),
(134, 2),
(134, 3),
(135, 4),
(135, 5),
(136, 6),
(137, 7),
(138, 8),
(139, 9),
(139, 10),
(140, 1),
(141, 2),
(141, 3),
(142, 4),
(143, 5),
(143, 6),
(144, 7),
(144, 8),
(145, 9),
(146, 10),
(147, 1),
(148, 2),
(148, 3),
(149, 4),
(149, 5),
(150, 6),
(151, 7),
(152, 8),
(152, 9),
(153, 10),
(154, 1),
(154, 2),
(155, 3),
(155, 4),
(156, 5),
(156, 6);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `handymans`
--

CREATE TABLE `handymans` (
  `Handyman_ID` int(11) NOT NULL,
  `Handyman_Name` varchar(60) NOT NULL,
  `Handyman_Phonenum` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `handymans`
--

INSERT INTO `handymans` (`Handyman_ID`, `Handyman_Name`, `Handyman_Phonenum`) VALUES
(118, 'János', '+36963357589'),
(119, 'Péter', '+36900985470'),
(120, 'András', '+36614854617'),
(121, 'Gábor', '+36371316706'),
(122, 'Zoltán', '+36012019708'),
(123, 'István', '+36946148456'),
(124, 'Károly', '+36694683184'),
(125, 'Tamás', '+36634970585'),
(126, 'Miklós', '+36090803404'),
(127, 'Gyula', '+36549105296'),
(128, 'Ferenc', '+36473116299'),
(129, 'Béla', '+36718265639'),
(130, 'László', '+36171979328'),
(131, 'Zsolt', '+36705099756'),
(132, 'Balázs', '+36009560827'),
(133, 'Attila', '+36932504896'),
(134, 'Mihály', '+36633842033'),
(135, 'Gergő', '+36371695509'),
(136, 'Sándor', '+36956951476'),
(137, 'Norbert', '+36669670885'),
(138, 'Roland', '+36477500026'),
(139, 'Ádám', '+36378487508'),
(140, 'Dávid', '+36459937491'),
(141, 'Lajos', '+36164224965'),
(142, 'Ernő', '+36441312383'),
(143, 'Márk', '+36713887050'),
(144, 'György', '+36245498133'),
(145, 'Endre', '+36085829544'),
(146, 'Pál', '+36692653355'),
(147, 'Bence', '+36205778175'),
(148, 'József', '+36950930839'),
(149, 'Ottó', '+36137319701'),
(150, 'Viktor', '+36833806021'),
(151, 'Barnabás', '+36757071034'),
(152, 'Antal', '+36283937138'),
(153, 'Kornél', '+36148472620'),
(154, 'Richárd', '+36890551715'),
(155, 'Milán', '+36007340749'),
(156, 'Dániel', '+36365048631');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `handymans_professions`
--

CREATE TABLE `handymans_professions` (
  `Handyman_ID` int(11) NOT NULL,
  `Profession_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `handymans_professions`
--

INSERT INTO `handymans_professions` (`Handyman_ID`, `Profession_ID`) VALUES
(118, 13),
(118, 14),
(118, 15),
(119, 16),
(119, 17),
(120, 18),
(120, 19),
(120, 20),
(121, 21),
(121, 22),
(122, 23),
(123, 24),
(124, 13),
(124, 15),
(124, 17),
(125, 14),
(125, 16),
(125, 18),
(126, 19),
(126, 21),
(126, 23),
(127, 20),
(127, 22),
(127, 24),
(128, 13),
(128, 14),
(128, 15),
(129, 16),
(129, 17),
(129, 18),
(130, 19),
(130, 20),
(130, 21),
(131, 22),
(131, 23),
(132, 24),
(133, 13),
(133, 14),
(134, 15),
(135, 16),
(135, 17),
(136, 18),
(136, 19),
(137, 20),
(137, 21),
(137, 22),
(138, 23),
(138, 24),
(139, 13),
(139, 14),
(139, 15),
(140, 16),
(140, 17),
(141, 18),
(141, 19),
(141, 20),
(142, 21),
(142, 22),
(143, 23),
(143, 24),
(144, 13),
(144, 14),
(144, 15),
(145, 16),
(145, 17),
(145, 18),
(146, 19),
(146, 20),
(146, 21),
(147, 22),
(147, 23),
(147, 24),
(148, 13),
(148, 14),
(148, 15),
(149, 16),
(149, 17),
(149, 18),
(150, 19),
(150, 20),
(151, 21),
(151, 22),
(152, 23),
(152, 24),
(153, 13),
(153, 14),
(154, 15),
(154, 16),
(155, 17),
(155, 18),
(156, 19),
(156, 20);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `professions`
--

CREATE TABLE `professions` (
  `Profession_ID` int(11) NOT NULL,
  `Profession_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `professions`
--

INSERT INTO `professions` (`Profession_ID`, `Profession_Name`) VALUES
(13, 'Asztalos'),
(14, 'Ács'),
(15, 'Burkoló'),
(16, 'Festő'),
(17, 'Fűtésszerelő'),
(18, 'Gázszerelő'),
(19, 'Kertész'),
(20, 'Lakatos'),
(21, 'Ötvös'),
(22, 'Szabó'),
(23, 'Villanyszerelő'),
(24, 'Vízszerelő');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Surname` varchar(25) NOT NULL,
  `User_Forename` varchar(30) NOT NULL,
  `User_Password` varchar(256) NOT NULL,
  `User_Handyman_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`User_ID`, `User_Name`, `User_Email`, `User_Surname`, `User_Forename`, `User_Password`, `User_Handyman_ID`) VALUES
(2, 'asd', 'asd@asd.hu', 'asd', 'dsa', 'asda', NULL),
(6, 'kutyacica', 'kutya@cica', 'kutya', 'cica', '$2y$10$3iyoydL5iWohBshWck0L0O52PlZgbOVlAYmdm3fRFylfOxwsyYij6', NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`City_ID`),
  ADD UNIQUE KEY `City_Name` (`City_Name`),
  ADD KEY `City_ID` (`City_ID`);

--
-- A tábla indexei `cities_handymans`
--
ALTER TABLE `cities_handymans`
  ADD KEY `Handyman_ID` (`Handyman_ID`,`City_ID`),
  ADD KEY `City_ID` (`City_ID`);

--
-- A tábla indexei `handymans`
--
ALTER TABLE `handymans`
  ADD PRIMARY KEY (`Handyman_ID`),
  ADD UNIQUE KEY `Handyman_Phonenum` (`Handyman_Phonenum`);

--
-- A tábla indexei `handymans_professions`
--
ALTER TABLE `handymans_professions`
  ADD KEY `Handyman_ID` (`Handyman_ID`,`Profession_ID`),
  ADD KEY `Profession_ID` (`Profession_ID`);

--
-- A tábla indexei `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`Profession_ID`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_Email` (`User_Email`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cities`
--
ALTER TABLE `cities`
  MODIFY `City_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `handymans`
--
ALTER TABLE `handymans`
  MODIFY `Handyman_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT a táblához `professions`
--
ALTER TABLE `professions`
  MODIFY `Profession_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cities_handymans`
--
ALTER TABLE `cities_handymans`
  ADD CONSTRAINT `cities_handymans_ibfk_3` FOREIGN KEY (`City_ID`) REFERENCES `cities` (`City_ID`),
  ADD CONSTRAINT `cities_handymans_ibfk_4` FOREIGN KEY (`Handyman_ID`) REFERENCES `handymans` (`Handyman_ID`);

--
-- Megkötések a táblához `handymans_professions`
--
ALTER TABLE `handymans_professions`
  ADD CONSTRAINT `handymans_professions_ibfk_1` FOREIGN KEY (`Handyman_ID`) REFERENCES `handymans` (`Handyman_ID`),
  ADD CONSTRAINT `handymans_professions_ibfk_2` FOREIGN KEY (`Profession_ID`) REFERENCES `professions` (`Profession_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
