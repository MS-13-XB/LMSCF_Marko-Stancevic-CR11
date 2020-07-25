-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jul 2020 um 16:58
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_markostancevic_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_markostancevic_petadoption` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr11_markostancevic_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `ani_id` int(11) NOT NULL,
  `ani_name` varchar(55) NOT NULL,
  `ani_art` varchar(55) NOT NULL,
  `ani_age` int(11) NOT NULL,
  `ani_description` text DEFAULT NULL,
  `ani_type` enum('small','large','senior') DEFAULT NULL,
  `ani_hobbies` varchar(55) NOT NULL,
  `ani_zip_code` int(11) NOT NULL,
  `ani_address` varchar(55) NOT NULL,
  `ani_city` varchar(55) NOT NULL,
  `ani_image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`ani_id`, `ani_name`, `ani_art`, `ani_age`, `ani_description`, `ani_type`, `ani_hobbies`, `ani_zip_code`, `ani_address`, `ani_city`, `ani_image`) VALUES
(1, 'Donatello', 'Turtle', 4, 'He and his brothers are named Teenage Mutant Ninja Turtles. He is on a secret mission, so he needs a safe and trustworthy home.', 'small', 'MartialArts', 1000001, 'NewYorkCity', 'USA', 'images/sma_ani_turtle.jpg'),
(2, 'Speedy', 'rabbit', 3, 'He likes to run and to eat a lot of carrots !', 'small', 'Run', 1000002, 'LooneyTunes', 'USA', 'images/sma_ani_rabbit.jpg'),
(3, 'Sleepy', 'mole', 2, 'She likes to burrow all the day (and all the night) ! :)', 'small', 'Borrow', 1000003, 'Earth', 'Greek', 'images/sma_ani_mole.jpg'),
(4, 'Splinter', 'rat', 5, 'He likes to read old japanese books about martial arts and their history !', 'small', 'MartialArt', 1000004, 'Sewerage', 'USA', 'images/sma_ani_m.jpg'),
(5, 'Gingi', 'Hamster', 4, 'She likes to eat a lot.', 'small', 'Eating', 1000005, 'LivingRoom', 'Italien', 'images/sma_ani_hamster.jpg'),
(6, 'Gamabunta', 'frog', 1, 'He likes to practice the frog kata every day!', 'small', 'ClimbingTrees', 1000006, 'Guerrero', 'SouthMexico', 'images/sma_ani_frog.jpg'),
(7, 'Silver', 'dog', 3, 'She likes to play around and walk a lot.', 'small', 'Playing', 1000007, 'Berlin', 'Germany', 'images/sma_ani_dogge.jpg'),
(8, 'Mikasi', 'Wolf', 4, 'Mikasi, the name comes from the indianer and means \'wihte moon\'! He is very active in the night.', 'large', 'Hunting', 2000001, 'OldRampart', 'Alaska', 'images/lar_ani_wolf.jpg'),
(9, 'Jabucilo', 'horse', 3, 'Jabucil is the horse with wings, he was the horse from duke Momcilo. He dies, so Jabucil need a hero to be flown!', 'large', 'Flying', 2000002, 'Pirlitor', 'Serbia', 'images/lar_ani_horse.jpg'),
(10, 'Saitama', 'Cat', 6, 'Saitama likes to hunting monsters(the little ones), drawing and eating !', 'large', 'painting', 2000003, 'Tokyo', 'Japan', 'images/lar_ani_cat.jpg'),
(11, 'Snowflake', 'Gorilla', 3, 'Snowflake is an albino Gorilla, he has a twinsister named Koko. He likes to climb most of the day.', 'large', 'Climbing', 2000004, 'SpanishGuinea', 'Afrika', 'images/lar_ani_gorila1.jpg'),
(12, 'Koko', 'Gorilla', 3, 'Koko is the twin-sister of Snowflake, she likes reading and speaking !', 'large', 'Speaking', 2000005, 'SpanishGuinea', 'Afrika', 'images/lar_ani_gorila2.jpg'),
(13, 'Dambo', 'Elephant', 6, 'He lost his mother in early years, he likes to play with water and eating peanuts!', 'large', 'Waterfeatures', 2000006, 'Kongo', 'Afrika', 'images/lar_ani_elefant3.jpg'),
(14, 'Carlos', 'Pavian', 2, 'She likes siting and enjoyng the view and especially the wind trough her hide.', 'large', 'Relaxing', 2000007, 'Kongo', 'Afrika', 'images/lar_ani_pavian.jpg'),
(15, 'Fleki', 'dog', 8, 'Fleki is an australian Shepherd-dog. She is very smart and likes to be outdoor the hole day.', 'senior', 'Hunting', 3000001, 'OldRampart', 'Alaska', 'images/sen_ani_Australian_Shepherd.jpg'),
(16, 'Barley', 'capricorn', 8, 'He likes to take sunbathes and enjoy the sun.', 'senior', 'sunbathing', 3000002, 'Alpen', 'Austria', 'images/sen_ani_capricorn.jpg'),
(17, 'Garfield', 'Cat', 11, 'She likes to do nothing and to eat a lot.', 'senior', 'Eating', 3000003, 'Dublin', 'Irland', 'images/sen_ani_cat.jpg'),
(18, 'Soko', 'owl', 10, 'She likes to scare all the small animals, becaus she looks like an eagle.', 'senior', 'Scaring', 3000004, 'OldRampart', 'Alaska', 'images/sen_ani_owl.jpg'),
(19, 'Smiley', 'horse', 12, 'She likes to laugh and to talk a lot of jokes.', 'senior', 'Laughing', 3000005, 'Amsterdam', 'Netherland', 'images/sen_ani_horse.jpg'),
(20, 'Pluma', 'parrot', 13, 'He is very inteligent and he likes to learn languages !', 'senior', 'Learning', 3000006, 'Para', 'Brazil', 'images/sen_ani_parrot.jpg'),
(21, 'Sky&Sea', 'parrots', 14, 'Sky and Sea were a couple for a long time, theyjust like to found a place to enjoying the togetherness.\r\n', 'senior', 'BeTogether', 3000007, 'Amazonija', 'Brazil', 'images/sen_ani_parrotCouple.jpg'),
(25, 'test3', 'test', 2, 'test', 'small', 'test', 12234, 'test', 'test', 'ani_img'),
(27, 'test3', 'test', 2, 'test', 'large', 'test', 123, 'test', 'test', 'ani_img'),
(30, 'test', 'test', 4, 'test', 'senior', 'test', 12345, 'test', 'test', 'ani_img');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `user_email` varchar(55) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_status` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_status`) VALUES
(1, 'Leonidas', 'leonidas@mail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'admin'),
(2, 'TEST', 'test@mail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'user'),
(3, 'Mikey', 'mikey@mail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`ani_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `ani_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
