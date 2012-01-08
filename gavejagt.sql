-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 08. 01 2012 kl. 06:15:00
-- Serverversion: 5.5.16
-- PHP-version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gavejagt`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gj_admins`
--

CREATE TABLE IF NOT EXISTS `gj_admins` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Data dump for tabellen `gj_admins`
--

INSERT INTO `gj_admins` (`id_admin`, `username`, `password`, `email`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gj_events`
--

CREATE TABLE IF NOT EXISTS `gj_events` (
  `id_event` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `organizer` varchar(100) DEFAULT NULL,
  `description` text,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `zone_time` char(255) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Data dump for tabellen `gj_events`
--

INSERT INTO `gj_events` (`id_event`, `name`, `place`, `organizer`, `description`, `start_time`, `end_time`, `zone_time`) VALUES
(1, 'Gavejagt 2012', 'Bruun''s Galleri - M.P. Bruuns Gade 25, 8000 Aarhus C', 'Bruun''s Galleri', 'Beskrivelse af Gavejagt eventet i Bruun''s Galleri', '2012-01-04 10:00:00', '2012-01-11 12:40:00', 'Europe/Copenhagen'),
(2, 'Skattejagt', 'Storcenter Nord - Adresse', 'Storcenter Nord', 'Beskrivelse af Skattejagt eventet i Storcenter Nord', '2011-12-22 10:00:00', '2011-12-22 20:00:00', 'Europe/Copenhagen'),
(8, 'Lang tid til', 'fdghry', 'tnbgvfdwfghn', 'hngbvdcsdgbhjmk,æ-l.,kjhgbfv', '2012-03-14 12:00:00', '2012-03-16 15:00:00', 'Europe/Copenhagen');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gj_join_events_sponsors`
--

CREATE TABLE IF NOT EXISTS `gj_join_events_sponsors` (
  `id_sponsor` int(10) unsigned NOT NULL,
  `id_event` int(10) unsigned NOT NULL,
  `value` int(11) DEFAULT NULL,
  `maxvalue` int(11) DEFAULT NULL,
  `qr_string` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `gj_join_events_sponsors`
--

INSERT INTO `gj_join_events_sponsors` (`id_sponsor`, `id_event`, `value`, `maxvalue`, `qr_string`) VALUES
(1, 1, 20, 10000, 'qr1'),
(1, 2, 15, 15000, 'qr2'),
(2, 1, 10, 5000, 'qr3'),
(3, 1, 13, 20000, 'qr4'),
(3, 2, 16, 12000, 'qr5'),
(4, 2, 16, 12000, 'qr6'),
(2, 8, 10, 20000, 'placeholder QR Code'),
(5, 8, 24, 23000, 'placeholder QR Code');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gj_join_events_users`
--

CREATE TABLE IF NOT EXISTS `gj_join_events_users` (
  `id_user` int(10) unsigned NOT NULL,
  `id_event` int(10) unsigned NOT NULL,
  `id_status` int(10) unsigned NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `qr_string` varchar(40) DEFAULT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `gj_join_events_users`
--

INSERT INTO `gj_join_events_users` (`id_user`, `id_event`, `id_status`, `date`, `qr_string`, `value`) VALUES
(1, 1, 3, '2012-01-04 04:06:42', 'qr1', 20),
(1, 2, 2, '2011-12-22 03:30:00', 'qr2', 0),
(2, 1, 2, '2011-12-20 03:20:00', 'qr3', 0),
(3, 2, 3, '2012-01-04 04:06:51', 'qr5', 16),
(4, 1, 2, '2011-12-20 03:20:00', 'qr1', 0),
(4, 2, 2, '2011-12-22 03:30:00', 'qr2', 0),
(4, 1, 3, '2012-01-04 04:07:11', 'qr4', 13),
(5, 1, 3, '2012-01-04 04:07:20', 'qr4', 13);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gj_sponsors`
--

CREATE TABLE IF NOT EXISTS `gj_sponsors` (
  `id_sponsor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `img_link` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sponsor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Data dump for tabellen `gj_sponsors`
--

INSERT INTO `gj_sponsors` (`id_sponsor`, `name`, `description`, `img_link`, `url`) VALUES
(1, 'BR', 'Legetøj', 'img_br.jpg', 'www.br.dk'),
(2, 'Kvikly', 'Dagligvare', 'img_kvikly.jpg', 'www.kvickly.dk'),
(3, 'Game Stop', 'Spil', 'img_gamestop.jpg', 'gamestop.dk'),
(4, 'Games', 'Spil', 'img_games.jpg', 'games.dk'),
(5, 'Sponsor', 'Beskrivelse test', 'hwang_mi_hee_612.jpg', 'hjemmeside.dk'),
(6, 'EN NY SPONSOR', 'BEKSRIVELÆSEFSDFSD', 'Wallpaper_Hwang_Mi_Hee_10_by_Przemyslav.jpg', 'HJEMMESIDE.DK'),
(7, 'vsdfsdf', 'dsfsdfsdfdfsdf', '361055.jpg', 'dsfsdfsdf.dk'),
(8, 'macron', 'Bla bla bla', 'Unknown.png', 'www.macron.dk');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gj_status`
--

CREATE TABLE IF NOT EXISTS `gj_status` (
  `id_status` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data dump for tabellen `gj_status`
--

INSERT INTO `gj_status` (`id_status`, `title`) VALUES
(1, 'Free'),
(2, 'Pending'),
(3, 'Delivered');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gj_users`
--

CREATE TABLE IF NOT EXISTS `gj_users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `img_link` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Data dump for tabellen `gj_users`
--

INSERT INTO `gj_users` (`id_user`, `name`, `img_link`, `phone`, `email`) VALUES
(1, 'name1', 'img1.jpg', 12345678, 'name1@mail.dk'),
(2, 'name2', 'img2.jpg', 23456789, 'name2@mail.dk'),
(3, 'name3', 'img3.jpg', 34567890, 'name3@mail.dk'),
(4, 'name4', 'img4.jpg', 45678901, 'name4@mail.dk'),
(5, 'name5', 'img5.jpg', 56789012, 'name5@mail.dk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
