-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: simkom_db
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anggota_organisasi`
--

DROP TABLE IF EXISTS `anggota_organisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  CONSTRAINT `fk_anggota_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`),
  CONSTRAINT `fk_anggota_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode_kepengurusan` (`id`),
  CONSTRAINT `fk_anggota_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota_organisasi`
--

LOCK TABLES `anggota_organisasi` WRITE;
/*!40000 ALTER TABLE `anggota_organisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `anggota_organisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokumen_kegiatan`
--

DROP TABLE IF EXISTS `dokumen_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dokumen_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `path_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_dokumen_kegiatan` (`id_kegiatan`),
  CONSTRAINT `fk_dokumen_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokumen_kegiatan`
--

LOCK TABLES `dokumen_kegiatan` WRITE;
/*!40000 ALTER TABLE `dokumen_kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_organisasi`
--

DROP TABLE IF EXISTS `jenis_organisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_organisasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_organisasi`
--

LOCK TABLES `jenis_organisasi` WRITE;
/*!40000 ALTER TABLE `jenis_organisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_organisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  CONSTRAINT `fk_kegiatan_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`),
  CONSTRAINT `fk_kegiatan_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode_kepengurusan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keuangan_kegiatan`
--

DROP TABLE IF EXISTS `keuangan_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  CONSTRAINT `fk_keuangan_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keuangan_kegiatan`
--

LOCK TABLES `keuangan_kegiatan` WRITE;
/*!40000 ALTER TABLE `keuangan_kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `keuangan_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  CONSTRAINT `fk_mahasiswa_prodi` FOREIGN KEY (`id_program_studi`) REFERENCES `program_studi` (`id`),
  CONSTRAINT `fk_mahasiswa_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisasi`
--

DROP TABLE IF EXISTS `organisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  CONSTRAINT `fk_organisasi_jenis` FOREIGN KEY (`id_jenis_organisasi`) REFERENCES `jenis_organisasi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisasi`
--

LOCK TABLES `organisasi` WRITE;
/*!40000 ALTER TABLE `organisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `organisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembina`
--

DROP TABLE IF EXISTS `pembina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembina` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `nip` (`nip`),
  CONSTRAINT `fk_pembina_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembina`
--

LOCK TABLES `pembina` WRITE;
/*!40000 ALTER TABLE `pembina` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran_anggota`
--

DROP TABLE IF EXISTS `pendaftaran_anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  CONSTRAINT `fk_pendaftaran_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`),
  CONSTRAINT `fk_pendaftaran_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran_anggota`
--

LOCK TABLES `pendaftaran_anggota` WRITE;
/*!40000 ALTER TABLE `pendaftaran_anggota` DISABLE KEYS */;
/*!40000 ALTER TABLE `pendaftaran_anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran_peserta_kegiatan`
--

DROP TABLE IF EXISTS `pendaftaran_peserta_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pendaftaran_peserta_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int NOT NULL,
  `id_user` int NOT NULL,
  `status` enum('Menunggu konfirmasi','Pendaftaran berhasil','Kuota sudah penuh') DEFAULT 'Menunggu konfirmasi',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_peserta_kegiatan` (`id_kegiatan`),
  KEY `fk_peserta_user` (`id_user`),
  CONSTRAINT `fk_peserta_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`),
  CONSTRAINT `fk_peserta_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran_peserta_kegiatan`
--

LOCK TABLES `pendaftaran_peserta_kegiatan` WRITE;
/*!40000 ALTER TABLE `pendaftaran_peserta_kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pendaftaran_peserta_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periode_kepengurusan`
--

DROP TABLE IF EXISTS `periode_kepengurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periode_kepengurusan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_organisasi` int NOT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year NOT NULL,
  `status_periode` enum('aktif','selesai') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_periode_organisasi` (`id_organisasi`),
  CONSTRAINT `fk_periode_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periode_kepengurusan`
--

LOCK TABLES `periode_kepengurusan` WRITE;
/*!40000 ALTER TABLE `periode_kepengurusan` DISABLE KEYS */;
/*!40000 ALTER TABLE `periode_kepengurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_studi`
--

DROP TABLE IF EXISTS `program_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_studi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_studi`
--

LOCK TABLES `program_studi` WRITE;
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','pengurus','bendahara','admin','pembina') DEFAULT 'mahasiswa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-31 11:57:47
