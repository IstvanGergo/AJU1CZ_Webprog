-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 29. 17:48
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

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cities_handymans`
--

CREATE TABLE `cities_handymans` (
  `Handyman_ID` int(11) NOT NULL,
  `City_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `handymans`
--

CREATE TABLE `handymans` (
  `Handyman_ID` int(11) NOT NULL,
  `Handyman_Name` varchar(60) NOT NULL,
  `Handyman_Phonenum` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hanydmans_professions`
--

CREATE TABLE `hanydmans_professions` (
  `Handyman_ID` int(11) NOT NULL,
  `Profession_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `professions`
--

CREATE TABLE `professions` (
  `Profession_ID` int(11) NOT NULL,
  `Profession_Name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'asd', 'asd@asd.hu', 'asd', 'dsa', 'asda', NULL);

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
-- A tábla indexei `hanydmans_professions`
--
ALTER TABLE `hanydmans_professions`
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
  MODIFY `City_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `handymans`
--
ALTER TABLE `handymans`
  MODIFY `Handyman_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `professions`
--
ALTER TABLE `professions`
  MODIFY `Profession_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cities_handymans`
--
ALTER TABLE `cities_handymans`
  ADD CONSTRAINT `cities_handymans_ibfk_1` FOREIGN KEY (`City_ID`) REFERENCES `cities` (`City_ID`);

--
-- Megkötések a táblához `handymans`
--
ALTER TABLE `handymans`
  ADD CONSTRAINT `handymans_ibfk_1` FOREIGN KEY (`Handyman_ID`) REFERENCES `cities_handymans` (`Handyman_ID`);

--
-- Megkötések a táblához `hanydmans_professions`
--
ALTER TABLE `hanydmans_professions`
  ADD CONSTRAINT `hanydmans_professions_ibfk_1` FOREIGN KEY (`Handyman_ID`) REFERENCES `handymans` (`Handyman_ID`),
  ADD CONSTRAINT `hanydmans_professions_ibfk_2` FOREIGN KEY (`Profession_ID`) REFERENCES `professions` (`Profession_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
