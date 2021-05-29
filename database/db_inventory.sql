-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Apr 2020 pada 02.37
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Shandiar Ivan', 'ivan', '2c42e5cf1cdbafea04ed267018ef1511'),
(12, 'Admin Gudang', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `email`, `telepon`, `alamat`) VALUES
(1, 'Toko Perak Timur', 'tokoperak@gmail.com', '083345678921', 'JL. Perak Baru 1'),
(2, 'Toko Makmur', 'makmur@yahoo.com', '089123456987', 'Jl. Gedangan'),
(3, 'Toko Bu Ratih', 'ratih@yahoo.co.id', '081246853901', 'Jl Wonokusumo'),
(4, 'Toko Mantap', 'mantapppp@gmail.com', '083123654789', 'Jl. Ikan kakap'),
(5, 'Toko Serba Ada', 'serbaserbi@gmail.com', '083123654879', 'Jl. Ketintang'),
(7, 'Toko Hore', 'mawar@gmail.com', '083543678921', 'Jl. Mawar No 20'),
(8, 'Toko Raya', 'raya02@gmail.co', '083365768921', 'Jl Matahari No 11'),
(9, 'Toko Elang', 'elang123@gmail.com', '083123456876', 'Jl Rajawali Timur No 120');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `email`, `telepon`) VALUES
(1, 'Agen Makmur', 'Jl. Krembangan', 'makmur@gmail.com', '081234567980'),
(2, 'Agen Jaya', 'Jl. Garuda No 11', 'garuda@yahoo.co.id', '083123456987'),
(3, 'Agen Beras ', 'Jl Anggrek no 15', 'beras@gmail.com', '083456789123'),
(4, 'Toko Pak Jon', 'Jl. Kedung Doro', 'jon123@gmail.com', '089123456987'),
(5, 'Toko Halal', 'Jl Banten No 12', 'halalll@yahoo.com', '083456879231'),
(6, 'Toko Mbak Sri ', 'Jl Made Barat', 'jengsri@gmail.com', '0851236548798'),
(7, 'Toko ABCDE', 'Jl. Morokrembangan NO 130', 'morokrembangan@gmail.com', '082123456765');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barangkeluar`
--

CREATE TABLE IF NOT EXISTS `tbl_barangkeluar` (
  `id_brgkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_brgmasuk` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` double NOT NULL,
  PRIMARY KEY (`id_brgkeluar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_barangkeluar`
--

INSERT INTO `tbl_barangkeluar` (`id_brgkeluar`, `id_brgmasuk`, `kode_barang`, `nama_barang`, `id_satuan`, `id_kategori`, `stok`) VALUES
(1, 1, 'BRG11020200855', 'Coklat', 2, 7, 80),
(2, 2, 'BRG12320135801', 'Fanta', 2, 2, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barangmasuk`
--

CREATE TABLE IF NOT EXISTS `tbl_barangmasuk` (
  `id_brgmasuk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `jml_masuk` varchar(10) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `status` double NOT NULL,
  PRIMARY KEY (`id_brgmasuk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_barangmasuk`
--

INSERT INTO `tbl_barangmasuk` (`id_brgmasuk`, `kode_barang`, `nama_barang`, `satuan`, `kategori`, `jml_masuk`, `keterangan`, `tgl_masuk`, `supplier`, `status`) VALUES
(1, 'BM11720200808', 'Coklat', '2', '7', '90', 'Barang Masuk', '2020-04-10', '5', 0),
(2, 'BM12720135641', 'Fanta', '2', '2', '50', 'Barang Masuk', '2020-04-12', '5', 0),
(3, 'BM12620135938', 'Sprite', '2', '5', '30', 'Barang Masuk', '2019-11-11', '6', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_databarang`
--

CREATE TABLE IF NOT EXISTS `tbl_databarang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_brgmasuk` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `stok` double NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_databarang`
--

INSERT INTO `tbl_databarang` (`id_barang`, `id_brgmasuk`, `kode_barang`, `nama_barang`, `satuan`, `kategori`, `stok`) VALUES
(1, 1, 'BRG11020200855', 'Coklat', 2, 7, 80),
(2, 2, 'BRG12320135801', 'Fanta', 2, 2, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datakeluar`
--

CREATE TABLE IF NOT EXISTS `tbl_datakeluar` (
  `id_datakeluar` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `customer` varchar(50) NOT NULL,
  `jml_keluar` double NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_datakeluar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_datakeluar`
--

INSERT INTO `tbl_datakeluar` (`id_datakeluar`, `kode_barang`, `nama_barang`, `tgl_keluar`, `customer`, `jml_keluar`, `keterangan`) VALUES
(1, 'BK12520140951', 'Coklat', '2020-04-13 14:10:27', 'Toko Serba Ada', 20, 'Barang Keluar'),
(2, 'BK12720141537', 'Coklat', '2020-04-13 14:15:51', 'Toko Mantap', 30, 'Barang Keluar'),
(3, 'BK12620141555', 'Fanta', '2020-04-15 14:16:16', 'Toko Hore', 30, 'Barang Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datamasuk`
--

CREATE TABLE IF NOT EXISTS `tbl_datamasuk` (
  `id_datamasuk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `jml_masuk` double NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_datamasuk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tbl_datamasuk`
--

INSERT INTO `tbl_datamasuk` (`id_datamasuk`, `kode_barang`, `nama_barang`, `tgl_masuk`, `supplier`, `jml_masuk`, `keterangan`) VALUES
(1, 'BM11720200808', 'Coklat', '2020-04-10 20:08:57', 'Toko Halal', 90, 'Barang Masuk'),
(2, 'BM12720135641', 'Fanta', '2020-04-12 13:58:03', 'Toko Halal', 50, 'Barang Masuk'),
(3, 'BM12620135938', 'Sprite', '2019-11-11 14:00:28', 'Toko Mbak Sri ', 30, 'Batal Masuk'),
(4, 'BRG11020200855', 'Coklat', '2019-11-06 14:03:13', 'Toko Halal', 30, 'Stok Masuk'),
(5, 'BRG12320135801', 'Fanta', '2020-04-02 14:08:45', 'Toko Halal', 60, 'Stok Batal Masuk'),
(6, 'BRG12320135801', 'Fanta', '2020-04-13 14:17:28', 'Toko Pak Jon', 40, 'Stok Masuk'),
(7, 'BRG11020200855', 'Coklat', '2020-04-17 14:17:59', 'Toko Pak Jon', 10, 'Stok Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datastok`
--

CREATE TABLE IF NOT EXISTS `tbl_datastok` (
  `id_datastok` int(11) NOT NULL AUTO_INCREMENT,
  `id_brgmasuk` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` double NOT NULL,
  PRIMARY KEY (`id_datastok`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_datastok`
--

INSERT INTO `tbl_datastok` (`id_datastok`, `id_brgmasuk`, `kode_barang`, `nama_barang`, `stok`) VALUES
(1, 1, 'BRG11020200855', 'Coklat', 80),
(2, 2, 'BRG12320135801', 'Fanta', 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kartustok`
--

CREATE TABLE IF NOT EXISTS `tbl_kartustok` (
  `id_kartustok` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `jml_masuk` double NOT NULL,
  `jml_keluar` double NOT NULL,
  `sisa` double NOT NULL,
  PRIMARY KEY (`id_kartustok`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tbl_kartustok`
--

INSERT INTO `tbl_kartustok` (`id_kartustok`, `kode_barang`, `nama_barang`, `tgl_transaksi`, `keterangan`, `jml_masuk`, `jml_keluar`, `sisa`) VALUES
(1, 'BM11720200808', 'Coklat', '2020-04-10 20:08:57', 'Barang Masuk', 90, 0, 90),
(2, 'BM12720135641', 'Fanta', '2020-04-12 13:58:03', 'Barang Masuk', 50, 0, 50),
(3, 'BM12620135938', 'Sprite', '2019-11-11 14:00:28', 'Batal Masuk', 30, 0, 0),
(4, 'BRG11020200855', 'Coklat', '2019-11-06 14:03:13', 'Stok Masuk', 30, 0, 120),
(5, 'BRG12320135801', 'Fanta', '2020-04-02 14:08:45', 'Stok Batal Masuk', 60, 0, 50),
(6, 'BK12520140951', 'Coklat', '2020-04-13 14:10:27', 'Barang Keluar', 0, 20, 100),
(7, 'BK12720141537', 'Coklat', '2020-04-13 14:15:51', 'Barang Keluar', 0, 30, 70),
(8, 'BK12620141555', 'Fanta', '2020-04-15 14:16:16', 'Barang Keluar', 0, 30, 20),
(9, 'BRG12320135801', 'Fanta', '2020-04-13 14:17:28', 'Stok Masuk', 40, 0, 60),
(10, 'BRG11020200855', 'Coklat', '2020-04-17 14:17:59', 'Stok Masuk', 10, 0, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Minuman Kaleng'),
(3, 'Bahan Pokok'),
(5, 'Minuman'),
(7, 'Makanan'),
(8, 'Rokok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lap_bk`
--

CREATE TABLE IF NOT EXISTS `tbl_lap_bk` (
  `id_lap` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `customer` varchar(50) NOT NULL,
  `jml_keluar` double NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_lap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_lap_bk`
--

INSERT INTO `tbl_lap_bk` (`id_lap`, `kode_barang`, `nama_barang`, `tgl_keluar`, `customer`, `jml_keluar`, `keterangan`) VALUES
(1, 'BK12520140951', 'Coklat', '2020-04-13', 'Toko Serba Ada', 20, 'Barang Keluar'),
(2, 'BK12720141537', 'Coklat', '2020-04-13', 'Toko Mantap', 30, 'Barang Keluar'),
(3, 'BK12620141555', 'Fanta', '2020-04-15', 'Toko Hore', 30, 'Barang Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lap_bm`
--

CREATE TABLE IF NOT EXISTS `tbl_lap_bm` (
  `id_lap` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `jml_masuk` double NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_lap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_lap_bm`
--

INSERT INTO `tbl_lap_bm` (`id_lap`, `kode_barang`, `nama_barang`, `tgl_masuk`, `supplier`, `jml_masuk`, `keterangan`) VALUES
(1, 'BRG11020200855', 'Coklat', '2020-04-10', 'Toko Halal', 90, 'Barang Masuk'),
(2, 'BRG12320135801', 'Fanta', '2020-04-12', 'Toko Halal', 50, 'Barang Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lap_sm`
--

CREATE TABLE IF NOT EXISTS `tbl_lap_sm` (
  `id_lap` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `jml_masuk` double NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_lap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_lap_sm`
--

INSERT INTO `tbl_lap_sm` (`id_lap`, `kode_barang`, `nama_barang`, `tgl_masuk`, `supplier`, `jml_masuk`, `keterangan`) VALUES
(1, 'BRG11020200855', 'Coklat', '2019-11-06', 'Toko Halal', 30, 'Stok Masuk'),
(2, 'BRG12320135801', 'Fanta', '2020-04-13', 'Toko Pak Jon', 40, 'Stok Masuk'),
(3, 'BRG11020200855', 'Coklat', '2020-04-17', 'Toko Pak Jon', 10, 'Stok Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE IF NOT EXISTS `tbl_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Liter'),
(2, 'Box'),
(3, 'Pcs'),
(4, 'Lusin'),
(5, 'Kilogram'),
(6, 'Gros'),
(7, 'Coba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transitkeluar`
--

CREATE TABLE IF NOT EXISTS `tbl_transitkeluar` (
  `id_trkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_brgmasuk` int(11) NOT NULL,
  `id_brgkeluar` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `stok_awal` double NOT NULL,
  `jml_keluar` double NOT NULL,
  `id_customer` int(11) NOT NULL,
  PRIMARY KEY (`id_trkeluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transitstok`
--

CREATE TABLE IF NOT EXISTS `tbl_transitstok` (
  `id_trstok` int(11) NOT NULL AUTO_INCREMENT,
  `id_brgmasuk` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `stok_awal` double NOT NULL,
  `jml_masuk` double NOT NULL,
  `id_supplier` int(11) NOT NULL,
  PRIMARY KEY (`id_trstok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
