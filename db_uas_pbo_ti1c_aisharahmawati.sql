-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 07:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_aisharahmawati`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('kontrak','tetap','magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(20) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KKN-001', 'Hendra Wijaya', 'Engineering', 20, '200000.00', 'kontrak', 12, 'PT Mitra Global', NULL, NULL, NULL, NULL),
('KKN-002', 'Indah Permata', 'Marketing', 22, '180000.00', 'kontrak', 6, 'CV Bakti Karya', NULL, NULL, NULL, NULL),
('KKN-003', 'Joko Susilo', 'IT Support', 19, '190000.00', 'kontrak', 12, 'PT Mitra Global', NULL, NULL, NULL, NULL),
('KKN-004', 'Kurniawan', 'Operations', 21, '175000.00', 'kontrak', 6, 'PT Sumber Daya', NULL, NULL, NULL, NULL),
('KKN-005', 'Larasati', 'Creative Design', 22, '195000.00', 'kontrak', 12, 'CV Bakti Karya', NULL, NULL, NULL, NULL),
('KKN-006', 'Muhammad Rizky', 'Finance', 20, '210000.00', 'kontrak', 24, 'PT Mitra Global', NULL, NULL, NULL, NULL),
('KKN-007', 'Nadia Utami', 'Human Resources', 21, '185000.00', 'kontrak', 6, 'PT Sumber Daya', NULL, NULL, NULL, NULL),
('KMG-001', 'Oki Syahputra', 'Engineering', 18, '100000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Batch 6'),
('KMG-002', 'Putri Ayu', 'Data Science', 20, '110000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Batch 6'),
('KMG-003', 'Qori Amelia', 'Creative Design', 19, '950000.00', 'magang', NULL, NULL, NULL, NULL, '1200000.00', 'Sertifikat Mandiri Mandiri'),
('KMG-004', 'Rian Hidayat', 'IT Support', 21, '100000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Batch 6'),
('KMG-005', 'Siti Aminah', 'Marketing', 17, '90000.00', 'magang', NULL, NULL, NULL, NULL, '1200000.00', 'Sertifikat Internal Kampus'),
('KMG-006', 'Taufik Hidayat', 'Finance', 20, '105000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Batch 6'),
('KTY-001', 'Andi Pratama', 'IT Support', 22, '250000.00', 'tetap', NULL, NULL, '500000.00', 'ESOP-A01', NULL, NULL),
('KTY-002', 'Budi Santoso', 'Finance', 20, '270000.00', 'tetap', NULL, NULL, '600000.00', 'ESOP-A02', NULL, NULL),
('KTY-003', 'Citra Lestari', 'Human Resources', 21, '260000.00', 'tetap', NULL, NULL, '550000.00', 'ESOP-A03', NULL, NULL),
('KTY-004', 'Dewi Sartika', 'Marketing', 23, '240000.00', 'tetap', NULL, NULL, '500000.00', 'ESOP-A04', NULL, NULL),
('KTY-005', 'Eko Prasetyo', 'Engineering', 22, '300000.00', 'tetap', NULL, NULL, '750000.00', 'ESOP-B01', NULL, NULL),
('KTY-006', 'Fany Wijaya', 'Data Science', 21, '320000.00', 'tetap', NULL, NULL, '800000.00', 'ESOP-B02', NULL, NULL),
('KTY-007', 'Gilang Permana', 'Operations', 22, '230000.00', 'tetap', NULL, NULL, '450000.00', 'ESOP-A05', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
