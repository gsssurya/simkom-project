SET FOREIGN_KEY_CHECKS = 0;

-- 1. Table structure for table `user`
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','pengurus','bendahara','admin','pembina') DEFAULT 'mahasiswa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Table structure for table `program_studi`
DROP TABLE IF EXISTS `program_studi`;
CREATE TABLE `program_studi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Table structure for table `jenis_organisasi`
DROP TABLE IF EXISTS `jenis_organisasi`;
CREATE TABLE `jenis_organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Table structure for table `organisasi`
DROP TABLE IF EXISTS `organisasi`;
CREATE TABLE `organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_organisasi` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `visi` text,
  `misi` text,
  `deskripsi` text,
  `ad_art` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_organisasi_jenis` (`id_jenis_organisasi`),
  CONSTRAINT `fk_organisasi_jenis` FOREIGN KEY (`id_jenis_organisasi`) REFERENCES `jenis_organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Table structure for table `periode_kepengurusan`
DROP TABLE IF EXISTS `periode_kepengurusan`;
CREATE TABLE `periode_kepengurusan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_organisasi` int NOT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year NOT NULL,
  `status_periode` enum('aktif','selesai') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_periode_organisasi` (`id_organisasi`),
  CONSTRAINT `fk_periode_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Table structure for table `mahasiswa`
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_program_studi` int NOT NULL,
  `semester` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `nim` (`nim`),
  KEY `fk_mahasiswa_prodi` (`id_program_studi`),
  CONSTRAINT `fk_mahasiswa_prodi` FOREIGN KEY (`id_program_studi`) REFERENCES `program_studi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mahasiswa_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Table structure for table `anggota_organisasi`
DROP TABLE IF EXISTS `anggota_organisasi`;
CREATE TABLE `anggota_organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_organisasi` int NOT NULL,
  `id_periode` int NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_anggota_user` (`id_user`),
  KEY `fk_anggota_organisasi` (`id_organisasi`),
  KEY `fk_anggota_periode` (`id_periode`),
  CONSTRAINT `fk_anggota_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_anggota_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode_kepengurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_anggota_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Table structure for table `kegiatan`
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_organisasi` int NOT NULL,
  `id_periode` int NOT NULL,
  `judul_kegiatan` varchar(100) NOT NULL,
  `deskripsi` text,
  `tanggal_kegiatan` date NOT NULL,
  `waktu_kegiatan` time NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `kuota_peserta` int DEFAULT NULL,
  `status` enum('ongoing','complete','cancelled') DEFAULT 'ongoing',
  `evaluasi_kegiatan` text,
  PRIMARY KEY (`id`),
  KEY `fk_kegiatan_organisasi` (`id_organisasi`),
  KEY `fk_kegiatan_periode` (`id_periode`),
  CONSTRAINT `fk_kegiatan_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_kegiatan_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode_kepengurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Table structure for table `dokumen_kegiatan`
DROP TABLE IF EXISTS `dokumen_kegiatan`;
CREATE TABLE `dokumen_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `path_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_dokumen_kegiatan` (`id_kegiatan`),
  CONSTRAINT `fk_dokumen_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Table structure for table `keuangan_kegiatan`
DROP TABLE IF EXISTS `keuangan_kegiatan`;
CREATE TABLE `keuangan_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `jenis_transaksi` enum('pemasukan','pengeluaran') NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `keterangan` text,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_keuangan_kegiatan` (`id_kegiatan`),
  CONSTRAINT `fk_keuangan_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Table structure for table `log_aktivitas`
DROP TABLE IF EXISTS `log_aktivitas`;
CREATE TABLE `log_aktivitas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `tipe_subjek` varchar(50) NOT NULL,
  `id_subjek` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_log_aktivitas_user` (`id_user`),
  CONSTRAINT `fk_log_aktivitas_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 12. Table structure for table `pembina`
DROP TABLE IF EXISTS `pembina`;
CREATE TABLE `pembina` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `nip` (`nip`),
  CONSTRAINT `fk_pembina_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 13. Table structure for table `pendaftaran_anggota`
DROP TABLE IF EXISTS `pendaftaran_anggota`;
CREATE TABLE `pendaftaran_anggota` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_organisasi` int NOT NULL,
  `dokumen_pendukung` varchar(255) DEFAULT NULL,
  `status` enum('menunggu verifikasi','diterima','ditolak') DEFAULT 'menunggu verifikasi',
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_pendaftaran_user` (`id_user`),
  KEY `fk_pendaftaran_organisasi` (`id_organisasi`),
  CONSTRAINT `fk_pendaftaran_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pendaftaran_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 14. Table structure for table `pendaftaran_peserta_kegiatan`
DROP TABLE IF EXISTS `pendaftaran_peserta_kegiatan`;
CREATE TABLE `pendaftaran_peserta_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `id_user` int NOT NULL,
  `status` enum('Menunggu konfirmasi','Pendaftaran berhasil','Kuota sudah penuh') DEFAULT 'Menunggu konfirmasi',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_peserta_kegiatan` (`id_kegiatan`),
  KEY `fk_peserta_user` (`id_user`),
  CONSTRAINT `fk_peserta_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_peserta_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;