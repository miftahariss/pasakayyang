-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 29 Okt 2015 pada 11.09
-- Versi Server: 5.5.44-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `pasakayyang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `filename` varchar(125) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `id_account`, `title`, `short_desc`, `filename`, `permalink`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 1, 'judul galeri', 'short desc galeri', '1446089343.png', 'judul-galeri', 1446089343, NULL, 1, NULL, 1),
(2, 1, 'judul galeri', 'short desc galeri', '1446089343.png', 'judul-galeri', 1446089343, NULL, 1, NULL, 1),
(3, 1, 'judul galeri', 'short desc galeri', '1446089343.png', 'judul-galeri', 1446089343, NULL, 1, NULL, 1),
(4, 1, 'judul galeri', 'short desc galeri', '1446089343.png', 'judul-galeri', 1446089343, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `update`
--

CREATE TABLE IF NOT EXISTS `update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `body` text NOT NULL,
  `filename` varchar(125) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data untuk tabel `update`
--

INSERT INTO `update` (`id`, `id_account`, `title`, `short_desc`, `body`, `filename`, `permalink`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(49, 1, 'Judul baru aja jangan di apa apain dede', 'sdsdsdsd', '<p>Judul baru aja jangan di apa apain dede</p>\n', '1446030485.png', 'judul-baru-aja-jangan-di-apa-apain-dede', 1446029843, 1446030485, 1, 1, 1),
(50, 1, 'Judul baru aja jangan di apa apain dede', 'sdsdsdsd', '<p>Judul baru aja jangan di apa apain dede</p>\r\n', '1446030485.png', 'judul-baru-aja-jangan-di-apa-apain-dede', 1446029843, 1446030485, 1, 1, 1),
(51, 1, 'Judul baru aja jangan di apa apain dede', 'sdsdsdsd', '<p>Judul baru aja jangan di apa apain dede</p>\r\n', '1446030485.png', 'judul-baru-aja-jangan-di-apa-apain-dede', 1446029843, 1446030485, 1, 1, 1),
(52, 1, 'Judul baru aja jangan di apa apain dede', 'sdsdsdsd', '<p>Judul baru aja jangan di apa apain dede</p>\r\n', '1446030485.png', 'judul-baru-aja-jangan-di-apa-apain-dede', 1446029843, 1446030485, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `role` tinyint(1) DEFAULT NULL COMMENT '1: administrator; 2: editor',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_date`, `modified_date`, `status`, `role`) VALUES
(1, 'digit', 'digit@gramediamajalah.com', 'f7695fc35dc8322c224a1de3d0cc314ef89b78ab', 0, 0, 1, 1),
(2, 'miftahariss', 'miftahariss15@gmail.com', '0ded08c470d4bb6abde9833886905f8d86ca5a2d', 1430999314, NULL, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
