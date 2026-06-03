CREATE DATABASE IF NOT EXISTS `toko_komputer`;
USE `toko_komputer`;

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produk` (`nama_produk`, `kategori`, `harga`, `stok`) VALUES
('Mouse Logitech G102', 'Aksesoris', 250000, 15),
('Keyboard Mechanical Rexuse', 'Aksesoris', 450000, 10),
('Monitor ASUS 24 Inch', 'Monitor', 1850000, 5);