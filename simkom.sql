-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table simkom_db.anggota_organisasi
CREATE TABLE IF NOT EXISTS `anggota_organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_organisasi` int NOT NULL,
  `id_periode` int NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_anggota_user` (`id_user`),
  KEY `fk_anggota_organisasi` (`id_organisasi`),
  KEY `fk_anggota_periode` (`id_periode`),
  CONSTRAINT `fk_anggota_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_anggota_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode_kepengurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_anggota_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.anggota_organisasi: ~2 rows (approximately)
INSERT INTO `anggota_organisasi` (`id`, `id_user`, `id_organisasi`, `id_periode`, `jabatan`, `status`, `created_at`) VALUES
	(1, 4, 1, 1, 'Ketua Umum', 'aktif', '2026-06-07 15:13:31'),
	(2, 5, 1, 1, 'Bendahara Umum', 'aktif', '2026-06-07 15:13:31'),
	(3, 1, 1, 1, 'Anggota', 'aktif', '2026-06-07 10:55:13'),
	(4, 7, 2, 1, 'Ketua Umum', 'aktif', '2026-06-07 12:09:02'),
	(5, 8, 2, 1, 'Bendahara Umum', 'aktif', '2026-06-07 12:09:02'),
	(6, 9, 2, 1, 'Pembina', 'aktif', '2026-06-07 12:09:02'),
	(7, 10, 3, 1, 'Ketua Umum', 'aktif', '2026-06-07 12:09:03'),
	(8, 11, 3, 1, 'Bendahara Umum', 'aktif', '2026-06-07 12:09:03'),
	(9, 12, 3, 1, 'Pembina', 'aktif', '2026-06-07 12:09:03'),
	(10, 1, 2, 1, 'Anggota', 'aktif', '2026-06-07 12:24:46'),
	(11, 2, 3, 1, 'Anggota', 'aktif', '2026-06-07 21:23:25');

-- Dumping structure for table simkom_db.dokumen_kegiatan
CREATE TABLE IF NOT EXISTS `dokumen_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `jenis_dokumen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_dokumen_kegiatan` (`id_kegiatan`),
  CONSTRAINT `fk_dokumen_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.dokumen_kegiatan: ~0 rows (approximately)

