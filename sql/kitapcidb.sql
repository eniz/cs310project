-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 04 Mayıs 2012 saat 00:13:45
-- Sunucu sürümü: 5.1.57
-- PHP Sürümü: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `kitapci_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `KategoriID` int(50) NOT NULL AUTO_INCREMENT,
  `KategoriAdi` varchar(100) NOT NULL,
  PRIMARY KEY (`KategoriID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`KategoriID`, `KategoriAdi`) VALUES
(1, 'Web Programlama'),
(2, 'Mobil Programlama'),
(3, 'Java'),
(4, 'C,C++,C#'),
(5, 'Database'),
(6, 'Network');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `KullaniciID` int(11) NOT NULL AUTO_INCREMENT,
  `KullaniciAdi` varchar(24) NOT NULL,
  `Parola` varchar(24) NOT NULL,
  `Eposta` varchar(64) NOT NULL,
  `yetki` varchar(100) NOT NULL,
  PRIMARY KEY (`KullaniciID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`KullaniciID`, `KullaniciAdi`, `Parola`, `Eposta`, `yetki`) VALUES
(1, 'admin', '123', 'eniz@kitapcenneti.com', '100'),
(2, 'ebru', '123', 'ebru@kitapcenneti.com', '1'),
(4, 'yunus', '123456', 'yunus@kitapcenneti.com', '1'),
(8, 'kamil', '123', 'kamil@kitapcenneti.com', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE IF NOT EXISTS `mesaj` (
  `MesajID` int(11) NOT NULL AUTO_INCREMENT,
  `Ad` varchar(50) NOT NULL,
  `Soyad` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefon` varchar(30) NOT NULL,
  `Mesaj` varchar(500) NOT NULL,
  PRIMARY KEY (`MesajID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`MesajID`, `Ad`, `Soyad`, `Email`, `Telefon`, `Mesaj`) VALUES
(1, 'Eniz', 'Gülek', 'eniz@kitapcenneti.com', '05545400260', 'Kitaplarınız çok kaliteli...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE IF NOT EXISTS `urun` (
  `UrunID` int(11) NOT NULL AUTO_INCREMENT,
  `Adi` varchar(50) NOT NULL,
  `Yayinevi` varchar(20) NOT NULL,
  `Yazar` varchar(20) NOT NULL,
  `Resim` varchar(100) NOT NULL,
  `Fiyat` double NOT NULL,
  `KategoriID` int(11) NOT NULL,
  `Download` varchar(100) NOT NULL,
  PRIMARY KEY (`UrunID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`UrunID`, `Adi`, `Yayinevi`, `Yazar`, `Resim`, `Fiyat`, `KategoriID`, `Download`) VALUES
(1, 'Learning PHP, MySQL, and JavaScript', 'OReilly', 'Robin Nixon', 'img/urunler/kitap1.jpg', 24, 1, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(2, 'PHP Cookbook', 'OReilly', 'Adam Trachtenberg', 'img/urunler/kitap2.jpg', 24, 1, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(3, 'Beginning PHP and MySQL', 'Apress', 'W. Jason Gilmore ', 'img/urunler/kitap3.jpg', 32, 1, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(4, 'Beginning ASP.NET 4: in C# and VB', 'Wrox', 'Imar Spaanjaars', 'img/urunler/kitap4.jpg', 32, 1, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(5, 'Programming Microsoft ASP.NET 4', 'Microsoft', 'Dino Esposito', 'img/urunler/kitap5.jpg', 35, 1, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(6, 'Beginning ASP.NET 4 in C# 2010 ', 'Apress', 'Matthew MacDonald', 'img/urunler/kitap6.jpg', 30, 1, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(7, 'Programming Android', 'Oreilly', 'Zigurd Mednieks', 'img/urunler/kitap7.jpg', 32, 2, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(8, 'Android Application Development For Dummies', 'For Dummies', 'Donn Felker', 'img/urunler/kitap8.jpg', 35, 2, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(9, 'Beginning Android Games', 'Apress', 'Mario Zechner', 'img/urunler/kitap9.jpg', 30, 2, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(10, 'Learning iPhone Programming', 'Oreilly', 'Alasdair Allan', 'img/urunler/kitap10.jpg', 32, 2, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(11, 'Head First iPhone and iPad Development', 'Oreilly', 'Dan Pilone', 'img/urunler/kitap11.jpg', 35, 2, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(12, 'Tapworthy: Designing Great iPhone Apps', 'Oreilly', 'Josh Clark', 'img/urunler/kitap12.jpg', 30, 2, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(13, 'Head First Java', 'Oreilly', 'Kathy Sierra', 'img/urunler/kitap13.jpg', 45, 3, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(14, 'Effective Java (2nd Edition)', 'Oreilly', 'Joshua Bloch ', 'img/urunler/kitap14.jpg', 47, 3, 'http://ebookee.org/go/?u=http://hotfile.com/dl/110702559/7e1c461/Oreilly.Tapworthy.Jun.2010.rar.html'),
(15, 'Sams Teach Yourself Java in 24 Hours', 'Sams', 'Rogers Cadenhead', 'img/urunler/kitap15.jpg', 21, 3, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(16, 'Java For Dummies', 'For Dummies', 'Barry A. Burd', 'img/urunler/kitap16.jpg', 18, 3, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(17, 'Sams Teach Yourself Java in 24 Hours', 'McGraw-Hill', 'Herbert Schildt', 'img/urunler/kitap17.jpg', 32, 3, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(20, 'The C++ Programming Language', 'Addison-Wesley', 'Bjarne Stroustrup', 'img/urunler/kitap18.jpg', 62, 4, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(21, 'C++ For Dummies', 'For Dummies', 'Rogers Cadenhead', 'img/urunler/kitap19.jpg', 21, 4, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(22, 'C Programming Language', 'Addison-Wesley', 'Dennis M. Ritchie', 'img/urunler/kitap20.jpg', 35, 4, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(23, 'Beginning C++ Through Game Programming', 'Course Technology', 'Michael Dawson', 'img/urunler/kitap21.jpg', 22, 4, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(24, 'Oracle Essentials: Oracle Database 11g ', 'Oreilly', 'Rick Greenwald', 'img/urunler/kitap22.jpg', 26, 5, 'http://ebookee.org/go/?u=http://hotfile.com/dl/110702559/7e1c461/Oreilly.Tapworthy.Jun.2010.rar.html'),
(25, 'Oracle 11g For Dummies', 'For Dummies', 'Chris Zeis', 'img/urunler/kitap23.jpg', 20, 5, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(26, 'Oracle PL/SQL Programming', 'Oreilly', 'W. Jason Gilmore', 'img/urunler/kitap24.jpg', 39, 5, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(27, 'Microsoft SQL Server 2008', 'Microsoft', 'Chris Zeis', 'img/urunler/kitap25.jpg', 22, 5, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(28, 'Computer Networks (5th Edition)', 'Prentice Hall', 'Andrew S. Tanenbaum', 'img/urunler/kitap26.jpg', 96, 6, 'http://ebookee.org/go/?u=http://hotfile.com/dl/110702559/7e1c461/Oreilly.Tapworthy.Jun.2010.rar.html'),
(29, 'Networking All-in-One For Dummies', 'For Dummies', 'Doug Lowe ', 'img/urunler/kitap27.jpg', 50, 6, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar'),
(30, 'Network Know-How', 'No Starch Press', 'John Ross ', 'img/urunler/kitap28.jpg', 35, 6, 'http://prefiles.com/tfbsyv0lq4fw/Oreilly.Android.Cookbook.Apr.2012.rar');
