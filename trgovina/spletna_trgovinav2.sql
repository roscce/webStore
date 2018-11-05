-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 13. apr 2017 ob 20.55
-- Različica strežnika: 10.1.16-MariaDB
-- Različica PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `spletna_trgovinav2`
--

-- --------------------------------------------------------

--
-- Struktura tabele `izdelek`
--

CREATE TABLE `izdelek` (
  `ID_izdelek` int(11) NOT NULL,
  `Naziv` varchar(30) DEFAULT NULL,
  `Opis` varchar(100) DEFAULT NULL,
  `cena` float DEFAULT NULL,
  `slika` varchar(500) NOT NULL,
  `ID_kategorije` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `izdelek`
--

INSERT INTO `izdelek` (`ID_izdelek`, `Naziv`, `Opis`, `cena`, `slika`, `ID_kategorije`) VALUES
(9, 'Pisana pomlad', 'Hlace z vzorcem mavrice', 14.98, 'https://s-media-cache-ak0.pinimg.com/564x/70/6e/b6/706eb67e3411d435ad39ff0a597e138d.jpg', 2),
(8, 'Modra majica', 'Navadna modra majica iz bombaza', 9.99, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Blue_Tshirt.jpg/220px-Blue_Tshirt.jpg', 5),
(7, 'Beckham spodnjice', 'Sive spodnje perilo', 15.99, 'http://www.globalblue.com/destinations/italy/rome/article321407.ece/alternates/w614h400/beckham_underwear.jpg', 3),
(10, 'Nike pulover', 'Pulover s kapuco', 19.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYvtgIsoF_NEz1xtC6KVV2-iLb-CREcztrqyK6MJASlnypWEHjvAtu_sw', 1),
(11, 'Ralph Llauren denarnica', 'Denarnica iz 100% usnje', 29.99, 'http://www.simplyluxuryvintage.com/images/D/Ralph%20Lauren%20Designer%20Handbags%20Pass%20Case%20Wallet-RL814X25%20(6).JPG', 4),
(12, 'Antracit', 'Moški pulover s kapuco', 25.99, 'http://www.matterhorn.si/155695-thickbox_default/moski-pulover-s-kapuco-antracit-bx2331.jpg', 1),
(13, 'Havaji majica', 'Majica z vzorcem palm', 9.99, 'http://lp2.hm.com/hmprod?set=source[/model/2017/E00%200481651%20001%2028%203129.jpg],type[STILLLIFE_FRONT]&hmver=1&call=url[file:/product/main]', 5),
(14, 'Denim kratke hlace', 'Hlace iz denima, 5 zepov', 10.99, 'http://lp2.hm.com/hmprod?set=source[/model/2017/E00%200250457%20010%2094%202996.jpg],type[STILLLIFE_FRONT]&hmver=1&call=url[file:/product/main]', 2),
(15, 'NY kapa', 'Kapa iz bombaza', 6.99, 'http://lp2.hm.com/hmprod?set=source[/model/2017/E00%200502518%20001%2060%201827.jpg],type[STILLLIFE_FRONT]&hmver=1&call=url[file:/product/main]', 4),
(16, 'Vikend torba', 'Torba za vsak dan', 35.99, 'http://lp2.hm.com/hmprod?set=source[/model/2016/E00%200474970%20001%2065%201260.jpg],type[STILLLIFE_FRONT]&hmver=1&call=url[file:/product/main]', 4),
(17, 'Siva majica', 'Navadna siva majica iz bombaza', 7.99, 'http://lp2.hm.com/hmprod?set=source[/model/2017/E00%200447751%20007%2094%202577.jpg],type[STILLLIFE_FRONT]&hmver=1&call=url[file:/product/main]', 5),
(18, 'Bela majica', 'Navadna bela majica iz bombaza', 7.99, 'http://lp2.hm.com/hmprod?set=source[/model/2016/D00%200141643%20001%2062%203910.jpg],type[STILLLIFE_FRONT]&hmver=1&call=url[file:/product/main]', 5),
(19, 'Tri barvni komplet ', 'Komplet spodnjega perila v treh barvah', 8.99, 'http://lp2.hm.com/hmprod?set=source[/model/2016/E00%200455706%20008%2000%202275.jpg],type[STILLLIFE_FRONT]&hmver=0&call=url[file:/product/main]', 3),
(20, 'XO pulover', 'Crni pulover z napisom XO', 29.99, 'http://lp2.hm.com/hmprod?set=source[/model/2017/E00%200482064%20001%2038%201765.jpg],type[STILLLIFE_FRONT]&hmver=2&call=url[file:/product/main]', 1),
(21, 'Metallica pulover', 'Pulover z logotom metallice na prednji strani', 34.99, 'http://lp2.hm.com/hmprod?set=source[/model/2016/E00%200417418%20007%2082%202224.jpg],type[STILLLIFE_FRONT]&hmver=3&call=url[file:/product/style]', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `kategorija`
--

CREATE TABLE `kategorija` (
  `ID_kategorije` int(11) NOT NULL,
  `im_kategorije` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `kategorija`
--

INSERT INTO `kategorija` (`ID_kategorije`, `im_kategorije`) VALUES
(1, 'pulovrji'),
(2, 'hlace'),
(3, 'spodnje perilo'),
(4, 'dodatki'),
(5, 'majice');

-- --------------------------------------------------------

--
-- Struktura tabele `login`
--

CREATE TABLE `login` (
  `ID_uporabnika` int(11) NOT NULL,
  `Uporabnisko_ime` varchar(30) NOT NULL,
  `geslo` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `login`
--

INSERT INTO `login` (`ID_uporabnika`, `Uporabnisko_ime`, `geslo`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabele `nakup`
--

CREATE TABLE `nakup` (
  `ID_nakupa` int(11) NOT NULL,
  `datum_nakupa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `znesek` float DEFAULT NULL,
  `ID_stranke` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `postavka`
--

CREATE TABLE `postavka` (
  `ID_postavke` int(11) NOT NULL,
  `ID_izdelka` int(11) NOT NULL,
  `ID_nakupa` int(11) NOT NULL,
  `stevilo_kosov` int(11) DEFAULT NULL,
  `cena` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabele `stranka`
--

CREATE TABLE `stranka` (
  `ID_stranke` int(11) NOT NULL,
  `Ime` varchar(20) DEFAULT NULL,
  `Priimek` varchar(20) DEFAULT NULL,
  `GSM` char(9) DEFAULT NULL,
  `Stacionarni_telefon` char(9) DEFAULT NULL,
  `Naslov` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `Postna_stevilka` char(4) DEFAULT NULL,
  `spol` char(1) DEFAULT NULL,
  `ID_uporabnika` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `stranka`
--

INSERT INTO `stranka` (`ID_stranke`, `Ime`, `Priimek`, `GSM`, `Stacionarni_telefon`, `Naslov`, `email`, `Postna_stevilka`, `spol`, `ID_uporabnika`) VALUES
(1, 'admin', 'admin', '0', '0', 'admin', 'admin', '0000', 'm', 1);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `izdelek`
--
ALTER TABLE `izdelek`
  ADD PRIMARY KEY (`ID_izdelek`),
  ADD UNIQUE KEY `ID_izdelek` (`ID_izdelek`),
  ADD KEY `ID_kategorije` (`ID_kategorije`);

--
-- Indeksi tabele `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`ID_kategorije`),
  ADD UNIQUE KEY `ID_kategorije` (`ID_kategorije`);

--
-- Indeksi tabele `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_uporabnika`),
  ADD UNIQUE KEY `ID_uporabnika` (`ID_uporabnika`);

--
-- Indeksi tabele `nakup`
--
ALTER TABLE `nakup`
  ADD PRIMARY KEY (`ID_nakupa`),
  ADD UNIQUE KEY `ID_nakupa` (`ID_nakupa`),
  ADD KEY `ID_stranke` (`ID_stranke`);

--
-- Indeksi tabele `postavka`
--
ALTER TABLE `postavka`
  ADD PRIMARY KEY (`ID_postavke`),
  ADD UNIQUE KEY `ID_postavke` (`ID_postavke`),
  ADD KEY `ID_izdelka` (`ID_izdelka`),
  ADD KEY `ID_nakupa` (`ID_nakupa`);

--
-- Indeksi tabele `stranka`
--
ALTER TABLE `stranka`
  ADD PRIMARY KEY (`ID_stranke`),
  ADD UNIQUE KEY `ID_stranke` (`ID_stranke`),
  ADD KEY `ID_uporabnika` (`ID_uporabnika`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `izdelek`
--
ALTER TABLE `izdelek`
  MODIFY `ID_izdelek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT tabele `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `ID_kategorije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT tabele `login`
--
ALTER TABLE `login`
  MODIFY `ID_uporabnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT tabele `nakup`
--
ALTER TABLE `nakup`
  MODIFY `ID_nakupa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT tabele `postavka`
--
ALTER TABLE `postavka`
  MODIFY `ID_postavke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT tabele `stranka`
--
ALTER TABLE `stranka`
  MODIFY `ID_stranke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