-- Dumping structure for table simkom_db.jenis_organisasi
CREATE TABLE IF NOT EXISTS `jenis_organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.jenis_organisasi: ~2 rows (approximately)
INSERT INTO `jenis_organisasi` (`id`, `nama`) VALUES
	(1, 'Himpunan Mahasiswa (HIMA)'),
	(2, 'Unit Kegiatan Mahasiswa (UKM)');

-- Dumping structure for table simkom_db.kegiatan
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_organisasi` int NOT NULL,
  `id_periode` int NOT NULL,
  `judul_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tanggal_kegiatan` date NOT NULL,
  `waktu_kegiatan` time NOT NULL,
  `lokasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuota_peserta` int DEFAULT NULL,
  `status` enum('ongoing','complete','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT 'ongoing',
  `evaluasi_kegiatan` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_kegiatan_organisasi` (`id_organisasi`),
  KEY `fk_kegiatan_periode` (`id_periode`),
  CONSTRAINT `fk_kegiatan_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_kegiatan_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode_kepengurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.kegiatan: ~0 rows (approximately)

-- Dumping structure for table simkom_db.keuangan_kegiatan
CREATE TABLE IF NOT EXISTS `keuangan_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `jenis_transaksi` enum('pemasukan','pengeluaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_keuangan_kegiatan` (`id_kegiatan`),
  CONSTRAINT `fk_keuangan_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.keuangan_kegiatan: ~0 rows (approximately)

-- Dumping structure for table simkom_db.log_aktivitas
CREATE TABLE IF NOT EXISTS `log_aktivitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `aksi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_subjek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subjek` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_log_aktivitas_user` (`id_user`),
  CONSTRAINT `fk_log_aktivitas_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.log_aktivitas: ~0 rows (approximately)

-- Dumping structure for table simkom_db.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_program_studi` int NOT NULL,
  `semester` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `nim` (`nim`),
  KEY `fk_mahasiswa_prodi` (`id_program_studi`),
  CONSTRAINT `fk_mahasiswa_prodi` FOREIGN KEY (`id_program_studi`) REFERENCES `program_studi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mahasiswa_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.mahasiswa: ~5 rows (approximately)
INSERT INTO `mahasiswa` (`id`, `id_user`, `nim`, `nama`, `id_program_studi`, `semester`) VALUES
	(1, 1, '210010123', 'Putu Eka', 1, 4),
	(2, 2, 'E31260001', 'I Gede Dino', 2, 3),
	(3, 3, '220010999', 'Dewa Admin SIMKOM', 1, 4),
	(4, 4, '220010111', 'Ketut Ketua Ormawa', 1, 4),
	(5, 5, '220010222', 'Ni Made Bendahara', 2, 4);

-- Dumping structure for table simkom_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.migrations: ~0 rows (approximately)

-- Dumping structure for table simkom_db.organisasi
CREATE TABLE IF NOT EXISTS `organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_organisasi` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `ad_art` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_organisasi_jenis` (`id_jenis_organisasi`),
  CONSTRAINT `fk_organisasi_jenis` FOREIGN KEY (`id_jenis_organisasi`) REFERENCES `jenis_organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.organisasi: ~3 rows (approximately)
INSERT INTO `organisasi` (`id`, `id_jenis_organisasi`, `nama`, `visi`, `misi`, `deskripsi`, `ad_art`, `status`, `created_at`) VALUES
	(1, 1, 'HIMA Teknik Informatika', NULL, NULL, NULL, NULL, 'aktif', '2026-06-07 14:39:31'),
	(2, 2, 'UKM Musik', NULL, NULL, NULL, NULL, 'aktif', '2026-06-07 14:39:31'),
	(3, 2, 'UKM Tari Bali', NULL, NULL, NULL, NULL, 'aktif', '2026-06-07 14:39:31');

-- Dumping structure for table simkom_db.pembina
CREATE TABLE IF NOT EXISTS `pembina` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `nip` (`nip`),
  CONSTRAINT `fk_pembina_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.pembina: ~1 rows (approximately)
INSERT INTO `pembina` (`id`, `id_user`, `nip`, `nama`) VALUES
	(1, 6, '198506122010121001', 'I Putu Pembina M.Kom.');

-- Dumping structure for table simkom_db.pendaftaran_anggota
CREATE TABLE IF NOT EXISTS `pendaftaran_anggota` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_organisasi` int NOT NULL,
  `dokumen_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('menunggu verifikasi','diterima','ditolak') COLLATE utf8mb4_unicode_ci DEFAULT 'menunggu verifikasi',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_pendaftaran_user` (`id_user`),
  KEY `fk_pendaftaran_organisasi` (`id_organisasi`),
  CONSTRAINT `fk_pendaftaran_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pendaftaran_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.pendaftaran_anggota: ~1 rows (approximately)
INSERT INTO `pendaftaran_anggota` (`id`, `id_user`, `id_organisasi`, `dokumen_pendukung`, `status`, `keterangan`, `created_at`) VALUES
	(1, 1, 2, NULL, 'diterima', NULL, '2026-06-07 08:30:25'),
	(10, 2, 3, NULL, 'diterima', 'hgcygcggj', '2026-06-07 21:22:41'),
	(11, 10, 3, NULL, 'menunggu verifikasi', 'jgchgc', '2026-06-07 21:24:17');

-- Dumping structure for table simkom_db.pendaftaran_peserta_kegiatan
CREATE TABLE IF NOT EXISTS `pendaftaran_peserta_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `id_user` int NOT NULL,
  `status` enum('Menunggu konfirmasi','Pendaftaran berhasil','Kuota sudah penuh') COLLATE utf8mb4_unicode_ci DEFAULT 'Menunggu konfirmasi',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_peserta_kegiatan` (`id_kegiatan`),
  KEY `fk_peserta_user` (`id_user`),
  CONSTRAINT `fk_peserta_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_peserta_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.pendaftaran_peserta_kegiatan: ~0 rows (approximately)

-- Dumping structure for table simkom_db.periode_kepengurusan
CREATE TABLE IF NOT EXISTS `periode_kepengurusan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_organisasi` int NOT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year NOT NULL,
  `status_periode` enum('aktif','selesai') COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_periode_organisasi` (`id_organisasi`),
  CONSTRAINT `fk_periode_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.periode_kepengurusan: ~1 rows (approximately)
INSERT INTO `periode_kepengurusan` (`id`, `id_organisasi`, `tahun_mulai`, `tahun_selesai`, `status_periode`, `created_at`) VALUES
	(1, 1, '2026', '2027', 'aktif', '2026-06-07 14:39:33');

-- Dumping structure for table simkom_db.program_studi
CREATE TABLE IF NOT EXISTS `program_studi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.program_studi: ~3 rows (approximately)
INSERT INTO `program_studi` (`id`, `nama`) VALUES
	(1, 'Teknik Informatika'),
	(2, 'Sistem Informasi'),
	(3, 'Sistem Komputer');

-- Dumping structure for table simkom_db.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mahasiswa','pengurus','bendahara','admin','pembina') COLLATE utf8mb4_unicode_ci DEFAULT 'mahasiswa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table simkom_db.user: ~13 rows (approximately)
INSERT INTO `user` (`id`, `email`, `no_telepon`, `password`, `role`) VALUES
	(1, 'putueka@mail.com', '081234567890', '$2y$12$NaTqptDXUhvpL5nVTrXqC.nOptZ8uAq8F.Uwl2l/s2SWgtSv4k28i', 'mahasiswa'),
	(2, 'maba2026@kampus.ac.id', '081234567890', '$2y$12$8QBx5TU3a63YYDlNK.F5tuvSRWSmHNWmx5hvSYX8W3XdS7/eCGEau', 'mahasiswa'),
	(3, 'admin@stikom-bali.ac.id', '081122334455', '$2y$12$m0BkbyqnuXQzEiJgKQe3yOnGoiN037XZOnqHkslKU5.QeqIfZO75.', 'admin'),
	(4, 'pengurus@stikom-bali.ac.id', '081234567001', '$2y$12$k8MUVECMdrpaGsiOb9uD.ubJLklI1jeq6lqsmlUvxNQwcqlLj2pcq', 'pengurus'),
	(5, 'bendahara@stikom-bali.ac.id', '081234567002', '$2y$12$g39.O8BYjUIyb/OU4MhuTuBJ0B8VK92VkwdBWmRNHXK.4O2.KRnZG', 'bendahara'),
	(6, 'pembina@stikom-bali.ac.id', '081987654321', '$2y$12$.mLW3E79qqGFHvLBvGBrTeETFj8gpH3AayMUgj6CNmZPIDSm18aC.', 'pembina'),
	(7, 'ketua.ukmmusik@stikom-bali.ac.id', NULL, '$2y$12$cX/eqES6GoSdhCNbxyVWkuP1ZNSkcyY2TjM.aGB5RkfQ/p2igbNv6', 'pengurus'),
	(8, 'bendahara.ukmmusik@stikom-bali.ac.id', NULL, '$2y$12$/lHtW5D2HU6ebuAwr8FCx.9zpkIiJIGdLDDWI5CXKKZpJb0I4yVtS', 'pengurus'),
	(9, 'pembina.ukmmusik@stikom-bali.ac.id', NULL, '$2y$12$.Q88yu.ice6dsqUXH4v8ie/Bk6KV149E1WRMKt.bB1LYBM.Oz5H6G', 'pembina'),
	(10, 'ketua.ukmtaribali@stikom-bali.ac.id', NULL, '$2y$12$AICWWtqFJLdv5WmnEIxurO1kN6GQ8HgxDQsMAixF3ygv8JLSkX5o.', 'pengurus'),
	(11, 'bendahara.ukmtaribali@stikom-bali.ac.id', NULL, '$2y$12$Cjd705hPJUWyathDKNC60.tGdz5Usrsru17kGFBRBEJQkBJR1Gbwi', 'pengurus'),
	(12, 'pembina.ukmtaribali@stikom-bali.ac.id', NULL, '$2y$12$8D.5LLaUTHrDN/LKzJuohOAnPqAKcrNc9Kbct8XjteDoL8eRLdKT.', 'pembina'),
	(13, 'mahasiswates@gmail.com', NULL, '$2y$12$LYdAXBE3koOVGCq5dwTnCOu.2KunqixW9n4W3NHu7RC0fVdnKw6s2', 'mahasiswa');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
