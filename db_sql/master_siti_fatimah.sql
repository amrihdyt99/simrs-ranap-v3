-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 08:09 AM
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
-- Database: `master_siti_fatimah`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesspartner`
--

CREATE TABLE `businesspartner` (
  `id` bigint UNSIGNED NOT NULL,
  `BusinessPartnerCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `BusinessPartnerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShortName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Initial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BusinessPartnerType` int DEFAULT NULL,
  `ContactPerson1Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactPerson1PhoneNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactPerson2Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactPerson2PhoneNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsTaxRegistrant` int DEFAULT NULL,
  `TaxRegistrantNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TermCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` int NOT NULL DEFAULT '1',
  `aktif_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hapus` int NOT NULL DEFAULT '0',
  `hapus_at` timestamp NULL DEFAULT NULL,
  `hapus_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesspartner_address`
--

CREATE TABLE `businesspartner_address` (
  `id` bigint UNSIGNED NOT NULL,
  `businesspartner_id` bigint NOT NULL,
  `GCAddressType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Line1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Line2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `District` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ZipCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNo1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNo2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FaxNo1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FaxNo2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` int NOT NULL DEFAULT '1',
  `aktif_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hapus` int NOT NULL DEFAULT '0',
  `hapus_at` timestamp NULL DEFAULT NULL,
  `hapus_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE `corporate` (
  `id` bigint UNSIGNED NOT NULL,
  `businesspartner_id` bigint NOT NULL,
  `BusinessPartnerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `GCInsuranceType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GCCustomerType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CreditLimit` decimal(20,10) NOT NULL,
  `CreditBalance` decimal(20,10) NOT NULL,
  `IsBlackList` int NOT NULL DEFAULT '0',
  `BlackListReason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` int NOT NULL DEFAULT '1',
  `aktif_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hapus` int NOT NULL DEFAULT '0',
  `hapus_at` timestamp NULL DEFAULT NULL,
  `hapus_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customercontract`
--

CREATE TABLE `customercontract` (
  `id` bigint UNSIGNED NOT NULL,
  `DocumentNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocumentDate` date DEFAULT NULL,
  `ContractNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `RevisionNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContractSummary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `StartingDate` date NOT NULL,
  `EndingDate` date NOT NULL,
  `GCCoverageType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `businesspartner_id` bigint NOT NULL,
  `BusinessPartnerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `billto_businesspartner_id` bigint NOT NULL,
  `billto_BusinessPartnerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `HospitalSigned_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `HospitalSigned_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CorporateSigned_id` bigint NOT NULL,
  `CorporateSigned_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `GCCoverAdministrationType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdministrationFeePercentage` decimal(20,10) NOT NULL,
  `IsAdministrationChargesByClass` int NOT NULL DEFAULT '0',
  `MinAdministration` decimal(20,10) NOT NULL,
  `MaxAdministration` decimal(20,10) NOT NULL,
  `GCCoverCitoType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CitoPercentage` decimal(20,10) NOT NULL,
  `GCCoverComplicationType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ComplicationPercentage` decimal(20,10) NOT NULL,
  `GCCoverCitoComplicationType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CitoComplicationPercentage` decimal(20,10) NOT NULL,
  `IsDiscountInCorporateInvoice` int NOT NULL DEFAULT '0',
  `DiscountCorporateInvoice` decimal(20,10) NOT NULL,
  `TransactionCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SiteCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` int NOT NULL DEFAULT '1',
  `aktif_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hapus` int NOT NULL DEFAULT '0',
  `hapus_at` timestamp NULL DEFAULT NULL,
  `hapus_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ketersediaan_ruangan`
--

CREATE TABLE `ketersediaan_ruangan` (
  `id` int NOT NULL,
  `id_paviliun` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `nama_pavilun` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `room_code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `nama_ruangan` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `nomor_bed` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status_ketersediaan` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `id_kelas` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `nama_kelas` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `harga_perhari` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `is_temporary` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `ketersediaan_ruangan`
--

INSERT INTO `ketersediaan_ruangan` (`id`, `id_paviliun`, `nama_pavilun`, `room_code`, `nama_ruangan`, `nomor_bed`, `status_ketersediaan`, `id_kelas`, `nama_kelas`, `harga_perhari`, `is_temporary`) VALUES
(1, '3', 'Pav. Akasia', 'cov401', '401', '401.1', '1', '3', 'Kelas III', '150000', '0'),
(2, '3', 'Pav. Akasia', 'cov401', '401', '401.2', '1', '3', 'Kelas III', '150000', '0'),
(3, '3', 'Pav. Akasia', 'cov401', '401', '401.3', '1', '3', 'Kelas III', '150000', '0'),
(4, '2', 'Pav. Cemara (Kebidanan)', '603', 'RUANG 603', '33333', '1', '3', 'Kelas III', '444444', '1'),
(5, '2', 'Pav. Cemara (Kebidanan)', '603', 'Ruang 603', '603.2', '1', '3', 'Kelas III', '150000', '0'),
(8, '2', 'Pav. Cemara (Kebidanan)', '608', 'RUANG 608', '608.1', '1', NULL, 'Kelas I', '250000', '0'),
(9, '2', 'Pav. Cemara (Kebidanan)', '608', 'RUANG 608', '608.2', '1', NULL, 'Kelas II', '250000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_04_04_210003_create_m_bed_table', 0),
(2, '2023_04_04_210003_create_m_clinical_pathway_table', 0),
(3, '2023_04_04_210003_create_m_detail_orders_table', 0),
(4, '2023_04_04_210003_create_m_diagnosis_table', 0),
(5, '2023_04_04_210003_create_m_gejala_table', 0),
(6, '2023_04_04_210003_create_m_intervention_table', 0),
(7, '2023_04_04_210003_create_m_item_table', 0),
(8, '2023_04_04_210003_create_m_kelas_ruangan_baru_table', 0),
(9, '2023_04_04_210003_create_m_medicine_table', 0),
(10, '2023_04_04_210003_create_m_orders_table', 0),
(11, '2023_04_04_210003_create_m_outcome_table', 0),
(12, '2023_04_04_210003_create_m_paramedis_table', 0),
(13, '2023_04_04_210003_create_m_pasien_table', 0),
(14, '2023_04_04_210003_create_m_physician_team_table', 0),
(15, '2023_04_04_210003_create_m_poliklinik_table', 0),
(16, '2023_04_04_210003_create_m_registrasi_table', 0),
(17, '2023_04_04_210003_create_m_room_class_table', 0),
(18, '2023_04_04_210003_create_m_ruangan_table', 0),
(19, '2023_04_04_210003_create_m_ruangan_baru_table', 0),
(20, '2023_04_04_210003_create_m_tarif_table', 0),
(21, '2023_04_04_210003_create_m_unit_table', 0),
(22, '2023_11_01_224326_create_m_unit_item_table', 1),
(23, '2023_10_31_235805_create_m_service_unit_room_table', 2),
(24, '2023_11_02_161025_create_m_unit_departemen_table', 3),
(25, '2023_09_05_000001_create_businesspartner_table', 4),
(26, '2023_09_05_000002_create_businesspartner_address_table', 5),
(27, '2023_09_05_000003_create_corporate_table', 6),
(28, '2023_09_05_000004_create_customercontract_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `m_bed`
--

CREATE TABLE `m_bed` (
  `bed_id` int NOT NULL,
  `service_unit_id` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `class_code` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `bed_code` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `site_code` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `registration_no` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reservation_no` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `phone_extension_no` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `bed_status` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `gc_type_of_bed` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_date_time` datetime DEFAULT NULL,
  `item_id_automation_charges` int DEFAULT NULL,
  `item_id_automation_charge_nurse` int DEFAULT NULL,
  `is_booked` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `is_temporary` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `is_active` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `is_deleted` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `last_updated_by` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `last_updated_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_bed`
--

INSERT INTO `m_bed` (`bed_id`, `service_unit_id`, `room_id`, `class_code`, `bed_code`, `site_code`, `registration_no`, `reservation_no`, `phone_extension_no`, `bed_status`, `gc_type_of_bed`, `created_date_time`, `item_id_automation_charges`, `item_id_automation_charge_nurse`, `is_booked`, `is_temporary`, `is_active`, `is_deleted`, `last_updated_by`, `last_updated_datetime`) VALUES
(1, 'P066', 159, 'V01', 'Bed A001', NULL, NULL, NULL, NULL, 'ready', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'CA', 160, 'V01', 'Bed A002', NULL, NULL, NULL, NULL, 'ready', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'ACC', 3, 'V01', 'Bed A003', NULL, NULL, NULL, NULL, 'ready', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'ADMER', 1, 'V01', 'SHD BED', NULL, NULL, NULL, NULL, 'ready', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'BB', 1, 'V01', 'Bed A004', NULL, NULL, NULL, NULL, 'ready', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44444, '123', 2, 'V01', 'ISO BED', NULL, NULL, NULL, NULL, 'ready', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_clinical_pathway`
--

CREATE TABLE `m_clinical_pathway` (
  `id` int NOT NULL,
  `kode_path` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nama_path` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_clinical_pathway`
--

INSERT INTO `m_clinical_pathway` (`id`, `kode_path`, `nama_path`, `username`) VALUES
(1, 'D123', 'Sakit Perut', NULL),
(2, 'D-0002', 'Tester', 'adminmaster');

-- --------------------------------------------------------

--
-- Table structure for table `m_detail_orders`
--

CREATE TABLE `m_detail_orders` (
  `id` int NOT NULL,
  `kode_order` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `kode_tindakan` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `nama_tindakan` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `harga_tindakan` int DEFAULT NULL,
  `jumlah_diambil` int DEFAULT NULL,
  `hasil_order` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `nama_petugas` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `is_delete` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `m_diagnosis`
--

CREATE TABLE `m_diagnosis` (
  `id` int NOT NULL,
  `kode_path` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nama_diagnosis` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `m_gejala`
--

CREATE TABLE `m_gejala` (
  `id` int UNSIGNED NOT NULL,
  `kode` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `gejala` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `m_intervention`
--

CREATE TABLE `m_intervention` (
  `id` int NOT NULL,
  `kode_path` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nama_intervention` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

CREATE TABLE `m_item` (
  `item_id` bigint UNSIGNED NOT NULL,
  `item_kode` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `item_nama` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `item_unit` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `item_jenis_tindakan` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `item_jenis_layanan` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `item_jenis_penunjang` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `item_tipe` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `deleted` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `updated_by` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `deleted_by` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_item`
--

INSERT INTO `m_item` (`item_id`, `item_kode`, `item_nama`, `item_unit`, `item_jenis_tindakan`, `item_jenis_layanan`, `item_jenis_penunjang`, `item_tipe`, `deleted`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'IGD1-1', 'Administrasi / Pendaftaran Pasien Baru', 'IGD', 'TARIF GD', 'PELAYANAN GD', '', '', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(2, 'IGD1-2', 'Administrasi / Pendaftaran Pasien Lama', 'IGD', 'TARIF GD', 'PELAYANAN GD', '', '', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(3, 'ADM1', 'Kartu Pasien (RFID)', 'IRJ', 'TARIF KONSULTASI DAN RAWAT JALAN', '', '', '', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(4, 'RJ/RI1', '1 PL/Ncl Yah > 2', 'IRJ/IRI', 'TINDAKAN MEDIS NON OPERATIF', 'RAWAT INAP / RAWAT JALAN', '', '', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(5, 'TK1', 'Aferesis', 'IRJ/IRI', 'TINDAKAN MEDIS NON OPERATIF', 'TINDAKAN KHUSUS', '', '', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(6, 'PK1', 'Aferesis', 'ALL', 'TARIF LABORATURIUM', 'PATOLOGI KLINIK', 'LAB', 'HEMATOLOGI', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(7, 'PA1', 'Jaringan Biopsi Kecil (>3cm/cc)', 'ALL', 'TARIF LABORATURIUM', 'PATOLOGI ANATOMI', 'LAB', 'HISTOPATOLOGI', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(8, 'BD1', 'Transufi Whole Blood (WB)', 'ALL', 'TARIF LABORATURIUM', 'BANK DARAH', 'LAB', '', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL),
(9, 'RAD1', 'Abdomen 3 Posisi', 'ALL', 'TARIF RADIOLOGI', '', 'RADIOLOGI', '', '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kelas_ruangan_baru`
--

CREATE TABLE `m_kelas_ruangan_baru` (
  `id` int NOT NULL,
  `nama_kelas` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tarif_kelas` int DEFAULT NULL,
  `is_active` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_kelas_ruangan_baru`
--

INSERT INTO `m_kelas_ruangan_baru` (`id`, `nama_kelas`, `tarif_kelas`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'III', 200000, '1', '2022-12-15 08:22:20', NULL),
(2, 'II', 400000, '1', '2022-12-15 08:22:20', NULL),
(3, 'I', 600000, '1', '2022-12-15 08:22:20', NULL),
(4, 'VIP', 1000000, '1', '2022-12-15 08:22:20', NULL),
(5, 'Super VIP', 2000000, '1', '2022-12-15 08:22:42', NULL),
(6, 'President Suite', 4000000, '1', '2022-12-15 08:22:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_location`
--

CREATE TABLE `m_location` (
  `LocationID` int NOT NULL,
  `SiteCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LocationCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LocationName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ShortName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Initial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PermissionCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ParentID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsAllowOverIssued` int DEFAULT NULL,
  `IsNettable` int DEFAULT NULL,
  `IsHoldForTransaction` int DEFAULT NULL,
  `IsDisplayStock` int DEFAULT NULL,
  `IsActive` int DEFAULT NULL,
  `IsDeleted` int DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastUpdatedDateTime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_location`
--

INSERT INTO `m_location` (`LocationID`, `SiteCode`, `LocationCode`, `LocationName`, `ShortName`, `Initial`, `PermissionCode`, `ParentID`, `Remarks`, `IsAllowOverIssued`, `IsNettable`, `IsHoldForTransaction`, `IsDisplayStock`, `IsActive`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(123, 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 1, 1, 1, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_medicine`
--

CREATE TABLE `m_medicine` (
  `id` int UNSIGNED NOT NULL,
  `kode` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nama` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_medicine`
--

INSERT INTO `m_medicine` (`id`, `kode`, `nama`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, '0002', 'Paracetamol', 0, 0, '2022-09-06 02:09:51', '2022-09-06 02:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `m_orders`
--

CREATE TABLE `m_orders` (
  `id` int NOT NULL,
  `kode_order` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `kategori` enum('laboratorium','radiologi','fisioterapy') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `user_order` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_user` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `med_rec` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status_order` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tanggal_order` date DEFAULT NULL,
  `waktu_order` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `m_outcome`
--

CREATE TABLE `m_outcome` (
  `id` int NOT NULL,
  `kode_path` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nama_outcome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `m_paramedis`
--

CREATE TABLE `m_paramedis` (
  `ParamedicID` bigint UNSIGNED NOT NULL,
  `ParamedicCode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `SiteCode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `FirstName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `MiddleName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `ParamedicName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `ParamedicInitial` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `DateOfBirth` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCSex` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCParamedicType` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCEmploymentStatus` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCReligion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCNationality` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Suffix` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `SpecialtyCode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `HiredDate` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `TerminatedDate` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `StartExperienceDate` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsTaxRegistrant` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `TaxRegistrantNo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LicenseNo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LicenseExpiredDate` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PictureFileName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsAvailable` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `NotAvailableUntil` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsAnesthetist` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsAudiologist` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsHasPhysicianRole` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Remarks` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsActive` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsFeeUsingPercentage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `FeeAmount` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `FeePercentage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BankName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BankAccountNo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BankAccountName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `SSN` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsDeleted` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedDateTime` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_paramedis`
--

INSERT INTO `m_paramedis` (`ParamedicID`, `ParamedicCode`, `SiteCode`, `FirstName`, `MiddleName`, `LastName`, `ParamedicName`, `ParamedicInitial`, `DateOfBirth`, `GCSex`, `GCParamedicType`, `GCEmploymentStatus`, `GCReligion`, `GCNationality`, `Title`, `Suffix`, `SpecialtyCode`, `HiredDate`, `TerminatedDate`, `StartExperienceDate`, `IsTaxRegistrant`, `TaxRegistrantNo`, `LicenseNo`, `LicenseExpiredDate`, `PictureFileName`, `IsAvailable`, `NotAvailableUntil`, `IsAnesthetist`, `IsAudiologist`, `IsHasPhysicianRole`, `UserName`, `Remarks`, `IsActive`, `IsFeeUsingPercentage`, `FeeAmount`, `FeePercentage`, `BankName`, `BankAccountNo`, `BankAccountName`, `SSN`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(1, 'D9999', '1', 'QPRO', '', '', 'QPRO', 'QPRO', '6/16/1976', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', '32', '0001-01-01', '0001-01-01', NULL, '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'qpro', '', '0', '0', '0', '0', '', '', '', NULL, '0', 'SCRIPT', '54:00.3'),
(2, '1', '1', 'Herry', 'Raharjo', '', 'dr. Herry Raharjo ,Sp. B', 'HR', '3/18/1973', '0001^M', 'X0055^001', NULL, NULL, NULL, 'dr', 'Sp. B', '13', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'melia', '52:50.6'),
(3, 'A0001', '1', 'HERRY', 'RAHARDJO', '', 'dr. Herry Rahardjo, Sp.B', 'HE', '3/18/1973', '0001^M', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', 'dr.', 'Sp.B', 'spb', '0001-01-01', '0001-01-01', '3/18/1999', '0', '-', '446/IPD/0110/DPMPTSP-PPK/2018', '5/25/2019', 'dr. Herry Rahardjo,Sp.B_2.jpg', '1', NULL, '0', '0', '0', 'H3rr1', 'Riwayat Pendidikan : \n1. S1 Fakultas Kedokteran UNSRI (1991 s.d. 1998)\n2. PPDS Ilmu Bedah Fakultas Kedokteran UNSRI (2008 s.d. 2014)\n\nRiwayat Pekerjaan :\n1. Pimpinan Puskesmas Kota Agung Lahat (1999 s.d. 2002)\n2. Staff Fungsional UGD RSUD BARI Palembang (', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '12:36.0'),
(4, 'A0002', '1', 'JIMMY ', 'MEGASARI', '', 'dr. Jimmy Vareta, Sp.B', 'JI', '7/25/1983', '0001^M', 'X0055^001', 'X0020^002', NULL, 'X0014^001', 'dr.', 'Sp.B', 'spb', '0001-01-01', '0001-01-01', '1/1/2014', '0', '-', '', '2/24/2020', 'dr.jimmy vareta, Sp.B..jpg', '1', NULL, '0', '0', '0', 'JimmyV', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNPAD (2008)\n2. PPDS Ilmu Bedah FK UNPAD (2013)\n\nRiwayat Pekerjaan :\n1. RS Pertamina Plaju 2014-2015\n2. RS Siloam Sriwijaya 2014-sekarang\n3. RS Muhammadiyah Palembang 2014-sekarang\n4. RSUD Provinsi Sumatera S', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '48:10.1'),
(5, 'A0003', '1', 'RAHMITA', 'WIJAYA', 'LANA PUTRA', 'dr. Rahmita, Sp.B', 'RA', '10/12/1984', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', 'dr.', 'Sp.B', 'spb', '0001-01-01', '0001-01-01', '8/1/2016', '0', '-', '446/IPD/0747/DPMPTSP-PPK/2018', '12/22/2022', NULL, '1', NULL, '0', '0', '0', 'rahmita', 'Riwayat Pendidikan :\n1. Dokter Umum FK Unsri\n2. Ilmu Bedah FK Unsri\n\nRiwayat Pekerjaan :\n1. PT. Freeport Indonesia Papua (2016-2018)\n2. RSUD Provinsi Sumatera Selatan 2018-sekarang ', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '16:26.8'),
(6, 'A0004', '1', 'NATALIE', 'DEVINA', 'FITRI', 'dr. Natalie Duyen, Sp.P, M.Kes', 'NA', '11/27/2018', '0001^F', 'X0055^001', NULL, NULL, NULL, 'dr.', 'Sp.P, M.Kes', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '45:04.8'),
(7, 'A0005', '1', 'ERIKA', 'DESTYA', 'RAHMAYANTI', 'dr. Erika Apriyani, Sp.Rad', 'ER', '11/27/2018', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr.', 'Sp.Rad', '69', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '446/IPD/0607/DPMPTSP-PPK/2018', '9/4/2019', NULL, '1', NULL, '0', '0', '0', 'Erika', '', '0', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '52:18.9'),
(8, 'A0006', '1', 'MUHAMMAD', 'PRASETYO', 'UTOMO', 'dr. Muhammad Khalif Anfasa, Sp.OG', 'MU', '2/12/1984', '0001^M', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr.', 'Sp.OG', '26', '0001-01-01', '0001-01-01', '6/1/2013', '0', '-', '446/IPD/0024/DPMPTSP-PPK/2019', '2/12/2022', 'dr. Muhammad Khalif Anfasa, Sp.OG.jpg', '1', NULL, '0', '0', '0', 'Alipaja', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNSRI (2008)\n2. PPDS?Ilmu Kebidanan dan Penyakit Kandungan,?Fakultas Kedokteran Universitas\nSriwijaya, Palembang (2013)\n?\nRiwayat Pekerjaan :\n1. RS Hermina Palembang 2013-2018\n2. Staf Pengajar FK UNSRI 2013-s', '0', '0', '150000', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '52:40.0'),
(9, 'A0007', '1', 'PUTRI', 'WULANDARI', '', 'dr. Putri Healthireza Novianesari, Sp.OG', 'PU', '11/12/1987', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr.', 'Sp.OG', '26', '0001-01-01', '0001-01-01', '6/1/2017', '0', '-', '446/IPD/0777/DPMPTSP-PPK/2018', '11/12/2022', 'foto put.jpg', '1', NULL, '0', '0', '0', 'Healthi', 'Riwayat pendidikan : \n1. Pendidikan dokter umum FK Unsri, \n2. PPDS I Obstetri dan Ginekologi FK Unsri\n\nRiwayat Pekerjaan : \n1. Trijaya Medical Center (Juni-juli 2017)\n2. RSUD Rupit Kabupaten Musi Rawas Utara (Juli 2017-agustus 2018)\n3. RSUD Provinsi Sumse', '0', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '52:59.3'),
(10, 'A0008', '1', 'dr. Yan Permadi, SpOG, MKes', '', '', 'dr. Yan Permadi, SpOG, MKes', 'YA', '1/18/2018', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '26', '0001-01-01', '0001-01-01', '8/1/2006', '0', '-', '446/IPD/0277/DPMPTSP-PPK/2018', '10/28/2019', 'dr. Yan Permadi, SpOG, MKes.jpg', '1', NULL, '0', '0', '0', 'Yan', 'Riwayat Pendidikan\n1. S1 Fakultas Kedokteran Universitas Trisakti, Jakarta (1998 ? 2003) \n2. Profesi Fakultas Kedokteran Universitas Trisakti Jakarta (2003 ? 2006)\n3. PPDS Ilmu Kebidanan dan Penyakit Kandungan, Fakultas Kedokteran Universitas (2010 ? 2014', '0', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '00:13.9'),
(11, 'A0009', '1', 'NITA', 'YUSRON', '', 'dr. Nita Hertati, Sp. PA', 'NI', '2/18/1971', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, 'dr.', 'Sp.PA', 'spa', '0001-01-01', '0001-01-01', '6/29/1997', '0', '-', '446/IPD/0368/DPMPTSP-PPK/2018', '4/15/2019', 'dr. Nita Hertati, Sp.PA.jpg', '1', NULL, '0', '0', '0', 'drnita', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNSRI (1997)\n2. PPDS Ilmu Patologi Anatomi FK UNSRI (2013)\n?\nRiwayat Pekerjaan :\n1. Puskesmas Tanjung Sakti Lahat 1997-2000\n2. RS Ernaldi Bahar 2000-2018\n3. RSUD Provinsi Sumatera Selatan 2018-sekarang', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ivan', '12:54.9'),
(12, 'A0010', '1', 'Diah ', 'Syafriani ', '', 'dr.. Diah  Syafriani  ,Sp.PD, KP, FINASIM', 'DI', '3/22/1972', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', 'dr.', 'Sp.PD, KP, FINASIM', 'spd', '0001-01-01', '0001-01-01', '1/1/2002', '0', '-', '446/IPD/0346/DPMPTSP-PPK/2018', '3/22/2023', 'dr. Diah Syafriani, Sp.PD, FINASIM_2.jpg', '1', NULL, '0', '0', '0', 'D14H', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNSRI (2001)\n2. PPDS Ilmu Penyakit Dalam FK UNSRI (2013)\n3. Spesialis Konsultan Paru\n?\nRiwayat Pekerjaan :\n1. PTT RSUD Besemah Pagar Alam 2002-2005\n2. PNS RSUD ZA Pagar Alam Way Kanan Lampung 2005-2015\n3. RSK', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '37:00.8'),
(13, 'A0011', '1', 'IMELDA', '', 'VERONIKCA', 'dr. Imelda Veronica, Sp.PD', 'IM', '1/7/1977', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', 'dr.', 'Sp.PD ', 'spd', '0001-01-01', '0001-01-01', '1/1/2015', '0', '-', '446/IPD/0498/DPMPTSP-PPK/2018', '3/3/2020', 'Imelda Veronica.jpeg', '1', NULL, '0', '0', '0', '1177EL1', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNSRI (2002) \n2. PPDS Ilmu penyakit dalam FK UNSRI (2015) \n\nRiwayat Pekerjaan :\n1. RS Khusus Mata Provinsi Sumatera Selatan 2015 ? 2018 \n2. RS Islam Ar Rasyid Palembang 2015 ? Sekarang \n3. RS Graha Mandiri Pa', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '26:37.7'),
(14, 'A0012', '1', 'RITA', '', 'SRIWULANDARI', 'dr. Rita Sriwulandari, Sp.PD, FINASIM', 'RI', '3/4/1976', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr.', 'Sp.PD, FINASIM', 'spd', '0001-01-01', '0001-01-01', '1/1/2002', '0', '-', '446/IPD/0561/DPMPTSP-PPK/2018', '4/3/2024', 'dr. Rita Sriwulandari, Sp.PD, FINASIM_2.jpg', '1', NULL, '0', '0', '0', 'Rita', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNSRI (2001)\n2. PPDS Ilmu Penyakit Dalam FK UNSRI (2013)\n?\nRiwayat Pekerjaan :\n1. PTT RSUD Besemah Pagar Alam 2002-2005\n2. PNS RSUD ZA Pagar Alam Way Kanan Lampung 2005-2015\n3. RSK Paru Prov Sumsel 2015-2018\n', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '32:22.1'),
(15, 'A0013', '1', 'AYU', '', 'PARAMESWARI', 'dr. Ayu Parameswari, Sp.KK', 'AY', '7/6/1989', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr.', 'Sp.KK', 'skk', '0001-01-01', '0001-01-01', '8/1/2007', '0', '-', '446/IPD/0345/DPMPTSP-PPK/2018', '1/1/2020', 'dr. Ayu Prameswari, Sp.KK...jpg', '1', NULL, '0', '0', '0', '412YU', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran Universitas Muhammadiyah Yogyakarta (2006)\n2. PPDS Ilmu Kesehatan Kulit dan Kelamin FK UNSRI (2014)\n\nRiwayat Pekerjaan :\n1. PT. Musi Prima Sejahtera 2007\n2. Dokter PTT Puskesmas Karang Mukti Kab. Musi Banyuas', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '34:26.1'),
(16, 'A0014', '1', 'ELLY', '', 'ASRIAH', 'dr. Elly Asriah, Sp.M', 'EL', '4/18/1964', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr.', 'Sp.M', 'sm', '0001-01-01', '0001-01-01', '8/1/1990', '0', '-', '446/IPD/1320/DPMPTSP-PPK/2018', '0001-01-01', 'dr. Elly Asriah, Sp.M_2.jpg', '1', NULL, '0', '0', '0', 'ELLYAZ', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNSRI (1989)\n2. PPDS Ilmu Penyakit Mata FK UNSRI (2008)\n\nRiwayat Pekerjaan :\n1. RSUD Kerinci Jambi 1990-1994\n2. RSKMM Prov Sumsel 1998-2000\n3. RSUD Mempawa Prov Kal Bar 1998 - 2000\n4. RSK Paru Prov Sumsel 200', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '38:01.3'),
(17, 'A0015', '1', 'LIDYA', '', 'APRILINA', 'dr. Lidya Aprilina, Sp.S', 'LI', '4/2/1981', '0001^F', 'X0055^001', NULL, NULL, 'X0014^001', 'dr.', 'Sp.S', 'sps', '0001-01-01', '0001-01-01', '1/1/2011', '0', '-', '446/IPD/0510/DPMPTSP-PPK/2018', '2/4/2020', 'dr. Lidya Aprilina, Sp.S_2.jpg', '1', NULL, '0', '0', '0', 'Lidya', 'Riwayat Pendidikan :\n1. S1 Fakultas Kedokteran UNSRI (2005)\n2. PPDS Ilmu Penyakit Saraf FK UNSRI (2011)\n?\nRiwayat Pekerjaan :\n1. Rs Ernaldi Bahar 2011-2018\n2. Rs Siloam Sriwijaya Palembang 2012-sekarang\n3. Rs Graha Pusri Medika Palembang 2013-2018\n4. Rs P', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'detinadra', '34:46.8'),
(18, 'A0016', '1', 'AJENG', 'INTAN ESTRIE', 'AMANDA', 'dr. Ajeng Intan Estrie Amanda', 'AJ', '11/10/1989', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr.', '', '66', '0001-01-01', '0001-01-01', '1/1/2012', '0', '-', '446/IPD/0337/DPMPTSP-PPK/2018', '2/12/2019', 'DR.-AJENG.jpg', '1', NULL, '0', '0', '0', 'aj', 'Riwayat Pendidikan : \n1.S1 Fakultas Kedokteran UNSRI (2012) \n\nRiwayat Pekerjaan :\n1.RSUD Kayu Agung 2012 ? 2014 \n2.Klinik Syifa Azzahra 2016 ? sekarang \n3.RSUD Provinsi Sumatera Selatan 2018 ? sekarang ', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '15:41.2'),
(19, 'A0017', '1', 'FERDY', '', 'RAHADIYAN', 'dr. Ferdy Rahadiyan', 'FE', '2/4/1988', '0001^M', 'X0055^001', NULL, NULL, 'X0014^001', 'dr.', '', '66', '0001-01-01', '0001-01-01', '1/1/2011', '0', '-', '446/IPD/0776/DPMPTSP-PPK/2018', '0001-01-01', 'DR.-FERDY.jpg', '1', NULL, '0', '0', '0', 'ferdyR', 'Riwayat Pendidikan : \n1.S1 Fakultas Kedokteran UNSRI (2011) \nRiwayat Pekerjaan :\n1.RSUD Sekayu 2014-2017 \n2.RSUD Provinsi Sumatera Selatan 2018-sekarang ', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '56:04.6'),
(20, 'A0018', '1', 'AYU', '', 'RATNASARI', 'dr. Ayu Ratnasari', 'AY', '6/26/1989', '0001^F', 'X0055^001', NULL, '0006^MOS', 'X0014^001', 'dr.', '', '66', '0001-01-01', '0001-01-01', '1/1/2012', '0', '-', '446/IPD/0350/DPMPTSP-PPK/2018', '0001-01-01', 'dr. Ayu Ratnasari_2.jpg', '1', NULL, '0', '0', '0', 'ayurari', 'Riwayat Pendidikan :\n1.S1 Fakultas Kedokteran UNSRI (2012)\nRiwayat Pekerjaan :\n1.RSUD Martapura 2013-2014\n2.RSIA Widyanti Palembang 2014-2015\n3.Poliklinik Mapolda Sumatera Selatan 2014\n4.RSIA Tiara Fatrin 2017\n5.RSUD Provinsi Sumatera Selatan 2018-sekaran', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '47:45.9'),
(21, 'A0019', '1', 'NUR', 'EKA', 'SANFITRI', 'dr. Nur Eka Sanfitri', 'NU', '4/23/1990', '0001^F', 'X0055^001', NULL, '0006^MOS', 'X0014^001', 'dr.', '', '66', '0001-01-01', '0001-01-01', '1/1/2012', '0', '-', '446/IPD/0349/DPMPTSP-PPK/2018', '0001-01-01', 'DR.-NUR-EKA.jpg', '1', NULL, '0', '0', '0', 'nureka', 'Riwayat Pendidikan : \n1.S1 Fakultas Kedokteran UNSRI (2012) \nRiwayat Pekerjaan :\n1.RSUD Rabain Muara Enim 2013-2014 \n2.RSIA Graha Mandiri 2014 \n3.RSUD Palembang Bari 2015 ? sekarang \n4.RSUD Provinsi Sumatera Selatan 2018 ? sekarang ', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '48:19.7'),
(22, 'A0020', '1', 'DIAN', '', 'AFIDA', 'dr. Dian Afida', 'DI', '2/2/1991', '0001^F', 'X0055^001', NULL, NULL, 'X0014^001', 'dr.', '', '66', '0001-01-01', '0001-01-01', '1/1/2014', '0', '-', '446/IPD/0330/DPMPTSP-PPK/2018', '0001-01-01', 'dr. Dian Afida_2.jpg', '1', NULL, '0', '0', '0', '', 'Riwayat Pendidikan : \n1.S1 Fakultas Kedokteran UNSRI (2014) \n\nRiwayat Pekerjaan :\n1.RSUD Sekayu 2014-2015 \n2.RS Pusri Palembang 2016-2017 \n3.RSI Siti Khadijah 2017-2018 \n4.RSUD Provinsi Sumatera Selatan 2018-sekarang ', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '18:43.8'),
(23, 'A0021', '1', 'MENTI', '', 'YOULANDA', 'drg. Menti Youlanda', 'ME', '11/18/1988', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'drg.', '', 'gigi', '0001-01-01', '0001-01-01', '1/1/2012', '0', '-', '446/IPD/0247/DPMPTSP-PPK/2018', '11/18/2023', 'drg. Menti Youlanda_2.jpg', '1', NULL, '0', '0', '0', 'Menti', 'Riwayat Pendidikan : \n1.S1 Fakultas Kedokteran Gigi UNSRI (2012) \n2.S2 Magister Manajemen Universitas Bina Darma (2018) \nRiwayat Pekerjaan :\n1.Klinik Kesehatan PT. KAI Palembang 2013 ? 2015 \n2.Poliklinik Mapolda Sumatera Selatan 2015 ? 2018 \n3.RS. Myria P', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '45:47.6'),
(24, 'A0022', '1', 'Indah Megawati, Amd.Kep', '', '', 'Indah Megawati, Amd.Kep', 'IN', '10/5/1987', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '8/2/2018', '12/31/2018', '8/2/2018', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'indahmega', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '04:16.7'),
(25, 'A0023', '1', 'Masayu Cindy Kartikasari', '', ', Amd.Kep', 'Masayu Cindy Kartikasari , Amd.Kep', 'MA', '8/28/1988', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '2/2/2018', '12/31/2018', '3/15/2011', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'cindy', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'detinadra', '38:52.2'),
(26, 'A0024', '1', 'DIANA', '', 'NOVIANTI', 'Diana Novianti', 'DI', '7/18/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'diana', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'salahudin', '04:56.1'),
(27, 'A0025', '1', 'NIRMAN', '', 'HADI', 'Nirman Hadi', 'NI', '7/18/2018', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'hadi', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'riza94', '42:46.0'),
(28, 'A0026', '1', 'Muhammad Amin', '', ', Amd.Kep', 'Muhammad Amin , Amd.Kep', 'MU', '4/11/1991', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '2/2/2018', '12/31/2018', '7/25/2017', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'muamin', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'detinadra', '52:52.6'),
(29, 'A0027', '1', 'Rodiatan Mardiah, S.Kep', '', '', 'Rodiatan Mardiah, S.Kep', 'RO', '8/28/1988', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '1/1/2010', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'didi', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '10:52.4'),
(30, 'A0028', '1', 'Nyimas Nurlina, S.Kep', '', '', 'Ns. Nyimas Nurlina, S.Kep', 'NY', '12/26/1987', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '1/1/2010', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'nyimasnur', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '12:47.2'),
(31, 'A0029', '1', 'Feby kurnia Sona, S.Kep', '', '', 'Ns. Feby kurnia Sona, S.Kep', 'FE', '2/6/1989', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '11/3/2010', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'febykurn', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '11:22.3'),
(32, 'A0030', '1', 'SYAWALUDDIN', '', '', 'Syawaluddin', 'SY', '5/19/1989', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '12/6/2011', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'syawal', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ganda', '16:22.1'),
(33, 'A0031', '1', 'Meta Puspa Indah, S.Kep', '', '', 'Ns. Meta Puspa Indah, S.Kep', 'ME', '7/9/2018', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', 'Ns', '', '241', '2/2/2018', '12/31/2018', '1/1/2010', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'metapus', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'riza94', '27:19.2'),
(34, 'A0032', '1', 'ANITA', '', 'NURILASARI', 'Anita Nurillasari', 'AN', '6/25/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '8/2/2018', '12/31/2018', '12/15/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'anita', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ganda', '14:23.4'),
(35, 'A0033', '1', 'INDRA', 'FRANA JAYA', 'KARO-KARO', 'Indra Frana Jaya KK', 'IN', '10/30/2018', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'indra', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', '412IY', '23:07.8'),
(36, 'A0034', '1', 'TYAS', '', 'CAHYANI', 'Tyas Cahyani', 'TY', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'tyas', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'detinadra', '45:48.7'),
(37, 'A0035', '1', 'BUDI', 'KURNIANSYAH,', 'Amd.Kep', 'BUDI KURNIANSYAH, Amd.Kep', 'BU', '9/5/1994', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '1/6/2014', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'Budi', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '40:25.1'),
(38, 'A0036', '1', 'Ns. Thresia ', '', 'Rumondang, S.Kep', 'Ns. Thresia  Rumondang, S.Kep', 'TH', '7/13/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '11/9/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'teresia', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '59:59.7'),
(39, 'A0037', '1', 'AHMAD', '', 'SOBIRIN', 'Ahmad Sobirin', 'AH', '8/17/1989', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '2/5/2014', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'Ahmad', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '38:56.0'),
(40, 'A0038', '1', 'Sri Erni Agustini', ', Amd.Kep', '', 'Sri Erni Agustini , Amd.Kep', 'SR', '12/2/1988', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '2/2/2018', '12/31/2018', '11/17/2010', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'erni', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'adetrias', '22:20.7'),
(41, 'A0039', '1', 'Ristianingsih, Amd.Kep', '', '', 'Ristianingsih, Amd.Kep', 'RI', '12/3/1988', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '2/2/2018', '12/31/2018', '7/13/2010', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'ristianing', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '48:58.1'),
(42, 'A0040', '1', 'INDAH', 'PERMATA ', 'PUTRI', 'Ns. INDAH PERMATA  PUTRI ,S. Kep', 'IN', '12/3/1988', '0001^F', 'X0055^003', NULL, NULL, NULL, 'Ns', 'S. Kep', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'indah', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ZAA', '58:05.7'),
(43, 'A0041', '1', 'Riki', '', 'Saputra, Amd.Kep', 'Riki Saputra, Amd.Kep', 'RI', '7/15/1994', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '1/30/2018', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'Riki', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'riza94', '33:28.2'),
(44, 'A0042', '1', 'Miranda novalina, S.Kep', '', '', 'Ns. Miranda novalina, S.Kep', 'MI', '11/20/1991', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/7/2013', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'miranda', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '25:26.6'),
(45, 'A0043', '1', 'WENI', '', 'RAHMAYANTI', 'Weni Rahma', 'WE', '4/15/1989', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '8/2/2018', '12/31/2018', '10/6/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'weni', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ganda', '22:36.1'),
(46, 'A0044', '1', 'Monika Sutra, S.Kep', '', '', 'Ns. Monika Sutra, S.Kep', 'MO', '6/6/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/23/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'monika', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'riza94', '32:03.1'),
(47, 'A0045', '1', 'NASTARIA', '', 'NASTARIA', 'Nastaria', 'NA', '3/9/1987', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '8/2/2018', '12/31/2018', '9/28/2011', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'nastaria', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ganda', '21:24.5'),
(48, 'A0046', '1', 'Elvin Prakoso, Amd.Kep', '', '', 'Elvin Prakoso, Amd.Kep', 'EL', '6/6/1993', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '2/2/2018', '12/31/2018', '8/1/2014', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'elvinprako', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '52:29.8'),
(49, 'A0047', '1', 'Windy Melvianti, S.Kep', '', '', 'Windy Melvianti, S.Kep', 'WI', '5/24/1992', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/25/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'windy', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'detinadra', '25:13.5'),
(50, 'A0048', '1', 'Maria Regina, Amd.Kep', '', '', 'Maria Regina, Amd.Kep', 'MA', '5/13/1990', '0001^F', 'X0055^003', 'X0020^001', '0006^CTH', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/11/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'maria', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '31:22.4'),
(51, 'A0049', '1', 'Nurhayati, S.Kep', '', '', 'Ns. Nurhayati, S.Kep', 'NU', '4/6/1986', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/28/2001', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'nurhayati', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '18:18.6'),
(52, 'A0050', '1', 'Resti Martia, Amd.Kep', '', '', 'Resti Martia, Amd.Kep', 'RE', '4/14/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '8/30/2017', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'resti', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '19:46.5'),
(53, 'A0051', '1', 'Mahniarti Dian Mersia, S.Kep', '', '', 'Mahniarti Dian Mersia, S.Kep', 'MA', '3/24/1990', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '5/18/2014', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'mahniarti', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '40:20.5'),
(54, 'A0052', '1', 'Rani Mulyasari,', '', 'Amd.Kep', 'Rani Mulyasari, Amd.Kep', 'RA', '10/10/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/17/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'rani', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '21:53.7'),
(55, 'A0053', '1', 'Ermita', 'Putria, S.Kep', '', 'Ns. Ermita Putria, S.Kep', 'ER', '4/21/1990', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/16/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'ermita', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '24:31.3'),
(56, 'A0054', '1', 'Winda Wahyuni, Amd.Kep', '', '', 'Winda Wahyuni, Amd.Kep', 'WI', '11/20/1991', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '2/2/2018', '12/31/2018', '12/31/2018', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'windawahyu', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '50:21.7'),
(57, 'A0055', '1', 'Efrida', 'Kartika ', 'Sari, S.Kep', 'Efrida Kartika  Sari, S.Kep', 'EF', '7/5/1988', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/16/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'efrida', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'detinadra', '05:04.8'),
(58, 'A0056', '1', 'MUHAMMAD', 'FAHRIZAL', 'ALI USMAN', 'Muhammad Fahrizal Ali Usman', 'MU', '6/24/1995', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '2/2/2018', '12/31/2018', '2/2/2018', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'ijal', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ganda', '23:57.2'),
(59, 'A0057', '1', 'Soni Farid Apriansyah, S.Kep', '', '', 'Ns. Soni Farid Apriansyah, S.Kep', 'SO', '5/24/1992', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '243', '2/2/2018', '12/31/2018', '8/1/2014', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'soni', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'adetrias', '21:47.3'),
(60, 'A0058', '1', 'Ns. RELAWATI', 'S,Kep', '', 'Ns. RELAWATI S,Kep', 'RE', '12/26/1991', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '10/7/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'Relawati', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '37:36.0'),
(61, 'A0059', '1', 'Agus Diman Syahputra, Amd.Kep', '', '', 'Agus Diman Syahputra, Amd.Kep', 'AG', '8/17/1994', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '7/25/2017', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'agus', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '26:59.0'),
(62, 'A0060', '1', 'Wufit Sauliah, Amd.Kep', '', '', 'Wufit Sauliah, Amd.Kep', 'WI', '10/10/1993', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '2/2/2018', '12/31/2018', '8/1/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'wufit', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '56:50.1'),
(63, 'A0061', '1', 'Novi Andriyani, Amd.Kep', '', '', 'Novi Andriyani, Amd.Kep', 'NO', '11/24/1995', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '12/7/2017', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'Novi', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'riza94', '35:33.6'),
(64, 'A0062', '1', 'Untari, S.Kep', '', '', 'Ns. Untari, S.Kep', 'UN', '9/3/1992', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', 'Ns', '', '236', '2/2/2018', '12/31/2018', '6/25/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'untari', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '26:04.2'),
(65, 'A0063', '1', 'Seli Wahyuni, Amd.Kep ', '', '', 'Seli Wahyuni, Amd.Kep ', 'SE', '11/11/1992', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/12/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'seli', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '39:16.8'),
(66, 'A0064', '1', 'Cholila', 'Ramadita, Amd.Kep', '', 'Cholila Ramadita, Amd.Kep', 'CH', '2/15/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '11/4/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'Cholila', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '42:54.0'),
(67, 'A0065', '1', 'Patimah, Amd.Kep', '', '', 'Patimah, Amd.Kep', 'PA', '4/14/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '2/2/2018', '12/31/2018', '11/1/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'patimah', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '53:16.0'),
(68, 'A0066', '1', 'Rizki Dian Agustri, Amd.Kep', '', '', 'Rizki Dian Agustri, Amd.Kep', 'RI', '9/16/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/11/2015', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'dian', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '32:08.8'),
(69, 'A0067', '1', 'Eka Susanti, Amd.Kep', '', '', 'Eka Susanti, Amd.Kep', 'EK', '9/1/1986', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '2/2/2018', '12/31/2018', '2/9/2010', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'ekasusanti', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '51:08.2'),
(70, 'A0068', '1', 'Rossy Vratama, Amd.Kep', '', '', 'Rossy Vratama, Amd.Kep', 'OS', '9/1/1986', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/16/2011', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'rossy', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '29:36.0'),
(71, 'A0069', '1', 'APRIANSYAH', '', '', 'Apriansyah', 'AP', '4/21/2018', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '2/2/2018', '12/31/2018', '2/2/2018', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'apri', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ganda', '29:13.6'),
(72, 'A0070', '1', 'Nelly, S.Kep', '', '', 'Ns. Nelly, S.Kep', 'NE', '11/26/1987', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '11/7/2012', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'NellySF', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '52:50.6'),
(73, 'A0071', '1', 'Asmaniar, Amd.Keb', '', '', 'Asmaniar, Amd.Keb', 'AS', '12/9/1987', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '9/7/2011', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'asmaniar', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '46:50.1'),
(74, 'A0072', '1', 'Bd Yori', '', 'Oktawiora', 'Bd Yori Oktawiora', 'YO', '11/1/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'bersalin', '', '0', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '21:33.1'),
(75, 'A0073', '1', 'Bd. MUTIARA', '', 'LORENZA', 'Bd. MUTIARA LORENZA', 'MU', '3/31/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'mutiaraa', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '08:04.5'),
(76, 'A0074', '1', 'DIAN', '', 'OKTARI', 'Dian Oktaria', 'DI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', '0', NULL, NULL, NULL, NULL, '1', 'riza94', '12:32.3'),
(77, 'A0075', '1', 'Bd. RINDA', '', 'HARMANITA', 'Bd. RINDA HARMANITA', 'RI', '2/7/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'RINDA', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '22:27.7'),
(78, 'A0076', '1', 'bd. NOVA', 'EKA ', 'LESTARY', 'bd. NOVA EKA  LESTARY', 'NO', '1/18/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'novaeka', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '25:34.3'),
(79, 'A0077', '1', 'Bd. Afdhila Ulfah', '', '', 'Bd. Afdhila Ulfah', 'AF', '7/12/1992', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '239', '2/2/2018', '12/31/2018', '10/13/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'AFDHILA', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'riza94', '32:13.8'),
(80, 'A0078', '1', 'Bd. Nur', '', 'Hidayah', 'Bd. Nur Hidayah', 'NU', '1/30/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '237', '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'NUR', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'riza94', '32:42.2'),
(81, 'A0079', '1', 'DWI', 'SUCI', 'AFRIANTI', 'Dwi Suci Afriyanti', 'DW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'init', '30:00.0'),
(82, 'A0080', '1', 'bd. Adelia Tiara Fatrin, Amb.Keb', '', '', 'bd. Adelia Tiara Fatrin, Amb.Keb', 'AD', '7/20/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '239', '8/2/2018', '12/31/2018', '8/4/2016', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'ADELIA', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '41:15.1'),
(83, 'A0081', '1', 'Jurnia', '', 'Suprianti', 'Jurnia Suprianti', 'JU', '2/7/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', '', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '01:47.4'),
(84, 'A0082', '1', 'Bd Ernawati', '', '', 'Bd Ernawati', 'ER', '2/7/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'ERNAWATI', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ade93', '34:08.2'),
(85, 'A0083', '1', 'AYU', 'OKTA ', 'RINA', 'Ayu Okta Rina', 'AY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'Ayutimkes', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '35:56.4'),
(86, 'A0084', '1', 'SARTIKA', '', '', 'Sartika', 'SA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'sartika', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ZAA', '05:48.1'),
(87, 'A0085', '1', 'RAHMITA', 'TAMA', 'WARDHANI', 'Rahmi Tama Wardhani', 'RA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'rahmi', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ZAA', '09:21.2'),
(88, 'A0086', '1', 'AYU', 'OKTA ', 'RINI', 'Ayu Okta Rini', 'AY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'oktarini', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ZAA', '06:55.0'),
(89, 'A0087', '1', 'YERI', 'MEI', 'FERINA', 'Yeri Mei Ferina', 'YE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'Yeri', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ZAA', '11:58.2'),
(90, 'A0088', '1', 'YULI', '', 'YUNITA', 'Yuli Yunita', 'YU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'yuli', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '24:05.7'),
(91, 'A0089', '1', 'RESTU', '', 'PRANANDARI', 'Restu Pranandari', 'RE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'init', '30:00.0'),
(92, 'A0090', '1', 'Faradina Rosa', 'S.Kep', '', 'Ns. Faradina Rosa S.Kep', 'FA', '5/20/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '2/2/2018', '12/31/2018', '11/2/2018', '0', '-', '-', '0001-01-01', NULL, '1', NULL, '0', '0', '0', 'faradinar', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'zaa', '06:13.1'),
(93, 'A0091', '1', 'WIDYA', 'EKA', 'PUTRI', 'Widya Eka Putri', 'WI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'Widyaeka', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'melia', '15:42.7'),
(94, 'A0092', '1', 'SRI', 'IRDA', 'AYU', 'Sri Irda Ayu', 'SR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '-', '-', NULL, NULL, '1', NULL, '0', '0', '0', 'sriirda', '', '1', '0', '0', '0', NULL, NULL, NULL, NULL, '0', 'ZAA', '10:16.7'),
(95, 'hayyu', '1', 'Hayyu Pramasari', '', '', 'Hayyu Pramasari', 'hp', '5/17/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '8/2/2018', '12/31/2018', '10/19/2017', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'hayyu', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '29:13.9'),
(96, '93', '1', 'Oktaria Saptarina', '', '', 'Oktaria Saptarina', 'os', '10/5/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '8/2/2018', '12/31/2018', '8/2/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'oktaria', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '11:10.1'),
(97, '95', '1', 'Sylva Sumarlinda', '', '', 'Sylva Sumarlinda', 'ss', '7/31/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '7/31/1994', '12/31/2018', '12/20/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'sylva', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '29:05.0'),
(98, '98', '1', 'Dwina Usmaul Husna', '', '', 'Dwina Usmaul Husna', 'dw', '7/12/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '21:50.8'),
(99, 'DEMO', '1', 'Maria', 'Dharmawan', '(DEMO)', 'Maria Dharmawan (DEMO)', 'DM', '8/3/2018', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', '3', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mrd', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '51:54.0'),
(100, 'A0093', '1', 'Wahyuni Agustina', '', '', 'Wahyuni Agustina', 'WA', '8/13/2018', '0001^F', 'X0055^009', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'tinayahya', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '37:15.9'),
(101, 'A0094', '1', 'Adela Febri Monika', '', '', 'Adela Febri Monika', 'AFM', '8/13/2018', '0001^F', 'X0055^009', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'adelafm18', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'salahudin', '10:38.6'),
(102, 'A0095', '1', 'Desy Amelia Purwani, SE', '', '', 'Desy Amelia Purwani, SE', 'DAP', '8/13/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'desyaw', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'salahudin', '33:43.9'),
(103, 'A0096', '1', 'Riza Yurika', '', '', 'Riza Yurika', 'RY', '8/13/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'riza', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '05:19.4'),
(104, 'A0097', '1', 'Riski Mardiana', '', '', 'Riski Mardiana', 'RM', '8/13/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'riskiM', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '21:16.9'),
(105, 'A0098', '1', 'Rizky Utami', '', '', 'Rizky Utami', 'RU', '8/13/2018', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rizkiU', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '26:14.3'),
(106, 'A0099', '1', 'Jumaidil Firmansyah', '', '', 'Jumaidil Firmansyah', 'JF', '7/28/1995', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'jumaidil', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '20:26.8'),
(107, 'A0100', '1', 'dr. Kyagus Fajar Wali Andree', '', '', 'dr. Kyagus Fajar Wali Andree', 'KFWA', '8/20/2018', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0841/DPMPTSP-PPK/2018', '0001-01-01', '', '1', NULL, '0', '0', '0', 'kfwandree', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '56:37.4'),
(108, 'A0101', '1', 'Khoirun Mukhsinin Putra', '', '', 'Khoirun Mukhsinin Putra', 'KMP', '8/20/2018', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'putra', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'salahudin', '54:10.5'),
(109, 'A0102', '1', 'dr. Tri Hari Irfani', '', '', 'dr. Tri Hari Irfani', 'THI', '8/20/2018', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0843/DPMPTSP-PPK/2018', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ipan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '58:23.1'),
(110, 'A0103', '1', 'dr. Zahnas Putri Jana Adinegara', '', '', 'dr. Zahnas Putri Jana Adinegara', 'ZPJA', '8/20/2018', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0845/DPMPTSP-PPK/2018', '0001-01-01', '', '1', NULL, '0', '0', '0', 'zahnaspja', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '21:35.9'),
(111, 'A0104', '1', 'Wenni Rahma', '', '', 'Wenni Rahma', 'WR', '8/20/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'salahudin', '52:58.6'),
(112, 'A0105', '1', 'Sulastri', '', '', 'Sulastri', 'S', '5/24/1988', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '8/2/2018', '12/31/2018', '2/4/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aci', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '28:02.7'),
(113, 'A0106', '1', 'Yulita Friza Wulandari', '', '', 'Yulita Friza Wulandari', 'Y', '7/24/1995', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '8/2/2018', '12/31/2018', '2/2/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yulita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '20:01.2'),
(114, 'A0107', '1', 'Ria Andriani', '', 'S.Kep', 'Ns. Ria Andriani S.Kep', 'RA', '4/3/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '1/2/2018', '12/31/2018', '6/23/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ria', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '50:22.4'),
(115, 'A0108', '1', 'Novita Mustika Buana', '', 'Amd.Kep', 'Novita Mustika Buana Amd.Kep', 'NMB', '11/21/1997', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '8/2/2018', '12/31/2018', '8/2/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'novita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '05:55.1'),
(116, 'A0109', '1', 'Afrinda Rachmah, S.Kep', '', '', 'Ns. Afrinda Rachmah, S.Kep', 'FR', '4/27/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', 'Ns', '', '235', '8/2/2018', '12/31/2018', '11/29/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'afrinda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '37:17.1'),
(117, 'A0110', '1', 'Dessy Triani, Amd. Kep', '', '', 'Dessy Triani, Amd. Kep', 'DTA', '12/27/1991', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '8/2/2018', '12/31/2018', '12/28/2015', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dedek', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '35:59.5'),
(118, 'A0112', '1', 'Suadah, Amd. Kep', '', '', 'Suadah, Amd. Kep', 'S', '8/21/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'susu', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'salahudin', '06:04.1'),
(119, 'A0113', '1', 'Riza Fatkhurrohman', '', '', 'Riza Fatkhurrohman', 'RF', '5/6/1994', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', 'IMG_20170612_164831_905.jpg', '1', NULL, '0', '0', '0', 'riza94', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'biodata', '08:31.3'),
(120, 'A0114', '1', 'Ade Trias Putra', '', '', 'Ade Trias Putra', 'ade', '7/19/1993', '0001^M', 'X0055^003', NULL, '0006^MOS', 'X0014^001', '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', 'Foto.jpg', '1', NULL, '0', '0', '0', 'ade93', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '02:41.9'),
(121, 'A0120', '1', 'dr. Khoirun Mukhsinin Putra', '', '', 'dr. Khoirun Mukhsinin Putra', 'km', '8/21/2018', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0846/DPMPTSP-PPK/2018', '0001-01-01', '', '1', NULL, '0', '0', '0', 'kmputra', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '02:02.2'),
(122, 'A0115', '1', 'Devi Erianti, Amd. Kep', '', '', 'Devi Erianti, Amd. Kep', 'DE', '2/6/1991', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '8/3/2018', '12/31/2018', '10/17/2017', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'devieri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '37:44.6'),
(123, 'A0116', '1', 'Yuri Mariza, S. Kep', '', '', 'Yuri Mariza, S. Kep', 'YM', '7/19/1985', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '6/16/2010', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yuri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '31:33.9'),
(124, 'A0117', '1', 'Yuri Mariza, S. Kep', '', '', 'Yuri Mariza, S. Kep', 'DM', '8/21/2018', '0001^F', NULL, NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', '', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'salahudin', '15:29.1'),
(125, 'A0118', '1', 'Fatimah Hafliah, Amd. Kep', '', '', 'Fatimah Hafliah, Amd. Kep', 'FH', '12/10/1992', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '8/2/2018', '12/31/2018', '7/2/2015', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'hafliah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '23:42.9'),
(126, 'A0221', '1', 'Diana Puspa Sari, Amd. Kep', '', '', 'Diana Puspa Sari, Amd. Kep', 'DPS', '11/26/1986', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '2/2/2018', '12/31/2018', '11/27/2001', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dianpuspa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '05:46.3'),
(127, 'A0212', '1', 'Hepi Zakia Rosa, S. Kep. ,Ns', '', '', 'Hepi Zakia Rosa, S. Kep. ,Ns', 'HZR', '10/6/1989', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '66', '8/2/2018', '12/31/2018', '12/22/2015', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'izzi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '28:30.9'),
(128, 'A0121', '1', 'Astri Pratiwi', '', '', 'Astri Pratiwi', 'AP', '8/21/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'astri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '25:19.5');
INSERT INTO `m_paramedis` (`ParamedicID`, `ParamedicCode`, `SiteCode`, `FirstName`, `MiddleName`, `LastName`, `ParamedicName`, `ParamedicInitial`, `DateOfBirth`, `GCSex`, `GCParamedicType`, `GCEmploymentStatus`, `GCReligion`, `GCNationality`, `Title`, `Suffix`, `SpecialtyCode`, `HiredDate`, `TerminatedDate`, `StartExperienceDate`, `IsTaxRegistrant`, `TaxRegistrantNo`, `LicenseNo`, `LicenseExpiredDate`, `PictureFileName`, `IsAvailable`, `NotAvailableUntil`, `IsAnesthetist`, `IsAudiologist`, `IsHasPhysicianRole`, `UserName`, `Remarks`, `IsActive`, `IsFeeUsingPercentage`, `FeeAmount`, `FeePercentage`, `BankName`, `BankAccountNo`, `BankAccountName`, `SSN`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(129, 'A0122', '1', 'Fannisa Armetristi', '', '', 'Fannisa Armetristi', 'FA', '8/21/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fannisa25', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'salahudin', '20:48.5'),
(130, 'A0124', '1', 'Herviana Farezuma', '', '', 'Herviana Farezuma', 'HF', '8/21/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'herviana10', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'salahudin', '21:26.8'),
(131, 'A0215', '1', 'Windi Indah Fajar Ningsih', '', '', 'Windi Indah Fajar Ningsih', 'WIFN', '8/21/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'windiindah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '24:44.1'),
(132, 'A0159', '1', 'Helen Dila Permata', '', '', 'Helen Dila Permata', 'Helen', '8/7/2018', '0001^F', 'X0055^007', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', '', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ade93', '31:59.7'),
(133, 'A0171', '1', 'umi salamah', '', '', 'umi salamah', 'umi', '3/6/1996', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', 'skk', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'umisalamah', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '19:50.4'),
(134, 'A0222', '1', 'Dian Oktaria', '', '', 'Dian Oktaria', 'dn', '10/4/1987', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', '241', '2/2/2018', '12/31/2018', '1/2/2017', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dianoktari', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '09:51.3'),
(135, 'A0223', '1', 'Willi Andriyani', '', '', 'Willi Andriyani', 'wa', '7/2/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '241', '8/2/2018', '12/31/2018', '10/6/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'willi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '39:56.4'),
(136, 'A0224', '1', 'Deti', 'Arianty', '', 'Deti Arianty', 'Deti', '5/5/1995', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '235', '2/2/2018', '12/31/2018', '2/2/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'deti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '30:18.6'),
(137, 'A0225', '1', 'Willi', 'Andriyani', '', 'Willi Andriyani', 'wian', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '41:00.2'),
(138, 'A0226', '1', 'Dian', 'Oktaria', '', 'Dian Oktaria', 'DioK', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '41:28.7'),
(139, 'A0227', '1', 'dr. Qodri, Sp. An', '', '', 'dr. Qodri, Sp. An', 'qod', '7/18/1987', '0001^M', 'X0055^001', NULL, '0006^MOS', 'X0014^001', '', '', 'san', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'qodri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '30:21.5'),
(140, 'A0228', '1', 'dr. Dwi Silvia Indrasari, Sp. OG', '', '', 'dr. Dwi Silvia Indrasari, Sp. OG', 'DSI', '1/9/1983', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', '26', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0060/DPMPTSP-PPK/2019', '1/9/2023', '', '1', NULL, '0', '0', '0', 'dwisilvia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '30:10.6'),
(145, 'A0229', '1', 'dr. Andrey Dwi Anandya', '', '', 'dr. Andrey Dwi Anandya ,Sp.T.H.T.K.L', 'AD', '10/1/1987', '0001^M', 'X0055^001', NULL, '0006^MOS', 'X0014^001', '', 'Sp.T.H.T.K.L', 'tht', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0791/DPMPTSP-PPK/2018', '1/10/2023', '', '1', NULL, '0', '0', '0', 'andrey', 'Nomor Surat Izin Praktek	: 446/IPD/0791/DPMPTSP-PPK/2018', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '02:58.7'),
(146, 'A0230', '1', 'Darein, A. Md. Keb', '', '', 'Darein, A. Md. Keb', 'DA', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'darein', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '22:53.4'),
(147, 'A0231', '1', 'Dwi Priadmaja, A. Md. Kep', '', '', 'Dwi Priadmaja, A. Md. Kep', 'DW', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dwipriad', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '53:50.3'),
(149, 'A0232', '1', 'Fajarin Kurnia Irdiansyah', '', '', 'Fajarin Kurnia Irdiansyah ,S. Tr. Keb', 'RM', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', 'S. Tr. Keb', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fajarin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '54:42.1'),
(150, 'A0233', '1', 'Mery Haryani, A. Md. Keb', '', '', 'Mery Haryani, A. Md. Keb', 'RM', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mery', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '55:24.1'),
(151, 'A0234', '1', 'R.A. Welly Three Handayani', '', '', 'R.A. Welly Three Handayani', 'RM', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'welly', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '55:55.1'),
(152, 'A0235', '1', 'Yurike Marista, A. Md. Kep', '', '', 'Yurike Marista, A. Md. Kep', 'RM', '9/3/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yurike', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '56:32.9'),
(153, 'A0236', '1', 'Nova', '', '', 'Nova', 'NV', '9/1/2000', '0001^F', 'X0055^002', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nova', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '15:26.6'),
(154, 'A0237', '1', 'Mutiara', '', '', 'Mutiara', 'MA', '9/1/2000', '0001^F', 'X0055^002', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mutiara', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '15:57.1'),
(155, 'A0238', '1', 'bd. Dwi Suci', '', '', 'bd. Dwi Suci', 'DS', '9/1/2000', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dwisuci', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '46:21.7'),
(156, 'A0239', '1', 'bd. Ani Supriatin', '', '', 'bd. Ani Supriatin', 'AN', '9/1/2000', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'anii', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '42:59.6'),
(157, 'A240', '1', 'bd. Khoirun Nisa', '', '', 'bd. Khoirun Nisa', 'KH', '9/1/2000', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'khoirunn', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '44:35.0'),
(158, 'A0240', '1', 'Nugraha Prayudi', '', '', 'Nugraha Prayudi', 'NP', '9/1/2000', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nugraha', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '00:47.5'),
(159, 'A0241', '1', 'Herim Fitriyani, Am.. Rad', '', '', 'Herim Fitriyani, Am.. Rad', 'HF', '9/1/2000', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fitriyani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '59:16.2'),
(160, 'A0242', '1', 'Cynthia Laura, Am.. Rad', '', '', 'Cynthia Laura, Am.. Rad', 'CL', '9/1/2000', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'laura', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '58:05.7'),
(161, 'A0243', '1', 'Renina Septiaranti', '', '', 'Renina Septiaranti', 'RS', '9/7/2018', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '66', '2/2/2018', '12/31/2018', '11/6/2002', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'renina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '44:20.5'),
(162, 'A0244', '1', 'dr. Wifaqi Oktaria, Sp.THT-KL', '', '', 'dr. Wifaqi Oktaria, Sp.THT-KL', 'WO', '9/1/2018', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', 'tht', '9/1/1990', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '30:01.4'),
(163, 'A0245', '1', 'dr. Andrey Dwi Anandya, Sp.THT-KL', '', '', 'dr. Andrey Dwi Anandya, Sp.THT-KL', 'AW', '9/1/1990', '0001^F', 'X0055^001', NULL, NULL, 'X0014^001', '', '', 'tht', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ari', '48:16.1'),
(164, 'A0246', '1', 'dr. Nita Hertati, Sp.PA', '', '', 'dr. Nita Hertati, Sp.PA', 'nh', '9/1/1990', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', 'spa', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ari', '41:53.3'),
(165, 'A0255', '1', 'Berta Ayu Oktarina', '', '', 'Berta Ayu Oktarina', 'BA', '9/1/2000', '0001^F', 'X0055^011', NULL, NULL, NULL, '', '', '100', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'berta', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '24:32.7'),
(166, 'A0247', '1', 'Dody Gontina', '', '', 'Dody Gontina', 'DG', '9/1/1990', '0001^M', 'X0055^011', NULL, NULL, NULL, '', '', '100', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dody', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '25:09.0'),
(167, 'A0248', '1', 'Rini Oktavia', '', '', 'Rini Oktavia', 'RO', '9/1/1990', '0001^F', 'X0055^011', NULL, NULL, NULL, '', '', '100', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'oktavia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '26:47.8'),
(168, 'A0249', '1', 'Suryadi Putra Gumaytri', '', '', 'Suryadi Putra Gumaytri', 'SP', '9/1/1990', '0001^M', 'X0055^011', NULL, NULL, NULL, '', '', '100', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'suryadi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ari', '28:07.8'),
(169, 'A0250', '1', 'Nuryandi', '', '', 'Nuryandi', 'NR', '9/12/2018', '0001^M', 'X0055^003', NULL, '0006^MOS', 'X0014^001', '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nuryandi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '29:38.6'),
(170, 'A0256', '1', 'dr. Wifaqi Oktaria, SpTHT-KL', '', '', 'dr. Wifaqi Oktaria, SpTHT-KL', 'WO', '10/4/1984', '0001^F', 'X0055^001', NULL, '0006^MOS', 'X0014^001', '', '', 'tht', '0001-01-01', '0001-01-01', '2/14/2014', '0', '', '446/IPD/0744/DPMPTSP-PPK/2018', '4/10/2023', 'Scan foto 4x6 latar merah.jpg', '1', NULL, '0', '0', '0', 'wif4', 'Riwayat Pendidikan\n1. S1 Pendidikan Kedokteran Umum 2003 - 2009\n2. Kedokteran Spesialisasi Telinga Hidung Tenggorok dan Kepala Leher (THT-KL) 2014 - 2018\n\nRiwayat Perkerjaan\n1. Dokter Umum PKM Muara Batun 2009 - 2010\n2. Dinkes Prabumulih 2011 - 2014\n3. RS', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '11:11.6'),
(171, 'A0257', '1', 'dr. Yunita Fediani, SpA, MKes', '', '', 'dr. Yunita Fediani, SpA, MKes', 'YF', '2/10/1975', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', '', '', 'SpA.', '0001-01-01', '0001-01-01', '9/1/2000', '0', '', '446/IPD/1298/DPMPTSP-PPK/2018', '10/2/2024', 'dr. yunita.jpg', '1', NULL, '0', '0', '0', 'Yunita', 'Riwayat Pendidikan: \n1. S1 Fakultas Kedokteran/Pend Dokter Umum Univ. Sriwijaya ( 1993-2000 )\n2. Sp1 Fakultas Kedokteran/PPDS Ilmu Kesehatan Anak Univ. Sriwijaya ( 2008-2013 )\n3. S2 Fakultas Kedokteran/Program Magister Ilmu Biomedis Univ. Sriwijaya ( 2011', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '59:08.8'),
(176, 'A0258', '1', 'dr. Afriani, Sp.S', '', '', 'dr. Afriani, Sp.S', 'AF', '4/10/1977', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', '', '', 'sps', '0001-01-01', '0001-01-01', '11/17/2013', '0', '', '446/IPD/0879/DPMPTSP-PPK/2018', '2/26/2019', '', '1', NULL, '0', '0', '0', 'afriani', 'Riwayat Pendidikan :\n1. S1 Fakultas kedokteran Umum Universitas Sriwijaya ( Lulus 2002 )\n2. S2 Fakultas Kedokteran Sub Spesialis Ilmu Penyakit Syaraf (Neurology) ( Lulus 2013 )\n\nRiwayat Pekerjaan\n1. Dokter PTT di RSUD Prabumulih tmt 2002 s.d 2005\n2. Dosen', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '36:50.5'),
(177, 'melia', '1', 'Melia Simatupang', '', '', 'Melia Simatupang', 'MS', '9/1/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'melia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '02:27.3'),
(178, 'A0259', '1', 'M. Ari Seprinizar', '', '', 'Mr. M. Ari Seprinizar', 'AS', '9/3/1992', '0001^M', 'X0055^003', NULL, '0006^MOS', 'X0014^001', 'Mr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', 'Warna Merah 3x4.jpg', '1', NULL, '0', '0', '0', '412IY', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '06:09.5'),
(179, 'A0260', '1', 'dr. Herlenni Evi Sesty', '', '', 'dr. Herlenni Evi Sesty', 'HE', '10/4/2018', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'herlenni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', '412IY', '16:34.2'),
(180, 'A0261', '1', 'Ns. H. Thonel Zoon, S.Kep', '', '', 'Ns. H. Thonel Zoon, S.Kep', 'HT', '10/4/2018', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'thonel', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '24:08.4'),
(181, 'A0164', '1', 'Arinta', 'Atmasari', '', 'dr. Arinta Atmasari ,Sp. A, M.Kes', 'AR', '10/8/2018', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', 'Sp. A, M.Kes', 'SpA.', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/1265/DPMPTSP-PPK/2018', '1/25/2021', '', '1', NULL, '0', '0', '0', 'arin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '00:53.9'),
(182, 'A0262', '1', 'Amelia yodarua', 'Amd.Kep', '', 'Amelia yodarua Amd.Kep', 'am', '10/24/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '8/2/2018', '12/31/2018', '4/1/2017', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'amelia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '32:41.7'),
(183, 'A0263', '1', 'Nopaliyasari', 'S.Kep', '', 'Ns. Nopaliyasari S.Kep', 'NP', '4/5/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '8/2/2018', '12/31/2018', '11/25/2015', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Nopa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '24:49.3'),
(184, 'A0264', '1', 'Kurnia Dewita', ', Amd.Kep', '', 'Kurnia Dewita , Amd.Kep', 'KD', '12/17/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '8/2/2018', '12/31/2018', '1/1/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'kurnia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '41:34.8'),
(185, 'A0265', '1', 'Nita frantika, Amd.Kep', '', '', 'Nita frantika, Amd.Kep', 'NF', '4/10/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '8/2/2018', '12/31/2018', '11/12/2013', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nitafran', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '34:17.7'),
(186, 'A0266', '1', 'Hendra Praja, Amd.Kep', '', '', 'Hendra Praja, Amd.Kep', 'HP', '1/29/1993', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '8/2/2018', '12/31/2018', '11/9/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Hendra', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '34:52.2'),
(187, 'A0267', '1', 'Frita Anesia Amalah', ', Amd.Kep', '', 'Frita Anesia Amalah , Amd.Kep', 'FA', '7/22/1990', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '8/2/2018', '12/31/2018', '11/6/2013', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Frita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '35:40.6'),
(188, 'A0268', '1', 'Fatimah, Amd.Kep', '', '', 'Fatimah, Amd.Kep', 'FR', '9/26/1996', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '2/2/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fatimahr', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '36:30.2'),
(189, 'A0269', '1', 'Siti Darojah', ', S.Kep', '', 'Ns. Siti Darojah , S.Kep', 'SD', '7/17/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '8/2/2018', '12/31/2018', '11/8/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'siti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '38:20.6'),
(190, 'A0270', '1', 'Nelly ', '', '', 'Nelly ', 'NL', '10/1/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', '', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '52:50.6'),
(191, 'A0271', '1', 'Nike Putria Ningsih, S.Kep', '', '', 'Ns. Nike Putria Ningsih, S.Kep', 'NP', '12/29/1990', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '236', '2/2/2018', '12/31/2018', '2/22/2010', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nike', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '31:31.5'),
(192, '0.671', '1', 'Rosselini', '', '', 'Rosselini', 'rs', '10/11/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '831', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '45:43.4'),
(193, '0.672', '1', 'Suryadi', '', '', 'Suryadi', 'sy', '10/1/2018', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '214', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '47:05.8'),
(194, '0.673', '1', 'Ganda', 'Purba', 'Tasti', 'Ganda Purba Tasti', 'gd', '1/17/1995', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '217', '8/2/2018', '12/31/2018', '8/2/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ganda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '47:39.7'),
(195, '0.674', '1', 'Raissa', '', '', 'Raissa', 'rs', '9/30/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '831', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'raissa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '51:58.7'),
(196, '0.676', '1', 'Bertha', '', '', 'Bertha', 'bt', '10/1/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '789', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'bertha', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '57:12.4'),
(197, 'A0280', '1', 'Mahardika', 'Utomo', 'Syahadat', 'Mahardika Utomo Syahadat', 'MU', '10/26/2018', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '216', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', 'ktp ktp.jpg', '1', NULL, '0', '0', '0', 'dika', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '41:42.2'),
(198, 'SDM1', '1', 'ANNISYA', '', '', 'ANNISYA', 'AN', '12/16/1995', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '216', '9/1/2018', '12/31/2018', '9/1/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'dika', '50:07.7'),
(199, 'dr.1', '1', 'dr. Oriza ', '', '', 'dr. Oriza ', 'OR', '10/26/2018', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', '', '', '26', '10/1/2018', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'melia', '27:52.9'),
(200, 'A0272', '1', 'Amalia ', 'Tri', 'Utami', 'Amalia  Tri Utami', 'AT', '11/13/1995', '0001^F', 'X0055^003', NULL, '0006^MOS', 'X0014^001', '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'amalia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '28:35.0'),
(201, 'A0273', '1', 'Fitriyani, Amd.Kep', '', '', 'Fitriyani, Amd.Kep', 'FT', '3/16/1992', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '2/2/2018', '12/31/2018', '11/8/2017', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Fitriani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '45:37.4'),
(202, 'A0281', '1', 'Shelvia ', '', 'Sizwanda, S.Kep', 'Ns. Shelvia  Sizwanda, S.Kep', 'SS', '1/16/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '8/2/2018', '12/31/2018', '11/14/2017', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Shelvia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '46:46.7'),
(203, '282', '1', 'Husniati, Amd.Keb', '', '', 'Husniati, Amd.Keb', '203', '4/16/1995', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '8/2/2018', '12/31/2018', '8/2/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Husniati', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '03:51.8'),
(204, 'melia.', '1', 'melia.', '', '', 'melia.', 'me', '11/12/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'melia.', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '58:28.3'),
(205, 'A0282', '1', 'Fitriyani', '', '', 'Fitriyani', 'FI', '11/12/2018', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '233', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Fitriyani.', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '12:21.9'),
(206, 'A0283', '1', 'Nur', 'Aisyah', '', 'Nur Aisyah', 'NA', '11/12/2018', '0001^F', 'X0055^003', NULL, '0006^MOS', 'X0014^018', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aisyah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '27:32.0'),
(207, 'riza507', '1', 'Riza', 'Fatkhurrachman', '', 'Riza Fatkhurrachman', 'rz507', '5/6/1994', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rizaa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'biodata', '09:05.7'),
(208, 'zaa', '1', 'zulius ', 'akbar', 'amin', 'zulius  akbar amin', 'zaa', '11/13/2018', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', '66', '12/8/2018', '12/8/2018', '12/8/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ZAA', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '49:52.9'),
(209, 'A0284', '1', 'dr.', 'Oriza Zulkarnain,', 'Sp.OG(K)FER', 'dr. Oriza Zulkarnain, Sp.OG(K)FER', 'or', '11/23/2018', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, '', '', '26', '10/1/2018', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'oriza', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '21:51.9'),
(210, 'A0285', '1', 'Ali ', 'Ghanie', '', 'Prof.dr. Ali  Ghanie ,SpPD,K-KV, FINASIM', 'AGH', '7/18/2018', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'Prof.dr', 'SpPD,K-KV, FINASIM', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', 'TU.02.01/XVII.2.1/195/2018', '0001-01-01', '', '1', NULL, '0', '0', '0', 'alighanie', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '02:38.9'),
(211, 'A0286', '1', 'Helen Dila Permata', '', '', 'Helen Dila Permata', 'Helen', '8/7/2018', '0001^F', 'X0055^007', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'helendila', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '31:59.7'),
(212, 'A0287', '1', 'Nurliana, Amd.Kep', '', '', 'Nurliana, Amd.Kep', 'Nr', '4/21/1990', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '8/2/2018', '12/31/2018', '12/15/2015', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nurliana', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '57:26.5'),
(213, 'A0288', '1', 'Rima Destiana, Amd.Kep', '', '', 'Rima Destiana, Amd.Kep', 'RD', '12/28/1996', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '8/2/2018', '12/31/2018', '12/7/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rimadestia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '58:42.9'),
(214, 'A0289', '1', 'Arma, S.Kep', '', '', 'Ns. Arma, S.Kep', 'Ar', '10/13/1992', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '8/2/2018', '12/31/2018', '12/18/2013', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'arma', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '59:33.2'),
(215, 'A0290', '1', 'Ade Erna Widyani, ', 'Amd.Kep', '', 'Ade Erna Widyani,  Amd.Kep', 'AEW', '1/19/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '242', '8/2/2018', '12/31/2018', '9/7/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'adeerna', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'okti', '45:13.6'),
(216, 'A0291', '1', 'Setra Aprino, Amd.Kep', '', '', 'Setra Aprino, Amd.Kep', 'SA', '8/16/1993', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '240', '8/2/2018', '12/31/2018', '10/7/2015', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Setra', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '47:18.0'),
(217, 'A0292', '1', 'Yeyen Iscasari, S.Kep', '', '', 'Yeyen Iscasari, S.Kep', 'YI', '12/3/1988', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', '', '', '243', '8/2/2018', '12/31/2018', '10/11/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ganda', '12:15.1'),
(218, 'A0293', '1', 'Ferry Sopyan, S.Kep', '', '', 'Ns. Ferry Sopyan, S.Kep', 'FS', '12/23/1991', '0001^M', 'X0055^003', 'X0020^001', '0006^MOS', 'X0014^001', 'Ns', '', '243', '8/2/2018', '12/31/2018', '7/11/2016', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ferry', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '03:34.0'),
(219, 'A0294', '1', 'Jennyta Anandra, S. Kep. Ns', '', '', 'Jennyta Anandra, S. Kep. Ns', 'JA', '6/11/1994', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Jennyta', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '32:40.6'),
(220, 'A0295', '1', 'Sutrisno, S. Kep. Ns', '', '', 'Sutrisno, S. Kep. Ns', 'SS', '11/14/1992', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Sutrisno', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '48:02.4'),
(221, 'A0296', '1', 'Ines Dwi Putri, S. Kep. Ns', '', '', 'Ines Dwi Putri, S. Kep. Ns', 'ID', '1/27/1995', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Ines', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '35:59.4'),
(222, 'A0297', '1', 'Elly Yulianti, A.Md. Kep', '', '', 'Elly Yulianti, A.Md. Kep', 'EY', '7/25/1995', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Elly', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'melia', '50:59.4'),
(223, '1907', '1', 'ade trias', '', '', 'ade trias', 'atp', '7/19/1993', '0001^M', 'X0055^003', NULL, '0006^MOS', 'X0014^001', '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'adetrias', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '28:23.4'),
(224, '224', '1', 'Iman Ruansa', '', 'Sp.OG', 'dr. Iman Ruansa Sp.OG', 'IR', '7/4/1984', '0001^M', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '26', '1/2/2019', '12/31/2019', '6/16/2015', '0', '', '446/IPD/0021/DPMPTSP-PPK/2019', '9/11/2023', '', '1', NULL, '0', '0', '0', 'iman', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '49:13.2'),
(225, 'keuangan', '1', 'Junita Tangseliana', '', '', 'Mona. Junita Tangseliana', 'MJ', '1/11/2019', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mona', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '28:31.7'),
(226, 'A0300', '1', 'Dena Christine', '', '', 'Dena Christine', 'DC', '1/18/2019', '0001^F', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dena', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '55:58.7'),
(230, '301', '1', 'Syamsuddin ', 'Isaac', 'Manggala', 'dr. Syamsuddin  Isaac Manggala ,Sp.OG', 'syam', '1/9/1985', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp.OG', '26', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0046/DPMPTSP-PPK/2019', '1/1/2022', '', '1', NULL, '0', '0', '0', 'syam', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '48:13.2'),
(231, 'a0302', '1', 'Maipe', 'Aprianti', '', 'Dr. Maipe Aprianti ,Sp.An', 'maipe', '4/18/1984', '0001^M', 'X0055^001', NULL, NULL, NULL, 'Dr', 'Sp.An', 'san', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0022/DPMPTSP-PPK/2019', '4/4/2023', '', '1', NULL, '0', '0', '0', 'maipe', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '06:08.0'),
(232, 'a0303', '1', 'Iman', 'Ruansa', '', 'dr. Iman Ruansa ,Sp.OG', 'imn', '10/15/1980', '0001^M', 'X0055^001', NULL, NULL, NULL, 'dr', 'Sp.OG', '26', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'riza94', '44:21.8'),
(233, 'A0304', '1', 'Sitti', 'Rohmahsari', '', 'dr. Sitti Rohmahsari ,Sp.GK', 'siti', '1/16/1980', '0001^F', 'X0055^001', NULL, NULL, NULL, 'dr', 'Sp.GK', 'gigi', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0796/DPMPTSP-PPK/2018', '4/4/2022', '', '1', NULL, '0', '0', '0', 'sitti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '57:59.6'),
(234, 'A0309', '1', 'Bd. Sabrina Yuniarti', '', '', 'Bd. Sabrina Yuniarti', 'SY', '1/30/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'SABRINA', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '33:47.2'),
(235, 'A0310', '1', 'Aprilia Tri Lestari', '', '', 'Aprilia Tri Lestari', 'ATL', '1/30/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'APRILIA', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '50:54.9'),
(236, 'A0311', '1', 'Bd. Fitri Yuliana', '', '', 'Bd. Fitri Yuliana', 'FY', '1/30/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'FITRIYULIA', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '34:57.9'),
(237, 'A0312', '1', 'Bd. Rosa ', 'Dwi', 'Analisa', 'Bd. Rosa  Dwi Analisa', 'RDA', '1/30/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ROSA', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ade93', '33:26.3'),
(238, 'A0350', '1', 'Faradina', '', '', 'apt. Faradina ,S.Farm', 'fr', '2/6/2019', '0001^F', 'X0055^009', NULL, NULL, NULL, 'apt', 'S.Farm', '245', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '51:59.3'),
(239, 'BD0001', '1', 'Bd Jumia Suprianti', '', '', 'Bd Jumia Suprianti', 'JS', '2/7/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'JUMIA', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '01:47.5'),
(240, 'A0313', '1', 'Vinni', 'Yulisca', '', 'Vinni Yulisca', 'VY', '2/11/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '84', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'vinni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '32:58.7'),
(241, 'A0314', '1', 'Cendi', 'Elsa', '', 'Cendi Elsa', 'CE', '2/11/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '84', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'cendi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '35:16.6'),
(242, 'A0315', '1', 'Ineke', 'Wijayanti', '', 'Ineke Wijayanti', 'IW', '2/11/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '84', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ineke', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '33:48.6'),
(243, 'qo123', '1', 'Siti ', 'Qomariah', 'Anisa', 'Siti  Qomariah Anisa', 'qoqom', '1/12/1995', '0001^F', 'X0055^007', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'qoqom', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '09:39.6'),
(244, 'PR0001', '1', 'Yasir Satria', '', '', 'Yasir Satria', 'PRW', '9/30/1993', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', NULL, '', '', '235', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yasir', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '25:16.4'),
(245, 'PR0002', '1', 'DWI RACHMASARI', '', '', 'DWI RACHMASARI', 'PRW', '5/16/1986', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rachmasari', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '16:51.9'),
(246, 'PR0003', '1', 'Yeyen Iscasari S.Kep', '', '', 'Yeyen Iscasari S.Kep', 'PRW', '6/2/1985', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nsyeyen', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '14:38.2'),
(247, 'PR0004', '1', 'Ayu Safitriyana', '', '', 'Ayu Safitriyana', 'PRW', '10/17/1987', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayusafitri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '40:29.2'),
(248, 'PR0005', '1', 'Baidilla Syalsabila, AMK.An', '', '', 'Baidilla Syalsabila, AMK.An', 'PRW', '11/29/1991', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '07:15.8'),
(249, 'PR0006', '1', 'Mira Susanti', '', '', 'Mira Susanti', 'PRW', '3/29/1989', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mira', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '18:37.8'),
(250, 'PR0007', '1', 'Ratih Kartika', '', '', 'Ratih Kartika', 'PRW', '12/2/1989', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ratih', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '26:10.0'),
(251, 'PR0008', '1', 'Fitri wulandari', '', '', 'Fitri wulandari', 'PRW', '5/4/1992', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wulandari', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '14:31.6'),
(252, 'PR0009', '1', 'Benny Putra Pratama', '', '', 'Benny Putra Pratama', 'PRW', '6/2/1995', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'benny', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '30:43.3'),
(253, 'PR0010', '1', 'Fitri Aprianti', '', '', 'Fitri Aprianti', 'PRW', '4/25/1990', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aprianti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '22:07.3'),
(254, 'PR0011', '1', 'Deah Karina Saputri', '', '', 'Deah Karina Saputri', 'PRW', '1/22/1997', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'deah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '26:12.5'),
(255, 'PR0012', '1', 'Tiara Puspa Arini', '', '', 'Tiara Puspa Arini', 'PRW', '11/7/1995', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'tiara', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '41:06.3'),
(256, 'PR0013', '1', 'Haryanti Novitasari Amd.Kep', '', '', 'Haryanti Novitasari Amd.Kep', 'PRW', '11/3/1996', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'haryanti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '29:56.6'),
(257, 'PR0014', '1', 'Jamal, Amd.Kep', '', '', 'Jamal, Amd.Kep', 'PRW', '9/19/1988', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'jamal', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '50:23.2'),
(258, 'PR0015', '1', 'Ahmad Zulfikri', '', '', 'Ahmad Zulfikri', 'PRW', '7/15/1992', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fikri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '34:38.4'),
(259, 'PR0016', '1', 'ERI WISNU AJI', '', '', 'ERI WISNU AJI', 'PRW', '5/26/1989', '0001^M', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'eri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '46:50.8'),
(260, 'PR0017', '1', 'Ferina Indah Permata', '', '', 'Ferina Indah Permata', 'PRW', '2/11/1994', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ferina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '26:53.7'),
(261, 'PR0018', '1', 'Lismadahniar', '', '', 'Lismadahniar', 'PRW', '6/14/1994', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lisma', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '12:37.7'),
(262, 'PR0019', '1', 'Syamsu Wijaya', '', '', 'Syamsu Wijaya', 'PRW', '11/30/1992', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'syamsu', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '11:21.2'),
(263, 'PR0020', '1', 'Diana Puspita', '', '', 'Diana Puspita', 'PRW', '12/11/1995', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '43:14.5'),
(264, 'PR0021', '1', 'Sabrina ', 'Ayunani', '', 'Sabrina  Ayunani ,A.Md Kep', 'sabri', '6/3/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', 'A.Md Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayunani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '38:54.6'),
(265, 'PR0022', '1', 'Nina', 'Melita', '', 'dr. Nina Melita ,Sp.KK', 'nina', '6/4/2019', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', 'dr', 'Sp.KK', 'skk', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'melita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '24:57.7'),
(266, 'PR0023', '1', 'Diana', 'Puspita', '', 'Diana Puspita ,A.Md Kep', 'Diana', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', 'A.Md Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'puspita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '03:07.1'),
(267, 'PR0024', '1', 'Agus', 'Salim', '', 'dr. Agus Salim', 'Agus', '6/3/2019', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '27:51.8'),
(268, 'PR0025', '1', 'Muhammad', 'Amran', 'Utami MA', 'Muhammad Amran Utami MA ,A.Md Kep', 'Amran', '6/3/2019', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', 'A.Md Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'amran', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '28:50.8'),
(269, 'PR0026', '1', 'Ema kurnia sari', '', '', 'Ema kurnia sari', 'PRW', '7/14/1993', '0001^F', 'X0055^003', 'X0020^002', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ema', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '59:19.2'),
(270, 'PR0027', '1', 'Yasir Satria', '', '', 'Yasir Satria', 'PRW', '6/3/2019', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '08:05.9'),
(271, 'PR0028', '1', 'Jenwari', '', '', 'Jenwari', 'PRW', '6/10/2019', '0001^M', 'X0055^003', NULL, '0006^MOS', NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'jenwari', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '34:44.5'),
(272, 'PR0029', '1', 'Lilis Suryani', '', '', 'Lilis Suryani', 'PRW', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lilis', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '08:16.3'),
(273, 'PR0030', '1', 'Lilis Suryani', '', '', 'Lilis Suryani', 'PRW', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '07:54.6'),
(274, 'PR0031', '1', 'Baidilla Syalsabila,AMK.An', '', '', 'Baidilla Syalsabila,AMK.An', 'PRW', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'baidilla', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '22:35.4'),
(275, 'PR0032', '1', 'Wira Mas Kusuma Jaya, A.Md.Kep', '', '', 'Wira Mas Kusuma Jaya, A.Md.Kep', 'PRW', '6/4/2019', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wira', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '32:49.8'),
(276, 'PR0033', '1', 'Afrida', '', '', 'Afrida', 'PRW', '6/10/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'afrida', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '21:07.7'),
(277, 'PR0034', '1', 'Reni Angraini', '', '', 'Reni Angraini', 'PRW', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'reniang', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '35:31.7'),
(278, 'PR0035', '1', 'Hendra Yedi, Amd.Kep', '', '', 'Hendra Yedi, Amd.Kep', 'PRW', '6/2/2019', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'hendrayedi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '15:47.8'),
(279, 'PR0036', '1', 'Atika, S.Kep, Ners', '', '', 'Atika, S.Kep, Ners', 'PRW', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'atika', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '58:56.3'),
(280, 'PR0037', '1', 'Setiawan, AMd. Kep', '', '', 'Setiawan, AMd. Kep', 'PRW', '6/3/2019', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'setiawan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '27:29.3'),
(281, 'PR0038', '1', 'Ns. Zahara Indah Pratiwi, S.Kep.', '', '', 'Ns. Zahara Indah Pratiwi, S.Kep.', 'PRW', '6/10/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'zahara', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '45:26.8'),
(282, 'PR0039', '1', 'Sariat Sandoria, Amd.Kep', '', '', 'Sariat Sandoria, Amd.Kep', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'sariat', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '34:39.0'),
(283, 'PR0040', '1', 'Uli Suryama', '', '', 'Uli Suryama', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ulisuryama', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '30:27.8'),
(284, 'PR0041', '1', 'Novan Giofammy,A,Md.Kep', '', '', 'Novan Giofammy,A,Md.Kep', 'PRW', '6/3/2019', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'novan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '06:27.8');
INSERT INTO `m_paramedis` (`ParamedicID`, `ParamedicCode`, `SiteCode`, `FirstName`, `MiddleName`, `LastName`, `ParamedicName`, `ParamedicInitial`, `DateOfBirth`, `GCSex`, `GCParamedicType`, `GCEmploymentStatus`, `GCReligion`, `GCNationality`, `Title`, `Suffix`, `SpecialtyCode`, `HiredDate`, `TerminatedDate`, `StartExperienceDate`, `IsTaxRegistrant`, `TaxRegistrantNo`, `LicenseNo`, `LicenseExpiredDate`, `PictureFileName`, `IsAvailable`, `NotAvailableUntil`, `IsAnesthetist`, `IsAudiologist`, `IsHasPhysicianRole`, `UserName`, `Remarks`, `IsActive`, `IsFeeUsingPercentage`, `FeeAmount`, `FeePercentage`, `BankName`, `BankAccountNo`, `BankAccountName`, `SSN`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(285, 'PR0042', '1', 'Helfalinda nitasari', '', '', 'Helfalinda nitasari', 'PRW', '6/4/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'helfa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '40:15.6'),
(286, 'PR0043', '1', 'Della Fisti Pengi', '', '', 'Della Fisti Pengi', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'della', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '15:14.4'),
(287, 'PR0044', '1', 'Rita Handayani', '', '', 'Rita Handayani', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '22:02.4'),
(288, 'PR0045', '1', 'Lismadahniar', '', '', 'Lismadahniar', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '22:54.1'),
(289, 'PR0046', '1', 'Hendra Yedi', '', '', 'Hendra Yedi', 'PRW', '6/3/2019', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '42:51.2'),
(290, 'PR0047', '1', 'Rembulan Eka Yulien raden', '', '', 'Rembulan Eka Yulien raden', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '27:55.5'),
(291, 'PR0048', '1', 'SITI HARDIYANTI PRATIWI', '', '', 'SITI HARDIYANTI PRATIWI', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'siharpi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '58:45.5'),
(292, 'PR0049', '1', 'IWAN AKA PUTERA, Amd.Kep', '', '', 'IWAN AKA PUTERA, Amd.Kep', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'iwan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '12:53.1'),
(293, 'PR0050', '1', 'URISTA WULANDARI', '', '', 'URISTA WULANDARI', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'urista', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '40:17.3'),
(294, 'PR0051', '1', 'LENI SEFTIANA', '', '', 'LENI SEFTIANA', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'leni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '43:32.4'),
(295, 'PR0052', '1', 'ANGELA PUTRI', '', '', 'ANGELA PUTRI', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'angela', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '16:39.7'),
(296, 'PR0053', '1', 'Maresca Ayu Utami', '', '', 'Maresca Ayu Utami', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'maresca', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '13:27.6'),
(297, 'PR0054', '1', 'Muhammad Abdul Karim', '', '', 'Muhammad Abdul Karim', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'karim', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '38:13.3'),
(298, 'PR0055', '1', 'NANDA YUESTI', '', '', 'NANDA YUESTI', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nanday', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '27:04.7'),
(299, 'PR0056', '1', 'FIFI YUNIANTI', '', '', 'FIFI YUNIANTI', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fifi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '29:41.9'),
(300, 'PR0057', '1', 'FITRIANA LAILATUL M', '', '', 'FITRIANA LAILATUL M', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lailatul', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '01:04.1'),
(301, 'PR0058', '1', 'TRI UTAMI', '', '', 'TRI UTAMI', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'triutami', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '43:07.6'),
(302, 'PR0059', '1', 'EKO AGUSTIAN', '', '', 'EKO AGUSTIAN', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'eko', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '54:46.6'),
(303, 'PR0060', '1', 'Santi Herliza, A.M.Kep', '', '', 'Santi Herliza, A.M.Kep', 'PRW', '6/1/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'santi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '23:14.1'),
(304, 'PR0061', '1', 'Sri Mulyani, A.M. Kep', '', '', 'Sri Mulyani, A.M. Kep', 'PRW', '6/17/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'srimulyani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '36:19.0'),
(305, 'PR0062', '1', 'Eci Kusmira, A.M. Kep', '', '', 'Eci Kusmira, A.M. Kep', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'eci', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '22:41.5'),
(306, 'PR0063', '1', 'Puji Nugraha Putra, A.M. Kep', '', '', 'Puji Nugraha Putra, A.M. Kep', 'PRW', '6/3/2019', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'puji', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '22:33.5'),
(307, 'PR0064', '1', 'Juwita Irnawati, A.M. Kep', '', '', 'Juwita Irnawati, A.M. Kep', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'juwita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '59:22.5'),
(308, 'PR0065', '1', 'Dewi Safitrianti', '', '', 'Dewi Safitrianti', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'safitri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '13:41.8'),
(309, 'PR0066', '1', 'Listia Annisa Putri,A.Md.Kep', '', '', 'Listia Annisa Putri,A.Md.Kep', 'PRW', '6/17/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'listia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '15:16.5'),
(310, 'PR0067', '1', 'R.Rembulan Eka Yulien', '', '', 'R.Rembulan Eka Yulien', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rembulan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '18:16.4'),
(311, 'PR0068', '1', 'Dedek Puspasari', '', '', 'Dedek Puspasari', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dedekpus', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '25:38.1'),
(312, 'PR0069', '1', 'Ayu Apriani', '', '', 'Ayu Apriani', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayuapriani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '16:31.6'),
(313, 'PR0070', '1', 'Rita Handayani', '', '', 'Rita Handayani', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ritahanda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '10:55.6'),
(314, 'PR0071', '1', 'Neti Sartika', '', '', 'Neti Sartika', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'neti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '28:04.6'),
(315, 'PR0072', '1', 'Aidil Fitrisyah', '', '', 'Aidil Fitrisyah', 'PRW', '6/10/2019', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aidil', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '36:07.5'),
(316, 'PR0073', '1', 'Liani Hariyanti Anha', '', '', 'Liani Hariyanti Anha', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'liani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '35:27.6'),
(317, 'PR0074', '1', 'Ayu Andira, Amd,Kep', '', '', 'Ayu Andira, Amd,Kep', 'PRW', '6/4/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayuandira', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '16:56.3'),
(318, 'PR0075', '1', 'Ade Erna Widyani', '', '', 'Ade Erna Widyani', 'PRW', '6/10/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'okti', '44:40.0'),
(319, 'PR0076', '1', 'Nurul Hikmah', '', '', 'Nurul Hikmah', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nurul', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '32:46.8'),
(320, 'PR0077', '1', 'Serli Marlina', '', '', 'Serli Marlina', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'serli', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '25:02.8'),
(321, 'PR0078', '1', 'Melda Lestari Pardede, Amd.Kep', '', '', 'Melda Lestari Pardede, Amd.Kep', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'melda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '14:01.4'),
(322, 'PR0079', '1', 'RIO CANDRA PERDANA', '', '', 'RIO CANDRA PERDANA', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '15:26.1'),
(323, 'PR0080', '1', 'Bella Sara Dwi Putri', '', '', 'Bella Sara Dwi Putri', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '16:45.8'),
(324, 'PR0081', '1', 'IRA KHOIRINZA', '', '', 'IRA KHOIRINZA', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ira', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '27:52.0'),
(325, 'PR0082', '1', 'Dwi Rachmasari', '', '', 'Dwi Rachmasari', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '19:43.2'),
(326, 'PR0083', '1', 'Astia Paulina', '', '', 'Astia Paulina', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'astia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '55:12.6'),
(327, 'PR0084', '1', 'Epin Nuryani', '', '', 'Epin Nuryani', 'PRW', '6/11/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'epin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '49:24.7'),
(328, 'DR001', '1', 'dr. Robby Prawira Sulbahri, SpOG', '', '', 'dr. Robby Prawira Sulbahri, SpOG', 'RBS', '8/7/1986', '0001^M', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', '', '', '26', '0001-01-01', '0001-01-01', '1/1/2018', '0', '', '', '0001-01-01', 'ROBBY.jpg', '1', NULL, '0', '0', '0', 'robby', 'Riwayat Pendidikan : Spesialis Obstetri dan Ginekologi FK Unsri\nRiwayat Pekerjaan :\n1. RSUD Empat Lawang 1 Februari 2018 sd 31 Januari 2019\n2. RS Charitas Karya Asih 1 Maret 2019 sd sekarang\n3. RS Graha Mandiri 1 April 2019 sd sekarang', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '11:06.0'),
(329, 'DR002', '1', 'dr. Febrina Art, Sp.M', '', '', 'dr. Febrina Art, Sp.M', 'FEB', '2/23/1990', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', '', '', 'sm', '0001-01-01', '0001-01-01', '1/1/2018', '0', '', '', '0001-01-01', 'dr Febrina Art SpM.jpg', '1', NULL, '0', '0', '0', 'febrina', 'Riwayat Pendidikan :\nProgram Studi Kesehatan Mata FK Universitas Sriwijaya ( 2014 - 2018 )\n\nRiwayat Pekerjaan : \nRS Khusus Mata Provinsi Sumatera Selatan : 2018 ? sekarang\nRSUD Siti Fatimah Provinsi Sumatera Selatan : 2019 ? sekarang', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '20:33.6'),
(330, 'PR0085', '1', 'Dewi  ', 'Gustiara', '', 'Dewi   Gustiara ,S.Kep.,Ners', 'PRW', '8/28/1994', '0001^F', 'X0055^003', 'X0020^001', '0006^MOS', NULL, '', 'S.Kep.,Ners', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'gustiara', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '42:50.3'),
(331, 'DR003', '1', 'dr.Augris Shandrianti SpPD', '', '', 'dr.Augris Shandrianti SpPD', 'AS', '8/24/1985', '0001^F', 'X0055^001', 'X0020^002', '0006^MOS', 'X0014^001', '', '', 'spd', '0001-01-01', '0001-01-01', '12/1/2018', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'augris', 'Riwayat Pekerjaan :\n- Dokter WKDS RSUD Empat LAwang (Des 2018-April 2019)\n- Dokter RS Siti Fatimah Pemprov Sumsel (Mei 2019-sekarang)', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '25:17.2'),
(332, 'PR0086', '1', 'DESI ARDINA, A. Md. Kep.', '', '', 'DESI ARDINA, A. Md. Kep.', 'PRW', '6/3/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'desi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '18:23.9'),
(333, 'PRW0086', '1', 'Lili', 'Susanti', '', 'Lili Susanti', 'lili', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lili', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '35:59.8'),
(334, 'PR0087', '1', 'Andre', 'Septian', '', 'Andre Septian', 'andre', '9/16/1995', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'septian', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '11:21.4'),
(335, 'PR0088', '1', 'Erik', 'Westa Ira', 'Buana', 'Erik Westa Ira Buana', 'erik', '11/8/1990', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'irabuana', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '35:58.5'),
(336, 'PR0089', '1', 'Rita', 'Puji', 'Rahayu', 'Rita Puji Rahayu', 'ritap', '2/3/1995', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ritapuji', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '56:15.2'),
(337, 'dr004', '1', 'drg. Linda Rimadini', '', '', 'drg. Linda Rimadini', 'LR', '6/17/2019', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, '', '', 'gigi', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'linda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '46:02.7'),
(338, 'OR0090', '1', 'Yopa', 'Lisdaryanti', '', 'Yopa Lisdaryanti ,A.Md.Kep', 'yopa', '6/3/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', 'A.Md.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yopa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '17:01.5'),
(339, 'PR0091', '1', 'Alen', 'Fatria', '', 'Alen Fatria', 'alen', '12/15/1988', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'alen', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '54:51.3'),
(340, 'epin', '1', 'Epin Nuryani', '', '', 'Epin Nuryani', 'prw', '6/11/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '235', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '48:39.2'),
(341, 'PR0093', '1', 'Indah', 'Oktarita', '', 'Indah Oktarita ,A.Md.Kep', 'indah', '6/11/2018', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', 'A.Md.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'oktarita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '09:22.9'),
(1341, 'DR005', '1', 'dr. Rizal Daulay, SpOT', '', '', 'dr. Rizal Daulay, SpOT', 'RD', '7/2/2019', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', '72', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drrizal', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '53:29.9'),
(1342, 'A0274', '1', 'Rachmat', 'Taufan', '', 'dr. Rachmat Taufan', 'rch', '7/4/2017', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rachmat', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '58:35.9'),
(1343, 'A0275', '1', 'Agus', 'Salim', '', 'dr. Agus Salim', 'AS', '7/4/2017', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'agussalim', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'riza94', '14:03.0'),
(1344, 'PR0092', '1', 'Rekon', 'Purnawan', '', 'Rekon Purnawan', 'rek', '8/9/2006', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', '', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rekon', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '12:05.6'),
(1345, 'DR006', '1', 'Abla', 'Ghanie', '', 'dr. Abla Ghanie ,SpTHT-KL', 'AG', '1/12/1953', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', 'SpTHT-KL', 'tht', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drabla', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '17:40.0'),
(1346, 'PR0090', '1', 'Eliyana', '', '', 'Eliyana ,S.ST.', 'ely', '9/11/1991', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', 'S.ST.', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'eliyana', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '59:04.4'),
(1347, 'PR01', '1', 'Rio', 'Candra', 'Perdana', 'Rio Candra Perdana ,A.md.Kep', 'ro', '9/2/2019', '0001^M', 'X0055^003', 'X0020^002', NULL, NULL, '', 'A.md.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'riocp', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '07:10.9'),
(1348, 'PR02', '1', 'Irma', 'Damayanti', '', 'Irma Damayanti ,A.md.Kep', 'id', '9/2/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', 'A.md.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'irma', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '05:46.2'),
(1349, 'PR03', '1', 'Bella', 'Sara', 'Dwi Putri', 'Bella Sara Dwi Putri ,A.md.KG', 'kg', '9/2/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, '', 'A.md.KG', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'bella', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '06:33.9'),
(1350, 'DR007', '1', 'NRF SHELLY ', 'ZULISKHA', '', 'dr. NRF SHELLY  ZULISKHA ,Sp.A', 'NRF', '10/12/1984', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', NULL, 'dr', 'Sp.A', 'SpA.', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drshelly', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '39:19.6'),
(1351, 'DR008', '1', 'M. Yoga', '', '', 'dr. M. Yoga', 'dr', '9/1/2016', '0001^M', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dryoga', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '55:55.1'),
(1352, 'DR009', '1', 'M. Aditya', 'Kurniadi', '', 'dr. M. Aditya Kurniadi', 'dr', '9/2/2019', '0001^M', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'draditya', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '57:57.1'),
(1353, 'DR010', '1', 'Bhisma Trisandi', '', '', 'dr. Bhisma Trisandi', 'dr', '9/16/2019', '0001^M', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drbhisma', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '59:20.8'),
(1354, 'DR011', '1', 'Devin', 'Fidela', '', 'dr. Devin Fidela', 'dr', '9/29/2019', '0001^M', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drdevin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '47:13.1'),
(1355, 'DR012', '1', 'Nyimas Inas', 'Mellanisa', '', 'dr. Nyimas Inas Mellanisa', 'dr', '9/29/2019', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drnyimas', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '52:30.3'),
(1356, 'DR013', '1', 'Natasha ', 'Permata ', 'Andini', 'dr. Natasha  Permata  Andini', 'dr', '9/29/2019', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drnatasha', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '02:32.6'),
(1357, 'DR014', '1', 'Muhammad Faza', 'Naufal', '', 'dr. Muhammad Faza Naufal', 'dr', '9/29/2019', '0001^M', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drfaza', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '03:07.5'),
(1358, 'spb01', '1', 'Bermansyah', '', 'SpB.TKV', 'dr. Bermansyah SpB.TKV', 'ber', '10/12/1999', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', 'btkv', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'bermansyah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '00:33.2'),
(1359, 'A0351', '1', 'Siti', 'Darojah', '', 'Siti Darojah', 'sd', '10/2/2018', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '58:12.7'),
(1360, 'A0352', '1', 'Deti', 'Nadya', 'Rahma', 'Miss. Deti Nadya Rahma', 'dnr', '11/27/1992', '0001^F', NULL, 'X0020^001', '0006^MOS', 'X0014^001', 'Miss', '', NULL, '10/1/2019', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'detinadra', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '37:40.1'),
(1361, 'A0353', '1', 'Martin', 'Raja', 'Sonang', 'dr. Martin Raja Sonang ,SpRad', 'mrs', '3/21/1975', '0001^M', 'X0055^001', NULL, NULL, NULL, 'dr', 'SpRad', '69', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drmartin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '31:54.1'),
(1362, 'A0354', '1', 'Ahmad', 'Yunizar', '', 'Ahmad Yunizar', 'ay', '10/1/2019', '0001^M', NULL, 'X0020^001', '0006^MOS', 'X0014^001', '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yunizar', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '46:27.8'),
(1363, 'a0368', '1', 'Gama', 'Satria', '', 'dr. Gama Satria ,Sp.B.T.KV', 'GS', '5/14/1980', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp.B.T.KV', 'btkv', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'gama', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '01:10.3'),
(1364, 'ao381', '1', 'Ahmat', ' Umar', '', 'dr. Ahmat  Umar ,Sp.B.T.KV', 'au', '11/4/1973', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', 'Sp.B.T.KV', 'KV', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ahmat', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '40:09.6'),
(1365, 'A0355', '1', 'Reni', '', 'Desiyana', 'Reni Desiyana', 'rn', '10/1/2019', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'reni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '28:02.4'),
(1366, 'A0356', '1', 'Nina', '', 'Sakinata', 'Nina Sakinata', 'nn', '10/23/2019', '0001^F', 'X0055^011', 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '41:31.4'),
(1367, 'A0357', '1', 'Betty', '', 'Koesendang', 'Betty Koesendang', 'bk', '11/5/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'betty', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '02:34.7'),
(1368, 'A0358', '1', 'Rani', '', 'Permayana', 'Rani Permayana', 'rp', '11/5/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ranip', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '13:31.3'),
(1369, 'A0359', '1', 'Amni', '', '', 'Amni', 'am', '11/5/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'amni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '14:17.8'),
(1370, 'sp.pd01', '1', 'Novandra', '', '', 'dr. Novandra ,Sp.Pd', 'spd', '11/4/2019', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', 'Sp.Pd', 'spd', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'novandra', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '37:10.7'),
(1371, 'A03560', '1', 'Aldino', '', 'Alki', 'Aldino Alki', 'aa', '11/13/2019', '0001^M', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aldino', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '48:37.7'),
(1372, 'nov01', '1', 'Wendy', 'Primadhani', '', 'dr. Wendy Primadhani ,SpB-KBD,MARS', 'wendy', '6/29/1982', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', 'SpB-KBD,MARS', '68', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wendy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '55:00.9'),
(1373, 'a0369', '1', 'Debi', '', 'Destiana', 'Debi Destiana', 'dd', '11/21/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'debi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '41:42.6'),
(1374, 'a0370', '1', 'Anggi', '', 'Angraini', 'Anggi Angraini', 'aa', '11/21/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'anggi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '05:42.2'),
(1375, 'dr0099', '1', 'Asep ', 'Zainuddin', '', 'dr. Asep  Zainuddin ,SpKK', 'dra', '12/3/2019', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', 'SpKK', '66', '12/4/2019', '12/4/2019', '12/4/2019', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drasep', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '47:31.5'),
(1376, 'a0371', '1', 'Indra', '', 'Gunawan', 'Indra Gunawan', 'IG', '12/1/2019', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'indrag', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '32:11.7'),
(1377, 'sdm01', '1', 'Shanti ', 'Maita', 'SKM.,M.Si', 'Shanti  Maita SKM.,M.Si', 'SM', '5/30/2007', '0001^F', NULL, 'X0020^002', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'shanti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '43:22.3'),
(1378, 'sdm02', '1', 'Yulismayati', '', '', 'Yulismayati ,S.K.M., M.Kes', 'yl', '12/3/2012', '0001^F', NULL, 'X0020^002', NULL, NULL, '', 'S.K.M., M.Kes', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yulisma', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '44:18.7'),
(1379, 'sdm03', '1', 'Silviana', 'Pratama', 'Fitri', 'Silviana Pratama Fitri ,Am.Keb', 'sp', '12/5/2016', '0001^F', NULL, 'X0020^001', NULL, NULL, '', 'Am.Keb', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'silviana', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '48:43.3'),
(1380, 'sdm04', '1', 'Okti', 'Karlina', '', 'Okti Karlina ,S.K.M', 'ok', '12/15/2015', '0001^F', NULL, 'X0020^001', NULL, NULL, '', 'S.K.M', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'okti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '47:59.4'),
(1381, 'keu01', '1', 'Hesti', 'Rizkisari', '', 'Hesti Rizkisari ,SE', 'KI', '12/10/2012', '0001^F', NULL, 'X0020^002', NULL, NULL, '', 'SE', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rizkisari', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '51:46.3'),
(1382, 'A298', '1', 'Tri', '', 'Rizky', 'Tri Rizky', 'TR', '12/1/2019', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'tririzky', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '08:47.0'),
(1383, 'A099', '1', 'Novita', '', 'Rozitri', 'Novita Rozitri', 'nr', '12/1/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '241', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'novitar', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '37:18.7'),
(1384, 'Keu04', '1', 'Ardi', 'Marfieza', '', 'Ardi Marfieza ,SE., M.Sc', 'am', '11/26/2018', '0001^M', NULL, 'X0020^002', NULL, NULL, '', 'SE., M.Sc', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ardi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '01:16.6'),
(1385, 'keu05', '1', 'Ahmad', 'Rivai', '', 'Ahmad Rivai ,SE, M.Si', 'ar', '12/3/2018', '0001^M', NULL, 'X0020^002', NULL, NULL, '', 'SE, M.Si', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rivai', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '02:09.8'),
(1386, 'mg001', '1', 'Sri ', 'Chandra', '', 'Miss. Sri  Chandra', 'sc', '12/2/2019', '0001^F', 'X0055^003', 'X0020^002', NULL, NULL, 'Miss', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'scd', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '07:46.4'),
(1387, 'a100', '1', 'Mardiah Robiah', '', '', 'Mardiah Robiah ,S.KM', 'MR', '12/1/2019', '0001^F', NULL, 'X0020^001', NULL, NULL, '', 'S.KM', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mardiah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '15:26.0'),
(1388, 'a101', '1', 'Muntahal Amri', '', '', 'Muntahal Amri', 'ma', '12/1/2019', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'muntahal', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '05:29.7'),
(1389, 'a102', '1', 'M. H. Affandi', '', '', 'M. H. Affandi', 'mha', '12/1/2019', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'affandi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '05:54.0'),
(1390, 'a103', '1', 'Apitria Sugianto', '', '', 'Apitria Sugianto', 'as', '12/1/2019', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'apitria', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '06:50.8'),
(1391, 'adm001', '1', 'Anitra ', 'Pilyanti', '', 'Anitra  Pilyanti ,Am.Keb', 'ap', '8/6/1993', '0001^F', NULL, 'X0020^001', NULL, NULL, '', 'Am.Keb', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'anitra', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '41:53.5'),
(1392, 'adm002', '1', 'Linda', 'Fitriani', '', 'Linda Fitriani ,Am.Kep', 'lf', '3/28/1993', '0001^F', NULL, NULL, NULL, NULL, '', 'Am.Kep', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lindafitri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '43:33.0'),
(1393, 'adm003', '1', 'Ayu', 'Lestari', '', 'Ayu Lestari ,amd.keb', 'al', '4/26/1998', '0001^F', NULL, 'X0020^001', NULL, NULL, '', 'amd.keb', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayules', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '44:40.4'),
(1394, 'dr015', '1', 'Vina Chanthyca Ayu', '', '', 'dr. Vina Chanthyca Ayu', 'vca', '1/6/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drvina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '27:51.1'),
(1395, 'dr016', '1', 'Dedy ', 'Zulkarnain', '', 'dr. Dedy  Zulkarnain ,Sp. KO', 'dz', '1/7/2020', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', 'Sp. KO', '80', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drdedy', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '53:28.4'),
(1396, 'gd001', '1', 'Tiara', 'Abee', '', 'Tiara Abee', 'ta', '12/31/1995', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'abee', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '49:21.6'),
(1397, 'gd002', '1', 'Novita', '', '', 'Novita', 'nv', '11/19/1998', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'vita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '50:43.2'),
(1398, 'gd003', '1', 'Wanda', '', '', 'Wanda', 'wd', '5/18/1998', '0001^F', NULL, NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wanda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '51:19.3'),
(1399, 'a104', '1', 'Thresia', '', 'Rumondang, S.Kep, Ners', 'Thresia Rumondang, S.Kep, Ners', 'tr', '1/1/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '21:10.6'),
(1400, 'a105', '1', 'Ahmad', '', 'Sobirin, Am.Kep', 'Ahmad Sobirin, Am.Kep', 'as', '1/1/2020', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '05:28.1'),
(1401, 'a106', '1', 'Budi', '', 'Kurniansyah, Amd.Kep', 'Budi Kurniansyah, Amd.Kep', 'bk', '1/1/2020', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '05:52.6'),
(1402, 'a107', '1', 'Fitriani, Amd.Kep', '', '', 'Fitriani, Amd.Kep', 'fit', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '06:19.3'),
(1403, 'a108', '1', 'Shelvia Siswanda, S.Kep, Ners', '', '', 'Shelvia Siswanda, S.Kep, Ners', 'ss', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '06:45.4'),
(1404, 'a109', '1', 'Husniati, Amd.Kep', '', '', 'Husniati, Amd.Kep', 'hus', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '07:06.0'),
(1405, 'a110', '1', 'Relawati, S.Kep, Ners', '', '', 'Relawati, S.Kep, Ners', 'rel', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '07:38.0'),
(1406, 'a111', '1', 'Cholila Ramadita, Amd.Kep', '', '', 'Cholila Ramadita, Amd.Kep', 'cr', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '08:04.4'),
(1407, 'a112', '1', 'Novi Andriyani, Amd.Kep', '', '', 'Novi Andriyani, Amd.Kep', 'na', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '08:26.0'),
(1408, 'a113', '1', 'Elly Yulianti, Amd.Kep', '', '', 'Elly Yulianti, Amd.Kep', 'ey', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '09:09.0'),
(1409, 'a114', '1', 'Sariat Sandoria, Amd.Kep', '', '', 'Sariat Sandoria, Amd.Kep', 'ss', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '09:35.1'),
(1410, 'a115', '1', 'Atika, S.Kep, Ners', '', '', 'Atika, S.Kep, Ners', 'ati', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '11:08.1'),
(1411, 'a116', '1', 'Jamal, Amd.Kep', '', '', 'Jamal, Amd.Kep', 'jam', '1/1/2020', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '07:08.6'),
(1412, 'a117', '1', 'Iwan Aka Putra, Am.Kep', '', '', 'Iwan Aka Putra, Am.Kep', 'iap', '1/1/2020', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '12:26.6'),
(1413, 'a118', '1', 'Abdi Zaki, S.Kep, Ners', '', '', 'Abdi Zaki, S.Kep, Ners', 'az', '1/1/2020', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'abdi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '13:21.2'),
(1414, 'a119', '1', 'Melda Lestari Pardede, Amd.Kep', '', '', 'Melda Lestari Pardede, Amd.Kep', 'mlp', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '14:13.8'),
(1415, 'a120', '1', 'Setra Aprino, Amd.Kep', '', '', 'Setra Aprino, Amd.Kep', 'sa', '1/1/2020', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '14:48.7'),
(1416, 'a121', '1', 'Hendra Yedi, Amd.Kep', '', '', 'Hendra Yedi, Amd.Kep', 'hy', '1/1/2020', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '15:11.2'),
(1417, 'a122', '1', 'Nupikha Pinasti Robbani, Amd.Kep', '', '', 'Nupikha Pinasti Robbani, Amd.Kep', 'npr', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '240', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nupikha', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '16:12.3'),
(1418, 'a123', '1', 'Ayu Andira, Amd.Kep', '', '', 'Ayu Andira, Amd.Kep', 'aa', '1/1/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '16:31.9'),
(1419, 'aa123', '1', 'dr. Iqmal Perlianta, SpBP-RE', '', '', 'dr. Iqmal Perlianta, SpBP-RE', 'iq', '1/1/2020', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', 'Sp.BP', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'iqmal', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '17:24.2'),
(1420, 'lab000001', '1', 'julia ', 'damayanti', '', 'julia  damayanti', 'jd', '2/3/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'juliadama', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '47:03.2'),
(1421, 'a222', '1', 'dr. Yuri Kamila, Sp.OG(K)', '', '', 'dr. Yuri Kamila, Sp.OG(K)', 'yk', '2/1/2020', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', 'feto', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yurik', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '36:27.9'),
(1422, 'a233', '1', 'dr. Nopri Fitriani, Sp.An', '', '', 'dr. Nopri Fitriani, Sp.An', 'nf', '2/1/2020', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', 'san', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'noprif', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '27:16.3'),
(1423, 'an001', '1', 'Mayang', 'Indah', 'Lestari', 'dr. Mayang Indah Lestari ,SpAn', 'my', '2/8/2017', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'SpAn', 'san', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drmayang', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '10:59.2'),
(1424, 'keu001', '1', 'Carolien', 'Tri', 'Yuniah', 'Carolien Tri Yuniah ,S.E,AK,CA', 'ol', '6/30/1990', '0001^F', NULL, 'X0020^001', NULL, NULL, '', 'S.E,AK,CA', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'carol', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '21:43.7'),
(1428, 'a0372', '1', 'dr. Ahmad Bayu Alfarizi', '', '', 'dr. Ahmad Bayu Alfarizi ,Sp.A (K)., M.Kes', 'ab', '3/1/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', 'Sp.A (K)., M.Kes', 'SpA.', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drbayu', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '38:55.5'),
(1429, 'pc001', '1', 'Tessy ', 'Anggraini', '', 'Tessy  Anggraini', 'TA', '3/3/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'tessy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '06:41.0'),
(1430, 'pc002', '1', 'Ayu ', 'Puspa ', 'Dwindra', 'Ayu  Puspa  Dwindra', 'APD', '3/3/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayupuspa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '07:50.3'),
(1431, 'pc003', '1', 'Enda', 'Novela', '', 'Enda Novela', 'EN', '3/3/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Enda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '08:29.4'),
(1432, 'a001111', '1', 'aldino alki', '', '', 'aldino alki', 'ala', '3/5/2019', '0001^M', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aldino1', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '51:43.5'),
(1433, 'a22111', '1', 'Aldino Alki', '', '', 'Aldino Alki', 'aa', '2/26/2019', '0001^M', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '01:29.0');
INSERT INTO `m_paramedis` (`ParamedicID`, `ParamedicCode`, `SiteCode`, `FirstName`, `MiddleName`, `LastName`, `ParamedicName`, `ParamedicInitial`, `DateOfBirth`, `GCSex`, `GCParamedicType`, `GCEmploymentStatus`, `GCReligion`, `GCNationality`, `Title`, `Suffix`, `SpecialtyCode`, `HiredDate`, `TerminatedDate`, `StartExperienceDate`, `IsTaxRegistrant`, `TaxRegistrantNo`, `LicenseNo`, `LicenseExpiredDate`, `PictureFileName`, `IsAvailable`, `NotAvailableUntil`, `IsAnesthetist`, `IsAudiologist`, `IsHasPhysicianRole`, `UserName`, `Remarks`, `IsActive`, `IsFeeUsingPercentage`, `FeeAmount`, `FeePercentage`, `BankName`, `BankAccountNo`, `BankAccountName`, `SSN`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(1434, 'a035000', '1', 'Aldino Alki, S.Farm', '', '', 'Aldino Alki, S.Farm', 'aa', '10/8/2019', '0001^M', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '08:34.8'),
(1435, 'a0000u', '1', 'Ria Maya Sari', '', '', 'Ria Maya Sari', 'ri', '3/1/2020', '0001^F', 'X0055^011', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'riamayas', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '38:02.1'),
(1436, 'as877', '1', 'Apriyeni', '', '', 'Apriyeni', 'ap', '3/1/2020', '0001^F', 'X0055^011', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'apriyeni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '39:01.9'),
(1437, 'frm01', '1', 'Teni Agustina', '', '', 'Teni Agustina ,S. Farm, Apt', 'TA', '8/14/1994', '0001^M', NULL, 'X0020^001', NULL, NULL, '', 'S. Farm, Apt', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'teni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '02:19.8'),
(1438, 'dr017', '1', 'ayu ika', 'gustasi', '', 'dr. ayu ika gustasi', 'aig', '8/7/1992', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drayuika', 'Riwayat :\nRS khusus Mata Palembang\n\nNIK :\n1671064708920013', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '43:38.9'),
(1439, 'dr018', '1', 'Tresa ', 'Ivani ', 'Saskia', 'dr. Tresa  Ivani  Saskia', 'TRS', '11/25/1994', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drtresa', 'RIWAYAT PENDIDIKAN :\nS1 Profesi Kedokteran Universitas Lampung\n\nNIK :\n1871056511940002\n', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '45:18.5'),
(1440, 'dr019', '1', 'Shelvy ', 'Nur ', 'Utami', 'drg. Shelvy  Nur  Utami', 'snu', '9/9/1993', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'drg', '', 'gigi', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drgshelvy', 'RIWAYAT PENDIDIKAN :\nS1 PROFESI FKG Universitas Indonesia ( 2015-2017 )\n\nRIWAYAT PEKERJAAN :\nKIDDOEZ DENTAL CARET JKT ( 2017 - 2019 )\nDENTAL CARE & AEITHTIC CENTER ( 2017 - 2019 )\nDENTISTEAM CLINIC  ( 2017-2019 )\n\nNIK :\n1671104909930005\n', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '46:26.2'),
(1441, 'dr020', '1', 'Clara ', 'Adelia', 'Wijaya', 'dr. Clara  Adelia Wijaya', 'CAW', '9/12/1993', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '446/IPD/0301/DPMPTSP-PPK/2020', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drclara', 'RIWAYAT PENDIDIKAN :\nS1 PROFESI DOKTER UNSRI\n\nRIWAYAT PEKERJAAN :\nKLINIK AL-MISYAKAT\n\nNIK :\n1671085209930004', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '47:51.8'),
(1442, 'dr021', '1', 'Mutiara Bagus Niti', '', '', 'dr. Mutiara Bagus Niti', 'MBN', '8/25/1993', '0001^F', 'X0055^001', 'X0020^001', '0006^MOS', 'X0014^001', 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drbagus', 'RIWAYAT PENDIDIKAN :\nS1 PROFESI DOKTER\n\nNIK : \n1671072508930011', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '24:51.2'),
(1443, 'a0125', '1', 'Silvanifah Ksrtika Sari', '', '', 'Silvanifah Ksrtika Sari', 'sk', '3/29/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'silvanifah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '44:29.2'),
(1444, 'a0126', '1', 'Afrita Chayang Sari', '', '', 'Afrita Chayang Sari', 'ac', '3/29/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'afrita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '46:20.7'),
(1445, 'a0301', '1', 'Apri Muzakir Putra', '', '', 'Apri Muzakir Putra', 'am', '3/29/2020', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', '233', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aprimp', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '57:54.4'),
(1446, 'al01', '1', 'Alpian', '', '', 'dr. Alpian ,Sp. PD', 'ALPI', '12/15/1975', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp. PD', 'KV', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drpian', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '37:50.7'),
(1447, 'a033', '1', 'Apriani', '', '', 'Apriani', 'ap', '3/30/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'apriani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '44:00.6'),
(1448, 'a034', '1', 'Adinda Larasati', '', '', 'Adinda Larasati', 'al', '3/30/2020', '0001^F', 'X0055^007', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'alarasati', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '45:37.8'),
(1449, 'a0332', '1', 'M. Rosyid Qodir, Amd.Kep', '', '', 'M. Rosyid Qodir, Amd.Kep', 'rq', '4/29/2019', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rosyid', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '08:05.3'),
(1450, 'a00423', '1', 'Noparanda A Susanto', '', '', 'Noparanda A Susanto', 'np', '5/1/2019', '0001^M', 'X0055^008', 'X0020^001', NULL, NULL, '', '', '246', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'randa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '43:10.4'),
(1451, 'a00424', '1', 'Dela Puspita sari', '', '', 'Dela Puspita sari', 'dp', '4/28/2020', '0001^F', 'X0055^008', 'X0020^001', NULL, NULL, '', '', '246', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'delaps', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '44:25.6'),
(1452, 'a00425', '1', 'Yuda Prasetia', '', '', 'Yuda Prasetia', 'yp', '4/27/2020', '0001^M', 'X0055^008', 'X0020^001', NULL, NULL, '', '', '246', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yuda', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '43:48.2'),
(1453, 'dr022', '1', 'Venni Yulianti', '', '', 'dr. Venni Yulianti ,Sp.PA', 'VY', '5/27/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp.PA', 'spa', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drvenni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '21:28.9'),
(1454, 'fr01', '1', 'Mia', 'Lestari', '', 'Mia Lestari', 'ml', '4/7/1995', '0001^F', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '245', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mialestari', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '50:15.0'),
(1455, 'a0316', '1', 'Isti Farisa Meuthia, Amd.Kep', '', '', 'Isti Farisa Meuthia, Amd.Kep', 'if', '6/2/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'isti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '27:06.1'),
(1456, 'a0317', '1', 'Febriani Cahya, Amd.Kep', '', '', 'Febriani Cahya, Amd.Kep', 'fc', '5/26/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'febriani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '28:05.5'),
(1457, 'a0318', '1', 'Maya Susanti, Amd.Kep', '', '', 'Maya Susanti, Amd.Kep', 'ms', '5/26/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mayas', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '28:49.9'),
(1458, 'ipls01', '1', 'Retno Sari', '', '', 'Retno Sari', 'RS', '6/17/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '214', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'retno', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '44:22.1'),
(1459, 'icu001', '1', 'Titi', 'Hidayati', '', 'Titi Hidayati ,Am.Kep', 'th', '6/18/2015', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', 'Am.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'titi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '39:14.3'),
(1460, 'icu002', '1', 'Frilia', 'Rahma', '', 'Frilia Rahma ,Am.Kep', 'fr', '5/29/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', 'Am.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'frilia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '40:47.5'),
(1461, 'icu003', '1', 'Ruli', 'Lismia', '', 'Ruli Lismia ,Am.Kep', 'rl', '6/11/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', 'Am.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ruli', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '42:52.9'),
(1462, 'icu004', '1', 'Tri', 'Agustina', '', 'Tri Agustina ,Am.Kep', 'ta', '5/4/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', 'Am.Kep', '81', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'agustina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '44:02.9'),
(1463, 'a0127', '1', 'Wasila Yanuarti, S.Farm', '', '', 'Wasila Yanuarti, S.Farm', 'wy', '5/13/2019', '0001^F', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wasila', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '43:17.9'),
(1464, 'a0373', '1', 'dr. Arief Budiman', '', '', 'dr. Arief Budiman', 'ab', '7/3/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drarief', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '38:24.3'),
(1465, 'a038', '1', 'dr. Abdillah Husada', '', '', 'dr. Abdillah Husada', 'AH', '8/1/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'adil', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '09:45.7'),
(1466, 'a040', '1', 'Irvanosaka Afren', '', '', 'Irvanosaka Afren', 'ia', '7/29/2019', '0001^M', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'irvanosaka', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '45:36.6'),
(1467, 'lab001', '1', 'Sulastri', '', '', 'Sulastri', 'sl', '8/24/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lastri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '31:15.0'),
(1468, 'lab002', '1', 'Era ', 'Indah', 'Nurvika', 'Era  Indah Nurvika', 'EIN', '8/24/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'era', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '30:31.9'),
(1469, 'lab003', '1', 'Astining', 'Tyas', '', 'Astining Tyas', 'AT', '8/24/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'tyass', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '32:27.7'),
(1470, 'lab004', '1', 'Mekharlika', 'E', '', 'Mekharlika E', 'ME', '8/24/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mekhar', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '33:40.8'),
(1471, 'lab005', '1', 'Rizqi ', 'Mukramin ', 'Marpaung', 'Rizqi  Mukramin  Marpaung', 'RMM', '8/24/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rizkimuk', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '35:03.2'),
(1472, 'lab006', '1', 'Hadi', 'Rosandi', '', 'Hadi Rosandi', 'HR', '8/24/2020', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'hadii', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '36:29.0'),
(1473, 'lab007', '1', 'Upit', 'Sarimanah', '', 'Upit Sarimanah', 'US', '8/24/2020', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'upitt', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '37:03.7'),
(1474, 'a07', '1', 'dr. Muhammad Aulia, Sp.A', '', '', 'dr. Muhammad Aulia, Sp.A', 'ma', '7/28/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'SpA.', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drmaulia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '18:34.9'),
(1475, 'a08', '1', 'dr. M. Iqbal Ali Rabbani', '', '', 'dr. M. Iqbal Ali Rabbani', 'ma', '8/5/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'driqbal', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '27:38.6'),
(1476, 'a09', '1', 'dr. Octia Yudiantin', '', '', 'dr. Octia Yudiantin', 'oy', '8/4/2019', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'droctia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '26:03.6'),
(1477, 'a081', '1', 'dr. Alpriansyah Hadiwijaya', '', '', 'dr. Alpriansyah Hadiwijaya', 'ah', '7/1/2019', '0001^M', 'X0055^001', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dralpri', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '45:14.7'),
(1478, 'a082', '1', 'Lia Novianti', '', '', 'Lia Novianti', 'ln', '9/1/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lianovi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '28:46.9'),
(1479, 'a083', '1', 'Winda Widya', '', '', 'Winda Widya', 'ww', '9/1/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wwidya', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '26:29.0'),
(1480, 'a071', '1', 'dr. Elok Aryani, Sp. P M.Ked', '', '', 'dr. Elok Aryani, Sp. P M.Ked', 'ea', '8/26/2018', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drelok', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '48:36.3'),
(1481, 'dr20', '1', 'Anisah', '', '', 'dr. Anisah ,M.Kes', 'an', '12/24/1989', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'M.Kes', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'anisah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '21:17.6'),
(1482, 'a084', '1', 'dr. Elmo Saviro Herprananda', '', '', 'dr. Elmo Saviro Herprananda', 'es', '9/30/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drelmo', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '52:49.4'),
(1483, 'a085', '1', 'dr. Anisah', '', '', 'dr. Anisah', 'da', '10/1/2019', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '31:10.9'),
(1484, 'a086', '1', 'Dina Rahmanika', '', '', 'Dina Rahmanika', 'dr', '9/27/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dinar', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '06:40.6'),
(1485, 'a087', '1', 'Uci Nopita', '', '', 'Uci Nopita', 'un', '9/27/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ucin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '08:23.8'),
(1486, 'a088', '1', 'Nurfadhilah, SKM', '', '', 'Nurfadhilah, SKM', 'nu', '9/30/2019', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nurfadh', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '20:07.4'),
(1487, 'a089', '1', 'Era Gustina, SKM', '', '', 'Era Gustina, SKM', 'eg', '9/2/2019', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'erag', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '19:14.1'),
(1488, 'a091', '1', 'Eka Falisya', '', '', 'Eka Falisya', 'EF', '10/1/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ekaf', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '23:45.1'),
(1489, 'a090', '1', 'Kms, M. Abdul Mutholib', '', '', 'Kms, M. Abdul Mutholib', 'mam', '9/30/2019', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mabdul', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '22:48.6'),
(1490, 'a096', '1', 'Sri Rahayu Purnaningsih, S.H', '', '', 'Sri Rahayu Purnaningsih, S.H', 'srp', '10/4/2020', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayu68', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '29:20.7'),
(1491, 'PR300', '1', 'ria komala sari, Am.Keb', '', '', 'ria komala sari, Am.Keb', 'RK', '11/2/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'riakom', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '29:41.9'),
(1492, 'PR301', '1', 'yunita nirwana, Am.Keb', '', '', 'yunita nirwana, Am.Keb', 'YN', '11/2/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yunir', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '30:26.8'),
(1493, 'PR302', '1', 'Iis dahlia, Am.Keb', '', '', 'Iis dahlia, Am.Keb', 'ID', '11/2/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'iis', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '31:06.3'),
(1494, 'PR304', '1', 'veggy liviana, S.Tr.Keb', '', '', 'veggy liviana, S.Tr.Keb', 'vl', '11/2/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'veggy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '31:45.6'),
(1495, 'a097', '1', 'dr. Edwin Hidayat', '', '', 'dr. Edwin Hidayat', 'eh', '10/27/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dredwin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '58:11.5'),
(1496, 'a098', '1', 'dr. Almira Nur Amalia', '', '', 'dr. Almira Nur Amalia', 'ama', '10/27/2019', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dralmira', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '58:44.1'),
(1497, 'YP01', '1', 'Yudistira', 'Sira', 'Permana', 'Yudistira Sira Permana', 'YP', '4/1/1996', '0001^M', NULL, NULL, NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'yudis', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '34:42.6'),
(1498, 'spot01', '1', 'Ramadhan', 'Ananditia', 'Putra', 'dr. Ramadhan Ananditia Putra , SpOT', 'ra', '11/6/2018', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', ' SpOT', '72', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ramadhan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '37:42.6'),
(1499, 'a1100', '1', 'dr. Sarah Rizka, Sp.OG., M.Sc., Us', '', '', 'dr. Sarah Rizka, Sp.OG., M.Sc., Us', 'sr', '11/1/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '26', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drsarah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '26:09.0'),
(1500, 'nur', '1', 'Nuraini', 'Kurdi', '', 'Prof.Dr. Nuraini Kurdi ,Sp.RM', 'NURAI', '12/13/1966', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', 'Sp.RM', '53', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', '', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'rizaa', '22:02.9'),
(1501, 'a1200', '1', 'Dhea Khairunnisa, S.K.M', '', '', 'Dhea Khairunnisa, S.K.M', 'dk', '12/1/2019', '0001^F', 'X0055^011', 'X0020^001', NULL, NULL, '', '', '100', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dheak', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '30:43.9'),
(1502, 'wlan', '1', 'Wulan,Am.Keb', '', '', 'Wulan,Am.Keb', 'w', '12/10/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wulan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '58:20.7'),
(1503, 'P00300', '1', 'Putri mutiara sari ,Am.Keb', '', '', 'Putri mutiara sari ,Am.Keb', 'PMS', '12/10/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '239', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'muti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '57:23.7'),
(1504, 'ev', '1', 'Evi', 'Apriyanti', '', 'Evi Apriyanti ,A,Md, Ft', 've', '12/10/2012', '0001^F', 'X0055^005', 'X0020^001', NULL, NULL, '', 'A,Md, Ft', '247', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'evi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '45:40.0'),
(1505, 'ec', '1', 'Eka', 'Sumiarsih', '', 'Eka Sumiarsih ,A.Md, Ft', 'eks', '12/13/2016', '0001^F', 'X0055^005', 'X0020^001', NULL, NULL, '', 'A.Md, Ft', '247', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'eka', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '47:40.8'),
(1506, 'lr', '1', 'Meyleri ', 'Rahma ', 'Vidya', 'Meyleri  Rahma  Vidya ,A.Md, Ft', 'mey', '12/4/2006', '0001^F', 'X0055^005', 'X0020^001', NULL, NULL, '', 'A.Md, Ft', '247', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'lery', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '49:44.8'),
(1507, 'ex001', '1', 'Novia', 'Rini', '', 'Novia Rini ,AMAK', 'NR', '12/9/2013', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', 'AMAK', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'novia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'yudis', '18:14.1'),
(1508, 'ex002', '1', 'Rizqi', 'Mukramiin', '', 'Rizqi Mukramiin ,A.Md.Kes', 'RM', '12/7/1999', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', 'A.Md.Kes', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'miin', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'yudis', '19:52.7'),
(1509, 'des01', '1', 'Sarah', 'Rizka', '', 'dr. Sarah Rizka ,SpOG', 'sr', '12/1/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'SpOG', '26', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', '', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '28:51.0'),
(1510, 'mst1', '1', 'Magdalena', 'Siska', 'Trisanti', 'dr. Magdalena Siska Trisanti ,Sp.M', 'mst', '12/15/1983', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp.M', 'sm', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drsiska', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '49:09.9'),
(1511, 'sf', '1', 'Siti', 'Fatima', 'Azzahra', 'dr. Siti Fatima Azzahra ,Sp.Rad. Ms.c', 'sf01', '1/6/1993', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp.Rad. Ms.c', '69', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drsifat', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '38:23.6'),
(1512, 'a0128', '1', 'Ivan', '', '', 'Ivan', 'ivn', '1/26/2020', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ivan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '57:33.8'),
(1515, 'dr130', '1', 'Hj. Fauziah Nuraini', 'Kurdi', '', 'Prof. DR. dr. Hj. Fauziah Nuraini Kurdi ,Sp.KFR.MPH', 'FN', '2/12/2021', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, 'Prof. DR. dr', 'Sp.KFR.MPH', 'reb', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nuraini', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '29:06.8'),
(1516, 'dr131', '1', 'SITI ', 'FATIMA ', 'AZZAHRA', 'dr. SITI  FATIMA  AZZAHRA ,SpRad', 'sfa', '2/13/2021', '0001^F', NULL, 'X0020^002', NULL, NULL, 'dr', 'SpRad', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '35:36.0'),
(1517, 'a0129', '1', 'Muthia', '', '', 'Muthia', 'mth', '2/1/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'muthia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '20:05.0'),
(1518, 'regigd', '1', 'Hesty', 'Ana', 'Astutiana', 'Hesty Ana Astutiana ,SKM', 'HA', '8/1/1985', '0001^F', NULL, 'X0020^001', NULL, NULL, '', 'SKM', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'hesty', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '50:29.8'),
(1519, 'a0130', '1', 'Hesty Ana Astutiana SKM', '', '', 'Hesty Ana Astutiana SKM', 'haa', '3/1/2020', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '50:38.6'),
(1520, 'regigd2', '1', 'Tita', 'Garrien', 'Sakti', 'Tita Garrien Sakti ,S.Kep', 'tg', '11/22/1997', '0001^F', NULL, NULL, NULL, NULL, '', 'S.Kep', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'garrien', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '51:12.2'),
(1521, 'a0131', '1', 'Tita Garrien Sakti S.Kep', '', '', 'Tita Garrien Sakti S.Kep', 'tgs', '3/1/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '50:16.2'),
(1522, 'RM001', '1', 'Tri', 'Rahmawati', '', 'Tri Rahmawati', 'TR', '3/5/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'trirm', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '33:16.8'),
(1523, 'dr0010', '1', 'vhandy', '', 'ramadhan', 'Dr. vhandy ramadhan', 'vr', '2/16/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'Dr', '', '66', '3/9/2021', '3/9/2021', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drvhandy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '44:28.6'),
(1524, 'dr0011', '1', 'devuandre', '', 'naziat', 'Dr. devuandre naziat', 'devu', '3/18/2020', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'Dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'devuandre ', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '46:02.0'),
(1525, 'dr0012', '1', 'ihsan', 'rasyid', 'yuldi', 'Dr. ihsan rasyid yuldi', 'yuldi', '3/5/2020', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'Dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drihsan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '46:43.8'),
(1526, 'dr0013', '1', 'novalia', '', 'arisandy', 'Dr. novalia arisandy', 'nosan', '3/23/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'Dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drnovalia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '47:26.3'),
(1527, 'dr0014', '1', 'septami ', 'putri', 'hajati', 'dr. septami  putri hajati', 'septa', '3/25/2019', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drseptami', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '48:12.3'),
(1528, 'dr0015', '1', 'siti ', 'nur ', 'utami A', 'dr. siti  nur  utami A', 'sitnu', '3/14/2018', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', '', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '29:41.5'),
(1529, 'dr0016', '1', 'agung', 'hadi ', 'wibowo', 'dr. agung hadi  wibowo', 'agh', '3/14/2018', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dragung', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '49:43.0'),
(1530, 'dr0017', '1', 'michael ', 'sintong', 'halomoan', 'dr. michael  sintong halomoan', 'msh', '3/15/2019', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drmichael', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '50:21.0'),
(1531, 'mcu010', '1', 'Doddy', '', '', 'Doddy', 'dd', '3/19/2021', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'doddy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '38:30.9'),
(1532, 'keu010', '1', 'ardi', 'ardi', '', 'ardi ardi', 'aa', '3/24/2021', '0001^M', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ardikeu', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '43:35.2'),
(1533, 'a013', '1', 'Ferly Andrian', '', '', 'Ferly Andrian', 'fa', '3/2/2020', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ferly', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '12:57.9'),
(1534, 'a014', '1', 'Fitria Saraswati', '', '', 'Fitria Saraswati', 'fs', '3/1/2020', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fitrias', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '14:10.6'),
(1535, 'a015', '1', 'Triky Rizkiani', '', '', 'Triky Rizkiani', 'tr', '2/28/2021', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'triky', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '14:45.8'),
(1536, 'a016', '1', 'Wenni Dwi Lestari', '', '', 'Wenni Dwi Lestari', 'WD', '3/1/2020', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'wennid', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '32:01.0'),
(1537, 'lab01001', '1', 'Ayu Novita Sari, A.Md.AK', '', '', 'Ayu Novita Sari, A.Md.AK', 'ID', '4/8/2021', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ayu', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '31:23.0'),
(1538, 'lab01007', '1', 'Maya Aptasari, A.Md.AK', '', '', 'Maya Aptasari, A.Md.AK', 'MY', '4/8/2021', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aptasari', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '31:39.7'),
(1539, 'Lab01002', '1', 'Fatimah, A.Md.AK', '', '', 'Fatimah, A.Md.AK', 'FT', '4/8/2021', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'fatimah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '32:14.2'),
(1540, 'AAK001', '1', 'siti ', '', 'zulaika', 'Mrs. siti  zulaika', 'ika', '5/14/1996', '0001^M', 'X0055^003', NULL, NULL, NULL, 'Mrs', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ika', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '08:44.7'),
(1541, 'a01333', '1', 'drg. Dwita Maulidiyah', '', '', 'drg. Dwita Maulidiyah', 'dm', '3/28/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'gigi', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drgdwita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '47:18.4'),
(1542, 'cm001', '1', 'dr. Arvita Ajeng', '', '', 'dr. Arvita Ajeng', 'AA', '4/9/2021', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, '', '', '66', '4/9/2021', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drarfita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '10:22.7'),
(1543, 'cm002', '1', 'dr. Siti Nur Utami', '', '', 'dr. Siti Nur Utami', 'SNU', '4/9/2021', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drsitinur', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '28:27.7'),
(1544, 'a01334', '1', 'dr. Yasinta Putri Astria', '', '', 'dr. Yasinta Putri Astria', 'ypa', '3/29/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dryasinta', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '42:43.5'),
(1545, 'k001', '1', 'sumarsinggih', 'r', '', 'sumarsinggih r', 'sumar', '4/9/2021', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', '233', '4/16/2021', '7/9/2021', '4/30/2021', '0', '', '', '4/16/2021', '', '1', NULL, '0', '0', '0', 'sumar', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '42:52.3'),
(1546, 'B002', '1', 'bd nuning', 'rochaini', '', 'bd nuning rochaini', 'ning', '4/14/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '4/21/2021', '4/20/2029', '0', '', '', '5/21/2021', '', '1', NULL, '0', '0', '0', 'nuning', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '06:45.6'),
(1547, 'B003', '1', 'bd karlina', 'eci', 'damayanti', 'bd karlina eci damayanti', 'lina', '4/15/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '4/21/2021', '4/21/2021', '4/30/2027', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'karlina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '09:05.4'),
(1548, 'B004', '1', 'bd miftahul', 'jannah', '', 'bd miftahul jannah', 'mifta', '4/21/2021', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '66', '0001-01-01', '4/21/2021', '4/24/2026', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mifta', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '46:14.5'),
(1549, 'lab0049', '1', 'Dhea', 'Ayu Lestari', '', 'Dhea Ayu Lestari', 'DAL', '4/29/1997', '0001^F', 'X0055^007', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dhea', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '28:46.7'),
(1553, 'dr029', '1', 'dr. Desti Handayani, Sp.A(K)', '', '', 'dr. Desti Handayani, Sp.A(K)', 'DH', '4/27/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'SpA.', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drdesti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '20:34.9'),
(1554, 'CM007', '1', 'Case ', 'Manager', '', 'Case  Manager', 'CM', '5/24/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'cmsifat', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '00:06.4'),
(1555, 'kd001', '1', 'tri ', 'utami', '', 'Miss. tri  utami', 'ttrii', '5/2/1996', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, 'Miss', '', NULL, '6/7/2021', '6/7/2021', '6/7/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'utami', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '09:34.4'),
(1556, 'kd0002', '1', 'lisa', 'pebriani', 'johan', 'Miss. lisa pebriani johan', 'johan', '2/25/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, 'Miss', '', NULL, '6/7/2021', '6/7/2024', '6/7/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'pebriani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '10:20.4'),
(1557, 'kd0003', '1', 'merry', 'akhyani', '', 'Miss. merry akhyani', 'akhya', '1/31/1986', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, 'Miss', '', NULL, '6/7/2021', '6/7/2024', '6/7/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'akhyani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '11:42.1'),
(1558, 'kd0004', '1', 'maya', 'susanti', '', 'Miss. maya susanti', 'maysu', '9/13/1979', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, 'Miss', '', NULL, '6/7/2021', '6/7/2024', '6/7/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'susanti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '13:39.7'),
(1559, '767', '1', 'melia', 'mufida', '', 'melia mufida', 'melik', '4/15/1997', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '10/5/2020', '6/10/2024', '6/10/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'melik', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '43:32.9'),
(1560, 'prw1001', '1', 'Dody', '', 'Dores', 'Dody Dores', 'DD', '6/9/2021', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dores', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '26:24.8'),
(1561, 'prw1002', '1', 'Rully', '', 'Octavian', 'Rully Octavian', 'RO', '6/9/2021', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rully', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '28:30.2'),
(1562, 'iccov1', '1', 'abdul ', 'rohim', '', 'abdul  rohim', 'ar', '6/9/2020', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'abdul', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '49:51.1'),
(1563, 'iccov2', '1', 'dedi ', 'pebriyanto', '', 'dedi  pebriyanto', 'dp', '6/27/2019', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/9/2021', '6/20/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dedipeb', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '51:12.6'),
(1564, 'iccov3', '1', 'masayu', 'rohima ', '', 'masayu rohima ', 'mr', '6/1/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/9/2021', '6/9/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'masayurohi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '53:50.7'),
(1565, 'iccov4', '1', 'indrawati', '', '', 'indrawati', 'indra', '6/8/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'indrawati', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '55:03.3'),
(1566, 'iccov5', '1', 'zaki', '', '', 'zaki', 'zakii', '5/31/2021', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'zaki', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ivan', '54:52.2'),
(1567, 'iccov6', '1', 'rosita', '', '', 'rosita', 'ross', '6/8/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'rosita', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '14:00.6'),
(1568, 'iccov 7', '1', 'putri', 'kurnia', 'sari', 'putri kurnia sari', 'put', '6/8/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'putrikur', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '15:27.3'),
(1569, 'dr023', '1', 'dr. Anggoro Adi Wibowo', '', '', 'dr. Anggoro Adi Wibowo', 'aaw', '5/31/2020', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dranggoro', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '21:04.1'),
(1570, 'icucov8', '1', 'deni', 'apriliani', '', 'deni apriliani', 'deni', '6/8/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'apriliani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '18:08.2'),
(1571, 'icucov9', '1', 'deni', 'apriliani', '', 'deni apriliani', 'deni', '6/8/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ivan', '15:39.9'),
(1572, 'icucov10', '1', 'dwi', 'meytiani', '', 'dwi meytiani', 'dwi', '6/8/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '6/8/2021', '6/15/2023', '6/15/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'meytiani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '19:38.8'),
(1573, 'REG015', '1', 'Panca', 'Perdana', '', 'Panca Perdana ,SE', 'pp', '12/15/1985', '0001^M', NULL, 'X0020^001', NULL, NULL, '', 'SE', NULL, '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'panca', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '39:55.4'),
(1574, 'a00123', '1', 'dr. Diyaz Syauki Ikhsan, Sp.KJ', '', '', 'dr. Diyaz Syauki Ikhsan, Sp.KJ', 'dsi', '5/31/2020', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'jw', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drdiyaz', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '24:37.2'),
(1575, 'a00124', '1', 'dr. Syarifah Aini, Sp.KJ', '', '', 'dr. Syarifah Aini, Sp.KJ', 'sa', '5/31/2020', '0001^F', 'X0055^001', 'X0020^002', NULL, NULL, '', '', 'jw', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drsyarifah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '24:18.6'),
(1576, 'RJ001', '1', 'Nopriansyah', 'nur', 'markop', 'Nopriansyah nur markop', 'nop', '2/12/1991', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '6/1/2021', '6/1/2023', '6/17/2021', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'markop', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '23:28.5'),
(1577, 'dr00012', '1', 'Rusmiyati', 'wijaya', '', 'dr. Rusmiyati wijaya ,Sp.PK', 'Rus', '6/1/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp.PK', '83', '6/1/2021', '7/7/2023', '7/7/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drrusmi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '18:07.8'),
(1578, 'drn001', '1', 'syifa', 'alkaf', '', 'dr. syifa alkaf ,SpOG', 'syifa', '11/1/1982', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'SpOG', '26', '6/21/2021', '6/1/2024', '6/1/2024', '0', '', '', '6/21/2021', '', '1', NULL, '0', '0', '0', 'syifaalkaf', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '48:24.5'),
(1579, 'drn002', '1', 'eka', 'handayani', 'oktharina', 'dr. eka handayani oktharina ,SpOG', 'dreka', '10/11/1987', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'SpOG', '26', '0001-01-01', '6/1/2024', '6/1/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'oktharina', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '51:28.4'),
(1580, 'ni001', '1', 'febta', 'eka', 'wijaya', 'febta eka wijaya', 'feb', '2/11/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '7/2/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'febta', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '53:47.4'),
(1581, 'ni002', '1', 'diana', '', 'septiani', 'diana septiani', 'dian1', '6/4/2021', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '7/2/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dianasepti', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '55:13.5'),
(1582, 'ni003', '1', 'janurmah', 'astuti', '', 'janurmah astuti', 'janur', '7/1/2020', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '7/2/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'janurmah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '56:04.6'),
(1583, 'a01335', '1', 'dr. Raissa Nurwany, Sp.OG', '', '', 'dr. Raissa Nurwany, Sp.OG', 'rn', '2/17/1990', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '26', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drraissa', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '21:44.1'),
(1584, 'a01336', '1', 'dr. Ardelia Bianda, Sp.OG', '', '', 'dr. Ardelia Bianda, Sp.OG', 'ab', '1/7/1991', '0001^F', 'X0055^001', NULL, NULL, NULL, '', '', '26', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drardelia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '22:35.9'),
(1585, 'drmria', '1', 'Maria', 'Ulfa', '', 'dr. Maria Ulfa ,Sp.PA', 'Maria', '12/12/1980', '0001^M', 'X0055^001', 'X0020^002', NULL, NULL, 'dr', 'Sp.PA', 'spa', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drmaria', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '12:19.0');
INSERT INTO `m_paramedis` (`ParamedicID`, `ParamedicCode`, `SiteCode`, `FirstName`, `MiddleName`, `LastName`, `ParamedicName`, `ParamedicInitial`, `DateOfBirth`, `GCSex`, `GCParamedicType`, `GCEmploymentStatus`, `GCReligion`, `GCNationality`, `Title`, `Suffix`, `SpecialtyCode`, `HiredDate`, `TerminatedDate`, `StartExperienceDate`, `IsTaxRegistrant`, `TaxRegistrantNo`, `LicenseNo`, `LicenseExpiredDate`, `PictureFileName`, `IsAvailable`, `NotAvailableUntil`, `IsAnesthetist`, `IsAudiologist`, `IsHasPhysicianRole`, `UserName`, `Remarks`, `IsActive`, `IsFeeUsingPercentage`, `FeeAmount`, `FeePercentage`, `BankName`, `BankAccountNo`, `BankAccountName`, `SSN`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(1586, 'x0001', '1', 'Dyki', 'Dwi ', 'Anwar', 'dr. Dyki Dwi  Anwar', 'dyk', '7/5/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drdyki', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '26:58.3'),
(1587, 'x0002', '1', 'Delsy', 'Aprida', '', 'dr. Delsy Aprida', 'dels', '7/5/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drdelsy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '28:04.3'),
(1588, 'x0003', '1', ' Muhammad', 'Faza', 'Naufal', 'dr.  Muhammad Faza Naufal', 'faz', '7/5/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ivan', '01:27.8'),
(1589, 'x0004', '1', 'Endy', 'Averossely', 'Passaray', 'dr. Endy Averossely Passaray', 'ave', '7/5/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drendy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '29:59.2'),
(1590, 'x0005', '1', 'Vindy', 'Cesariana', '', 'dr. Vindy Cesariana', 'casra', '7/5/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drvindy', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '30:57.1'),
(1591, 'x0006', '1', 'Zuraida', 'Z', '', 'dr. Zuraida Z', 'zurai', '7/5/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/5/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drzuraida', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '31:46.6'),
(1592, 'x0007', '1', 'Anggoro', 'Adi ', 'Wibowo', 'dr. Anggoro Adi  Wibowo', 'wibi', '7/5/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '08:54.8'),
(1593, 'x0008', '1', 'Rizka', 'dwi', 'lestari', 'Rizka dwi lestari', 'rizk', '7/5/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drrizka', '', '0', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '50:00.9'),
(1594, 'x0009', '1', 'Vinthia', 'Yuriza', '', 'dr. Vinthia Yuriza', 'vinth', '7/5/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drvinthia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '35:27.8'),
(1595, 'x010', '1', 'Morpiza', 'Mutthahari', 'Lubis', 'dr. Morpiza Mutthahari Lubis', 'morp', '7/5/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drmorpiza', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '36:29.1'),
(1596, 'x011', '1', 'Muhammad', 'Reyhan', '', 'dr. Muhammad Reyhan', 'reyh', '7/5/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drreyhan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '37:25.3'),
(1597, 'x012', '1', 'Mawar', '', '', 'Mawar', 'mwr', '7/5/2021', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '7/6/2021', '7/1/2022', '7/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mawar', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '38:06.0'),
(1598, 'a0137', '1', 'dr. Bintang Arroyantri p, Sp.KJ', '', '', 'dr. Bintang Arroyantri p, Sp.KJ', 'ba', '2/5/1987', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'jw', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drbintang', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '25:03.6'),
(1599, 'a0138', '1', 'Aprillia Puspita Ningrum', '', '', 'Aprillia Puspita Ningrum', 'ap', '6/28/2020', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'aprilliapn', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '06:36.6'),
(1600, 'a0139', '1', 'Syakira Indah Nadya', '', '', 'Syakira Indah Nadya', 'si', '6/28/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'syakirain', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '07:45.0'),
(1601, 'a0140', '1', 'Miranti Octarina', '', '', 'Miranti Octarina', 'mo', '6/28/2020', '0001^F', 'X0055^003', NULL, NULL, NULL, '', '', '236', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mirantio', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '08:39.3'),
(1602, 'x00031', '1', 'zaleha', 'lestari', '', 'zaleha lestari', 'zal', '7/13/2021', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '7/13/2021', '7/1/2022', '7/1/2021', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'zaleha', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '33:47.8'),
(1603, 'x000021', '1', 'sisilia', 'rosalinda', 'utari', 'sisilia rosalinda utari', 'sisil', '7/13/2021', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '7/1/2021', '7/1/2023', '7/1/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'sisilia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '36:05.0'),
(1604, 'x00061', '1', 'darul', 'udwan', '', 'darul udwan', 'dar', '7/14/2021', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '7/14/2021', '7/1/2023', '7/1/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mrdarul', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '54:54.3'),
(1605, 'a01337', '1', 'dr. Widya Meiliana, Sp.KFR', '', '', 'dr. Widya Meiliana, Sp.KFR', 'wm', '6/28/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'reb', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drwidya', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '21:00.2'),
(1606, 'a01338', '1', 'dr. Hesty Oktarini, Sp.KFR', '', '', 'dr. Hesty Oktarini, Sp.KFR', 'ho', '6/28/2020', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'reb', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drhesty', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '21:21.3'),
(1607, 'mcu0821', '1', 'rio', 'candra ', 'perdana', 'rio candra  perdana', 'rcp', '8/2/2021', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '8/2/2021', '8/7/2023', '8/7/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ivan', '04:24.2'),
(1608, 'mcu2102', '1', 'cut', 'indah', 'nazillah', 'cut indah nazillah', 'cin', '8/2/2021', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '8/2/2021', '8/7/2023', '8/7/2023', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'nazillah', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '55:39.4'),
(1609, 'mcu2103', '1', 'mery', 'akhyani', '', 'mery akhyani', 'ma', '8/2/2021', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '8/2/2021', '8/7/2023', '8/8/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '52:43.9'),
(1610, 'rad03', '1', 'Ferdiansyah', '', '', 'Ferdiansyah', 'ferdi', '12/31/1986', '0001^M', 'X0055^008', 'X0020^001', NULL, NULL, '', '', '69', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ferdian', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '50:51.4'),
(1611, 'a0141', '1', 'Marshelly Gustami Putri', '', '', 'Marshelly Gustami Putri', 'mg', '8/2/2020', '0001^F', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'Marshelly', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '48:57.0'),
(1612, 'a0142', '1', 'Desi Triani', '', '', 'Desi Triani', 'dt', '7/26/2020', '0001^F', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'detinadra', '51:30.1'),
(1613, 'a0143', '1', 'Desi Triani', '', '', 'Desi Triani', 'dt', '7/26/2020', '0001^F', 'X0055^009', 'X0020^001', NULL, NULL, '', '', '244', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'desitriani', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '58:11.3'),
(1614, 'a00125', '1', 'Muhammad Syakir', '', '', 'Muhammad Syakir', 'ms', '7/27/2020', '0001^M', 'X0055^011', 'X0020^001', NULL, NULL, '', '', '84', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'msyakir', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'detinadra', '24:18.0'),
(1615, 'dr.090', '1', 'muhammad', 'reyhan', '', 'dr. muhammad reyhan', 'drrey', '8/23/2021', '0001^M', NULL, 'X0020^001', NULL, NULL, 'dr', '', NULL, '8/25/2021', '8/1/2025', '8/1/2025', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ivan', '12:55.9'),
(1616, 'dr.091', '1', 'Erlina ', 'purnamayani', '', 'dr. Erlina  purnamayani', 'drerl', '8/24/2021', '0001^F', NULL, 'X0020^001', NULL, NULL, 'dr', '', '66', '8/25/2021', '8/1/2025', '8/1/2025', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drerlina', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ivan', '43:37.8'),
(1617, 'drxxx12', '1', 'erlina', 'purnamayani', '', 'dr. erlina purnamayani', 'drerl', '8/2/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', '', '66', '8/25/2021', '8/1/2025', '8/1/2025', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drpurnama', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '58:34.2'),
(1618, 'py001', '1', 'Syarkoni, S. Psi., M. Psi.,Psikolog', '', '', 'Syarkoni, S. Psi., M. Psi.,Psikolog', 'sy', '9/6/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, '', '', 'phyci', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'drsyarkoni', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '42:35.8'),
(1620, 'py002', '1', 'Anrilia Ema M. N.', '', '', 'Dr. Anrilia Ema M. N. ,S.Psi., M.Ed., Psikolog', 'AE', '9/6/2021', '0001^F', 'X0055^001', 'X0020^001', NULL, NULL, 'Dr', 'S.Psi., M.Ed., Psikolog', 'jw', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'dr.anrilia', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'zaa', '03:08.6'),
(1621, 'dr0021', '1', 'Aldiar', '', '', 'dr. Aldiar ,SpAn', 'drald', '9/5/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'SpAn', 'san', '9/13/2021', '9/1/2025', '9/1/2025', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'draldiar', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'rizaa', '31:08.7'),
(1622, 'dr0201', '1', 'Aldiar', '', '', 'dr. Aldiar ,Sp. An', 'dr', '9/1/2021', '0001^M', 'X0055^001', 'X0020^001', NULL, NULL, 'dr', 'Sp. An', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'zaa', '32:30.9'),
(1623, 'iw01', '1', 'Indra', 'Wanto', '', 'Indra Wanto ,Am.Kep', 'iw', '4/10/1991', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', 'Am.Kep', '66', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'inwan', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '08:41.3'),
(1624, 'ncu089', '1', 'ratih', 'widya ', 'ningrum', 'ratih widya  ningrum', 'rwn', '9/17/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', '81', '9/24/2021', '9/20/2024', '9/20/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'ratihwidya', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '37:59.8'),
(1625, 'mrh', '1', 'M.', 'Rizky', 'Hidayatullah', 'M. Rizky Hidayatullah ,A.Md.Kep', 'rh', '6/4/1995', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', 'A.Md.Kep', '235', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'mrizky', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '36:35.9'),
(1626, 'arr', '1', 'Achmad', 'Rizqi', 'Rustiansyah', 'Achmad Rizqi Rustiansyah ,S.Kep, Ners', 'arr', '4/4/1993', '0001^M', 'X0055^003', 'X0020^001', NULL, NULL, '', 'S.Kep, Ners', '235', '0001-01-01', '0001-01-01', '0001-01-01', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'arizqi', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'riza94', '38:21.9'),
(1627, 'ponig1', '1', 'bd', 'niluh', 'ayu', 'bd niluh ayu', 'bd198', '10/4/2021', '0001^F', 'X0055^003', 'X0020^001', NULL, NULL, '', '', NULL, '10/20/2021', '10/10/2024', '10/10/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'niluh', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '08:26.6'),
(1628, 'pigd1', '1', 'selamet', 'fajri', 'muslimin', 'selamet fajri muslimin', 'slmt', '10/22/2021', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '10/29/2021', '10/1/2024', '10/1/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'selamet', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '44:52.4'),
(1629, 'pigd2', '1', 'bella', 'aprilila', '', 'bella aprilila', 'blla', '10/28/2021', '0001^F', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '10/29/2021', '10/1/2024', '10/1/2024', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'belaapril', '', '1', '0', '0', NULL, '', '', '', NULL, '0', 'ivan', '09:46.6'),
(1630, 'pr001', '1', 'susan', 'meli', 'putri', 'susan meli putri', 'smp', '11/1/2018', '0001^M', NULL, 'X0020^001', NULL, NULL, '', '', NULL, '11/10/2021', '4/1/2022', '4/1/2022', '0', '', '', '0001-01-01', '', '1', NULL, '0', '0', '0', 'smputri', '', '0', '0', '0', NULL, '', '', '', NULL, '1', 'ivan', '08:34.2'),
(1631, 'PRX000', '0', 'Stela', '', 'Putri', 'Stela Putri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_pasien`
--

CREATE TABLE `m_pasien` (
  `MedicalNo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `SiteCode` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `SSN` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Since` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `FirstName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `MiddleName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PatientName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PreferredName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PatientNameOnCard` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `CityOfBirth` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `IsApproximateDOB` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCSex` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCBloodType` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BloodRhesus` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCEducation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCMaritalStatus` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCNationality` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCRace` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `SpokenLanguage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `WrittenLanguage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCOccupation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Suffix` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCPatientCategory` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCDependentType` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCReligion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Company` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `MobilePhoneNo1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `MobilePhoneNo2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `OldMedicalNo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PictureFileName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsBlackList` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BlackListBy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BlackListDateTime` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BlackListNotes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsAlive` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `DateOfDeath` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastVisitDate` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `NumberOfVisit` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Notes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `RegistrationNoOfDeath` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `BpjsCardNo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsPatientConfidential` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsActive` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsDeleted` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedDateTime` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `PatientCity` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PatientProvince` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PatientAddress` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_pasien`
--

INSERT INTO `m_pasien` (`MedicalNo`, `SiteCode`, `SSN`, `Since`, `FirstName`, `MiddleName`, `LastName`, `PatientName`, `PreferredName`, `PatientNameOnCard`, `CityOfBirth`, `DateOfBirth`, `IsApproximateDOB`, `GCSex`, `GCBloodType`, `BloodRhesus`, `GCEducation`, `GCMaritalStatus`, `GCNationality`, `GCRace`, `SpokenLanguage`, `WrittenLanguage`, `GCOccupation`, `Title`, `Suffix`, `GCPatientCategory`, `GCDependentType`, `GCReligion`, `Company`, `MobilePhoneNo1`, `MobilePhoneNo2`, `OldMedicalNo`, `Picture`, `PictureFileName`, `IsBlackList`, `BlackListBy`, `BlackListDateTime`, `BlackListNotes`, `IsAlive`, `DateOfDeath`, `LastVisitDate`, `NumberOfVisit`, `Notes`, `RegistrationNoOfDeath`, `BpjsCardNo`, `IsPatientConfidential`, `IsActive`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`, `created_at`, `updated_at`, `PatientCity`, `PatientProvince`, `PatientAddress`) VALUES
('00-01-16-35', NULL, '1607031205900002', NULL, NULL, NULL, NULL, 'Anton', NULL, NULL, 'PALEMBANG', '1990-05-12', NULL, '0001^M', 'A', NULL, 'X0013^01', '0002^M', 'X0014^001', 'Palembang', NULL, NULL, 'X0012^01', NULL, NULL, NULL, NULL, '0006^MOS', NULL, '081272529025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '112', '6', 'jl asbdasdassadasd'),
('00-03-55-31', NULL, '1671072609680006', NULL, NULL, NULL, NULL, 'Anton Hutabarat', NULL, NULL, 'TAPUT-HUTARAJA', '1968-09-26', NULL, NULL, 'A', NULL, NULL, NULL, 'Indonesia', 'Batak', NULL, NULL, 'X0012^01', NULL, NULL, NULL, NULL, '0006^CHR', NULL, '082175968896', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '53', '3', 'jl acacasca'),
('00-03-73-97', NULL, '1671044509920003', NULL, NULL, NULL, NULL, 'Anita', NULL, NULL, 'PALEMBANG', '1992-09-05', NULL, NULL, 'A', NULL, NULL, NULL, 'X0014^001', '0005^017', NULL, NULL, 'X0012^01', NULL, NULL, NULL, NULL, '0006^MOS', NULL, '08112241315', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '112', '6', 'jl sadbasbdasd');

-- --------------------------------------------------------

--
-- Table structure for table `m_physician_team`
--

CREATE TABLE `m_physician_team` (
  `id` int NOT NULL,
  `reg_no` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `kode_dokter` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `kategori` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_physician_team`
--

INSERT INTO `m_physician_team` (`id`, `reg_no`, `kode_dokter`, `kategori`, `created_at`, `updated_at`) VALUES
(2, 'QREG/RI/202301260001', '1', 'Anastesi', '2023-02-14 02:15:36', NULL),
(3, 'QREG/RI/202301260001', 'A0004', '-', '2023-02-14 02:18:04', NULL),
(4, 'QREG/RI/202301260001', 'A0013', '-', '2023-02-14 06:58:48', NULL),
(5, 'QREG/RI/202301260001', 'A0016', '-', '2023-02-14 07:09:42', NULL),
(6, 'QREG/RI/202301260001', 'A0002', '-', '2023-03-01 23:24:45', NULL),
(7, 'QREG/RI/202303020001', 'A0002', '-', '2023-03-02 03:39:31', NULL),
(8, 'QREG/RI/202308180001', NULL, NULL, '2023-08-18 00:22:24', NULL),
(9, 'QREG/RI/202308180001', NULL, NULL, '2023-08-18 00:23:34', NULL),
(10, 'QREG/RI/202308180001', 'A0002', '-', '2023-11-20 08:50:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_poliklinik`
--

CREATE TABLE `m_poliklinik` (
  `RoomID` bigint UNSIGNED NOT NULL,
  `RoomCode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `RoomName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsActive` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsUsed` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsDeleted` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedDateTime` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `m_registrasi`
--

CREATE TABLE `m_registrasi` (
  `reg_no` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `reg_medrec` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_lama` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_tgl` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_jam` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_poli` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_dokter` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_dokter_care` int DEFAULT NULL,
  `reg_perawat_care` int DEFAULT NULL,
  `reg_ruangan` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_tipe_kunj` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_menit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_prioritas` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_cara_bayar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_no_dokumen` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_class` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_no_kartu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_referal` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_diagnosis` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_corp` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_pjawab` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_cttn_kunj` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_cttn` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_datang` time DEFAULT NULL,
  `reg_pemeriksaan_mulai` time DEFAULT NULL,
  `reg_pemeriksaan_selesai` time DEFAULT NULL,
  `reg_selesai` date DEFAULT NULL,
  `reg_pulang_partials` int DEFAULT NULL,
  `reg_discharge` int NOT NULL DEFAULT '0',
  `reg_user` int DEFAULT NULL,
  `reg_deleted` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_deleted_by` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bed` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `service_unit` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `departemen_asal` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `link_regis` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `room_class` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_pjawab_hub` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `reg_pjawab_alamat` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `reg_pjawab_nohp` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `reg_ketersidaan_kamar` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `reg_info_kewajiban` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `reg_info_general_consent` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `reg_info_carabayar` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ttd_admisi` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin,
  `ttd_gc_hal_dua` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_registrasi`
--

INSERT INTO `m_registrasi` (`reg_no`, `reg_medrec`, `reg_lama`, `reg_status`, `reg_tgl`, `reg_jam`, `reg_poli`, `reg_dokter`, `reg_dokter_care`, `reg_perawat_care`, `reg_ruangan`, `reg_tipe_kunj`, `reg_menit`, `reg_prioritas`, `reg_cara_bayar`, `reg_no_dokumen`, `reg_class`, `reg_no_kartu`, `reg_referal`, `reg_diagnosis`, `reg_corp`, `reg_pjawab`, `reg_cttn_kunj`, `reg_cttn`, `reg_datang`, `reg_pemeriksaan_mulai`, `reg_pemeriksaan_selesai`, `reg_selesai`, `reg_pulang_partials`, `reg_discharge`, `reg_user`, `reg_deleted`, `reg_deleted_by`, `created_at`, `updated_at`, `bed`, `service_unit`, `departemen_asal`, `link_regis`, `room_class`, `reg_pjawab_hub`, `reg_pjawab_alamat`, `reg_pjawab_nohp`, `reg_ketersidaan_kamar`, `reg_info_kewajiban`, `reg_info_general_consent`, `reg_info_carabayar`, `ttd_admisi`, `ttd_gc_hal_dua`) VALUES
('QREG/RI/202308180001', '00-01-16-35', NULL, NULL, '2023-08-18', '05:30:48', NULL, 'A0006', NULL, NULL, '3', NULL, NULL, NULL, 'Asuransi Pemerintah', 'XDOC0001', '4', '321312123213213', '-', 'A00.0', 'BPJS', 'Yulia', '-', '-', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '1', '3', 'From Outpatient', 'undefined', '1', 'Istri', 'Jl Kirangga Wiro santika no 282', '081272529025', '1', '1', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_room_class`
--

CREATE TABLE `m_room_class` (
  `ClassCode` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ClassName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `ShortName` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Initial` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `ClassCategoryCode` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `GCClassRL` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `ClassLevel` tinyint DEFAULT NULL,
  `IsAdministrationChargeByClass` bit(1) DEFAULT NULL,
  `MinAdministrationCharge` decimal(18,4) DEFAULT NULL,
  `MaxAdministrationCharge` decimal(18,4) DEFAULT NULL,
  `PercentageAdministrationCharge` decimal(10,2) DEFAULT NULL,
  `PhysicianChargesItemID` int DEFAULT NULL,
  `DisplayPrice` decimal(18,4) DEFAULT NULL,
  `PictureFileName` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PatientPerRoomQty` int DEFAULT NULL,
  `IsHasAC` bit(1) DEFAULT NULL,
  `IsHasPrivateBathRoom` bit(1) DEFAULT NULL,
  `IsHasRefrigerator` bit(1) DEFAULT NULL,
  `IsHasTV` bit(1) DEFAULT NULL,
  `IsHasWifi` bit(1) DEFAULT NULL,
  `Remarks` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `LastUpdatedBy` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedDateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_room_class`
--

INSERT INTO `m_room_class` (`ClassCode`, `ClassName`, `ShortName`, `Initial`, `ClassCategoryCode`, `GCClassRL`, `ClassLevel`, `IsAdministrationChargeByClass`, `MinAdministrationCharge`, `MaxAdministrationCharge`, `PercentageAdministrationCharge`, `PhysicianChargesItemID`, `DisplayPrice`, `PictureFileName`, `PatientPerRoomQty`, `IsHasAC`, `IsHasPrivateBathRoom`, `IsHasRefrigerator`, `IsHasTV`, `IsHasWifi`, `Remarks`, `IsActive`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
('V01', 'VVIP 01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_ruangan`
--

CREATE TABLE `m_ruangan` (
  `RoomID` bigint UNSIGNED NOT NULL,
  `RoomCode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `RoomName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsActive` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsDeleted` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedDateTime` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_ruangan`
--

INSERT INTO `m_ruangan` (`RoomID`, `RoomCode`, `RoomName`, `IP`, `IsActive`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(1, 'ER', 'EMERGENCY ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(2, 'LABR', 'LABORATORY (WALK IN)', '-', '1', '0', 'riza94', '18/07/2019 14:05:03'),
(3, 'MCUR', 'MEDICAL CHECK UP ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(4, 'MRR', 'MEDICAL RECORD ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(5, 'OTR', 'OPERATING THEATRE ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(6, 'PSR', 'PHARMACY SERVICE UNIT (MAIN) ROOM', '', '0', '1', 'riza94', '15/12/2020 10:16:33'),
(7, 'PHYR', 'PHYSIOTHERAPHY ROOM', '', '0', '1', 'riza94', '15/12/2020 10:16:17'),
(8, 'RADR', 'RADIOLOGY (WALK IN)', '-', '1', '0', 'riza94', '18/07/2019 14:03:44'),
(9, 'MRIR', 'MRI ROOM', '', '0', '1', 'riza94', '15/12/2020 10:09:01'),
(10, 'CTR', 'CT SCAN ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(11, 'USGR', 'USG ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(12, 'BBR', 'BABY ROOM', '', '0', '1', 'riza94', '15/12/2020 09:59:19'),
(13, 'DELR', 'DELIVERY ROOM', '', '0', '1', 'riza94', '15/12/2020 10:01:24'),
(14, 'NEPR', 'NEONATAL - PERINATAL ICU ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(15, 'HCUR', 'HIGH CARE UNIT ROOM', '', '0', '1', 'riza94', '15/12/2020 10:06:08'),
(16, 'ICUR', 'INTENSIVE CARE UNIT ROOM', '', '0', '1', 'riza94', '15/12/2020 10:31:11'),
(17, 'ODCR', 'ONE DAY CARE ROOM', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(18, 'MORR', 'MORTUARY ROOM', '', '0', '1', 'riza94', '15/12/2020 10:08:38'),
(19, 'NUTR', 'NUTRITION CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:12:28'),
(20, 'OBSR', 'OBSTETRIC & GYNAEOCOLOGY CLINIC', '', '1', '0', 'SCRIPT', '29/08/2014 04:54:00'),
(21, 'EYER', 'EYE CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:01:57'),
(22, 'PEDR', 'PAEDIATRIC CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:13:04'),
(23, 'INTR', 'INTERNIST CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:06:29'),
(24, 'HDR', 'HEMODIALYSIS ROOM', '', '0', '1', 'riza94', '15/12/2020 10:12:03'),
(25, 'DENTR', 'DENTAL CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:02:15'),
(26, 'DERMR', 'DERMATOLOGY CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:00:51'),
(27, 'EARNR', 'EAR, NOSE & THROAT CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:04:57'),
(28, 'GSCR', 'GENERAL SURGERY CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:22:28'),
(29, 'CARDR', 'CARDIOLOGY CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:00:38'),
(30, 'ANDR', 'ANDROLOGY CLINIC', '', '0', '1', 'riza94', '15/12/2020 09:58:31'),
(31, 'PSYR', 'PSYCHIATRY CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:14:42'),
(32, 'PULMR', 'PULMONOLOGY CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:15:40'),
(33, 'NEUR', 'NEUROLOGY CLINIC', '', '0', '1', 'riza94', '15/12/2020 10:12:19'),
(34, '1', 'Triase', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(35, '2', 'Tindakan Triase', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(36, '3', 'Resusitasi', NULL, '0', '1', 'riza94', '15/12/2020 10:15:21'),
(37, '4', 'Tindakan Bedah / Non Bedah', NULL, '0', '1', 'riza94', '15/12/2020 10:21:47'),
(38, '5', 'Tindakan Anak', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(39, '6', 'Observasi / Tindakan Jantung', NULL, '0', '1', 'riza94', '15/12/2020 10:16:00'),
(40, '101', 'BEDAH THORAX CARDIO VASKULER', NULL, '0', '1', 'riza94', '15/12/2020 10:03:51'),
(41, '102', 'BEDAH DIGESTIF', NULL, '0', '1', 'riza94', '15/12/2020 10:03:28'),
(42, '103', 'POJOK ASI', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(43, '104', 'BEDAH VASKULER', NULL, '0', '1', 'riza94', '15/12/2020 10:04:17'),
(44, '105', 'BEDAH SARAF', NULL, '0', '1', 'riza94', '15/12/2020 10:03:40'),
(45, '106', 'BEDAH ORTHOPEDI K.SPINE', NULL, '0', '1', 'riza94', '15/12/2020 10:03:34'),
(46, '107', 'BEDAH UROLOGI', NULL, '0', '1', 'riza94', '15/12/2020 10:04:10'),
(47, '108', 'BEDAH ANASTESI', NULL, '0', '1', 'riza94', '15/12/2020 10:03:23'),
(48, '109', 'DIAGNOSTIK', NULL, '0', '1', 'riza94', '15/12/2020 10:01:36'),
(49, '110', 'PENYAKIT DALAM', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(51, '112', 'BEDAH UMUM', NULL, '0', '1', 'riza94', '15/12/2020 10:04:03'),
(52, '113', 'BEDAH UROLOGI', NULL, '0', '1', 'riza94', '15/12/2020 09:59:50'),
(53, '114', 'BEDAH GINJAL DAN HIPERTENSI', NULL, '0', '1', 'riza94', '15/12/2020 10:01:03'),
(54, '115', 'BEDAH ENDOKRIN', NULL, '0', '1', 'riza94', '15/12/2020 09:59:08'),
(55, '116', 'RUANG PERAWAT', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(56, '201', 'SENAM HAMIL', NULL, '0', '1', 'riza94', '15/12/2020 10:30:22'),
(57, '202', 'POJOK ASI', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(58, '203', 'RUANG PERAWAT', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(59, '204', 'KONSULTASI GIZI', NULL, '0', '1', 'riza94', '15/12/2020 10:07:45'),
(60, '205', 'A', '192.168.80.112', '0', '0', 'zaa', '2/11/2020 11:27'),
(61, '206', 'B', NULL, '0', '1', 'riza94', '15/12/2020 09:58:36'),
(62, '207', 'C', NULL, '0', '1', 'riza94', '15/12/2020 10:00:03'),
(63, '208', 'D ', NULL, '0', '1', 'riza94', '15/12/2020 10:00:14'),
(64, '209', 'E', NULL, '0', '1', 'riza94', '15/12/2020 10:01:46'),
(65, '210', 'ANAK', '192.168.80.112', '0', '1', 'riza94', '15/12/2020 09:58:06'),
(66, '211', 'ANAK', NULL, '0', '1', 'riza94', '15/12/2020 09:58:11'),
(67, '212', 'ANAK', NULL, '0', '1', 'riza94', '15/12/2020 09:58:15'),
(68, '213', 'F', NULL, '0', '1', 'riza94', '15/12/2020 10:04:32'),
(69, '214', 'OBSTETRI', NULL, '0', '1', 'riza94', '15/12/2020 10:13:45'),
(70, '215', 'OBSTETRI', NULL, '0', '1', 'riza94', '15/12/2020 10:18:13'),
(71, '216', 'GYNEKOLOGI', NULL, '0', '1', 'riza94', '15/12/2020 10:11:37'),
(72, '217', 'GYNEKOLOGI', NULL, '0', '1', 'riza94', '15/12/2020 10:11:44'),
(73, '218', 'G', NULL, '0', '1', 'riza94', '15/12/2020 10:04:37'),
(74, '219', 'H', NULL, '0', '1', 'riza94', '15/12/2020 10:05:56'),
(75, '220', 'I', NULL, '0', '1', 'riza94', '15/12/2020 10:06:18'),
(76, '221', 'TEST BERA', NULL, '0', '1', 'riza94', '15/12/2020 10:25:16'),
(77, '222', 'TEST VESTIBULER', NULL, '0', '1', 'riza94', '15/12/2020 10:27:23'),
(78, '223', 'TEST AUDIOMETRI', NULL, '0', '1', 'riza94', '15/12/2020 10:25:32'),
(79, '224', 'THT', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(80, '225', 'MATA', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(81, '226', 'MATA', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(82, '227', 'SYARAF', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(83, '228', 'JIWA', NULL, '0', '1', 'riza94', '15/12/2020 10:07:26'),
(84, '229', 'J', NULL, '0', '1', 'riza94', '15/12/2020 10:06:45'),
(85, '230', 'K', NULL, '0', '1', 'riza94', '15/12/2020 10:07:07'),
(86, '231', 'PERPUSTAKAAN', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(87, '232', 'GIGI', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(88, '233', 'L', NULL, '0', '1', 'riza94', '15/12/2020 10:07:34'),
(89, '234', 'M', NULL, '0', '1', 'riza94', '15/12/2020 10:08:25'),
(90, '235', 'N', NULL, '0', '1', 'riza94', '15/12/2020 10:09:10'),
(91, '236', 'O', NULL, '0', '1', 'riza94', '15/12/2020 10:12:44'),
(92, '237', 'P', NULL, '0', '1', 'riza94', '15/12/2020 10:12:52'),
(93, '238', 'Q', NULL, '0', '1', 'riza94', '15/12/2020 10:14:51'),
(94, '239', 'RUANG RAPAT', NULL, '0', '1', 'riza94', '15/12/2020 10:21:18'),
(95, '301', 'MEDICAL CHECK UP', NULL, '0', '1', 'riza94', '29/12/2018 11:46:17'),
(96, '302', 'JANTUNG TERPADU', NULL, '0', '1', 'riza94', '15/12/2020 10:06:56'),
(97, '303', 'R', NULL, '0', '1', 'riza94', '15/12/2020 10:15:00'),
(98, '304', 'S', NULL, '0', '1', 'riza94', '15/12/2020 10:20:54'),
(99, '305', 'T', NULL, '0', '1', 'riza94', '15/12/2020 10:25:01'),
(100, '306', 'U', NULL, '0', '1', 'riza94', '15/12/2020 10:23:49'),
(101, '307', 'V', NULL, '0', '1', 'riza94', '15/12/2020 10:27:48'),
(102, '308', 'W', NULL, '0', '1', 'riza94', '15/12/2020 10:24:46'),
(103, '309', 'X', NULL, '0', '1', 'riza94', '15/12/2020 10:30:05'),
(104, '310', 'Y', NULL, '0', '1', 'riza94', '15/12/2020 10:23:21'),
(105, '311', 'Z', NULL, '0', '1', 'riza94', '15/12/2020 10:22:59'),
(106, '312', 'AA', NULL, '0', '1', 'riza94', '15/12/2020 09:56:26'),
(107, '313', 'AB', NULL, '0', '1', 'riza94', '15/12/2020 09:56:31'),
(108, '314', 'AC', NULL, '0', '1', 'riza94', '15/12/2020 09:56:36'),
(109, '315', 'AD', NULL, '0', '1', 'riza94', '15/12/2020 09:56:41'),
(110, '316', 'AE', NULL, '0', '1', 'riza94', '15/12/2020 09:56:46'),
(111, '317', 'AF', NULL, '0', '1', 'riza94', '15/12/2020 09:56:53'),
(112, '318', 'AG', NULL, '0', '1', 'riza94', '15/12/2020 09:56:58'),
(113, '319', 'TREADMILL TEST', NULL, '0', '1', 'riza94', '15/12/2020 10:28:09'),
(114, '320', 'KULIT DAN KELAMIN', NULL, '1', '0', 'init', '28/05/2018 18:24:00'),
(115, '401', 'RUANG ISO 401', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:45'),
(116, '402', 'RUANG ISO 402', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:45'),
(117, '403', 'RUANG ISO 403', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:47'),
(118, '404', 'RUANG ISO 404', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:47'),
(119, '405', 'RUANG ISO 405', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:48'),
(120, '406', 'RUANG ISO 406', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:48'),
(121, '407', 'RUANG ISO 407', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:50'),
(122, '408', 'RUANG ISO 408', '192.168.80.112', '1', '0', 'riza94', '6/7/2021 14:50'),
(123, '409', 'RUANG ISO 409', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:41'),
(124, '410', 'RUANG ISO 410', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:42'),
(125, '411', 'RUANG ISO 411', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:42'),
(126, '412', 'RUANG ISO 412', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:43'),
(127, '413', 'RUANG ISO 413', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:43'),
(128, '414', 'RUANG ISO 414', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:43'),
(129, '415', 'RUANG ISO 415', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:44'),
(130, '416', 'RUANG ISO 416', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:44'),
(131, '417', 'RUANG ISO 417', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:45'),
(132, '418', 'RUANG ISO 418', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:45'),
(133, '419', 'RUANG ISO 419', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 8:45'),
(134, '330', 'RUANG KEBIDANAN (330)', '192.168.80.112', '0', '0', 'zaa', '7/1/2020 17:37'),
(135, '329', 'RUANG KEBIDANAN (329)', '192.168.80.112', '0', '0', 'zaa', '7/1/2020 17:37'),
(136, '321', 'RUANG KEBIDANAN (321)', '192.168.80.112', '0', '0', 'zaa', '7/1/2020 17:37'),
(137, 'PPA', 'PATOLOGI ANATOMI', '192.168.80.111', '0', '1', 'riza94', '15/12/2020 10:17:39'),
(138, 'ANAS', 'ANASTESI', '192.168.80.111', '0', '1', 'riza94', '15/12/2020 09:58:24'),
(139, 'KV', 'Kardiovaskular', '192.168.81.72', '1', '0', 'zaa', '26/11/2018 11:36:59'),
(140, 'MCU01', 'Medical Check Up Room', '192.168.80.112', '0', '1', 'riza94', '29/12/2018 11:46:08'),
(141, 'ICU', 'INTENSIVE CARE UNIT', '192.168.80.112', '1', '0', 'ade93', '28/01/2019 16:11:54'),
(142, 'ICU.1', 'Bed ICU', '192.168.80.112', '1', '0', 'zaa', '13/05/2019 08:29:57'),
(143, 'ICU.2', 'Bed ICU 2', '192.168.80.112', '0', '0', 'zaa', '13/05/2019 08:32:04'),
(144, 'ICU.3', 'Bed ICU 3', '192.168.80.112', '0', '0', 'zaa', '13/05/2019 08:32:18'),
(145, 'ICU.4', 'Bed ICU 4', '192.168.80.112', '0', '0', 'zaa', '13/05/2019 08:32:25'),
(146, 'OK001', 'OK.01', '192.168.80.112', '1', '0', 'zaa', '22/04/2019 11:09:38'),
(147, 'NICU', 'Bed Nicu', '192.168.80.112', '1', '0', 'zaa', '13/05/2019 08:32:50'),
(148, 'OK002', 'OK.02', '192.168.80.112', '1', '0', 'zaa', '22/04/2019 11:10:13'),
(149, 'PK01', 'PK01', '192.168.80.112', '1', '0', 'zaa', '22/04/2019 15:11:57'),
(150, 'MT01', 'MATERNAL 1', '192.168.80.112', '1', '0', 'zaa', '22/04/2019 15:34:17'),
(151, 'MT02', 'MATERNAL 02', '192.168.80.112', '0', '0', 'zaa', '22/04/2019 15:26:28'),
(152, 'MT03', 'MATERNAL 03', '192.168.80.112', '0', '0', 'zaa', '22/04/2019 15:26:41'),
(153, 'MT04', 'MATERNAL 2', '192.168.80.112', '1', '0', 'zaa', '22/04/2019 15:35:38'),
(154, 'MT05', 'MATERNAL 3', '192.168.80.112', '1', '0', 'zaa', '22/04/2019 15:35:55'),
(155, 'PICU', 'Bed Picu', '192.168.80.112', '1', '0', 'zaa', '13/05/2019 08:49:30'),
(156, 'IW', 'Intermediate Ward Laki Laki', '192.168.80.112', '1', '0', 'zaa', '13/05/2019 09:23:02'),
(157, 'IW2', 'Intermediate Ward Perempuan', '192.168.80.112', '1', '0', 'zaa', '13/05/2019 09:21:51'),
(158, 'CVCU', 'RUANG CVCU', '192.168.80.112', '1', '0', 'zaa', '8/5/2020 10:18'),
(159, '501', 'Rawat Inap Anak (501)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 11:02'),
(160, '502', 'Rawat Inap Anak (502)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 11:03'),
(161, '503', 'Rawat Inap Kebidanan (503)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 11:03'),
(162, '504', 'Rawat Inap Kebidanan (504)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 11:03'),
(163, '505', 'Rawat Inap Kebidanan (505)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 11:04'),
(164, '506', 'Isolasi Airbome (506)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 10:55'),
(165, '507', 'Isolasi Airbome (507)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 10:55'),
(166, '508', 'Isolasi Medical Bedah (508)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 11:02'),
(167, '509', 'Isolasi Medical Bedah (509)', '192.168.80.112', '1', '0', 'ivan', '6/9/2021 11:02'),
(168, '510', 'Rawat Inap Medikal Bedah (700)', '192.168.80.112', '1', '0', 'riza94', '8/9/2021 11:29'),
(169, '511', 'Rawat Inap Medikal Bedah (700.1)', '192.168.80.112', '1', '0', 'riza94', '8/9/2021 11:34'),
(170, '512', 'Rawat Inap Medikal Bedah (701.1)', '192.168.80.112', '1', '0', 'riza94', '8/9/2021 11:36'),
(171, 'NEONATUS ', 'Ruang Neo', '192.168.80.112', '1', '0', 'zaa', '1/2/2020 20:00'),
(172, 'RORTO01', 'ORTHOPEDI', '192.168.80.112', '1', '0', 'zaa', '11/2/2020 16:10'),
(173, 'FAR', 'FARMASI WALK IN', '-', '1', '0', 'melia', '18/07/2019 13:45:55'),
(174, '156', 'Bedah Thorax Kardiovaskuler', '-', '0', '1', 'riza94', '15/12/2020 10:03:56'),
(175, '601', 'RUANG 601', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:51'),
(176, '602', 'RUANG 602', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:52'),
(177, '603', 'RUANG 603', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:52'),
(178, '604', 'RUANG 604', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:53'),
(179, '605', 'RUANG 605', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:53'),
(180, '606', 'RUANG 606 ( ISOLASI )', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 15:02'),
(181, '607', 'RUANG 607', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:53'),
(182, '608', 'RUANG 608', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:54'),
(183, '609', 'RUANG 609', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:55'),
(184, '610', 'RUANG 610', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:56'),
(185, '611', 'RUANG 611', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:56'),
(186, '612', 'RUANG 612', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:56'),
(187, '613', 'RUANG 613', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 13:56'),
(188, '701', 'RUANG INAP ANAK 703', '192.168.80.1', '1', '0', 'riza94', '8/9/2021 12:00'),
(189, '702', 'RUANG INAP ANAK 704', '192.168.80.1', '1', '0', 'riza94', '8/9/2021 12:00'),
(190, '703', 'RUANG INAP ANAK 705', '192.168.80.1', '1', '0', 'riza94', '8/9/2021 12:00'),
(191, '704', 'RUANG INAP KEBIDANAN 704', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:26'),
(192, '705', 'RUANG INAP KEBIDANAN 705', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:26'),
(193, '706', 'RUANG INAP KEBIDANAN 706', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:26'),
(194, '707', 'RUANG INAP KEBIDANAN 707', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:27'),
(195, '708', 'RUANG INAP KEBIDANAN 708', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:27'),
(196, '709', 'RUANG INAP KEBIDANAN 709', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:28'),
(197, '710', 'RUANG ISOLASI LAKI-LAKI 710', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:31'),
(198, '711', 'RUANG ISOLASI PEREMPUAN 711', '192.168.80.1', '1', '0', 'riza94', '2/2/2021 13:31'),
(199, '712', 'RUANG INAP MEDIKAL BEDAH 712', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 11:01'),
(200, '713', 'RUANG INAP MEDIKAL BEDAH 713', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:12'),
(201, '714', 'RUANG INAP MEDIKAL BEDAH 714', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:38'),
(202, '715', 'RUANG INAP MEDIKAL BEDAH 715', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:30'),
(203, '716', 'RUANG INAP MEDIKAL BEDAH 716', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:39'),
(204, '717', 'RUANG INAP ANAK 717', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:40'),
(205, '718', 'RUANG INAP ANAK 718', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:40'),
(206, '719', 'RUANG INAP ANAK 719', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:41'),
(207, '720', 'RUANG INAP ANAK 720', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 9:42'),
(208, '721', 'RUANG INAP KEBIDANAN 721', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 10:04'),
(209, '722', 'RUANG INAP KEBIDANAN 722', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 10:05'),
(210, '723', 'RUANG INAP KEBIDANAN 723', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 10:06'),
(211, '724', 'RUANG INAP KEBIDANAN 724', '192.168.80.1', '1', '0', 'riza94', '9/9/2021 10:06'),
(212, '725', 'RUANG 725', '192.168.80.1', '1', '0', 'zaa', '6/2/2020 15:42'),
(213, 'Cathlab', 'Ruang Cathlab', '192.168.80.112', '1', '0', 'riza94', '24/02/2020 09:40:49'),
(214, 'keu01', 'Ruang Keuangan', '192.168.80.112', '1', '0', 'rizaa', '18/03/2020 10:47:18'),
(215, 'JZ01', 'PEMULASARAAN JENZAH', '192.168.80.112', '1', '0', 'riza94', '26/03/2020 11:14:43'),
(216, 'pls01', 'Ruang IPLS', '192.168.80.112', '1', '0', 'riza94', '27/03/2020 14:38:02'),
(217, 'VIP', 'VIP 1', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:37'),
(218, 'VIP2', 'VIP 2', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:37'),
(219, 'VIP3', 'VIP 3', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:38'),
(220, 'VIP4', 'VIP 4', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:38'),
(221, 'VIP5', 'VIP 5', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:38'),
(222, 'VIP6', 'VIP 6', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:38'),
(223, 'VIP7', 'VIP 7', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:38'),
(224, 'VIP8', 'VIP 8', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:39'),
(225, 'VIP9', 'VIP 9', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:39'),
(226, 'VIP10', 'VIP 10', '192.168.80.112', '1', '0', 'zaa', '7/5/2020 13:39'),
(227, 'HCU1', 'RUANG HCU', '192.168.80.112', '1', '0', 'zaa', '8/5/2020 10:15'),
(228, 'cvcu1', 'Ruang CVCU', '192.168.80.112', '0', '0', 'zaa', '8/5/2020 10:19'),
(229, '600', 'RUANG ISOLASI ICU (600) ', '192.168.80.112', '1', '0', 'zaa', '2/7/2020 9:05'),
(230, 'po111', 'Ponek IGD', '192.168.80.112', '1', '0', 'riza94', '26/08/2020 14:44:45'),
(231, 'P4RU', 'Paru', '192.168.80.112', '1', '0', 'riza94', '10/9/2020 9:01'),
(232, 'Feto01', 'Fetomaternal & Fertilitas', '192.168.80.112', '0', '1', 'riza94', '15/12/2020 10:05:32'),
(233, 'IKB_1', 'RUANG BERSALIN', '192.168.80.112', '1', '0', 'zaa', '2/11/2020 11:28'),
(234, 'IKB_2', 'RUANG RESUSITASI ', '192.168.80.112', '1', '0', 'zaa', '2/11/2020 11:29'),
(235, 'IKB_3', 'RUANG TINDAKAN IKB', '192.168.80.112', '1', '0', 'zaa', '2/11/2020 11:29'),
(236, 'IKB_4', 'RUANG EKLAPSI', '192.168.80.112', '0', '1', 'riza94', '15/12/2020 10:25:50'),
(237, 'IKB_5', 'RUANG KBBL', '192.168.80.112', '1', '0', 'zaa', '2/11/2020 11:49'),
(238, 'ipsrs01', 'Ruang IPSRS', '192.168.80.112', '1', '0', 'riza94', '5/11/2020 15:48'),
(239, 'fisio', 'Rehab Medik', '192.168.80.112', '1', '0', 'riza94', '7/12/2020 12:51'),
(240, '1', 'Bedah Umum', '192.168.80.112', '1', '0', 'riza94', '16/12/2020 08:54:19'),
(241, '2', 'Bedah Digestiv', '192.168.80.112', '1', '0', 'riza94', '16/12/2020 08:58:49'),
(242, 'kl01', 'Anak', '192.168.80.112', '1', '0', 'riza94', '17/12/2020 09:44:29'),
(243, 'rj100', 'Ruang Klinik Obygn', '192.168.80.112', '1', '0', 'zaa', '22/12/2020 10:37:30'),
(244, 'ANTM', 'PATOLOGI ANATOMI', '192.168.80.112', '1', '0', 'detinadra', '8/2/2021 10:18'),
(245, '901', 'VIP 901', '192.168.80.112', '1', '0', 'zaa', '12/6/2021 9:20'),
(246, '902', 'VIP 902', '192.168.80.112', '1', '0', 'zaa', '12/6/2021 9:20'),
(247, 'isoigd', 'ISOLASI LT 1', '192.168.80.112', '1', '0', 'zaa', '4/5/2021 13:40'),
(248, 'klap01', 'RUANG EKLAPSI', '192.168.80.112', '1', '0', 'detinadra', '24/05/2021 08:27:29'),
(249, 'mcurj', 'Ruang MCU RJ', '192.168.80.112', '1', '0', 'detinadra', '28/05/2021 08:54:15'),
(250, '910', 'VIP 910', '192.168.80.112', '1', '0', 'zaa', '12/6/2021 9:20'),
(251, 'feto001', 'Ruang Fetomaternal', '192.168.80.112', '1', '0', 'detinadra', '9/6/2021 9:08'),
(252, 'icult1', 'ICU COVID LT 1', '192.168.80.112', '1', '0', 'zaa', '9/6/2021 11:37'),
(253, 'isotn', 'Isolasi Tekanan Negativ', '192.168.80.112', '1', '0', 'ivan', '14/06/2021 09:16:00'),
(254, 'covtn', 'RUANG 401', '192.168.80.112', '0', '1', 'ivan', '14/06/2021 13:51:11'),
(255, 'cov401', 'RUANG 401', '192.168.80.112', '0', '1', 'zaa', '6/7/2021 15:22'),
(256, 'cov402', 'RUANG 402', '192.168.80.112', '0', '1', 'riza94', '6/7/2021 15:23'),
(257, 'cov403', 'RUANG 403', '192.168.80.112', '0', '1', 'riza94', '6/7/2021 14:46'),
(258, 'cov404', 'RUANG 404', '192.168.80.112', '0', '1', 'riza94', '6/7/2021 14:47'),
(259, 'cov405', 'RUANG 405', '192.168.80.112', '0', '1', 'ivan', '14/06/2021 13:54:45'),
(260, 'cov406', 'RUANG 406', '192.168.80.112', '0', '1', 'ivan', '14/06/2021 13:55:06'),
(261, 'cov407', 'RUANG 407', '192.168.80.112', '0', '1', 'ivan', '14/06/2021 13:56:06'),
(262, 'cov408', 'RUANG 408', '192.168.80.112', '0', '1', 'ivan', '14/06/2021 13:56:22'),
(263, 'nicucov19', 'NICU COV LT 1', '192.168.80.112', '1', '0', 'ivan', '14/06/2021 14:35:22'),
(264, 'kesjiw', 'Kesehatan Jiwa', '192.168.80.112', '1', '0', 'detinadra', '16/06/2021 10:51:11'),
(265, 'PICUISO', 'RUANG PICU ISO', '192.168.80.112', '1', '0', 'rizaa', '6/8/2021 10:32'),
(266, 'phy01', 'Psikologi', '192.168.80.112', '1', '0', 'zaa', '6/9/2021 11:21'),
(267, '701', 'Rawat Inap Medikal Bedah (701)', '192.168.80.112', '1', '0', 'rizaa', '8/9/2021 11:55'),
(268, '702', 'Rawat Inap Medikal Bedah (702)', '192.168.80.112', '1', '0', 'rizaa', '8/9/2021 11:56');

-- --------------------------------------------------------

--
-- Table structure for table `m_ruangan_baru`
--

CREATE TABLE `m_ruangan_baru` (
  `id` int NOT NULL,
  `nama_ruangan` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `is_active` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_ruangan_baru`
--

INSERT INTO `m_ruangan_baru` (`id`, `nama_ruangan`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pav. Cemara (Anak)', '1', '2022-12-15 08:20:29', NULL),
(2, 'Pav. Cemara (Kebidanan)', '1', '2022-12-15 08:20:29', NULL),
(3, 'Pav. Akasia', '1', '2022-12-15 08:20:29', NULL),
(4, 'Pav. Meranti', '1', '2022-12-15 08:20:29', NULL),
(5, 'Pav.Cendana', '1', '2022-12-15 08:20:29', NULL),
(6, 'Pav. Az.Zahra', '1', '2022-12-15 08:20:29', NULL),
(7, 'Pav. Leanpuri', '1', '2022-12-15 08:20:29', NULL),
(8, 'ICU', '1', '2022-12-15 08:20:29', NULL),
(9, 'Picu', '1', '2022-12-15 08:20:29', NULL),
(10, 'NICU', '1', '2022-12-15 08:20:44', NULL),
(11, 'Neonatus', '1', '2022-12-15 08:20:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_service_unit_room`
--

CREATE TABLE `m_service_unit_room` (
  `RoomID` int NOT NULL,
  `ServiceUnitID` int NOT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastUpdatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_site`
--

CREATE TABLE `m_site` (
  `SiteCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SiteName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ShortName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Initial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TaxRegistrantNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsActive` int DEFAULT NULL,
  `IsDeleted` int DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastUpdatedDateTime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_site`
--

INSERT INTO `m_site` (`SiteCode`, `SiteName`, `ShortName`, `Initial`, `TaxRegistrantNo`, `IsActive`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
('abc', 'tes', 'tes', 'tes', 'tes', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_tarif`
--

CREATE TABLE `m_tarif` (
  `tarif_id` bigint UNSIGNED NOT NULL,
  `tarif_item` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tarif_kelas` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tarif_harga` double(20,2) DEFAULT NULL,
  `deleted` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `updated_by` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `deleted_by` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tarif_tindakan` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tarif_sub_tindakan` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `sub_harga` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_tarif`
--

INSERT INTO `m_tarif` (`tarif_id`, `tarif_item`, `tarif_kelas`, `tarif_harga`, `deleted`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `tarif_tindakan`, `tarif_sub_tindakan`, `sub_harga`) VALUES
(1, 'IGD1-1', 'VVIP', 60000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'IGD1-1', 'I', 60000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'IGD1-1', 'II', 60000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'IGD1-1', 'III', 60000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'IGD1-2', 'VVIP', 30000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'ADM1', 'VVIP', 15000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'RJ/RI1', 'VVIP', 550000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'TK1', 'VVIP', 4000000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'PK1', 'VVIP', 59000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'PA1', 'VVIP', 460000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'BD1', 'VVIP', 360000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'RAD1', 'VVIP', 375000.00, '0', '2022-04-09 03:51:18', '2022-04-09 03:51:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'RI1-1', 'VVIP', 1000000.00, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'tester tindakan', 'Tester Sub tindakan', NULL),
(14, 'RI1-2', 'I', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'tester tindakan 1', 'tester sub tindakan 1', '{\"nama\":null,\"harga\":null}'),
(15, 'RI1-3', 'II', 1000000.00, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'tester tindakan 2', 'tester sub tindakan 2', '{\"nama\":\"Tambahan 1\",\"harga\":\"600000\"}'),
(16, 'RI1-4', 'I', 1000000.00, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Tindakan 123', 'Sub Tindakan 123', '[{\"nama\":\"Tambahan 1\",\"harga\":\"600000\"},{\"nama\":\"Tambahan 2\",\"harga\":\"100000\"}]'),
(17, 'RI1-5', 'II', 1000000.00, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'tester tindakan', 'Tester Sub tindakan', '{\"data\":[{\"nama\":\"Tambahan 1\",\"harga\":\"600000\"},{\"nama\":\"Tambahan 1\",\"harga\":\"600000\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `m_unit`
--

CREATE TABLE `m_unit` (
  `ServiceUnitCode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ServiceUnitName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `ShortName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `Initial` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IconFileName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsUsingJobOrder` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `PatientServiceInterval` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsBor` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsActive` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsDeleted` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `LastUpdatedDateTime` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `IsExecutive` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `m_unit`
--

INSERT INTO `m_unit` (`ServiceUnitCode`, `ServiceUnitName`, `ShortName`, `Initial`, `IconFileName`, `IsUsingJobOrder`, `PatientServiceInterval`, `IsBor`, `IsActive`, `IsDeleted`, `LastUpdatedBy`, `LastUpdatedDateTime`, `IsExecutive`) VALUES
('123', 'SDM dan Kerjasama', 'SDM dan kerjasama', 'PG', NULL, '0', '0', '0', '1', '0', 'riza94', '25:09.3', '0'),
('ACC', 'FINANCE & ACCOUNTING', 'FINANCE & ACCOUNTING', 'AC', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('ADMER', 'PENDAFTARAN IGD', 'PENDAFTARAN IGD', 'AE', NULL, '0', '0', '0', '1', '0', 'melia', '58:02.6', '0'),
('ADMIP', 'ADMISSION INPATIENT', 'ADMISSION INPATIENT', 'AI', NULL, '0', '0', '0', '0', '1', 'melia', '43:12.2', '0'),
('ADMOP', 'PENDAFTARAN RAWAT JALAN', 'PENDAFTARAN RAWAT JALAN', 'RJ', NULL, '0', '0', '0', '1', '0', 'melia', '32:47.1', '0'),
('ANDRO', 'ANDROLOGY CLINIC', 'ANDROLOGY CLINIC', 'AD', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('BABY', 'BABY ROOM', 'BABY ROOM', 'BR', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('BB', 'Unit BB', 'BB', 'BB', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL),
('BILLIP', 'BILLING INPATIENT', 'BILLING INPATIENT', 'BI', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('CA', 'KASIR RAWAT INAP', 'KASIR RAWAT INAP', 'CAS', NULL, '0', '0', '0', '1', '0', 'ade93', '43:22.7', '0'),
('CALLC', 'CALL CENTRE', 'CALL CENTRE', 'CC', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('CARDIO', 'CARDIOLOGY CLINIC', 'CARDIOLOGY CLINIC', 'CD', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('CASHER', 'KASIR IGD', 'KASIR IGD', 'CE', NULL, '0', '0', '0', '1', '0', 'ade93', '42:41.9', '0'),
('CASHIP', 'CASHIER INPATIENT', 'CASHIER INPATIENT', 'CI', NULL, '0', '0', '0', '0', '1', 'melia', '41:43.0', '0'),
('CASHMC', 'KASIR MCU (MEDICAL CHECK UP)', 'KASIR MCU (MEDICAL CHECK UP)', 'CM', NULL, '0', '0', '0', '1', '0', 'ade93', '42:59.5', '0'),
('CASHOP', 'KASIR RAWAT JALAN', 'KASIR RAWAT JALAN', 'CO', NULL, '0', '0', '0', '1', '0', 'ade93', '43:36.5', '0'),
('CS01', 'Case Mix', 'casemix', 'cs', NULL, '0', '0', '0', '1', '0', 'zaa', '31:39.9', '0'),
('CSSD', 'CSSD', 'CSSD', 'CS', NULL, '0', '0', '0', '0', '1', 'melia', '05:01.5', '0'),
('CTS', 'CT SCAN', 'CT SCAN', 'CT', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('DELIVER', 'DELIVERY ROOM', 'DELIVERY ROOM', 'DR', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('DENTAL', 'DENTAL CLINIC', 'DENTAL CLINIC', 'DT', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('DERMA', 'DERMATOLOGY CLINIC', 'DERMATOLOGY CLINIC', 'DM', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('ENT', 'EAR, NOSE & THROAT CLINIC', 'EAR, NOSE & THROAT CLINIC', 'EN', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('ER', 'IGD', 'IGD', 'ER', NULL, '0', '0', '0', '1', '0', 'melia', '58:31.9', '0'),
('GENSUR', 'GENERAL SURGERY CLINIC', 'GENERAL SURGERY CLINIC', 'GS', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('GUD', 'GUDANG FARMASI', 'GUDANG FARMASI', 'GD', NULL, '0', '0', '0', '1', '0', 'melia', '26:00.5', '0'),
('GUDL', 'GUDANG LOGISTIK', 'GUDANG LOGISTIK', 'GU', NULL, '0', '0', '0', '1', '0', 'melia', '07:06.1', '0'),
('HCU', 'HIGH CARE UNIT', 'HIGH CARE UNIT', 'HU', NULL, '0', '0', '1', '0', '1', 'melia', '03:51.5', '0'),
('HEMO', 'HEMODIALYSIS', 'HEMODIALYSIS', 'HM', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('IBS', 'IBS', 'IBS', 'IBS', NULL, '0', '0', '1', '1', '0', 'zaa', '05:54.3', '0'),
('ICU', 'INTENSIVE CARE UNIT', 'INTENSIVE CARE UNIT', 'IU', NULL, '0', '0', '1', '1', '0', 'SCRIPT', '54:00.3', '0'),
('IKB', 'KAMAR BERSALIN', 'KB', 'IKB', NULL, '0', '0', '0', '1', '0', 'zaa', '22:42.7', '0'),
('INTERNIST', 'INTERNIST CLINIC', 'INTERNIST CLINIC', 'IN', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('IT', 'INFORMATION TECHNOLOGY', 'INFORMATION TECHNOLOGY', 'IT', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('K3', 'K3', 'K3', 'K3', NULL, '0', '0', '0', '0', '1', 'melia', '54:32.5', '0'),
('KEU01', 'KEUANGAN', 'keu', 'keu', NULL, '0', '0', '0', '1', '0', 'rizaa', '45:09.2', '0'),
('KS', 'K3 Rumah Sakit', 'KS', 'KS', NULL, '0', '0', '0', '1', '0', 'riza94', '18:22.5', '0'),
('LAB', 'LABORATORY', 'LABORATORY', 'LB', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('LD', 'LAUNDRY', 'LD', 'LD', NULL, '0', '0', '0', '0', '1', 'melia', '32:49.0', '0'),
('LGPUR', 'LOGISTIC PURCHASING', 'LOGISTIC PURCHASING', 'LP', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('LOG', 'GUDANG UMUM RUMAH TANGGA', 'UMUM RUMAH TANGGA', 'LO', NULL, '0', '0', '0', '1', '0', 'riza94', '31:07.4', '0'),
('MARKET', 'MARKETING / PUBLIC RELATION', 'MARKETING / PUBLIC RELATION', 'MK', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('MCU', 'MEDICAL CHECK UP', 'MEDICAL CHECK UP', 'MU', NULL, '0', '0', '0', '0', '1', 'melia', '03:19.7', '0'),
('MOR', 'MORTUARY', 'MORTUARY', 'MT', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('MR', 'MEDICAL RECORD', 'MEDICAL RECORD', 'MR', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('MRI', 'MRI', 'MRI', 'MI', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('NEO', 'NEONATUS', 'NEONAT', 'NT', NULL, '0', '0', '1', '1', '0', 'zaa', '42:15.9', '0'),
('NEURO', 'NEUROLOGY CLINIC', 'NEUROLOGY CLINIC', 'NR', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('NICU-PICU', 'NEONATAL - PERINATAL ICU', 'NEONATAL - PERINATAL ICU', 'NP', NULL, '0', '0', '1', '1', '0', 'SCRIPT', '54:00.3', '0'),
('NUTRITION', 'NUTRITION CLINIC', 'NUTRITION CLINIC', 'NT', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('OBGYN', 'OBSTETRIC & GYNAEOCOLOGY CLINIC', 'OBSTETRIC & GYNAEOCOLOGY CLINIC', 'OG', 'klinik_obstetri.png', '0', '0', '1', '0', '1', 'ade93', '23:47.9', '0'),
('ODC', 'ONE DAY CARE', 'ONE DAY CARE', 'DC', NULL, '0', '0', '0', '0', '1', 'melia', '02:49.2', '0'),
('OPTHAL', 'EYE CLINIC', 'EYE CLINIC', 'OT', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('OT', 'OK', 'OK', 'OK', NULL, '0', '0', '1', '1', '0', 'zaa', '05:27.5', '0'),
('OT001', 'Klinik Ortopedi', 'Ortopedi', 'OT', NULL, '0', '0', '1', '1', '0', 'riza94', '50:08.3', '0'),
('P001', 'KLINIK BEDAH', 'BEDAH', 'BEDAH', 'klinik_bedah.png', '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P002', 'KLINIK PENYAKIT DALAM', 'PENYAKIT DALAM', 'INT', 'penyakitdalam.png', '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P003', 'KLINIK IBU & ANAK', 'IBU & ANAK', 'IA', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P004', 'KLINIK OBSTETRI & GINEKOLOGI', 'OBSGIN', 'OB', 'klinik_obstetri (1).png', '0', '0', '1', '1', '0', 'ade93', '23:23.1', '0'),
('P005', 'KLINIK GINEKOLOGI', 'GINEKOLOGI', 'GIN', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P006', 'KLINIK SYARAF', 'SYARAF', 'ks', 'klinik_saraf.png', '0', '0', '1', '1', '0', 'ari', '42:02.1', '0'),
('P007', 'KLINIK ANASTESI', 'ANASTESI', 'ATS', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P008', 'KLINIK KULIT & KELAMIN', 'KULIT & KELAMIN', 'KK', 'klinik_kulitdankelamin.png', '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P009', 'KLINIK GIGI', 'GIGI', 'KG', 'WhatsApp Image 2018-09-13 at 09.06.47.jpeg', '0', '0', '1', '1', '0', 'ari', '30:51.5', '0'),
('P010', 'KLINIK MATA', 'MATA', 'MATA', 'klinik_mata.png', '0', '0', '1', '1', '0', 'Salahudin', '08:31.7', '0'),
('P011', 'KLINIK THT', 'THT', 'KT', 'WhatsApp Image 2018-09-13 at 09.06.46.jpeg', '0', '0', '1', '1', '0', 'ari', '29:46.8', '0'),
('P012', 'KLINIK JIWA', 'JIWA', 'JIWA', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P013', 'KLINIK ORTHOPEDI', 'ORTHOPEDI', 'ORT', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P014', 'KLINIK UROLOGI', 'UROLOGI', 'URO', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P015', 'KLINIK GIZI', 'GIZI', 'GIZI', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P016', 'KLINIK REHABILITASI MEDIK', 'REHAB MEDIK', 'REMED', NULL, '0', '0', '1', '0', '1', 'ade93', '24:22.2', '0'),
('P017', 'KLINIK SUBSPESIALIS KARDIOVASKULER', 'KARDIOVASKULAR', 'KARDI', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P018', 'KLINIK SUBSPESIALIS GINJAL HIPERTENSI', 'GINJAL HIPERTENSI', 'GH', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P019', 'KLINIK SUBSPESIALIS ENDOKRIN METABOLIK', 'ENDOKRIN', 'ENDO', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P020', 'KLINIK SUBSPESIALIS ORTHOPEDI K-SPINE', 'K-SPINE', 'KSPI', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P021', 'KLINIK BEDAH SYARAF', 'BEDAH SYARAF', 'BSYR', 'klinik_bedahsaraf.png', '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P022', 'KLINIK SUBSPESIALIS BEDAH DIGESTIV', 'DIGESTIV', 'DIG', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P023', 'KLINIK SUBSPESIALIS BEDAH VASKULER', 'VASKULER', 'VAS', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P024', 'KLINIK SUBSPESIALIS BEDAH TORAKS VASKULER', 'BEDAH THORAX', 'BTH', NULL, '0', '0', '1', '1', '0', 'zaa', '15:25.9', '0'),
('P025', 'KLINIK SUBSPESIALIS KONSULTAN TUMBUH KEMBANG ANAK', 'TUMBUH KEMBANG', 'TL', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P026', 'KLINIK SUBSPESIALIS JANTUNG ANAK', 'JANTUNG ANAK', 'JA', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P027', 'KLINIK SUBSPESIALIS FETOMATERNAL & FERTILITY', 'FETOMATERNAL', 'FETO', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P028', 'RUANG RAWAT BEDAH', 'RAWAT BEDAH', 'RB', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P029', 'RAWAT INAP LT 4', 'RAWAT INAP LT 4', 'RA', NULL, '0', '0', '1', '1', '0', 'riza94', '30:50.9', '0'),
('P030', 'RAWAT INAP WINGS B', 'RAWAT INAP WINGS B', 'RD', NULL, '0', '0', '1', '1', '0', '412IY', '25:37.8', '0'),
('P031', 'RUANG RAWAT KEBIDANAN', 'RAWAT KEBIDANAN', 'RK', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P032', 'RUANG RAWAT PENYAKIT DALAM', 'RAWAT PENYAKIT DALAM', 'RPD', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P033', 'RUANG RAWAT SYARAF', 'RAWAT SYARAF', 'RS', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P034', 'ICU', 'ICU', 'ICU', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P035', 'NICU', 'NICU', 'NICU', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P036', 'PICU', 'PICU', 'PICU', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P037', 'CVCU', 'CVCU', 'CVCU', NULL, '0', '0', '0', '1', '0', 'zaa', '32:22.0', '0'),
('P038', 'CATHLAB', 'CATHLAB', 'CTHLB', NULL, '0', '0', '0', '1', '0', 'zaa', '31:49.5', '0'),
('P039', 'INTERMEDIATE WARD', 'INTERMEDIATE WARD', 'IW', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P040', 'HCU', 'HCU', 'HCU', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P041', 'MEDICAL CHECK UP', 'MCU', 'MCU', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P042', 'Rehab Medik', 'Rehab Medik', 'FISIO', NULL, '0', '0', '1', '1', '0', 'riza94', '47:45.7', '0'),
('P043', 'KAMAR OPERASI ELEKTIF', 'OK1', 'OK1', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P044', 'KAMAR OPERASI EMERGENCY', 'OK2', 'OK2', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P045', 'ONE DAY CARE', 'ODC', 'ODC', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P046', 'IGD', 'IGD', 'IGD', NULL, '0', '0', '0', '0', '1', 'melia', '00:11.9', '0'),
('P047', 'X-RAY', 'XRAY', 'XRAY', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P048', 'CT SCAN', 'CT SCAN', 'CTSCN', NULL, '0', '0', '0', '1', '0', 'zaa', '32:08.2', '0'),
('P049', 'USG', 'USG', 'USG', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P050', 'C-ARM', 'C-ARM', 'C-ARM', NULL, '0', '0', '0', '1', '0', 'zaa', '31:28.0', '0'),
('P051', 'LABORATORIUM KLINIK', 'LAB KLINIK', 'LABKL', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P052', 'LABORATORIUM PATALOGI ANATOMI', 'LAB PA', 'LABPA', NULL, '0', '0', '0', '1', '0', 'zaa', '31:14.2', '0'),
('P053', 'FARMASI IGD & RAWAT INAP', 'FARMASI IGD & RAWAT INAP', 'FIRA', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P054', 'FARMASI RAWAT JALAN', 'FARMASI RAWAT JALAN', 'FRJ', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P055', 'FARMASI OK & ICU', 'FARMASI OK & ICU', 'FOI', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P056', 'GIZI', 'GIZI', 'GZ', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P057', 'REKAM MEDIS', 'REKAM MEDIS', 'RM', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P058', 'PONEK', 'PONEK', 'PONEK', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P059', 'MATERNAL', 'MATERNAL', 'KB', NULL, '0', '0', '1', '1', '0', 'zaa', '07:59.8', '0'),
('P060', 'CSSD', 'CSSD', 'CSSD', NULL, '0', '0', '0', '1', '0', 'zaa', '31:58.3', '0'),
('P061', 'LAUNDRY', 'LAUNDRY', 'LAUN', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P062', 'IPSRS', 'IPSRS', 'IPSRS', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P063', 'PEMULASARAAN JENAZAH', 'PEMULASARAAN JENAZAH', 'PJ', NULL, '0', '0', '1', '1', '0', 'init', '52:00.0', '0'),
('P064', 'KLINIK ANAK', 'ANAK', 'ka', 'pediatric.png', '0', '0', '1', '1', '0', 'ari', '47:44.6', '0'),
('P065', 'RAWAT JALAN', 'RANAP', 'RJ', NULL, '0', '0', '0', '1', '0', 'ari', '23:33.8', '0'),
('P066', 'RAWAT INAP LT 5', 'RAWAT INAP LT 5', 'RI05', NULL, '0', '0', '0', '1', '0', 'zaa', '06:43.5', '0'),
('P067', 'RADIOLOGI', 'RADIOLOGI', 'RA', NULL, '0', '0', '0', '1', '0', 'ari', '22:15.1', '0'),
('P068', 'KLINIK PATOLOGI ANATOMI', 'KLINIK PATOLOGI ANATOMI', 'KPA', 'patologi_anatomi.png', '0', '0', '0', '1', '0', 'salahudin', '19:52.9', '0'),
('P069', 'Wing A Surgical', 'Wing A Surgical', 'W.A', NULL, '0', '0', '0', '0', '1', 'zaa', '56:37.1', '0'),
('P070', 'Wing B Medical', 'Wing B Medical', 'WBM', NULL, '0', '0', '0', '0', '1', 'zaa', '56:41.9', '0'),
('P0701', 'MCU (RJ)', 'MCU (RJ)', 'mcurj', NULL, '0', '0', '0', '0', '1', 'detinadra', '18:32.3', '0'),
('PAEDIATRIC', 'PAEDIATRIC CLINIC', 'PAEDIATRIC CLINIC', 'PD', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('PAK', 'PATOLOGI KLINIK', 'PK', 'PK', NULL, '0', '0', '0', '1', '0', 'zaa', '30:52.1', '0'),
('PENDF', 'PENDAFTARAN RAWAT INAP', 'PENDAFTARAN RAWAT INAP', 'RI', NULL, '0', '0', '0', '1', '0', 'melia', '48:52.8', '0'),
('PHAR', 'PHARMACY SERVICE UNIT (MAIN)', 'PHARMACY SERVICE UNIT (MAIN)', 'P1', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('PHPUR', 'PHARMACY PURCHASING', 'PHARMACY PURCHASING', 'PP', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('PHYSIO', 'PHYSIOTHERAPHY', 'PHYSIOTHERAPHY', 'PH', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('PKRS', 'Promosi Kesehatan Rumah Sakit', 'pkrs', 'pkrs', NULL, '0', '0', '0', '1', '0', 'riza94', '03:24.1', '0'),
('PLS01', 'IPLS Rumah Sakit', 'pls', 'pls', NULL, '0', '0', '1', '1', '0', 'riza94', '37:40.9', '0'),
('PO', 'PONEK X', 'PONEK X', 'PO', NULL, '0', '0', '0', '1', '0', 'zaa', '05:44.0', '0'),
('PPA', 'PATOLOGI ANATOMI', 'PA', 'PA', 'patologi_anatomi.png', '0', '0', '0', '1', '0', 'zaa', '31:05.1', '0'),
('PPI', 'KOMITE PPI', 'PPI', 'PPI', NULL, '0', '0', '0', '1', '0', 'zaa', '33:15.7', '0'),
('PSYCH', 'PSYCHIATRY CLINIC', 'PSYCHIATRY CLINIC', 'PY', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('PULMO', 'PULMONOLOGY CLINIC', 'PULMONOLOGY CLINIC', 'PM', NULL, '0', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('RI06', 'RAWAT INAP LT 6', 'RAWAT INAP LT 6', 'RI06', NULL, '0', '0', '0', '1', '0', 'zaa', '06:34.8', '0'),
('RI07', 'RAWAT INAP LT 7', 'RAWAT INAP LT 7', 'RI07', NULL, '0', '0', '0', '1', '0', 'zaa', '06:51.4', '0'),
('RIIGD', 'Inap IGD', 'RI IGD', 'ri', NULL, '0', '0', '0', '1', '0', 'zaa', '57:25.7', '0'),
('RSU', 'RADIOLOGY SERVICE UNIT', 'RADIOLOGY SERVICE UNIT', 'RD', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('SDM', 'SDM', 'SDM', 'SD', NULL, '0', '0', '0', '1', '0', 'ade93', '30:57.2', '0'),
('TIMKES', 'TIM KESEHATAN', 'TIMKES', 'TK', NULL, '0', '0', '0', '1', '0', 'melia', '00:44.2', '0'),
('USG', 'USG', 'USG', 'US', NULL, '1', '0', '0', '1', '0', 'SCRIPT', '54:00.3', '0'),
('VIP', 'RAWAT INAP VIP', 'VIP', 'VIP', NULL, '0', '0', '0', '1', '0', 'zaa', '11:15.4', '0'),
('feto', 'Klinik Fetomaternal & Fertilitas', 'Klinik Feto', 'feto', NULL, '0', '0', '0', '1', '0', 'riza94', '13:04.5', '0'),
('icucovid', 'ICU COVID LT 1', 'ICU COVID LT 1', 'ICLT1', NULL, '0', '0', '0', '1', '0', 'zaa', '39:47.7', '0'),
('isocovigd', 'ISOLASI LT 1', 'ISO LT 1', 'iso', NULL, '0', '0', '0', '1', '0', 'zaa', '43:48.5', '0'),
('isoigd', 'Isolasi IGD', 'ISO IGD', 'xisox', NULL, '0', '0', '0', '1', '0', 'zaa', '58:28.5', '0'),
('lt09', 'RAWAT INAP LT 9', 'lt9', 'lt9', NULL, '0', '0', '0', '1', '0', 'riza94', '43:21.4', '0'),
('nicucovigd', 'NICU COV LT 1', 'NICU COV LT 1', 'nicv', NULL, '0', '0', '0', '1', '0', 'ivan', '34:19.8', '0'),
('paru01', 'Klinik Paru', 'klinik paru', 'KP', NULL, '0', '0', '0', '1', '0', 'riza94', '58:50.2', '0'),
('phy', 'KLINIK PSIKOLOGI', 'KLINIK PSIKOLOGI', 'KP', NULL, '0', '0', '0', '1', '0', 'zaa', '17:08.5', '0'),
('zzz', 'zzz', 'zzz', 'zzz', NULL, 'zzz', NULL, 'zzz', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_unit_departemen`
--

CREATE TABLE `m_unit_departemen` (
  `ServiceUnitID` int NOT NULL,
  `SiteDepartmentID` int NOT NULL,
  `ServiceUnitCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ContactPerson1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ContactPerson2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `LocationID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `GcDefaultOrderType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsLockedLocation` int DEFAULT NULL,
  `IsActive` int DEFAULT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastUpdatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_unit_departemen`
--

INSERT INTO `m_unit_departemen` (`ServiceUnitID`, `SiteDepartmentID`, `ServiceUnitCode`, `ContactPerson1`, `ContactPerson2`, `LocationID`, `GcDefaultOrderType`, `IsLockedLocation`, `IsActive`, `LastUpdatedBy`, `LastUpdatedDateTime`) VALUES
(1, 3, 'ADMER', '', '', '56', NULL, 0, 1, 'melia', '2018-09-14 12:08:53'),
(2, 5, 'ADMIP', '', '', '57', NULL, 0, 0, 'melia', '2018-08-09 17:19:45'),
(3, 16, 'ADMOP', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(4, 3, 'CASHER', '', '', '56', NULL, 0, 1, 'melia', '2018-09-14 12:09:04'),
(5, 5, 'CASHIP', '', '', '57', NULL, 0, 0, 'melia', '2018-08-13 10:16:15'),
(6, 10, 'CASHOP', '', '', '57', NULL, 0, 0, 'melia', '2018-08-13 10:16:26'),
(7, 13, 'CASHMC', '', '', '57', NULL, 0, 0, 'melia', '2018-09-06 14:44:13'),
(8, 3, 'ER', '', '', '59', NULL, 0, 1, 'melia', '2018-08-18 16:42:55'),
(9, 4, 'ACC', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(10, 6, 'IT', '', '', '92', NULL, 0, 1, 'ade93', '2018-11-27 15:54:52'),
(11, 2, 'LAB', '', '', '79', NULL, 0, 0, 'ade93', '2018-12-04 15:34:08'),
(12, 12, 'LGPUR', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(13, 7, 'LOG', '', '', '53', NULL, 0, 1, 'melia', '2018-09-07 13:49:40'),
(14, 13, 'MCU', '', '', '57', NULL, 0, 0, 'melia', '2018-08-09 19:17:22'),
(15, 9, 'MR', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(16, 24, 'OT', '', '', '63', NULL, 0, 1, 'zaa', '2019-06-26 12:39:42'),
(17, 11, 'CSSD', '', '', '57', NULL, 0, 0, 'melia', '2018-08-09 19:05:39'),
(18, 2, 'PHAR', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(19, 12, 'PHPUR', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(20, 2, 'PHYSIO', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(21, 2, 'RSU', '', '', '78', NULL, 0, 1, 'ari', '2018-08-18 18:31:38'),
(22, 2, 'MRI', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(23, 2, 'CTS', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(24, 2, 'USG', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(25, 1, 'CALLC', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(26, 5, 'BABY', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(27, 5, 'DELIVER', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(28, 5, 'NICU-PICU', '', '', '57', 'X0151^001', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(29, 5, 'HCU', '', '', '57', 'X0151^001', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(30, 5, 'ICU', '', '', '57', 'X0151^001', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(31, 5, 'ODC', '', '', '57', 'X0151^003', 0, 0, 'melia', '2018-08-09 19:16:46'),
(32, 14, 'MOR', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(33, 10, 'NUTRITION', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(34, 10, 'OBGYN', '', '', '57', 'X0151^003', 0, 0, 'melia', '2018-08-30 17:19:57'),
(35, 10, 'OPTHAL', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(36, 10, 'PAEDIATRIC', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(37, 10, 'INTERNIST', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(38, 16, 'HEMO', '', '', '122', NULL, 0, 1, 'msyakir', '2021-12-14 10:41:26'),
(39, 10, 'DENTAL', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(40, 10, 'DERMA', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(41, 10, 'ENT', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(42, 10, 'GENSUR', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(43, 10, 'CARDIO', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(44, 10, 'ANDRO', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(45, 10, 'PSYCH', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(46, 10, 'PULMO', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(47, 10, 'NEURO', '', '', '57', 'X0151^003', 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(48, 8, 'MARKET', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(49, 5, 'BILLIP', '', '', '57', NULL, 0, 1, 'SCRIPT', '2014-08-29 04:54:00'),
(50, 15, 'P046', '-', '-', '57', NULL, 0, 0, 'melia', '2018-08-09 17:50:56'),
(51, 16, 'P001', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:53:00'),
(52, 16, 'P002', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:53:31'),
(53, 16, 'P003', '-', '-', '74', NULL, 0, 0, 'ade93', '2018-12-04 14:20:30'),
(54, 16, 'P004', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:54:13'),
(55, 16, 'P005', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:54:47'),
(56, 16, 'P006', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:55:02'),
(57, 16, 'P007', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:55:30'),
(58, 16, 'P008', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:55:46'),
(59, 16, 'P009', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:56:02'),
(60, 16, 'P010', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:56:47'),
(61, 16, 'P011', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:57:08'),
(62, 16, 'P012', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:57:52'),
(63, 16, 'P013', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:58:10'),
(64, 16, 'P014', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:58:31'),
(65, 16, 'P015', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:58:53'),
(66, 16, 'P016', '-', '-', '74', NULL, 0, 0, 'ade93', '2018-12-04 14:25:08'),
(67, 16, 'P017', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:59:24'),
(68, 16, 'P018', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 16:59:46'),
(69, 16, 'P019', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:00:06'),
(70, 16, 'P020', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:00:22'),
(71, 16, 'P021', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:00:45'),
(72, 16, 'P022', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:01:14'),
(73, 16, 'P023', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:01:33'),
(74, 16, 'P024', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:01:56'),
(75, 16, 'P025', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:02:28'),
(76, 16, 'P026', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:02:54'),
(77, 16, 'P027', '-', '-', '74', NULL, 0, 1, 'ari', '2018-08-18 17:03:09'),
(78, 18, 'P053', '-', '-', '56', NULL, 0, 1, 'melia', '2018-08-12 17:04:23'),
(79, 18, 'P054', '-', '-', '57', NULL, 0, 1, 'init', '2018-06-25 11:57:47'),
(80, 18, 'P055', '-', '-', '58', NULL, 0, 1, 'melia', '2018-08-12 17:06:17'),
(81, 19, 'P047', '-', '-', '78', NULL, 0, 1, 'ari', '2018-08-18 17:25:49'),
(82, 19, 'P048', '-', '-', '78', NULL, 0, 1, 'ari', '2018-08-18 17:26:12'),
(83, 19, 'P049', '-', '-', '78', NULL, 0, 1, 'ari', '2018-08-18 17:26:25'),
(84, 19, 'P050', '-', '-', '78', NULL, 0, 1, 'ari', '2018-08-18 17:26:39'),
(85, 20, 'P051', '-', '-', '79', NULL, 0, 1, 'melia', '2018-09-06 11:51:28'),
(86, 20, 'P052', '-', '-', '79', NULL, 0, 1, 'zaa', '2019-08-27 10:17:18'),
(87, 21, 'P056', '-', '-', '76', NULL, 0, 1, 'ari', '2018-08-18 17:22:27'),
(88, 22, 'P057', '-', '-', '80', NULL, 0, 1, 'melia', '2018-08-18 17:29:58'),
(89, 23, 'P059', '-', '-', '60', NULL, 0, 0, 'zaa', '2019-04-22 15:30:08'),
(90, 24, 'P043', '-', '-', '58', NULL, 0, 1, 'ari', '2018-08-18 18:21:16'),
(91, 24, 'P044', '-', '-', '56', NULL, 0, 1, 'ari', '2018-08-18 18:22:15'),
(92, 25, 'P034', '-', '-', '71', NULL, 0, 0, 'ade93', '2018-12-04 14:41:06'),
(93, 25, 'P035', '-', '-', '71', NULL, 0, 0, 'ade93', '2018-12-04 14:41:14'),
(94, 25, 'P036', '-', '-', '71', NULL, 0, 0, 'ade93', '2018-12-04 14:41:23'),
(95, 26, 'P060', '-', '-', '88', NULL, 0, 1, 'zaa', '2018-10-24 17:33:34'),
(96, 27, 'P063', '-', '-', '57', NULL, 0, 1, 'init', '2018-06-25 11:57:47'),
(97, 28, 'P061', '-', '-', '91', NULL, 0, 1, 'melia', '2018-10-25 14:35:41'),
(98, 16, 'PPA', '', '', '57', NULL, 0, 0, 'zaa', '2020-08-31 10:12:45'),
(99, 17, 'P029', '', '', '61', NULL, 0, 1, 'zaa', '2019-05-14 07:52:30'),
(100, 16, 'P064', '', '', '74', NULL, 0, 1, 'ari', '2018-08-18 17:04:10'),
(102, 17, 'P030', '', '', '61', NULL, 0, 1, 'melia', '2018-08-18 17:12:20'),
(103, 17, 'P031', '', '', '60', NULL, 0, 1, 'melia', '2018-08-18 16:53:46'),
(104, 17, 'P032', '', '', '61', NULL, 0, 0, 'melia', '2018-12-03 11:39:13'),
(105, 17, 'P028', '', '', '61', NULL, 0, 0, 'melia', '2018-12-03 11:39:25'),
(106, 17, 'P029', '', '', '61', NULL, 0, 0, '412IY', '2018-10-22 13:37:23'),
(107, 17, 'P033', '', '', '61', NULL, 0, 0, 'melia', '2018-12-03 11:39:38'),
(108, 17, 'PENDF', '', '', '61', NULL, 0, 1, 'melia', '2018-08-18 17:20:13'),
(109, 5, 'PENDF', '', '', '56', NULL, 0, 0, 'melia', '2018-08-02 15:54:06'),
(110, 17, 'CA', '', '', '56', NULL, 0, 1, 'melia', '2018-08-06 09:18:07'),
(111, 25, 'P037', '', '', '71', NULL, 0, 0, 'ade93', '2018-12-04 14:41:32'),
(112, 25, 'P039', '', '', '75', NULL, 0, 0, 'ade93', '2018-12-06 10:40:53'),
(113, 25, 'P040', '', '', '71', NULL, 0, 0, 'ade93', '2018-12-04 14:41:39'),
(114, 17, 'P045', '', '', '56', NULL, 0, 1, 'ade93', '2018-12-04 14:44:49'),
(115, 13, 'P041', '', '', '62', NULL, 0, 1, 'melia', '2019-01-04 14:53:53'),
(116, 17, 'P038', '081271947293', '', '73', NULL, 0, 1, 'detinadra', '2020-11-05 15:16:21'),
(117, 16, 'P042', '', '', '77', NULL, 0, 1, 'riza94', '2020-12-07 12:53:35'),
(118, 30, 'P062', '', '', '55', NULL, 0, 1, 'riza94', '2020-11-05 15:51:14'),
(119, 18, 'GUD', '', '', '52', NULL, 0, 1, 'melia', '2018-08-10 11:51:50'),
(120, 16, 'CASHOP', '', '', '57', NULL, 0, 1, 'melia', '2018-08-13 10:18:50'),
(121, 7, 'GUDL', '', '', '53', NULL, 0, 0, 'melia', '2018-09-07 13:49:24'),
(122, 16, 'P065', '', '', '74', NULL, 0, 1, 'ari', '2018-08-20 14:25:04'),
(123, 17, 'P066', '', '', '61', NULL, 0, 1, 'melia', '2018-08-20 16:20:06'),
(124, 19, 'P067', '', '', '78', NULL, 0, 1, 'ari', '2018-08-20 18:24:50'),
(125, 2, 'K3', '082177914848', '', '81', NULL, 0, 0, 'melia', '2018-09-06 15:00:02'),
(126, 33, 'KS', '', '', '81', NULL, 0, 1, 'melia', '2018-12-27 16:38:37'),
(127, 16, 'P068', '', '', '74', NULL, 0, 1, 'ari', '2018-09-10 13:33:29'),
(128, 33, 'K3', '', '', '87', NULL, 0, 0, 'melia', '2018-12-28 13:54:55'),
(129, 34, 'SDM', '', '', '89', NULL, 0, 1, 'ade93', '2018-10-25 13:34:05'),
(130, 35, 'KEU01', '', '', '90', NULL, 0, 1, 'rizaa', '2020-03-18 10:46:27'),
(131, 18, 'TIMKES', '', '', '93', NULL, 0, 1, 'melia', '2018-12-03 10:16:14'),
(132, 36, 'P036', '', '', '71', NULL, 0, 0, 'melia', '2018-12-12 14:45:11'),
(133, 36, 'P034', '', '', '71', NULL, 0, 0, 'melia', '2018-12-12 14:45:17'),
(134, 36, 'P035', '', '', '71', NULL, 0, 0, 'melia', '2018-12-12 14:45:23'),
(135, 36, 'P039', '', '', '75', NULL, 0, 0, 'melia', '2018-12-12 14:45:33'),
(136, 17, 'P034', '', '', '71', NULL, 0, 1, 'melia', '2018-12-12 14:53:14'),
(137, 17, 'P035', '', '', '102', NULL, 0, 1, 'zaa', '2019-07-03 15:03:05'),
(138, 17, 'P036', '', '', '101', NULL, 0, 1, 'zaa', '2019-07-03 15:02:41'),
(139, 17, 'P039', '', '', '75', NULL, 0, 1, 'melia', '2018-12-12 14:55:13'),
(140, 3, 'P058', '', '', '94', NULL, 0, 1, 'ade93', '2019-01-30 11:17:16'),
(141, 17, 'CALLC', '', '', '63', NULL, 0, 1, 'zaa', '2019-06-21 18:16:18'),
(142, 17, 'P059', '', '', '95', NULL, 0, 1, 'zaa', '2019-04-22 15:30:48'),
(143, 17, 'PO', '', '', '94', NULL, 0, 1, 'zaa', '2019-04-22 16:08:04'),
(144, 17, 'P037', '', '', '98', NULL, 0, 1, 'zaa', '2019-05-13 10:30:57'),
(145, 17, 'P069', '', '', '61', NULL, 0, 0, 'zaa', '2019-05-14 07:57:00'),
(146, 17, 'P070', '', '', '61', NULL, 0, 0, 'zaa', '2019-05-14 07:57:08'),
(147, 17, 'NEO', '', '', '100', NULL, 0, 1, 'zaa', '2019-06-18 13:46:29'),
(148, 17, 'IBS', '', '', '63', NULL, 0, 1, 'zaa', '2019-06-21 18:11:38'),
(149, 37, 'PPI', '', '', '103', NULL, 0, 1, 'zaa', '2019-07-10 08:36:21'),
(150, 38, 'PKRS', '', '', '105', NULL, 0, 1, 'riza94', '2019-10-07 09:08:14'),
(151, 39, 'CS01', '', '', '106', NULL, 0, 1, 'riza94', '2019-12-19 08:37:10'),
(152, 17, 'RI06', '', '', '107', NULL, 0, 1, 'zaa', '2020-02-06 13:49:14'),
(153, 17, 'RI07', '', '', '108', NULL, 0, 1, 'zaa', '2020-02-06 16:02:34'),
(154, 16, 'PAK', '', '', '57', NULL, 0, 1, 'zaa', '2020-02-24 11:35:25'),
(155, 32, 'PLS01', '', '', '112', NULL, 0, 1, 'riza94', '2020-03-27 14:29:58'),
(156, 17, 'VIP', '', '', '113', NULL, 0, 1, 'zaa', '2020-05-07 13:13:34'),
(157, 17, 'P040', '', '', '114', NULL, 0, 1, 'zaa', '2020-05-08 10:08:51'),
(158, 16, 'paru01', '', '', '74', NULL, 0, 1, 'zaa', '2020-09-10 08:55:12'),
(159, 17, 'IKB', '', '', '95', NULL, 0, 1, 'zaa', '2020-11-02 11:22:21'),
(160, 17, 'lt09', '', '', '117', NULL, 0, 1, 'riza94', '2021-03-26 14:48:12'),
(161, 17, 'isocovigd', '', '', '118', NULL, 0, 1, 'zaa', '2021-05-04 13:45:55'),
(162, 16, 'P0701', '', '', '74', NULL, 0, 0, 'zaa', '2021-06-23 14:52:28'),
(163, 17, 'icucovid', '', '', '119', NULL, 0, 1, 'zaa', '2021-06-09 11:42:36'),
(164, 17, 'nicucovigd', '', '', '120', NULL, 0, 1, 'ivan', '2021-06-14 14:47:05'),
(165, 16, 'phy', '', '', '74', NULL, 0, 1, 'zaa', '2021-09-06 11:18:21'),
(166, 16, 'HV01', '', '', '74', NULL, 0, 1, 'riza94', '2021-11-22 13:53:25'),
(167, 16, 'hv02', '', '', '74', NULL, 0, 1, 'riza94', '2021-11-22 13:53:51'),
(168, 16, 'hv03', '', '', '74', NULL, 0, 1, 'riza94', '2021-11-22 13:54:11'),
(169, 16, 'hemato', '', '', '121', NULL, 0, 1, 'zaa', '2021-12-07 10:54:54'),
(170, 16, 'UM01', '', '', '126', NULL, 0, 1, 'ivan', '2023-03-07 10:35:23'),
(171, 16, 'kba01', '', '', '74', NULL, 0, 1, 'zaa', '2022-05-30 09:35:42'),
(172, 16, 'Ka123', '', '', '74', NULL, 0, 1, 'arfah', '2022-06-11 08:24:49'),
(173, 16, 'BEDAHPLAST', '', '', '74', NULL, 0, 1, 'ivan', '2022-06-24 08:22:00'),
(174, 17, 'pavvip', '', '', '123', NULL, 0, 1, 'zaa', '2022-06-28 09:48:18'),
(175, 16, '2707', '', '', '74', NULL, 0, 1, 'riza94', '2022-07-27 08:36:09'),
(176, 16, 'kgeh01', '', '', '74', NULL, 0, 1, 'arfah', '2022-09-05 09:43:07'),
(177, 16, 'pkbrs', '', '', '124', NULL, 0, 1, 'riza94', '2022-11-17 13:46:35'),
(178, 16, 'tbprognas', '', '', '125', NULL, 0, 1, 'zaa', '2023-01-09 10:22:48'),
(179, 16, 'RO/MDR', '', '', '74', NULL, 0, 1, 'riza94', '2023-02-10 14:25:41'),
(180, 16, 'KRM', '', '', '74', NULL, 0, 1, 'ivan', '2023-03-03 10:21:40'),
(181, 17, 'RIIGD', '', '', '59', NULL, 0, 1, 'riza94', '2023-05-18 08:09:54'),
(182, 16, 'KSK01', '', '', '74', NULL, 0, 1, 'riza94', '2023-07-24 14:59:57'),
(183, 16, '0123', '', '', '74', NULL, 0, 1, 'arfah', '2023-08-14 13:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `m_unit_item`
--

CREATE TABLE `m_unit_item` (
  `ServiceUnitID` int NOT NULL,
  `ItemID` int NOT NULL,
  `LastUpdatedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastUpdatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `level_user` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `dokter_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `perawat_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `service_room` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `site` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_active_by` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `user_active_at` datetime DEFAULT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `user_deleted_by` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `user_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_user`, `name`, `username`, `email_verified_at`, `password`, `dokter_id`, `perawat_id`, `service_room`, `is_active`, `site`, `remember_token`, `created_at`, `updated_at`, `user_active_by`, `user_active_at`, `is_deleted`, `user_deleted_by`, `user_deleted_at`) VALUES
(1, 'adminregister', 'Administrator 1', 'adminregister', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, 1, NULL, NULL, '2021-11-21 19:36:21', NULL, NULL, 0, NULL, NULL),
(2, 'dokter', 'dr.. Diah  Syafriani  ,Sp.PD, KP, FINASIM', 'dr_diah', NULL, '$2y$10$6tOG/zr8ju/bSYhBV9Dny.RXP7Q3lAzqNOuSDlzanOK9EnnUePgA.', 'A0010', NULL, '110', 1, 1, NULL, '2021-11-16 19:59:41', '2021-11-24 00:10:40', NULL, NULL, 0, NULL, NULL),
(3, 'perawat', 'Stela Putri', 'stela', NULL, '$2y$10$IoxZ2rofwRCO7yHQ3uZfpuZ6UUa.OBEKv4NKZ8LzrmmSmKnaXe/7e', NULL, 'PRX000', '227', 1, 1, NULL, '2021-11-16 19:59:58', '2021-11-22 00:13:46', NULL, NULL, 0, NULL, NULL),
(4, 'pendaftaran', 'Ayu Prihatiningsih', 'ayu', NULL, '$2y$10$5Anr4l0mNHs3ezvzPzDu6.tKX5xduZCG0WeQa0zVj9s3.IlX9osOC', NULL, NULL, NULL, 1, 1, NULL, '2021-11-16 20:00:13', '2021-11-16 20:05:35', NULL, NULL, 0, NULL, NULL),
(5, 'lab', 'Eliza Froze', 'elisa', NULL, '$2y$10$Zv/fzJ.l8/rAFyFQs6r5gOcXXTc0bpynyUi2rtTg2d/6kfGrgIOA6', NULL, NULL, NULL, 1, 1, NULL, '2021-11-16 20:00:35', '2023-10-20 01:39:04', 'Administrator 2', '2023-10-20 08:39:04', 0, NULL, NULL),
(6, 'radiologi', 'Juliette Parker', 'juli', NULL, '$2y$10$2X603Ao6hAA1VGHspgAdhusZS5GeXpxqcMxw9NbAKulIv0m7jmlQi', NULL, NULL, NULL, 1, 1, NULL, '2021-11-16 20:01:17', '2021-11-20 22:36:17', NULL, NULL, 0, NULL, NULL),
(8, 'dokter', 'dr. Muhammad Khalif Anfasa, Sp.OG', 'khalif', NULL, '$2y$10$IoxZ2rofwRCO7yHQ3uZfpuZ6UUa.OBEKv4NKZ8LzrmmSmKnaXe/7e', 'A0006', NULL, '227', 1, 1, NULL, '2021-11-16 22:24:47', '2021-11-21 23:25:29', NULL, NULL, 0, NULL, NULL),
(9, 'fisioterapis', 'Jane Doe', 'jane', NULL, '$2y$10$m5S/LsSFy754qlQDrUns.eSty/.czLVq5m.lUqO.gWcGiGFE6005C', NULL, NULL, 'fisio', 1, 1, NULL, '2021-11-21 19:36:52', '2021-11-21 20:43:09', NULL, NULL, 0, NULL, NULL),
(10, 'adminmaster', 'Administrator 2', 'adminmaster', NULL, '$2y$10$mkHof/DHnu.jWsXKPZeLD.bKlbZ9nE.tAUHhLlzgo0GmmS10f1wQu', NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-10-17 03:10:27', NULL, NULL, 0, NULL, NULL),
(11, 'kasir', 'kasir', 'kasir', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(12, 'admin_nurse', 'admin nurse', 'adminnurse', NULL, '$2y$10$IoxZ2rofwRCO7yHQ3uZfpuZ6UUa.OBEKv4NKZ8LzrmmSmKnaXe/7e', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(13, 'dokter', 'dr. Ayu Parameswari, Sp.KK', 'ayu', NULL, '$2y$10$IoxZ2rofwRCO7yHQ3uZfpuZ6UUa.OBEKv4NKZ8LzrmmSmKnaXe/7e', 'A0013', 'A0013', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(14, 'dokter', 'dr. Elly Asriah, Sp.M', 'elly', NULL, '$2y$10$SZB0cuWb0gC6nJnPGbwIUuBsK8AbomxIJ83uPZ5BE2qiFJHUTVKFK', 'A0014', 'A0014', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(15, 'dokter', 'dr. Ajeng Intan Estrie Amanda', 'ajeng', NULL, '$2y$10$XjjVdrK1zlbCke3zEO3cge6b0CuvV3L..sd22gYI3WVTz2QZRQYo2', 'A0016', 'A0016', NULL, 1, NULL, NULL, NULL, '2023-11-16 03:22:54', 'Administrator 2', '2023-11-16 10:22:54', 0, NULL, NULL),
(16, 'radiologi', 'Mutiara', 'mutiara', NULL, '$2y$10$yr3KpyU0yPRbLrYORUGpxOuu7XsRam5YyaidiJ2HY6l7d7ynv0tmW', 'A0237', 'A0237', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(17, 'radiologi', 'Weni Rahma', 'adminmaster', NULL, '$2y$10$cyr9AXnCsuKnmp.MQvTnO.vE3n/VYmiBRH.c989C8dj7jEP2E2kku', 'A0043', 'A0043', NULL, 0, NULL, NULL, NULL, '2023-10-19 07:34:29', 'Administrator 2', '2023-10-19 14:34:20', 1, 'Administrator 2', '2023-10-19 14:34:29'),
(18, 'dietitian', 'Stela Putri2', 'stela2', NULL, '$2y$10$IoxZ2rofwRCO7yHQ3uZfpuZ6UUa.OBEKv4NKZ8LzrmmSmKnaXe/7e', NULL, 'PRX000', '227', 1, 1, NULL, '2021-11-16 19:59:58', '2021-11-22 00:13:46', NULL, NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesspartner`
--
ALTER TABLE `businesspartner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesspartner_address`
--
ALTER TABLE `businesspartner_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate`
--
ALTER TABLE `corporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customercontract`
--
ALTER TABLE `customercontract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketersediaan_ruangan`
--
ALTER TABLE `ketersediaan_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bed`
--
ALTER TABLE `m_bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `m_clinical_pathway`
--
ALTER TABLE `m_clinical_pathway`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_path_UNIQUE` (`kode_path`);

--
-- Indexes for table `m_detail_orders`
--
ALTER TABLE `m_detail_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_diagnosis`
--
ALTER TABLE `m_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_gejala`
--
ALTER TABLE `m_gejala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`);

--
-- Indexes for table `m_intervention`
--
ALTER TABLE `m_intervention`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `m_kelas_ruangan_baru`
--
ALTER TABLE `m_kelas_ruangan_baru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_medicine`
--
ALTER TABLE `m_medicine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`);

--
-- Indexes for table `m_orders`
--
ALTER TABLE `m_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_outcome`
--
ALTER TABLE `m_outcome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_paramedis`
--
ALTER TABLE `m_paramedis`
  ADD PRIMARY KEY (`ParamedicID`);

--
-- Indexes for table `m_pasien`
--
ALTER TABLE `m_pasien`
  ADD PRIMARY KEY (`MedicalNo`);

--
-- Indexes for table `m_physician_team`
--
ALTER TABLE `m_physician_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_poliklinik`
--
ALTER TABLE `m_poliklinik`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `m_registrasi`
--
ALTER TABLE `m_registrasi`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `m_room_class`
--
ALTER TABLE `m_room_class`
  ADD PRIMARY KEY (`ClassCode`);

--
-- Indexes for table `m_ruangan`
--
ALTER TABLE `m_ruangan`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `m_ruangan_baru`
--
ALTER TABLE `m_ruangan_baru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tarif`
--
ALTER TABLE `m_tarif`
  ADD PRIMARY KEY (`tarif_id`);

--
-- Indexes for table `m_unit`
--
ALTER TABLE `m_unit`
  ADD PRIMARY KEY (`ServiceUnitCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesspartner`
--
ALTER TABLE `businesspartner`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesspartner_address`
--
ALTER TABLE `businesspartner_address`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `corporate`
--
ALTER TABLE `corporate`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customercontract`
--
ALTER TABLE `customercontract`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ketersediaan_ruangan`
--
ALTER TABLE `ketersediaan_ruangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `m_clinical_pathway`
--
ALTER TABLE `m_clinical_pathway`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_detail_orders`
--
ALTER TABLE `m_detail_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_diagnosis`
--
ALTER TABLE `m_diagnosis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_gejala`
--
ALTER TABLE `m_gejala`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_intervention`
--
ALTER TABLE `m_intervention`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_item`
--
ALTER TABLE `m_item`
  MODIFY `item_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_kelas_ruangan_baru`
--
ALTER TABLE `m_kelas_ruangan_baru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_medicine`
--
ALTER TABLE `m_medicine`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_orders`
--
ALTER TABLE `m_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_outcome`
--
ALTER TABLE `m_outcome`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_paramedis`
--
ALTER TABLE `m_paramedis`
  MODIFY `ParamedicID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1632;

--
-- AUTO_INCREMENT for table `m_physician_team`
--
ALTER TABLE `m_physician_team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_poliklinik`
--
ALTER TABLE `m_poliklinik`
  MODIFY `RoomID` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_ruangan`
--
ALTER TABLE `m_ruangan`
  MODIFY `RoomID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `m_ruangan_baru`
--
ALTER TABLE `m_ruangan_baru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_tarif`
--
ALTER TABLE `m_tarif`
  MODIFY `tarif_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
