-- SQLINES DEMO ***  Distrib 8.0.30, for Win64 (x86_64)
--
-- SQLINES DEMO ***   Database: rs_ranap
-- SQLINES DEMO *** -------------------------------------
-- SQLINES DEMO *** 0.30

/* SQLINES DEMO *** ARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/* SQLINES DEMO *** ARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/* SQLINES DEMO *** LLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/* SQLINES DEMO *** tf8mb4 */
;
/* SQLINES DEMO *** ME_ZONE=@@TIME_ZONE */
;
/* SQLINES DEMO *** NE='+00:00' */
;
/* SQLINES DEMO *** IQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/* SQLINES DEMO *** REIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/* SQLINES DEMO *** L_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/* SQLINES DEMO *** L_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- SQLINES DEMO *** or table `activity_daily_living_anak`
--

DROP TABLE IF EXISTS activity_daily_living_anak;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;
-- SQLINES FOR EVALUATION USE ONLY (14 DAYS)
CREATE TABLE activity_daily_living_anak (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    rangsang_bab smallint DEFAULT NULL,
    rangsang_bak smallint DEFAULT NULL,
    membersihkan_diri smallint DEFAULT NULL,
    penggunaan_wc smallint DEFAULT NULL,
    makan_minum smallint DEFAULT NULL,
    bergerak_kursi_roda smallint DEFAULT NULL,
    berjalan smallint DEFAULT NULL,
    berpakaian smallint DEFAULT NULL,
    tangga smallint DEFAULT NULL,
    mandi smallint DEFAULT NULL,
    total_skor_adl int DEFAULT NULL,
    created_by varchar(100) DEFAULT NULL,
    updated_by varchar(100) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `assesment_awal_dokter`
--

DROP TABLE IF EXISTS assesment_awal_dokter;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE assesment_awal_dokter (
    id int NOT NULL IDENTITY,
    no_reg varchar(150) NOT NULL,
    anamnesis varchar(100) DEFAULT NULL,
    keluhan_utama varchar(200) DEFAULT NULL,
    riwayat_penyakit_sekarang varchar(200) DEFAULT NULL,
    riwayat_penyakit_dahulu varchar(200) DEFAULT NULL,
    riwayat_pengobatan varchar(200) DEFAULT NULL,
    riwayat_penyakit_keluarga varchar(200) DEFAULT NULL,
    pemeriksaan_multi_organ varchar(100) DEFAULT NULL,
    toraks varchar(200) DEFAULT NULL,
    jantung varchar(200) DEFAULT NULL,
    abdomen varchar(100) DEFAULT NULL,
    ekstremitas_atas_bawah varchar(200) DEFAULT NULL,
    genetalia_dan_anus varchar(200) DEFAULT NULL,
    hasil_pemeriksaan_penunjang varchar(200) DEFAULT NULL,
    daftar_masalah_medik varchar(200) DEFAULT NULL,
    tata_laksana_awal varchar(200) DEFAULT NULL,
    tanggal_pemberian date DEFAULT NULL,
    deleted int NOT NULL DEFAULT '0',
    dokter_id varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `assesment_dewasa`
--

DROP TABLE IF EXISTS assesment_dewasa;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE assesment_dewasa (
    asdew_id bigint check (asdew_id > 0) NOT NULL IDENTITY,
    asdew_reg varchar(255) DEFAULT NULL,
    asdew_sensori varchar(255) DEFAULT NULL,
    asdew_lembab varchar(255) DEFAULT NULL,
    asdew_aktivitas varchar(255) DEFAULT NULL,
    asdew_nutrisi varchar(255) DEFAULT NULL,
    asdew_friksi varchar(255) DEFAULT NULL,
    asdew_skor_braden varchar(255) DEFAULT NULL,
    asdew_kategori varchar(255) DEFAULT NULL,
    asdew_luka varchar(255) DEFAULT NULL,
    asdew_rom varchar(255) DEFAULT NULL,
    asdew_deformitas varchar(255) DEFAULT NULL,
    asdew_deformitas_lainnya varchar(255) DEFAULT NULL,
    asdew_ggtidur varchar(255) DEFAULT NULL,
    asdew_ggtidur_lainnya varchar(255) DEFAULT NULL,
    asdew_keluhan varchar(max),
    asdew_keluhan_lainnya varchar(255) DEFAULT NULL,
    asdew_haus varchar(255) DEFAULT NULL,
    asdew_mukosa varchar(255) DEFAULT NULL,
    asdew_tugor varchar(255) DEFAULT NULL,
    asdew_edema varchar(255) DEFAULT NULL,
    asdew_bab_kali varchar(255) DEFAULT NULL,
    asdew_bab varchar(255) DEFAULT NULL,
    asdew_keluhan_bab varchar(255) DEFAULT NULL,
    asdew_keluhan_bab_lainnya varchar(255) DEFAULT NULL,
    asdew_feces varchar(255) DEFAULT NULL,
    asdew_feces_lainnya varchar(255) DEFAULT NULL,
    asdew_frekuensi_bak varchar(255) DEFAULT NULL,
    asdew_jumlah_bak varchar(255) DEFAULT NULL,
    asdew_warna_urin varchar(255) DEFAULT NULL,
    asdew_keluhan_bak varchar(255) DEFAULT NULL,
    asdew_keluhan_bak_lainnya varchar(255) DEFAULT NULL,
    asdew_bahasa varchar(255) DEFAULT NULL,
    asdew_bahasa_lainnya varchar(255) DEFAULT NULL,
    asdew_penterjemah varchar(255) DEFAULT NULL,
    asdew_pendidikan varchar(255) DEFAULT NULL,
    asdew_pendidikan_lainnya varchar(255) DEFAULT NULL,
    asdew_baca varchar(255) DEFAULT NULL,
    asdew_belajar varchar(255) DEFAULT NULL,
    asdew_budaya varchar(255) DEFAULT NULL,
    asdew_hambatan varchar(max),
    asdew_hambatan_lainnya varchar(255) DEFAULT NULL,
    asdew_user int DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    asdew_mobilitas varchar(255) DEFAULT NULL,
    PRIMARY KEY (asdew_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `assesment_gizi_dewasa`
--

DROP TABLE IF EXISTS assesment_gizi_dewasa;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE assesment_gizi_dewasa (
    dewasa_id bigint check (dewasa_id > 0) NOT NULL IDENTITY,
    dewasa_reg varchar(255) DEFAULT NULL,
    dewasa_bb varchar(255) DEFAULT NULL,
    dewasa_tl varchar(255) DEFAULT NULL,
    dewasa_lla varchar(255) DEFAULT NULL,
    dewasa_tb varchar(255) DEFAULT NULL,
    dewasa_imt varchar(255) DEFAULT NULL,
    dewasa_lla_lainnya varchar(255) DEFAULT NULL,
    dewasa_biokimia varchar(255) DEFAULT NULL,
    dewasa_fisik varchar(255) DEFAULT NULL,
    dewasa_riwayat_dahulu varchar(max),
    dewasa_riwayat_sekarang varchar(max),
    dewasa_panenteral varchar(255) DEFAULT NULL,
    dewasa_panenteral_lainnya varchar(255) DEFAULT NULL,
    dewasa_sekarang_lainnya varchar(max),
    dewasa_lain_lain varchar(255) DEFAULT NULL,
    dewasa_penyakit_dahulu varchar(max),
    dewasa_penyakit_dahulu_lainnya varchar(255) DEFAULT NULL,
    dewasa_penyakit_sekarang varchar(255) DEFAULT NULL,
    dewasa_diet varchar(255) DEFAULT NULL,
    dewasa_diet_preskripsi varchar(255) DEFAULT NULL,
    dewasa_tindak_lanjut varchar(max),
    dewasa_user varchar(max),
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    bbi varchar(255) DEFAULT NULL,
    PRIMARY KEY (dewasa_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `asuhan_gizi_dewasa`
--

DROP TABLE IF EXISTS asuhan_gizi_dewasa;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE asuhan_gizi_dewasa (
    asdewasa_id bigint check (asdewasa_id > 0) NOT NULL IDENTITY,
    asdewasa_reg varchar(255) DEFAULT NULL,
    asdewasa_assesment varchar(max),
    asdewasa_diagnosa varchar(max),
    asdewasa_tujuan varchar(max),
    asdewasa_energi varchar(255) DEFAULT NULL,
    asdewasa_protein varchar(255) DEFAULT NULL,
    asdewasa_kh varchar(255) DEFAULT NULL,
    asdewasa_rute varchar(255) DEFAULT NULL,
    asdewasa_jenis_makanan varchar(255) DEFAULT NULL,
    asdewasa_frekuensi varchar(255) DEFAULT NULL,
    asdewasa_jadwal_makanan varchar(255) DEFAULT NULL,
    asdewasa_monitoring_evaluasi varchar(max),
    asdewasa_user varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    asdewasa_lemak varchar(255) DEFAULT NULL,
    PRIMARY KEY (asdewasa_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `businesspartner`
--

DROP TABLE IF EXISTS businesspartner;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE businesspartner (
    id bigint check (id > 0) NOT NULL IDENTITY,
    BusinessPartnerCode varchar(255) NOT NULL,
    BusinessPartnerName varchar(255) NOT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Initial varchar(255) DEFAULT NULL,
    BusinessPartnerType int DEFAULT NULL,
    ContactPerson1Name varchar(255) DEFAULT NULL,
    ContactPerson1PhoneNo varchar(255) DEFAULT NULL,
    ContactPerson2Name varchar(255) DEFAULT NULL,
    ContactPerson2PhoneNo varchar(255) DEFAULT NULL,
    IsTaxRegistrant int DEFAULT NULL,
    TaxRegistrantNo varchar(255) DEFAULT NULL,
    TermCode varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `businesspartner_address`
--

DROP TABLE IF EXISTS businesspartner_address;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE businesspartner_address (
    id bigint check (id > 0) NOT NULL IDENTITY,
    businesspartner_id bigint NOT NULL,
    GCAddressType varchar(255) NOT NULL,
    Line1 varchar(255) NOT NULL,
    Line2 varchar(255) DEFAULT NULL,
    District varchar(255) DEFAULT NULL,
    City varchar(255) NOT NULL,
    Province varchar(255) NOT NULL,
    ZipCode varchar(255) DEFAULT NULL,
    Country varchar(255) NOT NULL,
    PhoneNo1 varchar(255) DEFAULT NULL,
    PhoneNo2 varchar(255) DEFAULT NULL,
    FaxNo1 varchar(255) DEFAULT NULL,
    FaxNo2 varchar(255) DEFAULT NULL,
    Email1 varchar(255) DEFAULT NULL,
    Email2 varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `case_manager`
--

DROP TABLE IF EXISTS case_manager;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE case_manager (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    identifikasi_masalah varchar(max),
    keadaan_fungsional varchar(255) DEFAULT NULL,
    riwayat_kesehatan varchar(255) DEFAULT NULL,
    perilaku_psiko_sosial varchar(255) DEFAULT NULL,
    masalah_isu_sosial varchar(255) DEFAULT NULL,
    kendala_pembiayaan varchar(255) DEFAULT NULL,
    kebutuhan_discharge varchar(255) DEFAULT NULL,
    potensi_penundaan varchar(255) DEFAULT NULL,
    potensi_komplain varchar(255) DEFAULT NULL,
    perencanaan_manegemen varchar(255) DEFAULT NULL,
    target_hasil varchar(255) DEFAULT NULL,
    tanggal_ttd datetime2 (0) NULL DEFAULT NULL,
    ttd_perawat varchar(max),
    perawat_name varchar(255) DEFAULT NULL,
    ttd_pasien varchar(max),
    pasien_name varchar(255) DEFAULT NULL,
    ttd_saksi varchar(max),
    saksi_name varchar(255) DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `case_manager_akumulasi`
--

DROP TABLE IF EXISTS case_manager_akumulasi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE case_manager_akumulasi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    tgl_akumulasi varchar(255) DEFAULT NULL,
    pelaksanaan varchar(255) DEFAULT NULL,
    hasil varchar(255) DEFAULT NULL,
    terminasi varchar(255) DEFAULT NULL,
    tgl_ttd varchar(255) DEFAULT NULL,
    ttd_perawat varchar(max),
    perawat_name varchar(255) DEFAULT NULL,
    ttd_pasien varchar(max),
    pasien_name varchar(255) DEFAULT NULL,
    ttd_saksi varchar(max),
    saksi_name varchar(255) DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `cathlab`
--

DROP TABLE IF EXISTS cathlab;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE cathlab (
    cathlab_id bigint check (cathlab_id > 0) NOT NULL IDENTITY,
    cathlab_reg varchar(255) NOT NULL,
    cathlab_data varchar(max),
    cathlab_deleted int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (cathlab_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `corporate`
--

DROP TABLE IF EXISTS corporate;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE corporate (
    id bigint check (id > 0) NOT NULL IDENTITY,
    businesspartner_id bigint NOT NULL,
    BusinessPartnerName varchar(255) NOT NULL,
    GCInsuranceType varchar(255) DEFAULT NULL,
    GCCustomerType varchar(255) NOT NULL,
    CreditLimit decimal(20, 10) NOT NULL,
    CreditBalance decimal(20, 10) NOT NULL,
    IsBlackList int NOT NULL DEFAULT '0',
    BlackListReason varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `customercontract`
--

DROP TABLE IF EXISTS customercontract;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE customercontract (
    id bigint check (id > 0) NOT NULL IDENTITY,
    DocumentNo varchar(255) DEFAULT NULL,
    DocumentDate date DEFAULT NULL,
    ContractNo varchar(255) NOT NULL,
    RevisionNo varchar(255) DEFAULT NULL,
    ContractSummary varchar(max) NOT NULL,
    StartingDate date NOT NULL,
    EndingDate date NOT NULL,
    GCCoverageType varchar(255) NOT NULL,
    businesspartner_id bigint NOT NULL,
    BusinessPartnerName varchar(255) NOT NULL,
    billto_businesspartner_id bigint NOT NULL,
    billto_BusinessPartnerName varchar(255) NOT NULL,
    HospitalSigned_id varchar(255) NOT NULL,
    HospitalSigned_name varchar(255) NOT NULL,
    CorporateSigned_id bigint NOT NULL,
    CorporateSigned_name varchar(255) NOT NULL,
    GCCoverAdministrationType varchar(255) NOT NULL,
    AdministrationFeePercentage decimal(20, 10) NOT NULL,
    IsAdministrationChargesByClass int NOT NULL DEFAULT '0',
    MinAdministration decimal(20, 10) NOT NULL,
    MaxAdministration decimal(20, 10) NOT NULL,
    GCCoverCitoType varchar(255) NOT NULL,
    CitoPercentage decimal(20, 10) NOT NULL,
    GCCoverComplicationType varchar(255) NOT NULL,
    ComplicationPercentage decimal(20, 10) NOT NULL,
    GCCoverCitoComplicationType varchar(255) NOT NULL,
    CitoComplicationPercentage decimal(20, 10) NOT NULL,
    IsDiscountInCorporateInvoice int NOT NULL DEFAULT '0',
    DiscountCorporateInvoice decimal(20, 10) NOT NULL,
    TransactionCode varchar(255) DEFAULT NULL,
    SiteCode varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `dokumen_kelengkapan_pasien`
--

DROP TABLE IF EXISTS dokumen_kelengkapan_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE dokumen_kelengkapan_pasien (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    nama_dokumen varchar(255) DEFAULT NULL,
    file_path varchar(255) NOT NULL,
    catatan varchar(max),
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `dokumen_tindakan`
--

DROP TABLE IF EXISTS dokumen_tindakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE dokumen_tindakan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    nama_dokumen varchar(255) DEFAULT NULL,
    file_path varchar(255) NOT NULL,
    catatan varchar(max),
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `failed_jobs`
--

DROP TABLE IF EXISTS failed_jobs;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE failed_jobs (
    id bigint check (id > 0) NOT NULL IDENTITY,
    uuid varchar(255) NOT NULL,
    connection varchar(max) NOT NULL,
    queue varchar(max) NOT NULL,
    payload varchar(max) NOT NULL,
    exception varchar(max) NOT NULL,
    failed_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    PRIMARY KEY (id),
    CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `fluid_balance`
--

DROP TABLE IF EXISTS fluid_balance;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE fluid_balance (
    id int NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    intake varchar(30) check (
        intake in (
            'transfusi',
            'makan',
            'parental',
            'komulatif',
            'output',
            'fluid_balance'
        )
    ) NOT NULL,
    jenis varchar(255) NOT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    med_rec varchar(100) DEFAULT NULL,
    PRIMARY KEY (id)
);

CREATE INDEX no_reg ON fluid_balance (reg_no);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `fluid_balance_data`
--

DROP TABLE IF EXISTS fluid_balance_data;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE fluid_balance_data (
    id int NOT NULL IDENTITY,
    fluid_balance_id int NOT NULL,
    data varchar(max) NOT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    PRIMARY KEY (id)
);

CREATE INDEX fluid_balance_id ON fluid_balance_data (fluid_balance_id);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `fluid_balance_data_baru`
--

DROP TABLE IF EXISTS fluid_balance_data_baru;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE fluid_balance_data_baru (
    id int NOT NULL IDENTITY,
    cairan_transfusi varchar(200) DEFAULT NULL,
    jumlah_cairan int DEFAULT NULL,
    minum varchar(200) DEFAULT NULL,
    sonde varchar(200) DEFAULT NULL,
    urine varchar(150) DEFAULT NULL,
    drain varchar(150) DEFAULT NULL,
    iwl_muntah varchar(100) DEFAULT NULL,
    jumlah int DEFAULT NULL,
    nama_perawat varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    no_reg varchar(150) NOT NULL,
    med_rec varchar(150) NOT NULL,
    balance varchar(10) DEFAULT NULL,
    tanggal_waktu_pemberian datetime2 (0) NULL DEFAULT NULL,
    shift varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `form_a`
--

DROP TABLE IF EXISTS form_a;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE form_a (
    id int NOT NULL IDENTITY,
    reg_no varchar(250) DEFAULT NULL,
    m_form_a_id int check (m_form_a_id > 0) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `gejala`
--

DROP TABLE IF EXISTS gejala;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE gejala (
    id int NOT NULL IDENTITY,
    gejala varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `h_jam_dts`
--

DROP TABLE IF EXISTS h_jam_dts;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE h_jam_dts (
    id bigint check (id > 0) NOT NULL IDENTITY,
    jam_id int NOT NULL,
    label int NOT NULL,
    urutan int NOT NULL,
    is_active int NOT NULL DEFAULT '1',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `h_jams`
--

DROP TABLE IF EXISTS h_jams;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE h_jams (
    id bigint check (id > 0) NOT NULL IDENTITY,
    label varchar(50) NOT NULL,
    is_active int NOT NULL DEFAULT '1',
    is_full int NOT NULL DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `history_paket`
--

DROP TABLE IF EXISTS history_paket;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE history_paket (
    no_reg varchar(200) NOT NULL,
    item_code varchar(200) DEFAULT NULL,
    item_name varchar(200) DEFAULT NULL,
    price varchar(200) DEFAULT NULL,
    rincian_paket varchar(max),
    PRIMARY KEY (no_reg)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `icd10_bpjs`
--

DROP TABLE IF EXISTS icd10_bpjs;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE icd10_bpjs (
    ID_ICD10 varchar(255) NOT NULL,
    NM_ICD10 varchar(255) DEFAULT NULL,
    PRIMARY KEY (ID_ICD10)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `icd9cm_bpjs`
--

DROP TABLE IF EXISTS icd9cm_bpjs;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE icd9cm_bpjs (
    ID varchar(20) DEFAULT NULL,
    ID_TIND varchar(255) NOT NULL,
    KET_TINDAKAN varchar(255) DEFAULT NULL,
    NM_TINDAKAN varchar(255) DEFAULT NULL,
    PARENT_ID_TIND varchar(255) DEFAULT NULL,
    PRIMARY KEY (ID_TIND)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `ih_gkps`
--

DROP TABLE IF EXISTS ih_gkps;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE ih_gkps (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    reg_medrec varchar(255) NOT NULL,
    gkp_date date NOT NULL,
    gkp_time time(0) NOT NULL,
    gkp varchar(max) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `ih_tanda_vitals`
--

DROP TABLE IF EXISTS ih_tanda_vitals;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE ih_tanda_vitals (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    reg_medrec varchar(255) NOT NULL,
    tanda_vital_date date NOT NULL,
    tanda_vital_time time(0) NOT NULL,
    tanda_vital varchar(max) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `job_orders`
--

DROP TABLE IF EXISTS job_orders;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE job_orders (
    id int NOT NULL IDENTITY,
    reg_no varchar(200) DEFAULT NULL,
    order_no varchar(200) DEFAULT NULL,
    kode_dokter varchar(200) DEFAULT NULL,
    waktu_order varchar(200) DEFAULT NULL,
    service_unit varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    id_cppt varchar(255) DEFAULT NULL,
    dikirim_ke_farmasi int DEFAULT NULL,
    status_kirim varchar(max),
    catatan_dokter varchar(max),
    bentuk_obat varchar(255) DEFAULT NULL,
    rute varchar(255) DEFAULT NULL,
    obat_pulang int DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `job_orders_dt`
--

DROP TABLE IF EXISTS job_orders_dt;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE job_orders_dt (
    id int NOT NULL IDENTITY,
    reg_no varchar(200) DEFAULT NULL,
    order_no varchar(200) DEFAULT NULL,
    item_code varchar(200) DEFAULT NULL,
    jenis_order varchar(150) NOT NULL,
    item_name varchar(200) NOT NULL,
    qty int DEFAULT NULL,
    flag varchar(200) DEFAULT NULL,
    temp_flag varchar(10) DEFAULT NULL,
    temp_flag_racikan int DEFAULT NULL,
    dosis varchar(100) DEFAULT NULL,
    hari varchar(200) DEFAULT NULL,
    durasi_hari varchar(200) DEFAULT NULL,
    harga_jual int DEFAULT NULL,
    ket_dosis varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    id_cppt varchar(255) DEFAULT NULL,
    harga_awal float DEFAULT NULL,
    dosis_kode varchar(255) DEFAULT NULL,
    flag_racikan int DEFAULT NULL,
    instruksi_khusus varchar(max),
    dokter_order varchar(255) DEFAULT NULL,
    deleted int DEFAULT NULL,
    deleted_by int DEFAULT NULL,
    deleted_at datetime2 (0) DEFAULT NULL,
    deleted_requester varchar(max),
    deleted_reason varchar(max),
    jumlah_perhari int DEFAULT NULL,
    obat_pulang int DEFAULT NULL,
    created_by_id int DEFAULT NULL,
    created_by_name varchar(255) DEFAULT NULL,
    non_bpjs int NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `keperawatan_pra_tindakan`
--

DROP TABLE IF EXISTS keperawatan_pra_tindakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE keperawatan_pra_tindakan (
    pra_id bigint check (pra_id > 0) NOT NULL IDENTITY,
    pra_reg varchar(255) NOT NULL,
    pra_data varchar(max),
    pra_deleted int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pra_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_form_a`
--

DROP TABLE IF EXISTS m_form_a;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_form_a (
    id int NOT NULL IDENTITY,
    section varchar(30) check (section in ('1', '2', '3')) NOT NULL,
    category varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `medicine`
--

DROP TABLE IF EXISTS medicine;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE medicine (
    id int NOT NULL IDENTITY,
    kode varchar(50) NOT NULL,
    nama varchar(250) NOT NULL,
    harga int NOT NULL,
    stok int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `migrations`
--

DROP TABLE IF EXISTS migrations;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE migrations (
    id int check (id > 0) NOT NULL IDENTITY,
    migration varchar(255) NOT NULL,
    batch int NOT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `monitoring_news`
--

DROP TABLE IF EXISTS monitoring_news;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE monitoring_news (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    user_id bigint check (user_id > 0) NOT NULL,
    aktual_pernafasaan varchar(255) DEFAULT NULL,
    aktual_saturasi_oksigen varchar(255) DEFAULT NULL,
    pernafasaan int NOT NULL,
    saturasi_oksigen int NOT NULL,
    o2_tambahan int NOT NULL,
    aktual_suhu varchar(255) DEFAULT NULL,
    suhu int NOT NULL,
    aktual_tekanan_darah varchar(255) DEFAULT NULL,
    tekanan_darah int NOT NULL,
    aktual_nadi varchar(255) DEFAULT NULL,
    nadi int NOT NULL,
    tingkat_kesadaran int NOT NULL,
    news_total int NOT NULL,
    news_kategori varchar(255) NOT NULL,
    news_gula_darah varchar(255) NOT NULL,
    news_analisa_gas_darah varchar(255) NOT NULL,
    news_penilaian_tik varchar(255) NOT NULL,
    tanggal_dan_waktu varchar(255) NOT NULL,
    shift varchar(255) DEFAULT NULL,
    created_at datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `monitoring_transfusi_darah`
--

DROP TABLE IF EXISTS monitoring_transfusi_darah;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE monitoring_transfusi_darah (
    id bigint check (id > 0) NOT NULL IDENTITY,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    reg_medrec varchar(255) DEFAULT NULL,
    reg_no varchar(255) DEFAULT NULL,
    nomor_kantong varchar(255) DEFAULT NULL,
    golongan_darah varchar(255) DEFAULT NULL,
    jenis_darah varchar(255) DEFAULT NULL,
    tanggal_kadarluarsa varchar(255) DEFAULT NULL,
    penerima_darah varchar(255) DEFAULT NULL,
    waktu_transfusi varchar(255) DEFAULT NULL,
    keadaan_umum varchar(255) DEFAULT NULL,
    suhu_tubuh varchar(255) DEFAULT NULL,
    nadi varchar(255) DEFAULT NULL,
    tekanan_darah varchar(255) DEFAULT NULL,
    respiratory_rate varchar(255) DEFAULT NULL,
    volume_warna_urin varchar(255) DEFAULT NULL,
    gejala_reaksi_transfusi varchar(255) DEFAULT NULL,
    pilihan_menit varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `nurse_note`
--

DROP TABLE IF EXISTS nurse_note;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE nurse_note (
    id int NOT NULL IDENTITY,
    reg_no varchar(150) NOT NULL,
    med_rec varchar(150) NOT NULL,
    id_nurse varchar(150) DEFAULT NULL,
    catatan varchar(max),
    tgl_note date DEFAULT NULL,
    jam_note time(0) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    ttd_perawat varchar(max),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `nursing_drugs`
--

DROP TABLE IF EXISTS nursing_drugs;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE nursing_drugs (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    item_obat varchar(max),
    tgl_pemberian date DEFAULT NULL,
    cara_pemberian varchar(100) DEFAULT NULL,
    antibiotik varchar(100) DEFAULT NULL,
    nama_dokter varchar(255) DEFAULT NULL,
    kode_dokter varchar(100) DEFAULT NULL,
    waktu_pemberian varchar(max),
    shift varchar(100) DEFAULT NULL,
    created_by_name varchar(255) DEFAULT NULL,
    created_by varchar(100) DEFAULT NULL,
    deleted_by varchar(100) DEFAULT NULL,
    deleted_by_name varchar(255) DEFAULT NULL,
    is_deleted smallint NOT NULL DEFAULT '0',
    deleted_at datetime2 (0) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `obat_pulang`
--

DROP TABLE IF EXISTS obat_pulang;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE obat_pulang (
    id int NOT NULL IDENTITY,
    reg_no varchar(200) DEFAULT NULL,
    order_no varchar(200) DEFAULT NULL,
    item_code varchar(200) DEFAULT NULL,
    jenis_order varchar(150) NOT NULL,
    item_name varchar(200) NOT NULL,
    qty int DEFAULT NULL,
    flag varchar(200) DEFAULT NULL,
    dosis int DEFAULT NULL,
    hari varchar(200) DEFAULT NULL,
    durasi_hari varchar(200) DEFAULT NULL,
    harga_jual int DEFAULT NULL,
    ket_dosis varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `oxygenation`
--

DROP TABLE IF EXISTS oxygenation;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE oxygenation (
    id int NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    kategori varchar(30) check (
        kategori in (
            'Modus Ventilasi',
            'Mode Ventilasi',
            'Tube Type',
            'Ventilator'
        )
    ) NOT NULL,
    jenis varchar(255) NOT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    PRIMARY KEY (id)
);

CREATE INDEX reg_no ON oxygenation (reg_no);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `oxygenation_data`
--

DROP TABLE IF EXISTS oxygenation_data;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE oxygenation_data (
    id int NOT NULL IDENTITY,
    oxygenation_id int NOT NULL,
    data varchar(max) NOT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    PRIMARY KEY (id)
);

CREATE INDEX oxygenation_id ON oxygenation_data (oxygenation_id);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `password_resets`
--

DROP TABLE IF EXISTS password_resets;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE password_resets (
    email varchar(255) NOT NULL,
    token varchar(255) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL
);

CREATE INDEX password_resets_email_index ON password_resets (email);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_awal_anak_perawat`
--

DROP TABLE IF EXISTS pengkajian_awal_anak_perawat;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_awal_anak_perawat (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    alergi smallint DEFAULT NULL,
    alergi_obat varchar(100) DEFAULT NULL,
    reaksi_alergi_obat varchar(255) DEFAULT NULL,
    alergi_makanan varchar(255) DEFAULT NULL,
    reaksi_alergi_makanan varchar(255) DEFAULT NULL,
    alergi_lainnya varchar(255) DEFAULT NULL,
    reaksi_alergi_lainnya varchar(255) DEFAULT NULL,
    diberitahukan smallint DEFAULT NULL,
    diberitahukan_kpd varchar(255) DEFAULT NULL,
    diberitahukan_pukul time(0) DEFAULT NULL,
    kondisi_umum varchar(255) DEFAULT NULL,
    kondisi_umum_lainnya varchar(255) DEFAULT NULL,
    tekanan_darah int DEFAULT NULL,
    nadi int DEFAULT NULL,
    suhu int DEFAULT NULL,
    pernafasan int DEFAULT NULL,
    tinggi_badan int DEFAULT NULL,
    berat_badan int DEFAULT NULL,
    kebutuhan_khusus varchar(255) DEFAULT NULL,
    kebutuhan_khusus_lainnya varchar(255) DEFAULT NULL,
    status_emosional varchar(255) DEFAULT NULL,
    status_emosi_lainnya varchar(255) DEFAULT NULL,
    merokok smallint DEFAULT NULL,
    frekuensi_merokok int DEFAULT NULL,
    alkohol smallint DEFAULT NULL,
    riwayat_gangguan_jiwa smallint DEFAULT NULL,
    gangguan_jiwa_waktu varchar(255) DEFAULT NULL,
    kategori smallint DEFAULT NULL,
    riwayat_bunuh_diri smallint DEFAULT NULL,
    riwayat_bunuh_diri_ket varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis varchar(255) DEFAULT NULL,
    tindakan_kriminal_ket varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis_ket varchar(255) DEFAULT NULL,
    hambatan_sosial_ekonomi smallint DEFAULT NULL,
    konseling_spiritual smallint DEFAULT NULL,
    konseling_spiritual_ket varchar(255) DEFAULT NULL,
    bantuan_ibadah smallint DEFAULT NULL,
    bantuan_ibadah_ket varchar(255) DEFAULT NULL,
    resiko_riwayat_ibu smallint DEFAULT NULL,
    list_res_riwayat_ibu varchar(255) DEFAULT NULL,
    res_ibu_ket_infeksi varchar(255) DEFAULT NULL,
    perinatal smallint DEFAULT NULL,
    perinatal_detail varchar(255) DEFAULT NULL,
    postnatal smallint DEFAULT NULL,
    list_postnatal varchar(255) DEFAULT NULL,
    hospitalisasi varchar(255) DEFAULT NULL,
    hospitalisasi_lainnya varchar(255) DEFAULT NULL,
    hospitalisasi_times varchar(255) DEFAULT NULL,
    pola_asuh varchar(255) DEFAULT NULL,
    org_terdekat varchar(255) DEFAULT NULL,
    org_terdekat_lainnya varchar(255) DEFAULT NULL,
    tipe_anak varchar(255) DEFAULT NULL,
    tipe_anak_lainnya varchar(255) DEFAULT NULL,
    perilaku_unik smallint DEFAULT NULL,
    perilaku_unik_lainnya varchar(255) DEFAULT NULL,
    pekerjaan_ayah varchar(255) DEFAULT NULL,
    pekerjaan_ibu varchar(255) DEFAULT NULL,
    kategori_status_fungsional smallint DEFAULT NULL,
    rentang_gerak smallint DEFAULT NULL,
    deformitas smallint DEFAULT NULL,
    deformitas_ket varchar(255) DEFAULT NULL,
    gangguan_tidur smallint DEFAULT NULL,
    gangguan_tidur_ket varchar(255) DEFAULT NULL,
    keluhan_nutrisi varchar(255) DEFAULT NULL,
    rasa_haus_berlebih smallint DEFAULT NULL,
    mukosa_mulut varchar(255) DEFAULT NULL,
    turgor_kulit varchar(255) DEFAULT NULL,
    endema smallint DEFAULT NULL,
    created_by varchar(100) DEFAULT NULL,
    updated_by varchar(100) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_awal_anak_perawat_old`
--

DROP TABLE IF EXISTS pengkajian_awal_anak_perawat_old;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_awal_anak_perawat_old (
    id bigint check (id > 0) NOT NULL IDENTITY,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    reg_medrec varchar(255) DEFAULT NULL,
    reg_no varchar(255) DEFAULT NULL,
    hospitalisasi varchar(255) DEFAULT NULL,
    jumlah_hospitalisasi varchar(255) DEFAULT NULL,
    pola_asuh varchar(255) DEFAULT NULL,
    orang_terdekat varchar(255) DEFAULT NULL,
    tipe_anak varchar(255) DEFAULT NULL,
    kebiasaan_perilaku_unik varchar(255) DEFAULT NULL,
    pekerjaan_ayah varchar(255) DEFAULT NULL,
    pekerjaan_ibu varchar(255) DEFAULT NULL,
    provocating varchar(255) DEFAULT NULL,
    quality varchar(255) DEFAULT NULL,
    region varchar(255) DEFAULT NULL,
    saverity varchar(255) DEFAULT NULL,
    treatment varchar(255) DEFAULT NULL,
    understanding varchar(255) DEFAULT NULL,
    value varchar(255) DEFAULT NULL,
    face varchar(255) DEFAULT NULL,
    legs varchar(255) DEFAULT NULL,
    activity varchar(255) DEFAULT NULL,
    cry varchar(255) DEFAULT NULL,
    consolability varchar(255) DEFAULT NULL,
    onset varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_awal_pasien_perawat`
--

DROP TABLE IF EXISTS pengkajian_awal_pasien_perawat;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_awal_pasien_perawat (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_medrec varchar(255) NOT NULL,
    reg_no varchar(255) NOT NULL,
    alergi varchar(255) DEFAULT NULL,
    nama_alergi varchar(255) DEFAULT NULL,
    reaksi_alergi varchar(255) DEFAULT NULL,
    diberitauhkan_dokter varchar(255) DEFAULT NULL,
    kesadaran varchar(255) DEFAULT NULL,
    kondisi_umum varchar(255) DEFAULT NULL,
    tekanan_darah varchar(255) DEFAULT NULL,
    nadi varchar(255) DEFAULT NULL,
    suhu varchar(255) DEFAULT NULL,
    penafasan varchar(255) DEFAULT NULL,
    tinggi_badan varchar(255) DEFAULT NULL,
    berat_badan varchar(10) DEFAULT NULL,
    kebutuhan_khusus varchar(255) DEFAULT NULL,
    status_emosional varchar(255) DEFAULT NULL,
    kebiasaan varchar(255) DEFAULT NULL,
    frekuensi_kebiasaan varchar(255) DEFAULT NULL,
    riwayat_gangguan_jiwa varchar(255) DEFAULT NULL,
    keinginan_percobaan_bunuh_diri varchar(255) DEFAULT NULL,
    ketegori_percobaan_bunuh_diri varchar(255) DEFAULT NULL,
    bunuh_diri_sex varchar(255) DEFAULT NULL,
    bunuh_diri_age varchar(255) DEFAULT NULL,
    bunuh_diri_previous_suicide varchar(255) DEFAULT NULL,
    bunuh_diri_alkohol varchar(255) DEFAULT NULL,
    bunuh_diri_loss varchar(255) DEFAULT NULL,
    bunuh_diri_terorganisir varchar(255) DEFAULT NULL,
    bunuh_diri_pendukung varchar(255) DEFAULT NULL,
    bunuh_diri_penyakit_kronis varchar(255) DEFAULT NULL,
    riwayat_trauma varchar(255) DEFAULT NULL,
    hambatan_sosial_ekonomi varchar(255) DEFAULT NULL,
    kebutuhan_konseling_spiritual varchar(255) DEFAULT NULL,
    bantuan_menjalankan_ibadah varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    asper_poli varchar(255) DEFAULT NULL,
    asper_kondisi_umum_lain varchar(255) DEFAULT NULL,
    asper_hpht varchar(255) DEFAULT NULL,
    asper_tp varchar(255) DEFAULT NULL,
    asper_kbthn_khusus_lain varchar(255) DEFAULT NULL,
    asper_status_emosi_lain varchar(255) DEFAULT NULL,
    asper_hambatan_ekonomi_lain varchar(255) DEFAULT NULL,
    bunuh_diri_depresi varchar(255) DEFAULT NULL,
    bunuh_diri_cerai varchar(255) DEFAULT NULL,
    nyeri_status varchar(255) DEFAULT NULL,
    nyeri_durasi_waktu varchar(255) DEFAULT NULL,
    nyeri_penyebab varchar(255) DEFAULT NULL,
    nyeri_deskripsi varchar(255) DEFAULT NULL,
    nyeri_deskripsi_lain varchar(255) DEFAULT NULL,
    lokasi_penjalaran varchar(255) DEFAULT NULL,
    nyeri_skala_ukur varchar(255) DEFAULT NULL,
    nyeri_skala varchar(255) DEFAULT NULL,
    nyeri_waktu varchar(255) DEFAULT NULL,
    nyeri_frekuensi varchar(255) DEFAULT NULL,
    asper_brjln_seimbang varchar(255) DEFAULT NULL,
    asper_altban_duduk varchar(255) DEFAULT NULL,
    asper_hasil varchar(255) DEFAULT NULL,
    asper_keluhan_nutrisi varchar(255) DEFAULT NULL,
    asper_keluhan_nutrisi_lain varchar(255) DEFAULT NULL,
    asper_haus_berlebih varchar(255) DEFAULT NULL,
    asper_mukosa_mulut varchar(255) DEFAULT NULL,
    asper_turgor_kulit varchar(255) DEFAULT NULL,
    asper_edema varchar(255) DEFAULT NULL,
    asper_diagnosa_kprwtn_text varchar(255) DEFAULT NULL,
    asper_diagnosa_kprwtn varchar(255) DEFAULT NULL,
    kebutuhan_konseling_spiritual_lain varchar(255) DEFAULT NULL,
    bantuan_menjalankan_ibadah_lain varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_dewasa_adl`
--

DROP TABLE IF EXISTS pengkajian_dewasa_adl;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_dewasa_adl (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    med_rec varchar(255) DEFAULT NULL,
    bab int DEFAULT NULL,
    bak int DEFAULT NULL,
    membersihkan_diri int DEFAULT NULL,
    wc int DEFAULT NULL,
    makan_minum int DEFAULT NULL,
    bergerak int DEFAULT NULL,
    berjalan int DEFAULT NULL,
    berpakaian int DEFAULT NULL,
    tangga int DEFAULT NULL,
    mandi int DEFAULT NULL,
    total_skor_adl int DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_dewasa_awal`
--

DROP TABLE IF EXISTS pengkajian_dewasa_awal;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_dewasa_awal (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    alergi varchar(255) DEFAULT NULL,
    alergi_obat varchar(255) DEFAULT NULL,
    bentuk_reaksi_obat varchar(255) DEFAULT NULL,
    alergi_makanan varchar(255) DEFAULT NULL,
    bentuk_reaksi_makanan varchar(255) DEFAULT NULL,
    alergi_lainnya varchar(255) DEFAULT NULL,
    bentuk_reaksi_lainnya varchar(255) DEFAULT NULL,
    diberitahukan_kpd varchar(255) DEFAULT NULL,
    diberitahukan_status varchar(255) DEFAULT NULL,
    diberitahukan_jam time(0) DEFAULT NULL,
    kesadaran varchar(255) DEFAULT NULL,
    kondisi_umum varchar(255) DEFAULT NULL,
    kondisi_umum_lainnya_text varchar(255) DEFAULT NULL,
    tekanan_darah int DEFAULT NULL,
    nadi int DEFAULT NULL,
    suhu int DEFAULT NULL,
    pernafasan int DEFAULT NULL,
    tinggi_badan int DEFAULT NULL,
    berat_badan int DEFAULT NULL,
    kebutuhan_khusus varchar(max),
    kebutuhan_khusus_lainnya_text varchar(255) DEFAULT NULL,
    status_emosional varchar(max),
    status_emosional_text varchar(255) DEFAULT NULL,
    merokok varchar(255) DEFAULT NULL,
    frekuensi_merokok varchar(255) DEFAULT NULL,
    minuman_alkohol varchar(255) DEFAULT NULL,
    riwayat_gangguan_jiwa varchar(255) DEFAULT NULL,
    riwayat_bunuh_diri varchar(255) DEFAULT NULL,
    riwayat_bunuh_diri_text varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis_detail varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis_detail_kriminal_text varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis_detail_lain_text varchar(255) DEFAULT NULL,
    pekerjaan varchar(255) DEFAULT NULL,
    hambatan_sosial_ekonomi varchar(255) DEFAULT NULL,
    konseling_spiritual varchar(255) DEFAULT NULL,
    konseling_spiritual_text varchar(255) DEFAULT NULL,
    bantuan_ibadah varchar(255) DEFAULT NULL,
    bantuan_ibadah_text varchar(255) DEFAULT NULL,
    nilai_aks varchar(255) DEFAULT NULL,
    kategori_perawatan varchar(255) DEFAULT NULL,
    rentang_gerak varchar(255) DEFAULT NULL,
    deformitas varchar(255) DEFAULT NULL,
    deformitas_text varchar(255) DEFAULT NULL,
    gangguan_tidur varchar(255) DEFAULT NULL,
    gangguan_tidur_text varchar(255) DEFAULT NULL,
    keluhan_nutrisi varchar(255) DEFAULT NULL,
    rasa_haus_berlebih varchar(255) DEFAULT NULL,
    mukosa_mulut varchar(255) DEFAULT NULL,
    turgor_kulit varchar(255) DEFAULT NULL,
    endema varchar(255) DEFAULT NULL,
    frekuensi_bab varchar(255) DEFAULT NULL,
    keluhan_bab varchar(255) DEFAULT NULL,
    keluhan_bab_text varchar(255) DEFAULT NULL,
    karakteristik_feces varchar(255) DEFAULT NULL,
    warna_feces varchar(255) DEFAULT NULL,
    frekuensi_bak varchar(255) DEFAULT NULL,
    jumlah_bak varchar(255) DEFAULT NULL,
    warna_urin varchar(255) DEFAULT NULL,
    keluhan_bak varchar(255) DEFAULT NULL,
    keluhan_bak_lainnya varchar(255) DEFAULT NULL,
    created_by varchar(100) DEFAULT NULL,
    updated_by varchar(100) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_dewasa_skor_sad_person`
--

DROP TABLE IF EXISTS pengkajian_dewasa_skor_sad_person;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_dewasa_skor_sad_person (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    med_rec varchar(255) DEFAULT NULL,
    sex int DEFAULT NULL,
    age int DEFAULT NULL,
    depresi int DEFAULT NULL,
    suicide int DEFAULT NULL,
    alcohol int DEFAULT NULL,
    thinking_loss int DEFAULT NULL,
    separated int DEFAULT NULL,
    organized_plan int DEFAULT NULL,
    no_support int DEFAULT NULL,
    sickness int DEFAULT NULL,
    skor_sad_person int DEFAULT NULL,
    kategori_sad_person varchar(255) DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_dewasa_skrining_gizi`
--

DROP TABLE IF EXISTS pengkajian_dewasa_skrining_gizi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_dewasa_skrining_gizi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    penurunan_bb smallint DEFAULT NULL,
    penurunan_bb_jumlah smallint DEFAULT NULL,
    asupan_makan smallint DEFAULT NULL,
    diagnosis_khusus smallint DEFAULT NULL,
    total_skor_gizi int DEFAULT NULL,
    kategori_gizi varchar(255) DEFAULT NULL,
    diketahui_dietisien smallint DEFAULT NULL,
    diketahui_pukul time(0) DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_dewasa_skrining_nyeri`
--

DROP TABLE IF EXISTS pengkajian_dewasa_skrining_nyeri;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_dewasa_skrining_nyeri (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    nyeri_skala int DEFAULT NULL,
    skala_wong_baker varchar(255) DEFAULT NULL,
    onset varchar(255) DEFAULT NULL,
    pencetus_nyeri varchar(255) DEFAULT NULL,
    tipe_nyeri varchar(max),
    menjalar varchar(255) DEFAULT NULL,
    skala_nyeri varchar(255) DEFAULT NULL,
    treatment varchar(255) DEFAULT NULL,
    understanding varchar(255) DEFAULT NULL,
    value varchar(255) DEFAULT NULL,
    bps varchar(255) DEFAULT NULL,
    ekspresi_wajah int DEFAULT NULL,
    ekstremitas_atas int DEFAULT NULL,
    compliance_ventilator int DEFAULT NULL,
    skor_total_bps int DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_neonatus_fisik`
--

DROP TABLE IF EXISTS pengkajian_neonatus_fisik;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_neonatus_fisik (
    pengkajian_neonatus_id bigint check (pengkajian_neonatus_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    riwayat_penyakit_ibu varchar(255) DEFAULT NULL,
    jenis_kelamin varchar(255) DEFAULT NULL,
    berat_fisik int DEFAULT NULL,
    panjang_fisik int DEFAULT NULL,
    lingkar_kepala int DEFAULT NULL,
    lingkar_perut int DEFAULT NULL,
    aktifitas varchar(255) DEFAULT NULL,
    tangis varchar(255) DEFAULT NULL,
    refleks_hisap varchar(255) DEFAULT NULL,
    anemia varchar(255) DEFAULT NULL,
    ikterus varchar(255) DEFAULT NULL,
    sianosis varchar(255) DEFAULT NULL,
    dispnoe varchar(255) DEFAULT NULL,
    denyut_jantung varchar(255) DEFAULT NULL,
    pernafasan varchar(255) DEFAULT NULL,
    temperatur int DEFAULT NULL,
    spesifik_kepala varchar(255) DEFAULT NULL,
    spesifik_kepala_ket varchar(255) DEFAULT NULL,
    spesifik_leher varchar(255) DEFAULT NULL,
    spesifik_thoraks varchar(255) DEFAULT NULL,
    spesifik_abdomen varchar(255) DEFAULT NULL,
    spesifik_ekstremitas varchar(255) DEFAULT NULL,
    spesifik_anus varchar(255) DEFAULT NULL,
    spesifik_genitalia varchar(255) DEFAULT NULL,
    spesifik_penunjang varchar(255) DEFAULT NULL,
    spesifik_daftar_masalah varchar(255) DEFAULT NULL,
    spesifik_tata_laksana varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_neonatus_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_neonatus_nyeri`
--

DROP TABLE IF EXISTS pengkajian_neonatus_nyeri;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_neonatus_nyeri (
    pengkajian_neonatus_id bigint check (pengkajian_neonatus_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    ekspresi smallint DEFAULT NULL,
    menangis smallint DEFAULT NULL,
    pola_nafas smallint DEFAULT NULL,
    lengan smallint DEFAULT NULL,
    kaki smallint DEFAULT NULL,
    rangsangan smallint DEFAULT NULL,
    heart_rate smallint DEFAULT NULL,
    saturasi_oksigen smallint DEFAULT NULL,
    frekuensi_bab int DEFAULT NULL,
    frekuensi_bab_no varchar(255) DEFAULT NULL,
    gangguan_bab varchar(255) DEFAULT NULL,
    gangguan_bab_ket varchar(255) DEFAULT NULL,
    karakter_bab varchar(255) DEFAULT NULL,
    frekuensi_bab_hari varchar(255) DEFAULT NULL,
    frekuensi_bab_jumlah varchar(255) DEFAULT NULL,
    warna_feces varchar(255) DEFAULT NULL,
    warna_urin varchar(255) DEFAULT NULL,
    bahasa varchar(255) DEFAULT NULL,
    bahasa_lain varchar(255) DEFAULT NULL,
    penerjemah_ortu varchar(255) DEFAULT NULL,
    hambatan_ortu varchar(255) DEFAULT NULL,
    hambatan_ortu_lain varchar(255) DEFAULT NULL,
    edukasi_ortu varchar(255) DEFAULT NULL,
    edukasi_ortu_ket varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    skala_nips varchar(255) DEFAULT NULL,
    PRIMARY KEY (pengkajian_neonatus_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_neonatus_ttd`
--

DROP TABLE IF EXISTS pengkajian_neonatus_ttd;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_neonatus_ttd (
    pengkajian_neonatus_id bigint check (pengkajian_neonatus_id > 0) NOT NULL IDENTITY,
    penggunaan_sebelum_admisi smallint DEFAULT NULL,
    reg_no varchar(255) DEFAULT NULL,
    med_rec varchar(255) DEFAULT NULL,
    ttd_dpjp varchar(max),
    time_ttd_dpjp datetime2 (0) DEFAULT NULL,
    ttd_ppds varchar(max),
    time_ttd_ppds datetime2 (0) DEFAULT NULL,
    ttd_perawat varchar(max),
    time_ttd_perawat datetime2 (0) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_neonatus_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_alergi_dan_keadaan_umum`
--

DROP TABLE IF EXISTS pengkajian_obgyn_alergi_dan_keadaan_umum;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_alergi_dan_keadaan_umum (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    alergi varchar(255) DEFAULT NULL,
    alergi_obat varchar(255) DEFAULT NULL,
    bentuk_reaksi_obat varchar(255) DEFAULT NULL,
    alergi_makanan varchar(255) DEFAULT NULL,
    bentuk_reaksi_makanan varchar(255) DEFAULT NULL,
    alergi_lainnya varchar(255) DEFAULT NULL,
    bentuk_reaksi_lainnya varchar(255) DEFAULT NULL,
    diberitahukan varchar(max),
    diberitahukan_status varchar(255) DEFAULT NULL,
    diberitahukan_jam time(0) DEFAULT NULL,
    kesadaran varchar(255) DEFAULT NULL,
    kondisi_umum varchar(255) DEFAULT NULL,
    kondisi_umum_lainnya_text varchar(255) DEFAULT NULL,
    tekanan_darah int DEFAULT NULL,
    nadi int DEFAULT NULL,
    suhu int DEFAULT NULL,
    pernafasan int DEFAULT NULL,
    tinggi_badan int DEFAULT NULL,
    berat_badan int DEFAULT NULL,
    kebutuhan_khusus varchar(max),
    kebutuhan_khusus_lainnya_text varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_data_psikologis`
--

DROP TABLE IF EXISTS pengkajian_obgyn_data_psikologis;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_data_psikologis (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    status_emosional varchar(max),
    status_emosional_text varchar(255) DEFAULT NULL,
    merokok varchar(255) DEFAULT NULL,
    frekuensi_merokok varchar(255) DEFAULT NULL,
    minuman_alkohol varchar(255) DEFAULT NULL,
    riwayat_gangguan_jiwa varchar(255) DEFAULT NULL,
    sex int DEFAULT NULL,
    age int DEFAULT NULL,
    depresi int DEFAULT NULL,
    suicide int DEFAULT NULL,
    alcohol int DEFAULT NULL,
    thinking_loss int DEFAULT NULL,
    separated int DEFAULT NULL,
    organized_plan int DEFAULT NULL,
    no_support int DEFAULT NULL,
    sickness int DEFAULT NULL,
    skor_sad_person int DEFAULT NULL,
    kategori_sad_person varchar(255) DEFAULT NULL,
    riwayat_bunuh_diri varchar(255) DEFAULT NULL,
    riwayat_bunuh_diri_text varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis_detail varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis_detail_kriminal_text varchar(255) DEFAULT NULL,
    riwayat_trauma_psikis_detail_lain_text varchar(255) DEFAULT NULL,
    hambatan_sosial_ekonomi varchar(255) DEFAULT NULL,
    konseling_spiritual varchar(255) DEFAULT NULL,
    konseling_spiritual_text varchar(255) DEFAULT NULL,
    bantuan_ibadah varchar(255) DEFAULT NULL,
    bantuan_ibadah_text varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_pengkajian_kebutuhan`
--

DROP TABLE IF EXISTS pengkajian_obgyn_pengkajian_kebutuhan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_pengkajian_kebutuhan (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    rentang_gerak varchar(255) DEFAULT NULL,
    deformitas varchar(255) DEFAULT NULL,
    deformitas_text varchar(255) DEFAULT NULL,
    gangguan_tidur varchar(255) DEFAULT NULL,
    gangguan_tidur_text varchar(255) DEFAULT NULL,
    keluhan_nutrisi varchar(255) DEFAULT NULL,
    rasa_haus_berlebih varchar(255) DEFAULT NULL,
    mukosa_mulut varchar(255) DEFAULT NULL,
    turgor_kulit varchar(255) DEFAULT NULL,
    endema varchar(255) DEFAULT NULL,
    frekuensi_bab varchar(255) DEFAULT NULL,
    keluhan_bab varchar(255) DEFAULT NULL,
    keluhan_bab_text varchar(255) DEFAULT NULL,
    karakteristik_feces varchar(255) DEFAULT NULL,
    warna_feces varchar(255) DEFAULT NULL,
    frekuensi_bak varchar(255) DEFAULT NULL,
    jumlah_bak varchar(255) DEFAULT NULL,
    warna_urin varchar(255) DEFAULT NULL,
    keluhan_bak varchar(255) DEFAULT NULL,
    keluhan_bak_lainnya varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_pengkajian_kulit`
--

DROP TABLE IF EXISTS pengkajian_obgyn_pengkajian_kulit;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_pengkajian_kulit (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    persepsi_sensori int DEFAULT NULL,
    kelembaban int DEFAULT NULL,
    aktivitas int DEFAULT NULL,
    mobilitas int DEFAULT NULL,
    nutrisi int DEFAULT NULL,
    friksi_gesekan int DEFAULT NULL,
    total_parameter int DEFAULT NULL,
    skor_braden int DEFAULT NULL,
    resiko_braden varchar(255) DEFAULT NULL,
    terdapat_luka varchar(255) DEFAULT NULL,
    lokasi_luka varchar(max),
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_riwayat_kehamilan`
--

DROP TABLE IF EXISTS pengkajian_obgyn_riwayat_kehamilan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_riwayat_kehamilan (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    tgl_tahun_partus varchar(255) DEFAULT NULL,
    tempat_partus varchar(255) DEFAULT NULL,
    umur_hamil varchar(255) DEFAULT NULL,
    jenis_persalinan varchar(255) DEFAULT NULL,
    penolong_persalinan varchar(255) DEFAULT NULL,
    penyulit varchar(255) DEFAULT NULL,
    bb_anak varchar(255) DEFAULT NULL,
    keadaan_sekarang varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan`
--

DROP TABLE IF EXISTS pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    umur_menarche int DEFAULT NULL,
    lamanya_haid int DEFAULT NULL,
    jumlah_darah_haid int DEFAULT NULL,
    hpht date DEFAULT NULL,
    tp date DEFAULT NULL,
    gangguan_haid varchar(max),
    gangguan_haid_text varchar(255) DEFAULT NULL,
    status_kawin varchar(255) DEFAULT NULL,
    usia_perkawinan varchar(255) DEFAULT NULL,
    jumlah_perkawinan varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_skrining_gizi`
--

DROP TABLE IF EXISTS pengkajian_obgyn_skrining_gizi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_skrining_gizi (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    asupan_makan varchar(255) DEFAULT NULL,
    gangguan_metabolisme varchar(255) DEFAULT NULL,
    pertambahan_bb varchar(255) DEFAULT NULL,
    nilai_hb varchar(255) DEFAULT NULL,
    total_skor_gizi_obgyn int DEFAULT NULL,
    kategori_gizi varchar(255) DEFAULT NULL,
    diketahui_dietisien varchar(255) DEFAULT NULL,
    waktu_diketahui time(0) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_skrining_nyeri`
--

DROP TABLE IF EXISTS pengkajian_obgyn_skrining_nyeri;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_skrining_nyeri (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    nyeri_skala int DEFAULT NULL,
    onset varchar(255) DEFAULT NULL,
    pencetus_nyeri varchar(255) DEFAULT NULL,
    tipe_nyeri varchar(max),
    menjalar varchar(255) DEFAULT NULL,
    skala_nyeri varchar(255) DEFAULT NULL,
    treatment varchar(255) DEFAULT NULL,
    understanding varchar(255) DEFAULT NULL,
    value varchar(255) DEFAULT NULL,
    ekspresi_wajah int DEFAULT NULL,
    ekstremitas_atas int DEFAULT NULL,
    compliance_ventilator int DEFAULT NULL,
    skor_total_bps int DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pengkajian_obgyn_skrining_status_fungsional`
--

DROP TABLE IF EXISTS pengkajian_obgyn_skrining_status_fungsional;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pengkajian_obgyn_skrining_status_fungsional (
    pengkajian_obgyn_id bigint check (pengkajian_obgyn_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    bab int DEFAULT NULL,
    bak int DEFAULT NULL,
    membersihkan_diri int DEFAULT NULL,
    wc int DEFAULT NULL,
    makan_minum int DEFAULT NULL,
    bergerak int DEFAULT NULL,
    berjalan int DEFAULT NULL,
    berpakaian int DEFAULT NULL,
    tangga int DEFAULT NULL,
    mandi int DEFAULT NULL,
    total_skor_adl int DEFAULT NULL,
    nilai_aks varchar(255) DEFAULT NULL,
    kategori_perawatan varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pengkajian_obgyn_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `penyakit`
--

DROP TABLE IF EXISTS penyakit;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE penyakit (
    id int NOT NULL IDENTITY,
    kode varchar(150) DEFAULT NULL,
    id_gejala int DEFAULT NULL,
    nama_penyakit varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `perawatan_selanjutnya`
--

DROP TABLE IF EXISTS perawatan_selanjutnya;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE perawatan_selanjutnya (
    id bigint check (id > 0) NOT NULL IDENTITY,
    id_dokter varchar(200) DEFAULT NULL,
    reg_no varchar(200) DEFAULT NULL,
    tipe varchar(200) DEFAULT NULL,
    klinik varchar(200) DEFAULT NULL,
    dokter varchar(200) DEFAULT NULL,
    tanggal_kontrol_rsud date DEFAULT NULL,
    tanggal_rs_lain date DEFAULT NULL,
    nama_rs_lain varchar(200) DEFAULT NULL,
    tanggal_rujuk_balik date DEFAULT NULL,
    nama_rs_rujuk_balik varchar(200) DEFAULT NULL,
    puskesmas varchar(200) DEFAULT NULL,
    dokter_pribadi varchar(200) DEFAULT NULL,
    pergantian_catheter_detail varchar(200) DEFAULT NULL,
    tanggal_pergantian_catheter date DEFAULT NULL,
    terapi_rehabilitan_detail varchar(200) DEFAULT NULL,
    tanggal_terapi_rehabilitan date DEFAULT NULL,
    rawat_luka_detail varchar(200) DEFAULT NULL,
    tanggal_rawat_luka date DEFAULT NULL,
    perawatan_lainnya_detail varchar(200) DEFAULT NULL,
    tanggal_perawatan_lainnya date DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `pesan_radiologi`
--

DROP TABLE IF EXISTS pesan_radiologi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE pesan_radiologi (
    id int NOT NULL IDENTITY,
    reg_no varchar(200) DEFAULT NULL,
    order_no varchar(200) DEFAULT NULL,
    item_code varchar(200) DEFAULT NULL,
    jenis_order varchar(150) NOT NULL,
    item_name varchar(200) NOT NULL,
    qty int DEFAULT NULL,
    flag varchar(200) DEFAULT NULL,
    temp_flag varchar(10) DEFAULT NULL,
    temp_flag_racikan int DEFAULT NULL,
    dosis int DEFAULT NULL,
    hari varchar(200) DEFAULT NULL,
    durasi_hari varchar(200) DEFAULT NULL,
    harga_jual int DEFAULT NULL,
    ket_dosis varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    status varchar(10) DEFAULT '0',
    dokumen varchar(max),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `register_igd`
--

DROP TABLE IF EXISTS register_igd;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE register_igd (
    reg_no varchar(250) NOT NULL,
    medrec varchar(250) DEFAULT NULL,
    reg_tanggal varchar(250) DEFAULT NULL,
    reg_jam varchar(250) DEFAULT NULL,
    service_unit varchar(250) DEFAULT NULL,
    dokter varchar(250) DEFAULT NULL,
    ruangan varchar(250) DEFAULT NULL,
    metode_bayar varchar(250) DEFAULT NULL,
    no_dokumen varchar(250) DEFAULT NULL,
    diagnosis_utama varchar(250) DEFAULT NULL,
    no_kartu varchar(250) DEFAULT NULL,
    penanggungjawab_pembayaran varchar(250) DEFAULT NULL,
    visit_note varchar(250) DEFAULT NULL,
    pasien_note varchar(250) DEFAULT NULL,
    ref_no varchar(250) DEFAULT NULL,
    control_letter varchar(250) DEFAULT NULL,
    community varchar(250) DEFAULT NULL,
    ref_corporate varchar(250) DEFAULT NULL,
    cover_class varchar(250) DEFAULT NULL,
    PRIMARY KEY (reg_no)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `register_inap`
--

DROP TABLE IF EXISTS register_inap;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE register_inap (
    reg_no varchar(250) NOT NULL,
    medrec varchar(250) DEFAULT NULL,
    reg_tanggal varchar(250) DEFAULT NULL,
    reg_jam varchar(250) DEFAULT NULL,
    service_unit varchar(250) DEFAULT NULL,
    dokter varchar(250) DEFAULT NULL,
    ruangan varchar(250) DEFAULT NULL,
    metode_bayar varchar(250) DEFAULT NULL,
    no_dokumen varchar(250) DEFAULT NULL,
    diagnosis_utama varchar(250) DEFAULT NULL,
    kelas_kategori varchar(250) DEFAULT NULL,
    bed varchar(250) DEFAULT NULL,
    departemen_asal varchar(250) DEFAULT NULL,
    link_regis varchar(250) DEFAULT NULL,
    no_kartu varchar(250) DEFAULT NULL,
    penanggungjawab_pembayaran varchar(250) DEFAULT NULL,
    visit_note varchar(250) DEFAULT NULL,
    pasien_note varchar(250) DEFAULT NULL,
    ref_no varchar(250) DEFAULT NULL,
    control_letter varchar(250) DEFAULT NULL,
    community varchar(250) DEFAULT NULL,
    ref_corporate varchar(250) DEFAULT NULL,
    cover_class varchar(250) DEFAULT NULL,
    PRIMARY KEY (reg_no)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `registration_cancelations`
--

DROP TABLE IF EXISTS registration_cancelations;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE registration_cancelations (
    id varchar(21) NOT NULL,
    reg_no varchar(255) DEFAULT NULL,
    medrec_no varchar(255) DEFAULT NULL,
    patient_name varchar(255) DEFAULT NULL,
    cancelation_date datetime2 (0) NULL DEFAULT NULL,
    cancelation_reason varchar(255) DEFAULT NULL,
    cancelation_by varchar(255) DEFAULT NULL,
    cancelation_by_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rekonsiliasi_obat`
--

DROP TABLE IF EXISTS rekonsiliasi_obat;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rekonsiliasi_obat (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    med_rec varchar(255) DEFAULT NULL,
    dokter_username varchar(50) DEFAULT NULL,
    penggunaan_sebelum_admisi smallint DEFAULT NULL,
    ttd_dpjp varchar(max),
    time_ttd_dpjp datetime2 (0) DEFAULT NULL,
    farmasi_username varchar(50) DEFAULT NULL,
    ttd_farmasi varchar(max),
    time_ttd_farmasi datetime2 (0) DEFAULT NULL,
    ttd_perawat varchar(max),
    time_ttd_perawat datetime2 (0) DEFAULT NULL,
    perawat_username varchar(50) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rekonsiliasi_obat_item`
--

DROP TABLE IF EXISTS rekonsiliasi_obat_item;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rekonsiliasi_obat_item (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    nama_obat varchar(255) NOT NULL,
    dosis varchar(255) DEFAULT NULL,
    frekuensi varchar(255) DEFAULT NULL,
    cara_beri varchar(255) DEFAULT NULL,
    waktu_beri_terakhir datetime2 (0) DEFAULT NULL,
    tindak_lanjut varchar(255) DEFAULT NULL,
    aturan_ubah_pakai varchar(255) DEFAULT NULL,
    created_by varchar(50) DEFAULT NULL,
    deleted_by varchar(50) DEFAULT NULL,
    is_deleted smallint NOT NULL DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `resiko_jatuh_geriatri`
--

DROP TABLE IF EXISTS resiko_jatuh_geriatri;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE resiko_jatuh_geriatri (
    resiko_jatuh_geriatri_id bigint check (resiko_jatuh_geriatri_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    user_id bigint check (user_id > 0) NOT NULL,
    intervensi_resiko_jatuh_rendah varchar(max) NOT NULL,
    intervensi_resiko_jatuh_sedang varchar(max) NOT NULL,
    intervensi_resiko_jatuh_tinggi varchar(max) NOT NULL,
    resiko_jatuh_geriatri_gangguan_gaya_berjalan int NOT NULL,
    resiko_jatuh_geriatri_pusing int NOT NULL,
    resiko_jatuh_geriatri_kebingungan int NOT NULL,
    resiko_jatuh_geriatri_nokturia int NOT NULL,
    resiko_jatuh_geriatri_kebingungan_intermiten int NOT NULL,
    resiko_jatuh_geriatri_kelemahan_umum int NOT NULL,
    resiko_jatuh_geriatri_obat_beresiko_tinggi int NOT NULL,
    resiko_jatuh_geriatri_riwayat_jatuh_12_bulan int NOT NULL,
    resiko_jatuh_geriatri_osteoporosis int NOT NULL,
    resiko_jatuh_geriatri_pendengaran_dan_pengeliatan int NOT NULL,
    resiko_jatuh_geriatri_70_tahun_keatas int NOT NULL,
    skor_total_geriatri int NOT NULL,
    kategori_geriatri varchar(255) NOT NULL,
    shift varchar(255) NOT NULL,
    created_at varchar(255) NOT NULL,
    PRIMARY KEY (resiko_jatuh_geriatri_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `resiko_jatuh_humpty_dumpty`
--

DROP TABLE IF EXISTS resiko_jatuh_humpty_dumpty;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE resiko_jatuh_humpty_dumpty (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    user_id bigint check (user_id > 0) NOT NULL,
    humpty_dumpty_umur int NOT NULL,
    humpty_dumpty_jenis_kelamin int NOT NULL,
    humpty_dumpty_diagnosis int NOT NULL,
    humpty_dumpty_gangguan_kognitif int NOT NULL,
    humpty_dumpty_faktor_lingkungan int NOT NULL,
    humpty_dumpty_respon_terhadap_anastesi int NOT NULL,
    humpty_dumpty_gangguan_obat int NOT NULL,
    total_skor_humpty_dumpty int NOT NULL,
    kategori_humpty_dumpty varchar(255) NOT NULL,
    intervensi_resiko_jatuh_humpty_dumpty_rendah varchar(max) NOT NULL,
    intervensi_resiko_jatuh_humpty_dumpty_tinggi varchar(max) NOT NULL,
    shift varchar(255) NOT NULL,
    created_at datetime2 (0) NOT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `resiko_jatuh_neonatus`
--

DROP TABLE IF EXISTS resiko_jatuh_neonatus;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE resiko_jatuh_neonatus (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    user_id bigint check (user_id > 0) NOT NULL,
    internvensi_tidak_beresiko_neonatus varchar(max) NOT NULL,
    edukasi varchar(max) NOT NULL,
    evaluasi varchar(max) NOT NULL,
    tgl_ttd_keluarga datetime2 (0) NOT NULL,
    ttd_keluarga varchar(max) NOT NULL,
    tgl_ttd_petugas datetime2 (0) NOT NULL,
    ttd_petugas varchar(max) NOT NULL,
    shift varchar(255) NOT NULL,
    created_at datetime2 (0) NOT NULL,
    created_by varchar(255) NOT NULL,
    nama_keluarga varchar(255) DEFAULT NULL,
    nama_petugas varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `resiko_jatuh_skala_morse`
--

DROP TABLE IF EXISTS resiko_jatuh_skala_morse;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE resiko_jatuh_skala_morse (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    user_id bigint check (user_id > 0) NOT NULL,
    resiko_jatuh_morse_bulan_terakhir int NOT NULL,
    resiko_jatuh_morse_medis_sekunder int NOT NULL,
    resiko_jatuh_morse_alat_bantu_jalan int NOT NULL,
    resiko_jatuh_morse_infus int NOT NULL,
    resiko_jatuh_morse_berjalan int NOT NULL,
    resiko_jatuh_morse_mental int NOT NULL,
    resiko_jatuh_morse_total_skor int NOT NULL,
    intervensi_resiko_jatuh_skala_morse_rendah varchar(max) NOT NULL,
    intervensi_resiko_jatuh_skala_morse_sedang varchar(max) NOT NULL,
    intervensi_resiko_jatuh_skala_morse_tinggi varchar(max) NOT NULL,
    shift varchar(255) NOT NULL,
    created_at datetime2 (0) NOT NULL,
    resiko_jatuh_morse_kategori varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rm16`
--

DROP TABLE IF EXISTS rm16;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rm16 (
  id int NOT NULL,
  MedicalNo varchar(20) NOT NULL,
  satu varchar(max) NOT NULL,
  dua varchar(max) NOT NULL,
  tiga varchar(max) NOT NULL,
  empat varchar(max) NOT NULL,
  lima varchar(max) NOT NULL,
  [file] varchar(50) DEFAULT NULL
) ;
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rm3`
--

DROP TABLE IF EXISTS rm3;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rm3 (
  id int NOT NULL IDENTITY,
  reg_no varchar(255) NOT NULL,
  MedicalNo varchar(20) NOT NULL,
  satu varchar(max) NOT NULL,
  dua varchar(max) NOT NULL,
  tiga varchar(max) NOT NULL,
  empat varchar(max) NOT NULL,
  [file] varchar(50) DEFAULT NULL,
  kepada varchar(max) NOT NULL,
  sampai varchar(255) DEFAULT NULL,
  tidak varchar(255) DEFAULT NULL,
  alasan_tidak varchar(255) DEFAULT NULL,
  gigi varchar(20) DEFAULT NULL,
  lokasi_gigi varchar(20) DEFAULT NULL,
  bawa_gigi varchar(20) DEFAULT NULL,
  alat varchar(20) DEFAULT NULL,
  lokasi_alat varchar(20) DEFAULT NULL,
  uang varchar(20) DEFAULT NULL,
  uang_bawa varchar(max),
  barang_lain varchar(max),
  bawa_alat varchar(20) DEFAULT NULL,
  ttd_perawat varchar(max) NOT NULL,
  ttd_pasien varchar(max) NOT NULL,
  nama_pihak_pasien varchar(255) NOT NULL,
  sebagai_pihak_pasien varchar(255) NOT NULL,
  nama_perawat varchar(255) DEFAULT NULL,
  nama_keluarga_pasien varchar(255) DEFAULT NULL,
  kepada_lain varchar(255) DEFAULT NULL,
  tgl_ttd datetime2(0) DEFAULT NULL,
  tgl_assesment_awal datetime2(0) DEFAULT NULL,
  PRIMARY KEY (id)
)  ;
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `room_class`
--

DROP TABLE IF EXISTS room_class;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE room_class (
    ClassCode varchar(10) NOT NULL,
    ClassName varchar(100) DEFAULT NULL,
    ShortName varchar(35) DEFAULT NULL,
    Initial varchar(5) DEFAULT NULL,
    ClassCategoryCode varchar(10) DEFAULT NULL,
    GCClassRL varchar(20) DEFAULT NULL,
    ClassLevel smallint DEFAULT NULL,
    IsAdministrationChargeByClass binary(1) DEFAULT NULL,
    MinAdministrationCharge decimal(18, 4) DEFAULT NULL,
    MaxAdministrationCharge decimal(18, 4) DEFAULT NULL,
    PercentageAdministrationCharge decimal(10, 2) DEFAULT NULL,
    PhysicianChargesItemID int DEFAULT NULL,
    DisplayPrice decimal(18, 4) DEFAULT NULL,
    PictureFileName varchar(500) DEFAULT NULL,
    PatientPerRoomQty int DEFAULT NULL,
    IsHasAC binary(1) DEFAULT NULL,
    IsHasPrivateBathRoom binary(1) DEFAULT NULL,
    IsHasRefrigerator binary(1) DEFAULT NULL,
    IsHasTV binary(1) DEFAULT NULL,
    IsHasWifi binary(1) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    IsActive binary(1) DEFAULT NULL,
    IsDeleted binary(1) DEFAULT NULL,
    LastUpdatedBy varchar(10) DEFAULT NULL,
    LastUpdatedDateTime datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (ClassCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_assesment_bayi`
--

DROP TABLE IF EXISTS rs_assesment_bayi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_assesment_bayi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    no_rm_bayi varchar(255) DEFAULT NULL,
    no_rm_ibu varchar(255) DEFAULT NULL,
    nama_bayi varchar(255) DEFAULT NULL,
    tempat_lahir_bayi varchar(255) DEFAULT NULL,
    tanggal_lahir_bayi date DEFAULT NULL,
    jenis_kelamin_bayi varchar(255) DEFAULT NULL,
    nama_ibu varchar(255) DEFAULT NULL,
    umur_ibu varchar(255) DEFAULT NULL,
    agama_ibu varchar(255) DEFAULT NULL,
    suku_bangsa_ibu varchar(255) DEFAULT NULL,
    pendidikan_ibu varchar(255) DEFAULT NULL,
    pekerjaan_ibu varchar(255) DEFAULT NULL,
    alamat_ibu varchar(255) DEFAULT NULL,
    nama_ayah varchar(255) DEFAULT NULL,
    umur_ayah varchar(255) DEFAULT NULL,
    agama_ayah varchar(255) DEFAULT NULL,
    suku_bangsa_ayah varchar(255) DEFAULT NULL,
    pendidikan_ayah varchar(255) DEFAULT NULL,
    pekerjaan_ayah varchar(255) DEFAULT NULL,
    alamat_ayah varchar(255) DEFAULT NULL,
    pendarahan varchar(255) DEFAULT NULL,
    pre_eklampsia varchar(255) DEFAULT NULL,
    eklampsia varchar(255) DEFAULT NULL,
    penyakit_kelamin varchar(255) DEFAULT NULL,
    lain_lain_riwayat_kehamilan varchar(255) DEFAULT NULL,
    makanan varchar(255) DEFAULT NULL,
    obat_obatan varchar(255) DEFAULT NULL,
    merokok varchar(255) DEFAULT NULL,
    lain_lain_kebiasaan varchar(255) DEFAULT NULL,
    jenis_persalinan varchar(255) DEFAULT NULL,
    ditolong_oleh varchar(255) DEFAULT NULL,
    kala_satu varchar(255) DEFAULT NULL,
    kala_dua varchar(255) DEFAULT NULL,
    ketuban_Pecah varchar(255) DEFAULT NULL,
    warna varchar(255) DEFAULT NULL,
    bau varchar(255) DEFAULT NULL,
    komplikasi_persalinan_ibu varchar(255) DEFAULT NULL,
    komplikasi_persalinan_bayi varchar(255) DEFAULT NULL,
    warna_kulit_1_menit varchar(255) DEFAULT NULL,
    denyut_nadi_1_menit varchar(255) DEFAULT NULL,
    reaksi_rangsangan_1_menit varchar(255) DEFAULT NULL,
    warna_kulit_5_menit varchar(255) DEFAULT NULL,
    denyut_nadi_5_menit varchar(255) DEFAULT NULL,
    reaksi_rangsangan_5_menit varchar(255) DEFAULT NULL,
    pengisapan_lendir varchar(255) DEFAULT NULL,
    ambu varchar(255) DEFAULT NULL,
    lama_ambu varchar(255) DEFAULT NULL,
    massage_jantung varchar(255) DEFAULT NULL,
    lama_massage_jantung varchar(255) DEFAULT NULL,
    intubasi varchar(255) DEFAULT NULL,
    lama_intubasi varchar(255) DEFAULT NULL,
    pemakaian_oksigen varchar(255) DEFAULT NULL,
    lama_pemakaian_oksigen varchar(255) DEFAULT NULL,
    therapy varchar(255) DEFAULT NULL,
    keterangan varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_catatan_keperawatan_pra_tindakan`
--

DROP TABLE IF EXISTS rs_catatan_keperawatan_pra_tindakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_catatan_keperawatan_pra_tindakan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    pra_suhu varchar(255) DEFAULT NULL,
    pra_nadi varchar(255) DEFAULT NULL,
    pra_rr varchar(255) DEFAULT NULL,
    pra_td varchar(255) DEFAULT NULL,
    pra_skor_nyeri varchar(255) DEFAULT NULL,
    pra_tb varchar(255) DEFAULT NULL,
    pra_bb varchar(255) DEFAULT NULL,
    pra_status_mental varchar(255) DEFAULT NULL,
    pra_penyakit_dahulu varchar(255) DEFAULT NULL,
    pra_pengobatan_saat_ini varchar(255) DEFAULT NULL,
    pra_katerisasi varchar(255) DEFAULT NULL,
    pra_stent varchar(255) DEFAULT NULL,
    pra_stent_di varchar(255) DEFAULT NULL,
    pra_jenis varchar(255) DEFAULT NULL,
    pra_kapan varchar(255) DEFAULT NULL,
    pra_di varchar(255) DEFAULT NULL,
    pra_alergi varchar(255) DEFAULT NULL,
    pra_alergi_text varchar(255) DEFAULT NULL,
    cath_signin_ureum varchar(255) DEFAULT NULL,
    cath_signin_creatinin varchar(255) DEFAULT NULL,
    cath_signin_hbsag varchar(255) DEFAULT NULL,
    cath_signin_gds varchar(255) DEFAULT NULL,
    cath_signin_hb varchar(255) DEFAULT NULL,
    cath_signin_trombosit varchar(255) DEFAULT NULL,
    cath_signin_pt varchar(255) DEFAULT NULL,
    cath_signin_aptt varchar(255) DEFAULT NULL,
    ceklist_kesiapan_ruang varchar(255) DEFAULT NULL,
    verif_ruangan_1 varchar(10) DEFAULT NULL,
    verif_cathlab_1 varchar(10) DEFAULT NULL,
    verif_keterangan_1 varchar(10) DEFAULT NULL,
    verif_ruangan_2 varchar(10) DEFAULT NULL,
    verif_cathlab_2 varchar(10) DEFAULT NULL,
    verif_keterangan_2 varchar(10) DEFAULT NULL,
    verif_ruangan_3 varchar(10) DEFAULT NULL,
    verif_cathlab_3 varchar(10) DEFAULT NULL,
    verif_keterangan_3 varchar(10) DEFAULT NULL,
    verif_ruangan_4 varchar(10) DEFAULT NULL,
    verif_cathlab_4 varchar(10) DEFAULT NULL,
    verif_keterangan_4 varchar(10) DEFAULT NULL,
    verif_ruangan_5 varchar(10) DEFAULT NULL,
    verif_cathlab_5 varchar(10) DEFAULT NULL,
    verif_keterangan_5 varchar(10) DEFAULT NULL,
    verif_ruangan_6 varchar(10) DEFAULT NULL,
    verif_cathlab_6 varchar(10) DEFAULT NULL,
    verif_keterangan_6 varchar(10) DEFAULT NULL,
    verif_ruangan_7 varchar(10) DEFAULT NULL,
    verif_cathlab_7 varchar(10) DEFAULT NULL,
    verif_keterangan_7 varchar(10) DEFAULT NULL,
    verif_ruangan_8 varchar(10) DEFAULT NULL,
    verif_cathlab_8 varchar(10) DEFAULT NULL,
    verif_keterangan_8 varchar(10) DEFAULT NULL,
    persiapan_ruangan_1 varchar(10) DEFAULT NULL,
    persiapan_cathlab_1 varchar(10) DEFAULT NULL,
    persiapan_keterangan_1 varchar(10) DEFAULT NULL,
    persiapan_ruangan_2 varchar(10) DEFAULT NULL,
    persiapan_cathlab_2 varchar(10) DEFAULT NULL,
    persiapan_keterangan_2 varchar(10) DEFAULT NULL,
    persiapan_ruangan_3 varchar(10) DEFAULT NULL,
    persiapan_cathlab_3 varchar(10) DEFAULT NULL,
    persiapan_keterangan_3 varchar(10) DEFAULT NULL,
    persiapan_ruangan_4 varchar(10) DEFAULT NULL,
    persiapan_cathlab_4 varchar(10) DEFAULT NULL,
    persiapan_keterangan_4 varchar(10) DEFAULT NULL,
    persiapan_ruangan_5 varchar(10) DEFAULT NULL,
    persiapan_cathlab_5 varchar(10) DEFAULT NULL,
    persiapan_keterangan_5 varchar(10) DEFAULT NULL,
    persiapan_ruangan_6 varchar(10) DEFAULT NULL,
    persiapan_cathlab_6 varchar(10) DEFAULT NULL,
    persiapan_keterangan_6 varchar(10) DEFAULT NULL,
    persiapan_ruangan_7 varchar(10) DEFAULT NULL,
    persiapan_cathlab_7 varchar(10) DEFAULT NULL,
    persiapan_keterangan_7 varchar(10) DEFAULT NULL,
    persiapan_ruangan_8 varchar(10) DEFAULT NULL,
    persiapan_cathlab_8 varchar(10) DEFAULT NULL,
    persiapan_keterangan_8 varchar(10) DEFAULT NULL,
    persiapan_ruangan_9 varchar(10) DEFAULT NULL,
    persiapan_cathlab_9 varchar(10) DEFAULT NULL,
    persiapan_keterangan_9 varchar(10) DEFAULT NULL,
    persiapan_ruangan_10 varchar(10) DEFAULT NULL,
    persiapan_cathlab_10 varchar(10) DEFAULT NULL,
    persiapan_keterangan_10 varchar(10) DEFAULT NULL,
    persiapan_ruangan_11 varchar(10) DEFAULT NULL,
    persiapan_cathlab_11 varchar(10) DEFAULT NULL,
    persiapan_keterangan_11 varchar(10) DEFAULT NULL,
    persiapan_ruangan_12 varchar(10) DEFAULT NULL,
    persiapan_cathlab_12 varchar(10) DEFAULT NULL,
    persiapan_keterangan_12 varchar(10) DEFAULT NULL,
    tgl_jam_ruangan varchar(255) DEFAULT NULL,
    perawat_ruangan varchar(255) DEFAULT NULL,
    tgl_jam_cathlab varchar(255) DEFAULT NULL,
    perawat_cathlab varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_cathlab_sign_in`
--

DROP TABLE IF EXISTS rs_cathlab_sign_in;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_cathlab_sign_in (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    cath_signin_pukul varchar(255) DEFAULT NULL,
    cath_signin_identifikasi varchar(255) DEFAULT NULL,
    cath_signin_persetujuan varchar(255) DEFAULT NULL,
    cath_signin_anastesi varchar(255) DEFAULT NULL,
    cath_signin_prosedur varchar(255) DEFAULT NULL,
    cath_signin_puasa varchar(255) DEFAULT NULL,
    cath_signin_alergi varchar(255) DEFAULT NULL,
    cath_signin_alergi_text varchar(255) DEFAULT NULL,
    cath_signin_antibiotik varchar(255) DEFAULT NULL,
    cath_signin_antibiotik_text varchar(255) DEFAULT NULL,
    cath_signin_ureum varchar(255) DEFAULT NULL,
    cath_signin_creatinin varchar(255) DEFAULT NULL,
    cath_signin_pt varchar(255) DEFAULT NULL,
    cath_signin_aptt varchar(255) DEFAULT NULL,
    cath_signin_lainnya varchar(255) DEFAULT NULL,
    cath_signin_laboratorium varchar(255) DEFAULT NULL,
    cath_signin_ekg varchar(255) DEFAULT NULL,
    cath_signin_infus varchar(255) DEFAULT NULL,
    cath_signin_gigi varchar(255) DEFAULT NULL,
    cath_signin_mesin varchar(255) DEFAULT NULL,
    cath_signin_alat varchar(255) DEFAULT NULL,
    cath_signin_perawat varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_cathlab_sign_out`
--

DROP TABLE IF EXISTS rs_cathlab_sign_out;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_cathlab_sign_out (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    cath_signout_pukul varchar(255) DEFAULT NULL,
    cath_signout_tindakan varchar(255) DEFAULT NULL,
    cath_signout_implan varchar(255) DEFAULT NULL,
    cath_signout_alat varchar(255) DEFAULT NULL,
    cath_signout_prosedur varchar(255) DEFAULT NULL,
    cath_signout_prosedur_text varchar(255) DEFAULT NULL,
    cath_signout_dokter_operator varchar(255) DEFAULT NULL,
    cath_signout_dokter_anastesi varchar(255) DEFAULT NULL,
    cath_signout_perawat varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_cathlab_time_out`
--

DROP TABLE IF EXISTS rs_cathlab_time_out;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_cathlab_time_out (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    cath_timeout_pukul varchar(255) DEFAULT NULL,
    cath_timeout_nama_pasien varchar(255) DEFAULT NULL,
    cath_timeout_tgl_lahir varchar(255) DEFAULT NULL,
    cath_timeout_diagnostik varchar(255) DEFAULT NULL,
    cath_timeout_intervensi varchar(255) DEFAULT NULL,
    cath_timeout_tim varchar(255) DEFAULT NULL,
    cath_timeout_tim_dokter varchar(255) DEFAULT NULL,
    cath_timeout_tim_scrub varchar(255) DEFAULT NULL,
    cath_timeout_tim_circulating varchar(255) DEFAULT NULL,
    cath_timeout_tim_dokter_anastesi varchar(255) DEFAULT NULL,
    cath_timeout_tim_petugas_lain varchar(255) DEFAULT NULL,
    cath_timeout_obat varchar(255) DEFAULT NULL,
    cath_timeout_ureum varchar(255) DEFAULT NULL,
    cath_timeout_kreatinin varchar(255) DEFAULT NULL,
    cath_timeout_akses varchar(255) DEFAULT NULL,
    cath_timeout_estimasi varchar(255) DEFAULT NULL,
    cath_timeout_tindakan varchar(255) DEFAULT NULL,
    cath_timeout_pertanyaan varchar(255) DEFAULT NULL,
    cath_timeout_tim_siap varchar(255) DEFAULT NULL,
    cath_timeout_perawat varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_checklist_kepulangan`
--

DROP TABLE IF EXISTS rs_checklist_kepulangan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_checklist_kepulangan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    satu varchar(max),
    dua varchar(max),
    tiga varchar(max),
    empat varchar(max),
    lima varchar(max),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_edukasi_pasien`
--

DROP TABLE IF EXISTS rs_edukasi_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_edukasi_pasien (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    reg_medrec varchar(255) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    bahasa varchar(255) DEFAULT NULL,
    kebutuhan_penerjemah varchar(255) DEFAULT NULL,
    baca_tulis varchar(255) DEFAULT NULL,
    pendidikan_pasien varchar(255) DEFAULT NULL,
    pilihan_tipe_belajar varchar(255) DEFAULT NULL,
    hambatan_belajar varchar(255) DEFAULT NULL,
    kebutuhan_belajar varchar(255) DEFAULT NULL,
    kesediaan_pasien varchar(255) DEFAULT NULL,
    user_id bigint check (user_id > 0) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_edukasi_pasien_anastesi`
--

DROP TABLE IF EXISTS rs_edukasi_pasien_anastesi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_edukasi_pasien_anastesi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    medrec varchar(255) NOT NULL,
    dilakukan_ke varchar(255) DEFAULT NULL,
    nama varchar(255) DEFAULT NULL,
    umur varchar(255) DEFAULT NULL,
    jenis_kelamin varchar(255) DEFAULT NULL,
    no_telp varchar(255) DEFAULT NULL,
    no_rekam_medis varchar(255) DEFAULT NULL,
    diagonsa varchar(255) DEFAULT NULL,
    tindakan varchar(255) DEFAULT NULL,
    jenis_anastesi varchar(255) DEFAULT NULL,
    tgl_ttd varchar(255) DEFAULT NULL,
    nama_pihak_pasien varchar(255) DEFAULT NULL,
    nama_dokter varchar(255) DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    ttd_pihak_pasien varchar(max),
    ttd_dokter varchar(max),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_edukasi_pasien_dokter`
--

DROP TABLE IF EXISTS rs_edukasi_pasien_dokter;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_edukasi_pasien_dokter (
    id bigint check (id > 0) NOT NULL IDENTITY,
    user_id int DEFAULT NULL,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    edukasi_diagnosa_penyebab_dokter varchar(255) DEFAULT NULL,
    edukasi_penatalaksanaan_dokter varchar(255) DEFAULT NULL,
    edukasi_prosedur_diagnostik_dokter varchar(255) DEFAULT NULL,
    edukasi_manajemen_nyeri_dokter varchar(255) DEFAULT NULL,
    edukasi_lain_lain_dokter varchar(255) DEFAULT NULL,
    tgl_diagnosa_penyebab_dokter date DEFAULT NULL,
    tgl_penatalaksanaan_dokter date DEFAULT NULL,
    tgl_prosedur_diagnostik_dokter date DEFAULT NULL,
    tgl_manajemen_nyeri_dokter date DEFAULT NULL,
    tgl_lain_lain_dokter date DEFAULT NULL,
    tingkat_paham_diagnosa_penyebab_dokter varchar(255) DEFAULT NULL,
    tingkat_paham_penatalaksanaan_dokter varchar(255) DEFAULT NULL,
    tingkat_paham_prosedur_diagnostik_dokter varchar(255) DEFAULT NULL,
    tingkat_paham_manajemen_nyeri_dokter varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_dokter varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_text_dokter varchar(255) DEFAULT NULL,
    metode_edukasi_diagnosa_penyebab_dokter varchar(255) DEFAULT NULL,
    metode_edukasi_penatalaksanaan_dokter varchar(255) DEFAULT NULL,
    metode_edukasi_prosedur_diagnostik_dokter varchar(255) DEFAULT NULL,
    metode_edukasi_manajemen_nyeri_dokter varchar(255) DEFAULT NULL,
    metode_edukasi_lain_lain_dokter varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    ttd_dokter varchar(max),
    ttd_pasien varchar(max),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_edukasi_pasien_farmasi`
--

DROP TABLE IF EXISTS rs_edukasi_pasien_farmasi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_edukasi_pasien_farmasi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    edukasi_obat_diberikan_farmasi varchar(255) DEFAULT NULL,
    edukasi_efek_samping_farmasi varchar(255) DEFAULT NULL,
    edukasi_interaksi_farmasi varchar(255) DEFAULT NULL,
    edukasi_lain_lain_farmasi varchar(255) DEFAULT NULL,
    tgl_obat_diberikan_farmasi date DEFAULT NULL,
    tgl_efek_samping_farmasi date DEFAULT NULL,
    tgl_interaksi_farmasi date DEFAULT NULL,
    tgl_lain_lain_farmasi date DEFAULT NULL,
    tingkat_paham_obat_diberikan_farmasi varchar(255) DEFAULT NULL,
    tingkat_paham_efek_samping_farmasi varchar(255) DEFAULT NULL,
    tingkat_paham_interaksi_farmasi varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_farmasi varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_text_farmasi varchar(255) DEFAULT NULL,
    metode_edukasi_obat_diberikan_farmasi varchar(255) DEFAULT NULL,
    metode_edukasi_efek_samping_farmasi varchar(255) DEFAULT NULL,
    metode_edukasi_interaksi_farmasi varchar(255) DEFAULT NULL,
    metode_edukasi_lain_lain_farmasi varchar(255) DEFAULT NULL,
    ttd_sasaran varchar(max),
    ttd_edukator varchar(max),
    nama_sasaran varchar(255) DEFAULT NULL,
    nama_edukator varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_edukasi_pasien_gizi`
--

DROP TABLE IF EXISTS rs_edukasi_pasien_gizi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_edukasi_pasien_gizi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    edukasi_pentingnya_nutrisi_gizi varchar(255) DEFAULT NULL,
    edukasi_diet_gizi varchar(255) DEFAULT NULL,
    edukasi_lain_lain_gizi varchar(255) DEFAULT NULL,
    tgl_pentingnya_nutrisi_gizi date DEFAULT NULL,
    tgl_diet_gizi date DEFAULT NULL,
    tgl_lain_lain_gizi date DEFAULT NULL,
    tingkat_paham_pentingnya_nutrisi_gizi varchar(255) DEFAULT NULL,
    tingkat_paham_diet_gizi varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_gizi varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_text_gizi varchar(255) DEFAULT NULL,
    metode_edukasi_pentingnya_nutrisi_gizi varchar(255) DEFAULT NULL,
    metode_edukasi_diet_gizi varchar(255) DEFAULT NULL,
    metode_edukasi_lain_lain_gizi varchar(255) DEFAULT NULL,
    ttd_sasaran varchar(max),
    nama_sasaran varchar(255) DEFAULT NULL,
    ttd_edukator varchar(max),
    nama_edukator varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_edukasi_pasien_perawat`
--

DROP TABLE IF EXISTS rs_edukasi_pasien_perawat;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_edukasi_pasien_perawat (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    edukasi_penggunaan_peralatan_perawat varchar(255) DEFAULT NULL,
    edukasi_pencegahan_perawat varchar(255) DEFAULT NULL,
    edukasi_manajemen_nyeri_ringan_perawat varchar(255) DEFAULT NULL,
    edukasi_lain_lain_perawat varchar(255) DEFAULT NULL,
    tgl_penggunaan_peralatan_perawat date DEFAULT NULL,
    tgl_pencegahan_perawat date DEFAULT NULL,
    tgl_manajemen_nyeri_ringan_perawat date DEFAULT NULL,
    tgl_lain_lain_perawat date DEFAULT NULL,
    tingkat_paham_penggunaan_peralatan_perawat varchar(255) DEFAULT NULL,
    tingkat_paham_pencegahan_perawat varchar(255) DEFAULT NULL,
    tingkat_paham_manajemen_nyeri_ringan_perawat varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_perawat varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_text_perawat varchar(255) DEFAULT NULL,
    metode_edukasi_penggunaan_peralatan_perawat varchar(255) DEFAULT NULL,
    metode_edukasi_pencegahan_perawat varchar(255) DEFAULT NULL,
    metode_edukasi_manajemen_nyeri_ringan_perawat varchar(255) DEFAULT NULL,
    metode_edukasi_lain_lain_perawat varchar(255) DEFAULT NULL,
    ttd_sasaran varchar(max) NOT NULL,
    ttd_edukator varchar(max) NOT NULL,
    nama_sasaran varchar(255) DEFAULT NULL,
    nama_edukator varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_edukasi_pasien_rehab`
--

DROP TABLE IF EXISTS rs_edukasi_pasien_rehab;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_edukasi_pasien_rehab (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    edukasi_tehnik_rehabilitasi varchar(255) DEFAULT NULL,
    edukasi_lain_lain_rehabilitasi varchar(255) DEFAULT NULL,
    tgl_tehnik_rehabilitasi date DEFAULT NULL,
    tgl_lain_lain_rehabilitasi date DEFAULT NULL,
    tingkat_paham_tehnik_rehabilitasi varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_rehabilitasi varchar(255) DEFAULT NULL,
    tingkat_paham_lain_lain_text_rehabilitasi varchar(255) DEFAULT NULL,
    metode_edukasi_tehnik_rehabilitasi varchar(255) DEFAULT NULL,
    metode_edukasi_lain_lain_rehabilitasi varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_bed`
--

DROP TABLE IF EXISTS rs_m_bed;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_bed (
    bed_id int NOT NULL,
    service_unit_id varchar(20) DEFAULT NULL,
    room_id int DEFAULT NULL,
    class_code varchar(250) DEFAULT NULL,
    bed_code varchar(250) DEFAULT NULL,
    site_code varchar(250) DEFAULT NULL,
    registration_no varchar(250) DEFAULT NULL,
    reservation_no varchar(250) DEFAULT NULL,
    phone_extension_no varchar(250) DEFAULT NULL,
    bed_status varchar(250) DEFAULT NULL,
    gc_type_of_bed varchar(250) DEFAULT NULL,
    created_date_time datetime2 (0) DEFAULT NULL,
    item_id_automation_charges int DEFAULT NULL,
    item_id_automation_charge_nurse int DEFAULT NULL,
    is_booked varchar(250) DEFAULT NULL,
    is_temporary varchar(250) DEFAULT NULL,
    is_active varchar(250) DEFAULT NULL,
    is_deleted varchar(250) DEFAULT NULL,
    last_updated_by varchar(250) DEFAULT NULL,
    last_updated_datetime datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (bed_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_cpoe_imaging`
--

DROP TABLE IF EXISTS rs_m_cpoe_imaging;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_cpoe_imaging (
    id int NOT NULL IDENTITY,
    kategori varchar(19) DEFAULT NULL,
    sub_kategori varchar(18) DEFAULT NULL,
    nama varchar(71) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_cpoe_laboratory`
--

DROP TABLE IF EXISTS rs_m_cpoe_laboratory;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_cpoe_laboratory (
    id int NOT NULL IDENTITY,
    kategori varchar(20) DEFAULT NULL,
    sub_kategori varchar(17) DEFAULT NULL,
    nama varchar(64) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_daftar_masalah`
--

DROP TABLE IF EXISTS rs_m_daftar_masalah;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_daftar_masalah (
    masalah_kode varchar(255) NOT NULL,
    masalah_nama varchar(255) DEFAULT NULL,
    PRIMARY KEY (masalah_kode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_department`
--

DROP TABLE IF EXISTS rs_m_department;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_department (
    DepartmentCode varchar(255) NOT NULL,
    DepartmentName varchar(255) DEFAULT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Initial varchar(255) DEFAULT NULL,
    DisplayOrder varchar(255) DEFAULT NULL,
    IsHasRegistration varchar(255) DEFAULT NULL,
    IsHasPrescription varchar(255) DEFAULT NULL,
    IsGenerateMedicalNo varchar(255) DEFAULT NULL,
    IsActive varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_form`
--

DROP TABLE IF EXISTS rs_m_form;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_form (
    form_id int NOT NULL IDENTITY,
    form_data varchar(max),
    form_name varchar(100) DEFAULT NULL,
    PRIMARY KEY (form_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_intervensi`
--

DROP TABLE IF EXISTS rs_m_intervensi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_intervensi (
    intervensi_id varchar(255) NOT NULL,
    intervensi_nama varchar(255) DEFAULT NULL,
    PRIMARY KEY (intervensi_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_intervensi_item`
--

DROP TABLE IF EXISTS rs_m_intervensi_item;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_intervensi_item (
    item_id bigint check (item_id > 0) NOT NULL IDENTITY,
    item_intervensi int DEFAULT NULL,
    item_nama varchar(255) DEFAULT NULL,
    PRIMARY KEY (item_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_item`
--

DROP TABLE IF EXISTS rs_m_item;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_item (
    ItemID bigint check (ItemID > 0) NOT NULL IDENTITY,
    ItemCode varchar(255) DEFAULT NULL,
    GCItemType varchar(255) DEFAULT NULL,
    ItemGroupCode varchar(255) DEFAULT NULL,
    ProductLineID varchar(255) DEFAULT NULL,
    ItemName1 varchar(255) DEFAULT NULL,
    ItemName2 varchar(255) DEFAULT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    IsActive varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    IsAllowCito varchar(255) DEFAULT NULL,
    IsAllowComplication varchar(255) DEFAULT NULL,
    IsAllowVariable varchar(255) DEFAULT NULL,
    IsAllowOrder varchar(255) DEFAULT NULL,
    IsAdministrationCalculation varchar(255) DEFAULT NULL,
    IsPrintWithDoctorName varchar(255) DEFAULT NULL,
    IsPrintWithClass varchar(255) DEFAULT NULL,
    IsPrintWithServiceUnit varchar(255) DEFAULT NULL,
    IsAssetsUtilization varchar(255) DEFAULT NULL,
    IsPhysicianFeeItem varchar(255) DEFAULT NULL,
    IsConsignment varchar(255) DEFAULT NULL,
    GCPhysicianFeeItemType varchar(255) DEFAULT NULL,
    AssetsGroupID varchar(255) DEFAULT NULL,
    AssetClassCode varchar(255) DEFAULT NULL,
    BaseUnitCode varchar(255) DEFAULT NULL,
    PurchaseUnitCode varchar(255) DEFAULT NULL,
    IsPurchaseItem varchar(255) DEFAULT NULL,
    IsNonStock varchar(255) DEFAULT NULL,
    IsControlExpired varchar(255) DEFAULT NULL,
    ABCClass varchar(255) DEFAULT NULL,
    SerialNo varchar(255) DEFAULT NULL,
    CycleCountInterval varchar(255) DEFAULT NULL,
    ShelfLife varchar(255) DEFAULT NULL,
    SubGroup varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    PRIMARY KEY (ItemID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_item_drug`
--

DROP TABLE IF EXISTS rs_m_item_drug;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_item_drug (
    ItemID varchar(255) NOT NULL,
    BrandCode varchar(255) DEFAULT NULL,
    DrugFormCode varchar(255) DEFAULT NULL,
    Dosage varchar(255) DEFAULT NULL,
    DosageUnitCode varchar(255) DEFAULT NULL,
    GCRoute varchar(255) DEFAULT NULL,
    GCNarkotika varchar(255) DEFAULT NULL,
    GCDrugType varchar(255) DEFAULT NULL,
    IsFormulariumItem varchar(255) DEFAULT NULL,
    IsGenericDrug varchar(255) DEFAULT NULL,
    HETAmount varchar(255) DEFAULT NULL,
    IsNewItem varchar(255) DEFAULT NULL,
    IsAllowRoundUp varchar(255) DEFAULT NULL,
    IsAutopackItem varchar(255) DEFAULT NULL,
    MimsReferenceID varchar(255) DEFAULT NULL,
    DefaultConsumeUnit varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    IsOOT varchar(255) DEFAULT NULL,
    IsNarkotikaPsikotropika varchar(255) DEFAULT NULL,
    IsHighAlert varchar(255) DEFAULT NULL,
    PRIMARY KEY (ItemID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_item_drug_display`
--

DROP TABLE IF EXISTS rs_m_item_drug_display;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_item_drug_display (
    ItemID varchar(255) NOT NULL,
    ItemCode varchar(255) DEFAULT NULL,
    ItemName1 varchar(255) DEFAULT NULL,
    ItemGroupCode varchar(255) DEFAULT NULL,
    BaseUnitCode varchar(255) DEFAULT NULL,
    BaseUnitName varchar(255) DEFAULT NULL,
    BrandCode varchar(255) DEFAULT NULL,
    BrandName varchar(255) DEFAULT NULL,
    DosageUnitCode varchar(255) DEFAULT NULL,
    DosageUnitShortName varchar(255) DEFAULT NULL,
    DosageUnitName varchar(255) DEFAULT NULL,
    DrugFormName varchar(255) DEFAULT NULL,
    Dosage varchar(255) DEFAULT NULL,
    GCRoute varchar(255) DEFAULT NULL,
    RouteName varchar(255) DEFAULT NULL,
    GCDrugType varchar(255) DEFAULT NULL,
    Generic varchar(255) DEFAULT NULL,
    GenericName varchar(255) DEFAULT NULL,
    DefaultConsumeUnit varchar(255) DEFAULT NULL,
    MimsReferenceID varchar(255) DEFAULT NULL,
    IsAllowRoundUp varchar(255) DEFAULT NULL,
    IsAutopackItem varchar(255) DEFAULT NULL,
    IsFormulariumItem varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    PRIMARY KEY (ItemID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_item_group`
--

DROP TABLE IF EXISTS rs_m_item_group;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_item_group (
    ItemGroupCode varchar(255) NOT NULL,
    GCItemType varchar(255) DEFAULT NULL,
    ItemGroupName1 varchar(255) DEFAULT NULL,
    ItemGroupName2 varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    FactGroup varchar(255) DEFAULT NULL,
    OrderNo varchar(255) DEFAULT NULL,
    IsActive varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_item_tarif`
--

DROP TABLE IF EXISTS rs_m_item_tarif;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_item_tarif (
    tarif_id bigint check (tarif_id > 0) NOT NULL IDENTITY,
    SiteCode varchar(255) DEFAULT NULL,
    GCMember varchar(255) DEFAULT NULL,
    DocumentNo varchar(255) DEFAULT NULL,
    ItemID varchar(255) DEFAULT NULL,
    ClassCategoryCode varchar(255) DEFAULT NULL,
    RevisionNo varchar(255) DEFAULT NULL,
    DocumentDate varchar(255) DEFAULT NULL,
    StartingDate varchar(255) DEFAULT NULL,
    EndingDate varchar(255) DEFAULT NULL,
    StandardPrice varchar(255) DEFAULT NULL,
    CustomerPrice varchar(255) DEFAULT NULL,
    PersonalPrice varchar(255) DEFAULT NULL,
    DiscountPrice varchar(255) DEFAULT NULL,
    MinVariablePrice varchar(255) DEFAULT NULL,
    MaxVariablePrice varchar(255) DEFAULT NULL,
    StandardPriceBefore varchar(255) DEFAULT NULL,
    CustomerPriceBefore varchar(255) DEFAULT NULL,
    PersonalPriceBefore varchar(255) DEFAULT NULL,
    DiscountPriceBefore varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    PRIMARY KEY (tarif_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_item_tarif_mcu`
--

DROP TABLE IF EXISTS rs_m_item_tarif_mcu;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_item_tarif_mcu (
    TariffId varchar(255) DEFAULT NULL,
    SiteCode varchar(255) DEFAULT NULL,
    ItemId varchar(255) DEFAULT NULL,
    ParentItemId varchar(255) DEFAULT NULL,
    McuPrice varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_kelas_kategori`
--

DROP TABLE IF EXISTS rs_m_kelas_kategori;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_kelas_kategori (
    ClassCategoryCode varchar(255) NOT NULL,
    ClassCategoryName varchar(255) DEFAULT NULL,
    IsActive int DEFAULT NULL,
    IsDeleted int DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    PRIMARY KEY (ClassCategoryCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_order_tindakan`
--

DROP TABLE IF EXISTS rs_m_order_tindakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_order_tindakan (
    id int NOT NULL IDENTITY,
    kode_order varchar(200) DEFAULT NULL,
    dokter_order varchar(10) DEFAULT NULL,
    reg_no varchar(25) DEFAULT NULL,
    tanggal_order date DEFAULT NULL,
    waktu_order time(0) DEFAULT NULL,
    med_rec varchar(25) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_order_tindakan_dt`
--

DROP TABLE IF EXISTS rs_m_order_tindakan_dt;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_order_tindakan_dt (
    id int NOT NULL IDENTITY,
    kode_order varchar(200) DEFAULT NULL,
    kode_tindakan varchar(200) DEFAULT NULL,
    nama_tindakan varchar(200) DEFAULT NULL,
    jenis_tindakan varchar(100) DEFAULT NULL,
    harga varchar(25) DEFAULT NULL,
    status_tindakan varchar(2) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_paramedic`
--

DROP TABLE IF EXISTS rs_m_paramedic;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_paramedic (
    ParamedicID bigint check (ParamedicID > 0) NOT NULL IDENTITY,
    ParamedicCode varchar(255) DEFAULT NULL,
    SiteCode varchar(255) DEFAULT NULL,
    FirstName varchar(255) DEFAULT NULL,
    MiddleName varchar(255) DEFAULT NULL,
    LastName varchar(255) DEFAULT NULL,
    ParamedicName varchar(255) DEFAULT NULL,
    ParamedicInitial varchar(255) DEFAULT NULL,
    DateOfBirth varchar(255) DEFAULT NULL,
    GCSex varchar(255) DEFAULT NULL,
    GCParamedicType varchar(255) DEFAULT NULL,
    GCEmploymentStatus varchar(255) DEFAULT NULL,
    GCReligion varchar(255) DEFAULT NULL,
    GCNationality varchar(255) DEFAULT NULL,
    Title varchar(255) DEFAULT NULL,
    Suffix varchar(255) DEFAULT NULL,
    SpecialtyCode varchar(255) DEFAULT NULL,
    HiredDate varchar(255) DEFAULT NULL,
    TerminatedDate varchar(255) DEFAULT NULL,
    StartExperienceDate varchar(255) DEFAULT NULL,
    IsTaxRegistrant varchar(255) DEFAULT NULL,
    TaxRegistrantNo varchar(255) DEFAULT NULL,
    LicenseNo varchar(255) DEFAULT NULL,
    LicenseExpiredDate varchar(255) DEFAULT NULL,
    PictureFileName varchar(255) DEFAULT NULL,
    IsAvailable varchar(255) DEFAULT NULL,
    NotAvailableUntil varchar(255) DEFAULT NULL,
    IsAnesthetist varchar(255) DEFAULT NULL,
    IsAudiologist varchar(255) DEFAULT NULL,
    IsHasPhysicianRole varchar(255) DEFAULT NULL,
    UserName varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    IsActive varchar(255) DEFAULT NULL,
    IsFeeUsingPercentage varchar(255) DEFAULT NULL,
    FeeAmount varchar(255) DEFAULT NULL,
    FeePercentage varchar(255) DEFAULT NULL,
    BankName varchar(255) DEFAULT NULL,
    BankAccountNo varchar(255) DEFAULT NULL,
    BankAccountName varchar(255) DEFAULT NULL,
    SSN varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    PRIMARY KEY (ParamedicID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_pasien`
--

DROP TABLE IF EXISTS rs_m_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_pasien (
    MedicalNo varchar(255) NOT NULL,
    SiteCode varchar(1) DEFAULT NULL,
    SSN varchar(20) DEFAULT NULL,
    Since varchar(50) DEFAULT NULL,
    FirstName varchar(255) DEFAULT NULL,
    MiddleName varchar(255) DEFAULT NULL,
    LastName varchar(255) DEFAULT NULL,
    PatientName varchar(255) DEFAULT NULL,
    PreferredName varchar(255) DEFAULT NULL,
    PatientNameOnCard varchar(255) DEFAULT NULL,
    CityOfBirth varchar(255) DEFAULT NULL,
    DateOfBirth date DEFAULT NULL,
    IsApproximateDOB varchar(1) DEFAULT NULL,
    GCSex varchar(255) DEFAULT NULL,
    GCBloodType varchar(255) DEFAULT NULL,
    BloodRhesus varchar(255) DEFAULT NULL,
    GCEducation varchar(255) DEFAULT NULL,
    GCMaritalStatus varchar(255) DEFAULT NULL,
    GCNationality varchar(255) DEFAULT NULL,
    GCRace varchar(255) DEFAULT NULL,
    SpokenLanguage varchar(255) DEFAULT NULL,
    WrittenLanguage varchar(255) DEFAULT NULL,
    GCOccupation varchar(255) DEFAULT NULL,
    Title varchar(255) DEFAULT NULL,
    Suffix varchar(255) DEFAULT NULL,
    GCPatientCategory varchar(255) DEFAULT NULL,
    GCDependentType varchar(255) DEFAULT NULL,
    GCReligion varchar(255) DEFAULT NULL,
    Company varchar(255) DEFAULT NULL,
    MobilePhoneNo1 varchar(255) DEFAULT NULL,
    MobilePhoneNo2 varchar(255) DEFAULT NULL,
    OldMedicalNo varchar(255) DEFAULT NULL,
    Picture varchar(255) DEFAULT NULL,
    PictureFileName varchar(255) DEFAULT NULL,
    IsBlackList varchar(1) DEFAULT NULL,
    BlackListBy varchar(255) DEFAULT NULL,
    BlackListDateTime varchar(255) DEFAULT NULL,
    BlackListNotes varchar(255) DEFAULT NULL,
    IsAlive varchar(1) DEFAULT NULL,
    DateOfDeath varchar(255) DEFAULT NULL,
    LastVisitDate varchar(255) DEFAULT NULL,
    NumberOfVisit varchar(5) DEFAULT NULL,
    Notes varchar(255) DEFAULT NULL,
    RegistrationNoOfDeath varchar(255) DEFAULT NULL,
    BpjsCardNo varchar(255) DEFAULT NULL,
    IsPatientConfidential varchar(1) DEFAULT NULL,
    IsActive varchar(1) DEFAULT NULL,
    IsDeleted varchar(1) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (MedicalNo)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_service_room`
--

DROP TABLE IF EXISTS rs_m_service_room;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_service_room (
    RoomID bigint check (RoomID > 0) NOT NULL IDENTITY,
    RoomCode varchar(255) DEFAULT NULL,
    RoomName varchar(255) DEFAULT NULL,
    IP varchar(255) DEFAULT NULL,
    IsActive varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    PRIMARY KEY (RoomID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_service_unit`
--

DROP TABLE IF EXISTS rs_m_service_unit;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_service_unit (
    ServiceUnitCode varchar(255) NOT NULL,
    ServiceUnitName varchar(255) DEFAULT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Initial varchar(255) DEFAULT NULL,
    IconFileName varchar(255) DEFAULT NULL,
    IsUsingJobOrder varchar(255) DEFAULT NULL,
    PatientServiceInterval varchar(255) DEFAULT NULL,
    IsBor varchar(255) DEFAULT NULL,
    IsActive varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    IsExecutive varchar(255) DEFAULT NULL
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_m_specialty`
--

DROP TABLE IF EXISTS rs_m_specialty;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_m_specialty (
    SpecialtyCode varchar(255) NOT NULL,
    SpecialtyName1 varchar(255) DEFAULT NULL,
    SpecialtyName2 varchar(255) DEFAULT NULL,
    GCSpecialtyGroup varchar(255) DEFAULT NULL,
    IsActive int DEFAULT NULL,
    IsDeleted int DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    PRIMARY KEY (SpecialtyCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_observasi_paska_tindakan`
--

DROP TABLE IF EXISTS rs_observasi_paska_tindakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_observasi_paska_tindakan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    tanggal_observasi date DEFAULT NULL,
    waktu_observasi time(0) DEFAULT NULL,
    tekanan_darah varchar(255) DEFAULT NULL,
    nadi varchar(255) DEFAULT NULL,
    pernapasan varchar(255) DEFAULT NULL,
    spo2 varchar(255) DEFAULT NULL,
    tanggal_sirkulasi date DEFAULT NULL,
    waktu_sirkulasi time(0) DEFAULT NULL,
    nadi_sirkulasi varchar(255) DEFAULT NULL,
    suhu_kulit varchar(255) DEFAULT NULL,
    warna varchar(255) DEFAULT NULL,
    isi_nadi varchar(255) DEFAULT NULL,
    sensasi varchar(255) DEFAULT NULL,
    pergerakan varchar(255) DEFAULT NULL,
    pendarahan_lipat_paha varchar(255) DEFAULT NULL,
    hematoma varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_asdok`
--

DROP TABLE IF EXISTS rs_pasien_asdok;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_asdok (
    asdok_id bigint check (asdok_id > 0) NOT NULL IDENTITY,
    asdok_reg varchar(255) DEFAULT NULL,
    asdok_amnesis varchar(255) DEFAULT NULL,
    asdok_amnesis_lain varchar(255) DEFAULT NULL,
    asdok_keluhan_utama varchar(255) DEFAULT NULL,
    asdok_penyakit_sekarang varchar(255) DEFAULT NULL,
    asdok_penyakit_dahulu varchar(255) DEFAULT NULL,
    asdok_penyakit_dahulu_ket varchar(255) DEFAULT NULL,
    asdok_pengobatan varchar(255) DEFAULT NULL,
    asdok_pengobatan_ket varchar(255) DEFAULT NULL,
    asdok_implant varchar(255) DEFAULT NULL,
    asdok_implant_lain varchar(255) DEFAULT NULL,
    asdok_penyakit_dlm_klrg varchar(255) DEFAULT NULL,
    asdok_penyakit_dlm_klrg_ket varchar(255) DEFAULT NULL,
    asdok_penyakit_multiorgan varchar(255) DEFAULT NULL,
    asdok_diagnosis_medik varchar(255) DEFAULT NULL,
    asdok_instruksi_awal varchar(255) DEFAULT NULL,
    asdok_kontrol_ulang varchar(255) DEFAULT NULL,
    asdok_kontrol_ulang_tgl varchar(255) DEFAULT NULL,
    asdok_rawat_inap varchar(255) DEFAULT NULL,
    asdok_rawat_inap_ket varchar(255) DEFAULT NULL,
    asdok_dokter int NOT NULL,
    asdok_poli varchar(20) DEFAULT NULL,
    asdok_deleted int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (asdok_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_asper`
--

DROP TABLE IF EXISTS rs_pasien_asper;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_asper (
    asper_id bigint check (asper_id > 0) NOT NULL IDENTITY,
    asper_reg varchar(255) DEFAULT NULL,
    asper_kesadaran varchar(255) DEFAULT NULL,
    asper_kondisi_umum varchar(255) DEFAULT NULL,
    asper_kondisi_umum_lain varchar(255) DEFAULT NULL,
    asper_tekanan_darah varchar(255) DEFAULT NULL,
    asper_nadi varchar(255) DEFAULT NULL,
    asper_suhu varchar(255) DEFAULT NULL,
    asper_pernapasan varchar(255) DEFAULT NULL,
    asper_tinggi_bdn varchar(255) DEFAULT NULL,
    asper_berat_bdn varchar(255) DEFAULT NULL,
    asper_kbthn_khusus varchar(255) DEFAULT NULL,
    asper_kbthn_khusus_lain varchar(255) DEFAULT NULL,
    asper_riwayat_alergi varchar(255) DEFAULT NULL,
    asper_riwayat_alergi_lain varchar(255) DEFAULT NULL,
    asper_brjln_seimbang varchar(255) DEFAULT NULL,
    asper_altban_duduk varchar(255) DEFAULT NULL,
    asper_hasil varchar(255) DEFAULT NULL,
    asper_keluhan_nutrisi varchar(255) DEFAULT NULL,
    asper_keluhan_nutrisi_lain varchar(255) DEFAULT NULL,
    asper_haus_berlebih varchar(255) DEFAULT NULL,
    asper_mukosa_mulut varchar(255) DEFAULT NULL,
    asper_turgor_kulit varchar(255) DEFAULT NULL,
    asper_edema varchar(255) DEFAULT NULL,
    asper_status_emosi varchar(255) DEFAULT NULL,
    asper_status_emosi_lain varchar(255) DEFAULT NULL,
    asper_kondisi_umum_b varchar(255) DEFAULT NULL,
    asper_hambatan_ekonomi varchar(255) DEFAULT NULL,
    asper_hambatan_ekonomi_lain varchar(255) DEFAULT NULL,
    asper_deleted int NOT NULL DEFAULT '0',
    asper_perawat int DEFAULT NULL,
    asper_poli varchar(20) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    asper_masalah varchar(255) DEFAULT NULL,
    asper_intervensi_kolaborasi varchar(255) DEFAULT NULL,
    asper_intervensi_observasi varchar(255) DEFAULT NULL,
    asper_intervensi_teraupetik varchar(255) DEFAULT NULL,
    asper_intervensi_edukasi varchar(255) DEFAULT NULL,
    asper_penurunan_bb_dewasa varchar(255) DEFAULT NULL,
    asper_penurunan_nafsu_dewasa varchar(255) DEFAULT NULL,
    asper_skor_dewasa varchar(255) DEFAULT NULL,
    asper_kategori_dewasa varchar(255) DEFAULT NULL,
    asper_kurus_anak varchar(255) DEFAULT NULL,
    asper_penurunan_bb_anak varchar(255) DEFAULT NULL,
    asper_kondisi_anak varchar(255) DEFAULT NULL,
    asper_penyakit_anak varchar(255) DEFAULT NULL,
    asper_skor_anak varchar(255) DEFAULT NULL,
    asper_sebab_malnutrisi varchar(255) DEFAULT NULL,
    asper_sebab_malnutrisi_lain varchar(255) DEFAULT NULL,
    PRIMARY KEY (asper_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_asper_intervensi`
--

DROP TABLE IF EXISTS rs_pasien_asper_intervensi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_asper_intervensi (
    pintervensi_id bigint check (pintervensi_id > 0) NOT NULL IDENTITY,
    pintervensi_reg varchar(255) NOT NULL,
    pintervensi_intervensi int DEFAULT NULL,
    pintervensi_lain varchar(max),
    pintervensi_perawat int DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pintervensi_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_asper_masalah`
--

DROP TABLE IF EXISTS rs_pasien_asper_masalah;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_asper_masalah (
    pmasalah_id bigint check (pmasalah_id > 0) NOT NULL IDENTITY,
    pmasalah_reg varchar(255) NOT NULL,
    pmasalah_masalah varchar(max),
    pmasalah_lain varchar(max),
    pmasalah_perawat varchar(max),
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    pmasalah_medrec varchar(255) NOT NULL,
    pintervensi_intervensi varchar(max),
    PRIMARY KEY (pmasalah_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_asper_nyeri`
--

DROP TABLE IF EXISTS rs_pasien_asper_nyeri;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_asper_nyeri (
    nyeri_id bigint check (nyeri_id > 0) NOT NULL IDENTITY,
    nyeri_reg varchar(255) NOT NULL,
    nyeri_status varchar(255) DEFAULT NULL,
    nyeri_durasi_waktu varchar(255) DEFAULT NULL,
    nyeri_penyebab varchar(255) DEFAULT NULL,
    nyeri_deskripsi varchar(255) DEFAULT NULL,
    nyeri_deskripsi_lain varchar(255) DEFAULT NULL,
    nyeri_penyebab_b varchar(255) DEFAULT NULL,
    nyeri_skala_ukur varchar(255) DEFAULT NULL,
    nyeri_skala varchar(255) DEFAULT NULL,
    nyeri_waktu varchar(255) DEFAULT NULL,
    nyeri_frekuensi varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (nyeri_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_billing`
--

DROP TABLE IF EXISTS rs_pasien_billing;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_billing (
    pbill_id bigint check (pbill_id > 0) NOT NULL IDENTITY,
    pbill_reg varchar(20) DEFAULT NULL,
    pbill_item varchar(20) DEFAULT NULL,
    pbill_dispense_qty int DEFAULT NULL,
    pbill_charges_qty int DEFAULT NULL,
    pbill_charges_price float DEFAULT NULL,
    pbill_asset varchar(255) DEFAULT NULL,
    pbill_deleted int NOT NULL DEFAULT '0',
    pbill_dokter int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pbill_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_billing_validation`
--

DROP TABLE IF EXISTS rs_pasien_billing_validation;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_billing_validation (
    id bigint check (id > 0) NOT NULL IDENTITY,
    pvalidation_code varchar(255) DEFAULT NULL,
    pvalidation_reg varchar(255) DEFAULT NULL,
    pvalidation_total varchar(255) DEFAULT NULL,
    pvalidation_detail varchar(max),
    pvalidation_user varchar(255) DEFAULT NULL,
    pvalidation_status int NOT NULL DEFAULT '0',
    pvalidation_selected varchar(max),
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    pvalidation_cancel_at datetime2 (0) DEFAULT NULL,
    pvalidation_cancel_by int DEFAULT NULL,
    pvalidation_cancel_by_name varchar(255) DEFAULT NULL,
    pvalidation_cancel_image varchar(max),
    pvalidation_cancel_desc varchar(max),
    non_bpjs int NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_cpoe_imaging`
--

DROP TABLE IF EXISTS rs_pasien_cpoe_imaging;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_cpoe_imaging (
    id int NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    planing_start_date varchar(255) DEFAULT NULL,
    order_type varchar(255) DEFAULT NULL,
    medical_diagnose varchar(255) DEFAULT NULL,
    gestraditional_age varchar(255) DEFAULT NULL,
    notes varchar(max),
    cpoe_imaging_id int NOT NULL,
    order_by int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_cpoe_laboratory`
--

DROP TABLE IF EXISTS rs_pasien_cpoe_laboratory;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_cpoe_laboratory (
    id int NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    planing_start_date varchar(255) DEFAULT NULL,
    order_type varchar(255) DEFAULT NULL,
    medical_diagnose varchar(255) DEFAULT NULL,
    gestraditional_age varchar(255) DEFAULT NULL,
    notes varchar(max),
    cpoe_laboratory_id int NOT NULL,
    order_by int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_cppt`
--

DROP TABLE IF EXISTS rs_pasien_cppt;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_cppt (
    soapdok_id bigint check (soapdok_id > 0) NOT NULL IDENTITY,
    soapdok_dokter varchar(10) DEFAULT NULL,
    nama_ppa varchar(200) NOT NULL,
    soapdok_poli varchar(20) DEFAULT NULL,
    soapdok_reg varchar(255) DEFAULT NULL,
    soapdok_subject varchar(max),
    soapdok_object varchar(max),
    soapdok_assesment varchar(max),
    soapdok_planning varchar(max),
    soapdok_instruksi varchar(max),
    soap_tanggal date DEFAULT NULL,
    soap_waktu time(0) DEFAULT NULL,
    med_rec varchar(150) NOT NULL,
    soapdok_deleted int DEFAULT NULL,
    status_review varchar(255) NOT NULL COMMENT '0=baru kirim;1=diterima;2=ditolak',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    tanggal_verifikasi date DEFAULT NULL,
    nama_verifikasi varchar(150) DEFAULT NULL,
    is_dokter varchar(10) DEFAULT NULL,
    soapdok_bed varchar(255) DEFAULT NULL,
    dpjp_utama varchar(255) NOT NULL,
    ttd_verifikasi varchar(max),
    bertindak_sebagai varchar(max),
    PRIMARY KEY (soapdok_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_det_transaksi`
--

DROP TABLE IF EXISTS rs_pasien_det_transaksi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_det_transaksi (
    id int NOT NULL IDENTITY,
    no_faktur varchar(150) DEFAULT NULL,
    order_no varchar(150) DEFAULT NULL,
    item_code varchar(150) DEFAULT NULL,
    jenis_order varchar(150) DEFAULT NULL,
    item_name varchar(200) DEFAULT NULL,
    qty varchar(10) DEFAULT NULL,
    harga_jual varchar(20) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_diagnosa`
--

DROP TABLE IF EXISTS rs_pasien_diagnosa;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_diagnosa (
    pdiag_id bigint check (pdiag_id > 0) NOT NULL IDENTITY,
    pdiag_reg varchar(255) NOT NULL,
    pdiag_diagnosa varchar(255) NOT NULL,
    pdiag_dokter varchar(10) NOT NULL,
    pdiag_deleted int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    pdiag_kategori varchar(100) DEFAULT NULL,
    PRIMARY KEY (pdiag_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_discharge`
--

DROP TABLE IF EXISTS rs_pasien_discharge;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_discharge (
    pdischarge_id bigint check (pdischarge_id > 0) NOT NULL IDENTITY,
    pdischarge_reg varchar(20) DEFAULT NULL,
    pdischarge_dokter varchar(150) DEFAULT NULL,
    pdischarge_tgl date DEFAULT NULL,
    pdischarge_jam time(0) DEFAULT NULL,
    pdischarge_tgl_mati varchar(255) DEFAULT NULL,
    pdischarge_jam_mati varchar(255) DEFAULT NULL,
    pdischarge_condition varchar(255) DEFAULT NULL,
    pdischarge_method varchar(255) DEFAULT NULL,
    pdischarge_med_notes varchar(max),
    pdischarge_notes varchar(max),
    pdischarge_deleted int NOT NULL DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pdischarge_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_discharge_open`
--

DROP TABLE IF EXISTS rs_pasien_discharge_open;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_discharge_open (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    requester varchar(255) DEFAULT NULL,
    reason varchar(max),
    status varchar(255) DEFAULT NULL,
    is_open int NOT NULL DEFAULT '0',
    open_by varchar(255) DEFAULT NULL,
    open_at datetime2 (0) DEFAULT NULL,
    open_text varchar(max),
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_gizi`
--

DROP TABLE IF EXISTS rs_pasien_gizi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_gizi (
    id int NOT NULL IDENTITY,
    berat_badan varchar(255) NOT NULL,
    tinggi_badan varchar(255) NOT NULL,
    bbi varchar(255) NOT NULL,
    imt varchar(255) NOT NULL,
    tl varchar(255) NOT NULL,
    lla varchar(255) NOT NULL,
    lla1 varchar(255) NOT NULL,
    status_gizi varchar(255) NOT NULL,
    biokimia varchar(255) NOT NULL,
    fisik_klinik varchar(255) NOT NULL,
    riwayat_gizi_dahulu varchar(255) NOT NULL,
    riwayat_gizi_sekarang varchar(255) NOT NULL,
    riwayat_penyakit_dahulu varchar(255) NOT NULL,
    riwayat_penyakit_sekarang varchar(255) NOT NULL,
    diet varchar(255) NOT NULL,
    updated_at date NOT NULL,
    created_at date NOT NULL,
    med_rec varchar(150) NOT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_instruksi_luar`
--

DROP TABLE IF EXISTS rs_pasien_instruksi_luar;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_instruksi_luar (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    dokter_code varchar(255) DEFAULT NULL,
    type varchar(255) DEFAULT NULL,
    instruksi varchar(max),
    id_cppt int DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_intra_pemantuan`
--

DROP TABLE IF EXISTS rs_pasien_intra_pemantuan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_intra_pemantuan (
    id_pemantuan int NOT NULL IDENTITY,
    no_reg varchar(150) NOT NULL,
    petugas_id varchar(150) NOT NULL,
    tekanan_darah varchar(max) NOT NULL,
    nadi varchar(max) NOT NULL,
    pernapasan varchar(max) NOT NULL,
    spo2 varchar(max) NOT NULL,
    perubahan_kondisi varchar(max) NOT NULL,
    tanggal_simpan date NOT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    tanda_tangan varchar(max),
    tanggal_ttd date DEFAULT NULL,
    PRIMARY KEY (id_pemantuan)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_intra_tindakan`
--

DROP TABLE IF EXISTS rs_pasien_intra_tindakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_intra_tindakan (
    id int NOT NULL IDENTITY,
    no_reg varchar(150) NOT NULL,
    petugas_id varchar(150) NOT NULL,
    pasien_tiba varchar(50) NOT NULL,
    time_out varchar(50) NOT NULL,
    cek_fungsi_peralatan varchar(50) NOT NULL,
    preparasi_di varchar(50) NOT NULL,
    desinfektan_dengan varchar(50) NOT NULL,
    tipe_pembiusan varchar(50) NOT NULL,
    puncture_di varchar(50) NOT NULL,
    akses varchar(50) NOT NULL,
    catheter_diagnostik varchar(50) NOT NULL,
    value_diagnostik varchar(50) NOT NULL,
    kontras varchar(50) NOT NULL,
    guiding_chateter varchar(50) NOT NULL,
    guide_wire_intervensi varchar(50) NOT NULL,
    kateter_aspirasi varchar(50) NOT NULL,
    balon_ukuran varchar(50) NOT NULL,
    balon_jumlah varchar(50) NOT NULL,
    balon_jenis varchar(50) NOT NULL,
    stent_jumlah varchar(50) NOT NULL,
    stent_jenis varchar(50) NOT NULL,
    stent_lokasi varchar(50) NOT NULL,
    pacing varchar(50) NOT NULL,
    iabp varchar(50) NOT NULL,
    kondisi_pasien varchar(50) NOT NULL,
    pasien_pci varchar(50) NOT NULL,
    obat_obatan varchar(200) NOT NULL,
    tanggal_simpan date NOT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_konsultasi`
--

DROP TABLE IF EXISTS rs_pasien_konsultasi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_konsultasi (
    pkonsultasi_id bigint check (pkonsultasi_id > 0) NOT NULL IDENTITY,
    pkonsultasi_reg varchar(255) NOT NULL,
    pkonsultasi_dokter_kirim int NOT NULL,
    pkonsultasi_dokter_tujuan varchar(255) DEFAULT NULL,
    pkonsultasi_poli_tujuan varchar(20) DEFAULT NULL,
    pkonsultasi_request varchar(max) NOT NULL,
    pkonsultasi_response varchar(max),
    pkonsultasi_delete int DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pkonsultasi_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_lab`
--

DROP TABLE IF EXISTS rs_pasien_lab;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_lab (
    plab_kode varchar(20) NOT NULL,
    plab_reg varchar(20) DEFAULT NULL,
    plab_sequence varchar(50) DEFAULT NULL,
    plab_tindakan varchar(255) DEFAULT NULL,
    plab_jenis varchar(100) DEFAULT NULL,
    plab_jumlah int NOT NULL DEFAULT '1',
    plab_jumlah_diambil int NOT NULL DEFAULT '1',
    plab_tarif float NOT NULL DEFAULT '1.00',
    plab_hasil varchar(max),
    plab_file varchar(max),
    plab_tgl_hasil datetime2 (0) DEFAULT NULL,
    plab_dokter int DEFAULT NULL,
    plab_petugas int DEFAULT NULL,
    plab_poli varchar(255) DEFAULT NULL,
    plab_deleted int NOT NULL DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (plab_kode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_odontogram`
--

DROP TABLE IF EXISTS rs_pasien_odontogram;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_odontogram (
    podonto_id bigint check (podonto_id > 0) NOT NULL IDENTITY,
    podonto_reg varchar(255) NOT NULL,
    podonto_poli varchar(255) NOT NULL,
    podonto_dokter int NOT NULL,
    podonto_image varchar(max) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (podonto_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_pemberian_obat`
--

DROP TABLE IF EXISTS rs_pasien_pemberian_obat;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_pemberian_obat (
    id int NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    kode_obat varchar(200) DEFAULT NULL,
    nama_obat varchar(150) DEFAULT NULL,
    dosis varchar(255) DEFAULT NULL,
    cara_pemberian varchar(255) DEFAULT NULL,
    antibiotik varchar(255) DEFAULT NULL,
    kode_dokter varchar(max),
    nama_dokter varchar(150) NOT NULL,
    verifikasi_nurse int DEFAULT NULL,
    tgl_pemberian_0 varchar(255) DEFAULT NULL,
    rentang_jam_0 varchar(255) DEFAULT NULL,
    tipe_jam_0 varchar(255) DEFAULT NULL,
    tgl_pemberian_1 varchar(255) DEFAULT NULL,
    rentang_jam_1 varchar(255) DEFAULT NULL,
    tipe_jam_1 varchar(255) DEFAULT NULL,
    tgl_pemberian_2 varchar(255) DEFAULT NULL,
    rentang_jam_2 varchar(255) DEFAULT NULL,
    tipe_jam_2 varchar(255) DEFAULT NULL,
    tgl_pemberian_3 varchar(255) DEFAULT NULL,
    rentang_jam_3 varchar(255) DEFAULT NULL,
    tipe_jam_3 varchar(255) DEFAULT NULL,
    tgl_pemberian_4 varchar(255) DEFAULT NULL,
    rentang_jam_4 varchar(255) DEFAULT NULL,
    tipe_jam_4 varchar(255) DEFAULT NULL,
    tgl_pemberian_5 varchar(255) DEFAULT NULL,
    rentang_jam_5 varchar(255) DEFAULT NULL,
    tipe_jam_5 varchar(255) DEFAULT NULL,
    tgl_pemberian_6 varchar(255) DEFAULT NULL,
    rentang_jam_6 varchar(255) DEFAULT NULL,
    tipe_jam_6 varchar(255) DEFAULT NULL,
    tgl_pemberian_7 varchar(255) DEFAULT NULL,
    rentang_jam_7 varchar(255) DEFAULT NULL,
    tipe_jam_7 varchar(255) DEFAULT NULL,
    tgl_pemberian_8 varchar(255) DEFAULT NULL,
    rentang_jam_8 varchar(255) DEFAULT NULL,
    tipe_jam_8 varchar(255) DEFAULT NULL,
    tgl_pemberian_9 varchar(255) DEFAULT NULL,
    rentang_jam_9 varchar(255) DEFAULT NULL,
    tipe_jam_9 varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    frekuensi varchar(255) DEFAULT NULL,
    is_deleted int NOT NULL DEFAULT '0',
    note varchar(200) DEFAULT NULL,
    tgl_pemberian_10 varchar(255) DEFAULT NULL,
    rentang_jam_10 varchar(255) DEFAULT NULL,
    tipe_jam_10 varchar(255) DEFAULT NULL,
    tgl_pemberian_11 varchar(255) DEFAULT NULL,
    rentang_jam_11 varchar(255) DEFAULT NULL,
    tipe_jam_11 varchar(255) DEFAULT NULL,
    tgl_pemberian_12 varchar(255) DEFAULT NULL,
    rentang_jam_12 varchar(255) DEFAULT NULL,
    tipe_jam_12 varchar(255) DEFAULT NULL,
    tgl_pemberian_13 varchar(255) DEFAULT NULL,
    rentang_jam_13 varchar(255) DEFAULT NULL,
    tipe_jam_13 varchar(255) DEFAULT NULL,
    tgl_pemberian_14 varchar(255) DEFAULT NULL,
    rentang_jam_14 varchar(255) DEFAULT NULL,
    tipe_jam_14 varchar(255) DEFAULT NULL,
    tgl_pemberian_15 varchar(255) DEFAULT NULL,
    rentang_jam_15 varchar(255) DEFAULT NULL,
    tipe_jam_15 varchar(255) DEFAULT NULL,
    tgl_pemberian_16 varchar(255) DEFAULT NULL,
    rentang_jam_16 varchar(255) DEFAULT NULL,
    tipe_jam_16 varchar(255) DEFAULT NULL,
    tgl_pemberian_17 varchar(255) DEFAULT NULL,
    rentang_jam_17 varchar(255) DEFAULT NULL,
    tipe_jam_17 varchar(255) DEFAULT NULL,
    tgl_pemberian_18 varchar(255) DEFAULT NULL,
    rentang_jam_18 varchar(255) DEFAULT NULL,
    tipe_jam_18 varchar(255) DEFAULT NULL,
    tgl_pemberian_19 varchar(255) DEFAULT NULL,
    rentang_jam_19 varchar(255) DEFAULT NULL,
    tipe_jam_19 varchar(255) DEFAULT NULL,
    tgl_pemberian_20 varchar(255) DEFAULT NULL,
    rentang_jam_20 varchar(255) DEFAULT NULL,
    tipe_jam_20 varchar(255) DEFAULT NULL,
    tgl_pemberian_21 varchar(255) DEFAULT NULL,
    rentang_jam_21 varchar(255) DEFAULT NULL,
    tipe_jam_21 varchar(255) DEFAULT NULL,
    tgl_pemberian_22 varchar(255) DEFAULT NULL,
    rentang_jam_22 varchar(255) DEFAULT NULL,
    tipe_jam_22 varchar(255) DEFAULT NULL,
    tgl_pemberian_23 varchar(255) DEFAULT NULL,
    rentang_jam_23 varchar(255) DEFAULT NULL,
    tipe_jam_23 varchar(255) DEFAULT NULL,
    shift varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_prescribe`
--

DROP TABLE IF EXISTS rs_pasien_prescribe;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_prescribe (
    prescribe_id bigint check (prescribe_id > 0) NOT NULL IDENTITY,
    prescribe_reg varchar(50) DEFAULT NULL,
    prescribe_item varchar(max),
    prescribe_method varchar(255) DEFAULT NULL,
    prescribe_required int DEFAULT NULL,
    prescribe_dosage int DEFAULT NULL,
    prescribe_unit varchar(255) DEFAULT NULL,
    prescribe_frequency varchar(255) DEFAULT NULL,
    prescribe_duration varchar(255) DEFAULT NULL,
    prescribe_qty int DEFAULT NULL,
    prescribe_item_unit varchar(255) DEFAULT NULL,
    prescribe_route varchar(255) DEFAULT NULL,
    prescribe_number int DEFAULT NULL,
    prescribe_date date DEFAULT NULL,
    prescribe_time time(0) DEFAULT NULL,
    prescribe_instruction varchar(255) DEFAULT NULL,
    prescribe_type varchar(255) DEFAULT NULL,
    prescribe_iteration int DEFAULT NULL,
    prescribe_note varchar(max),
    prescribe_price float DEFAULT NULL,
    prescribe_deleted int DEFAULT '0',
    prescribe_dokter int DEFAULT NULL,
    prescribe_poli varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (prescribe_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_prosedur`
--

DROP TABLE IF EXISTS rs_pasien_prosedur;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_prosedur (
    pprosedur_id bigint check (pprosedur_id > 0) NOT NULL IDENTITY,
    pprosedur_reg varchar(255) NOT NULL,
    pprosedur_prosedur varchar(255) NOT NULL,
    pprosedur_dokter varchar(10) NOT NULL,
    pprosedur_deleted int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pprosedur_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_radiol`
--

DROP TABLE IF EXISTS rs_pasien_radiol;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_radiol (
    pradiol_kode varchar(20) NOT NULL,
    pradiol_reg varchar(20) DEFAULT NULL,
    pradiol_sequence varchar(50) DEFAULT NULL,
    pradiol_tindakan varchar(255) DEFAULT NULL,
    pradiol_jenis varchar(100) DEFAULT NULL,
    pradiol_jumlah int NOT NULL DEFAULT '1',
    pradiol_jumlah_diambil int NOT NULL DEFAULT '1',
    pradiol_tarif float NOT NULL DEFAULT '1.00',
    pradiol_hasil varchar(max),
    pradiol_kesimpulan varchar(max),
    pradiol_file varchar(max),
    pradiol_tgl_hasil datetime2 (0) DEFAULT NULL,
    pradiol_accession varchar(255) DEFAULT NULL,
    pradiol_dokter int DEFAULT NULL,
    pradiol_poli varchar(255) DEFAULT NULL,
    pradiol_radiografer int DEFAULT NULL,
    pradiol_deleted int NOT NULL DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (pradiol_kode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_rehab`
--

DROP TABLE IF EXISTS rs_pasien_rehab;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_rehab (
    prehab_kode varchar(20) NOT NULL,
    prehab_reg varchar(20) DEFAULT NULL,
    prehab_sequence varchar(50) DEFAULT NULL,
    prehab_tindakan varchar(255) DEFAULT NULL,
    prehab_jenis varchar(255) DEFAULT NULL,
    prehab_jumlah int NOT NULL DEFAULT '1',
    prehab_jumlah_diambil int NOT NULL DEFAULT '1',
    prehab_tarif float NOT NULL DEFAULT '0.00',
    prehab_hasil varchar(max),
    prehab_file varchar(max),
    prehab_tgl_hasil datetime2 (0) DEFAULT NULL,
    prehab_dokter int DEFAULT NULL,
    prehab_poli varchar(255) DEFAULT NULL,
    prehab_deleted int NOT NULL DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (prehab_kode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_rehab_fisio`
--

DROP TABLE IF EXISTS rs_pasien_rehab_fisio;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_rehab_fisio (
    fisio_id bigint check (fisio_id > 0) NOT NULL IDENTITY,
    fisio_reg varchar(20) DEFAULT NULL,
    fisio_check varchar(max),
    fisio_fisioterapis int DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (fisio_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_responsetime`
--

DROP TABLE IF EXISTS rs_pasien_responsetime;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_responsetime (
    response_id bigint check (response_id > 0) NOT NULL IDENTITY,
    response_reg varchar(255) NOT NULL,
    response_user int NOT NULL,
    response_poli varchar(11) NOT NULL,
    response_konsultasi int NOT NULL DEFAULT '0',
    response_jam_datang time(0) NOT NULL,
    response_jam_layanan time(0) DEFAULT NULL,
    response_jam_selesai time(0) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (response_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_resume`
--

DROP TABLE IF EXISTS rs_pasien_resume;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_resume (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    riwayat_alergi varchar(255) DEFAULT NULL,
    riwayat_alergi_lain varchar(255) DEFAULT NULL,
    keluhan_utama varchar(max),
    riwayat_penyakit varchar(max),
    pemeriksaan_fisik varchar(max),
    temuan_klinik varchar(255) DEFAULT NULL,
    pemeriksaan_lab varchar(255) DEFAULT NULL,
    pemeriksaan_radiologi varchar(255) DEFAULT NULL,
    radiologi_keterangan varchar(255) DEFAULT NULL,
    pemeriksaan_pa varchar(255) DEFAULT NULL,
    pa_keterangan varchar(255) DEFAULT NULL,
    terpasang_implant varchar(255) DEFAULT NULL,
    implant_keterangan varchar(255) DEFAULT NULL,
    lain_lain varchar(255) DEFAULT NULL,
    pemeriksaan_penunjang_yang_tertunda varchar(255) DEFAULT NULL,
    penunjang_keterangan varchar(255) DEFAULT NULL,
    alasan_penundaan varchar(255) DEFAULT NULL,
    tanggal_pengembalian varchar(255) DEFAULT NULL,
    lokasi_pengembalian varchar(255) DEFAULT NULL,
    indikasi_rawat varchar(max),
    diagnosis_masuk varchar(max),
    penyebab_luar varchar(max),
    penyebab_luar_icd varchar(255) DEFAULT NULL,
    diagnosa varchar(max),
    prosedur varchar(max),
    terapi varchar(max),
    tindakan varchar(max),
    alasan_pulang varchar(max),
    rs_lain_ke varchar(255) DEFAULT NULL,
    rs_lain_alasan varchar(255) DEFAULT NULL,
    kondisi_pulang varchar(max),
    alat_bantu_sebutkan varchar(255) DEFAULT NULL,
    td varchar(255) DEFAULT NULL,
    hr varchar(255) DEFAULT NULL,
    rr varchar(255) DEFAULT NULL,
    t varchar(255) DEFAULT NULL,
    edukasi_penyakit varchar(255) DEFAULT NULL,
    edukasi_diet varchar(255) DEFAULT NULL,
    edukasi_alat_bantu varchar(255) DEFAULT NULL,
    dokter_id varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    ttd_dokter varchar(max),
    ttd_pasien varchar(max),
    nama_pasien_keluarga varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_soapdok`
--

DROP TABLE IF EXISTS rs_pasien_soapdok;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_soapdok (
    soapdok_id bigint check (soapdok_id > 0) NOT NULL IDENTITY,
    soapdok_dokter varchar(10) DEFAULT NULL,
    soapdok_poli varchar(20) DEFAULT NULL,
    soapdok_reg varchar(255) DEFAULT NULL,
    soapdok_subject varchar(max),
    soapdok_object varchar(max),
    soapdok_assesment varchar(max),
    soapdok_planning varchar(max),
    soapdok_instruksi varchar(max) NOT NULL,
    soap_tanggal date NOT NULL,
    soap_waktu time(0) NOT NULL,
    med_rec varchar(150) NOT NULL,
    soapdok_deleted int DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (soapdok_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_soaper`
--

DROP TABLE IF EXISTS rs_pasien_soaper;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_soaper (
    soaper_id bigint check (soaper_id > 0) NOT NULL IDENTITY,
    soaper_reg varchar(255) DEFAULT NULL,
    soaper_subject varchar(max),
    soaper_object varchar(max),
    soaper_assesment varchar(max),
    soaper_planning varchar(max),
    soaper_deleted int NOT NULL DEFAULT '0',
    soaper_perawat varchar(50) DEFAULT NULL,
    soaper_poli varchar(20) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    nama_ppa varchar(150) NOT NULL,
    PRIMARY KEY (soaper_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_tagihan_review`
--

DROP TABLE IF EXISTS rs_pasien_tagihan_review;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_tagihan_review (
    id int NOT NULL IDENTITY,
    reg_no varchar(200) DEFAULT NULL,
    order_no varchar(200) DEFAULT NULL,
    item_code varchar(200) DEFAULT NULL,
    jenis_order varchar(150) NOT NULL,
    item_name varchar(200) NOT NULL,
    qty int DEFAULT NULL,
    flag varchar(200) DEFAULT NULL,
    dosis int DEFAULT NULL,
    hari varchar(200) DEFAULT NULL,
    durasi_hari varchar(200) DEFAULT NULL,
    harga_jual int DEFAULT NULL,
    ket_dosis varchar(200) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pasien_transaksi`
--

DROP TABLE IF EXISTS rs_pasien_transaksi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pasien_transaksi (
    id int NOT NULL IDENTITY,
    kasir_id varchar(150) DEFAULT NULL,
    nama_kasir varchar(150) DEFAULT NULL,
    no_faktur varchar(150) DEFAULT NULL,
    reg_no varchar(150) DEFAULT NULL,
    tanggungan_asuransi varchar(20) DEFAULT NULL,
    selisih_bayar varchar(20) DEFAULT NULL,
    cara_bayar varchar(30) check (
        cara_bayar in ('debit', 'cash', 'kredit')
    ) DEFAULT NULL,
    nomor_kartu varchar(150) DEFAULT NULL,
    tgl_bayar date DEFAULT NULL,
    jam_bayar time(0) DEFAULT NULL,
    status_bayar varchar(30) check (
        status_bayar in ('lunas', 'belum lunas')
    ) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_paska_tindakan`
--

DROP TABLE IF EXISTS rs_paska_tindakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_paska_tindakan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    dokter_yang_merawat varchar(255) DEFAULT NULL,
    diagnosa_medis varchar(255) DEFAULT NULL,
    masalah_keperawatan varchar(255) DEFAULT NULL,
    prosedur_yang_dilakukan varchar(255) DEFAULT NULL,
    hasil_prosedur varchar(255) DEFAULT NULL,
    keadaan_umum varchar(255) DEFAULT NULL,
    gcs varchar(255) DEFAULT NULL,
    pupil_reaksi_kanan varchar(255) DEFAULT NULL,
    pupil_reaksi_kiri varchar(255) DEFAULT NULL,
    td varchar(255) DEFAULT NULL,
    nadi varchar(255) DEFAULT NULL,
    rr varchar(255) DEFAULT NULL,
    suhu varchar(255) DEFAULT NULL,
    spo2 varchar(255) DEFAULT NULL,
    skala_nyeri varchar(255) DEFAULT NULL,
    akses varchar(255) DEFAULT NULL,
    akses_femoralis_text varchar(255) DEFAULT NULL,
    sheat_aff varchar(255) DEFAULT NULL,
    teknik_hemostasis varchar(255) DEFAULT NULL,
    teknik_hemostasis_isi_balon varchar(255) DEFAULT NULL,
    teknik_hemostasis_text varchar(255) DEFAULT NULL,
    komplikasi varchar(255) DEFAULT NULL,
    total_kontras varchar(255) DEFAULT NULL,
    diet varchar(255) DEFAULT NULL,
    diet_khusus_text varchar(255) DEFAULT NULL,
    bab varchar(255) DEFAULT NULL,
    bak varchar(255) DEFAULT NULL,
    mobilisasi varchar(255) DEFAULT NULL,
    hal_istimewa_pasien varchar(255) DEFAULT NULL,
    assessment varchar(255) DEFAULT NULL,
    recommendations varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pemeriksaan_bayi`
--

DROP TABLE IF EXISTS rs_pemeriksaan_bayi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pemeriksaan_bayi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    keadaan_umum varchar(255) DEFAULT NULL,
    suhu varchar(255) DEFAULT NULL,
    pernafasan varchar(255) DEFAULT NULL,
    denyut_nadi varchar(255) DEFAULT NULL,
    berat_badan varchar(255) DEFAULT NULL,
    panjang_badan varchar(255) DEFAULT NULL,
    bentuk_kepala varchar(255) DEFAULT NULL,
    fontanel varchar(255) DEFAULT NULL,
    molding varchar(255) DEFAULT NULL,
    caput_succedaneum varchar(255) DEFAULT NULL,
    chepal_hematoom varchar(255) DEFAULT NULL,
    muka varchar(255) DEFAULT NULL,
    conjungtiva varchar(255) DEFAULT NULL,
    sklera varchar(255) DEFAULT NULL,
    bola_mata varchar(255) DEFAULT NULL,
    gerakan_bola_mata varchar(255) DEFAULT NULL,
    bentuk_telinga varchar(255) DEFAULT NULL,
    posisi_telinga varchar(255) DEFAULT NULL,
    lobang_telinga varchar(255) DEFAULT NULL,
    bibir varchar(255) DEFAULT NULL,
    leher varchar(255) DEFAULT NULL,
    dada varchar(255) DEFAULT NULL,
    tali_pusat varchar(255) DEFAULT NULL,
    posisi_punggung varchar(255) DEFAULT NULL,
    fleksibilitas_tulang_punggung varchar(255) DEFAULT NULL,
    kelainan_punggung varchar(255) DEFAULT NULL,
    ekstermitas_atas varchar(255) DEFAULT NULL,
    ekstermitas_bawah varchar(255) DEFAULT NULL,
    abdomen_bentuk varchar(255) DEFAULT NULL,
    abdomen_palpasi varchar(255) DEFAULT NULL,
    kelainan_abdomen varchar(255) DEFAULT NULL,
    genetalia_jenis_kelamin varchar(255) DEFAULT NULL,
    genetalia_kelainan varchar(255) DEFAULT NULL,
    anus varchar(255) DEFAULT NULL,
    menghisap varchar(255) DEFAULT NULL,
    menoleh varchar(255) DEFAULT NULL,
    menggenggam varchar(255) DEFAULT NULL,
    babinski varchar(255) DEFAULT NULL,
    moro varchar(255) DEFAULT NULL,
    tonic_nack varchar(255) DEFAULT NULL,
    lingkar_kepala varchar(255) DEFAULT NULL,
    lingkar_dada varchar(255) DEFAULT NULL,
    lingkar_lengan_atas varchar(255) DEFAULT NULL,
    miksi varchar(255) DEFAULT NULL,
    meconeum varchar(255) DEFAULT NULL,
    hb varchar(255) DEFAULT NULL,
    golongan_darah varchar(255) DEFAULT NULL,
    ht varchar(255) DEFAULT NULL,
    pengobatan varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_pemulangan_pasien`
--

DROP TABLE IF EXISTS rs_pemulangan_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_pemulangan_pasien (
    id bigint check (id > 0) NOT NULL IDENTITY,
    user_id bigint check (user_id > 0) NOT NULL,
    reg_no varchar(255) NOT NULL,
    reg_medrec varchar(255) NOT NULL,
    bantuan_dalam_aktifitas varchar(255) DEFAULT '0',
    edukasi_gizi varchar(255) DEFAULT '0',
    penanganan_nyeri_kronis varchar(255) DEFAULT '0',
    pengelolaan_penyakit_secara_berkelanjutan varchar(255) DEFAULT NULL,
    kebutuhan_lainnya varchar(255) DEFAULT '0',
    tanggal date DEFAULT NULL,
    waktu time(0) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    diagnosis_utama varchar(255) DEFAULT NULL,
    diagnosis_sekunder varchar(255) DEFAULT NULL,
    ppsb_tujuan varchar(255) DEFAULT NULL,
    ppsb_tempat varchar(255) DEFAULT NULL,
    kebutuhan_lainnya_check varchar(255) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT rs_pemulangan_pasien_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE INDEX rs_pemulangan_pasien_user_id_foreign ON rs_pemulangan_pasien (user_id);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_registration`
--

DROP TABLE IF EXISTS rs_registration;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_registration (
    reg_no varchar(255) NOT NULL,
    reg_medrec varchar(255) DEFAULT NULL,
    reg_lama varchar(20) DEFAULT NULL,
    reg_status varchar(255) DEFAULT NULL,
    reg_tgl datetime2 (0) DEFAULT GETDATE (),
    reg_jam time(0) DEFAULT NULL,
    reg_poli varchar(255) DEFAULT NULL,
    reg_dokter varchar(255) DEFAULT NULL,
    reg_ruangan varchar(255) DEFAULT NULL,
    reg_tipe_kunj varchar(255) DEFAULT NULL,
    reg_menit varchar(255) DEFAULT NULL,
    reg_prioritas varchar(255) DEFAULT NULL,
    reg_cara_bayar varchar(255) DEFAULT NULL,
    reg_no_dokumen varchar(255) DEFAULT NULL,
    reg_class varchar(255) DEFAULT NULL,
    reg_no_kartu varchar(255) DEFAULT NULL,
    reg_referal varchar(255) DEFAULT NULL,
    reg_diagnosis varchar(255) DEFAULT NULL,
    reg_corp varchar(255) DEFAULT NULL,
    reg_pjawab varchar(255) DEFAULT NULL,
    reg_cttn_kunj varchar(255) DEFAULT NULL,
    reg_cttn varchar(255) DEFAULT NULL,
    reg_datang time(0) DEFAULT NULL,
    reg_pemeriksaan_mulai time(0) DEFAULT NULL,
    reg_pemeriksaan_selesai time(0) DEFAULT NULL,
    reg_selesai time(0) DEFAULT NULL,
    reg_pulang_partials int NOT NULL DEFAULT '0',
    reg_discharge int DEFAULT NULL,
    reg_deleted varchar(255) DEFAULT NULL,
    reg_deleted_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (reg_no)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_ringkasan_kondisi_pasien`
--

DROP TABLE IF EXISTS rs_ringkasan_kondisi_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_ringkasan_kondisi_pasien (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    reg_medrec varchar(255) DEFAULT NULL,
    tanggal_mrs date DEFAULT NULL,
    jam time(0) DEFAULT NULL,
    keluhan varchar(255) DEFAULT NULL,
    alergi varchar(255) DEFAULT NULL,
    kewaspadaan varchar(255) DEFAULT NULL,
    tanda_vital varchar(255) DEFAULT NULL,
    gcs varchar(255) DEFAULT NULL,
    td varchar(255) DEFAULT NULL,
    n varchar(255) DEFAULT NULL,
    skala_nyeri varchar(255) DEFAULT NULL,
    e varchar(255) DEFAULT NULL,
    m varchar(255) DEFAULT NULL,
    v varchar(255) DEFAULT NULL,
    suhu varchar(255) DEFAULT NULL,
    p varchar(255) DEFAULT NULL,
    spo2 varchar(255) DEFAULT NULL,
    pemeriksaan_fisik varchar(255) DEFAULT NULL,
    diagnosis varchar(255) DEFAULT NULL,
    pemeriksaan_penunjang_pasien varchar(255) DEFAULT NULL,
    prosedur_operasi varchar(255) DEFAULT NULL,
    alat_terpasang varchar(255) DEFAULT NULL,
    tanggal_alat_terpasang date DEFAULT NULL,
    obat_yang_diterima varchar(255) DEFAULT NULL,
    obat_yang_dibawah varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_rujukan_alat_terpasang`
--

DROP TABLE IF EXISTS rs_rujukan_alat_terpasang;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_rujukan_alat_terpasang (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_surat_rujukan varchar(255) NOT NULL,
    nama_alat_terpasang varchar(max) NOT NULL,
    waktu_alat_terpasang datetime2 (0) NOT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_rujukan_obat_cairan_dibawa`
--

DROP TABLE IF EXISTS rs_rujukan_obat_cairan_dibawa;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_rujukan_obat_cairan_dibawa (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_surat_rujukan varchar(255) NOT NULL,
    item_id varchar(255) NOT NULL,
    quantity varchar(255) DEFAULT NULL,
    item_unit_code varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_rujukan_obat_diterima`
--

DROP TABLE IF EXISTS rs_rujukan_obat_diterima;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_rujukan_obat_diterima (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_surat_rujukan varchar(255) NOT NULL,
    item_id_terima varchar(255) NOT NULL,
    quantity_terima varchar(255) DEFAULT NULL,
    item_unit_code_terima varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_rujukan_persiapan_pasien`
--

DROP TABLE IF EXISTS rs_rujukan_persiapan_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_rujukan_persiapan_pasien (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_surat_rujukan varchar(255) DEFAULT NULL,
    rujukan_rs_asal varchar(255) DEFAULT NULL,
    rujukan_pemberi_informasi varchar(255) DEFAULT NULL,
    ParamedicCode varchar(255) DEFAULT NULL,
    rujukan_rs_tujuan varchar(255) DEFAULT NULL,
    rujukan_penerima_informasi varchar(255) DEFAULT NULL,
    rujukan_nama_petugas varchar(255) DEFAULT NULL,
    rujukan_hubungi_tanggal date DEFAULT NULL,
    rujukan_hubungi_jam time(0) DEFAULT NULL,
    rujukan_alasan_transfer varchar(255) DEFAULT NULL,
    rujukan_transfer_tanggal date DEFAULT NULL,
    rujukan_transfer_jam time(0) DEFAULT NULL,
    rujukan_kategori varchar(255) DEFAULT NULL,
    rujukan_transportasi varchar(255) DEFAULT NULL,
    rujukan_ringkasan_tanggal date DEFAULT NULL,
    rujukan_ringkasan_jam time(0) DEFAULT NULL,
    rujukan_keluhan varchar(255) DEFAULT NULL,
    rujukan_alergi varchar(255) DEFAULT NULL,
    rujukan_kewaspaan varchar(255) DEFAULT NULL,
    rujukan_gcs_e varchar(255) DEFAULT NULL,
    rujukan_gcs_m varchar(255) DEFAULT NULL,
    rujukan_gcs_v varchar(255) DEFAULT NULL,
    rujukan_td varchar(255) DEFAULT NULL,
    rujukan_N varchar(255) DEFAULT NULL,
    rujukan_skala_nyeri varchar(255) DEFAULT NULL,
    rujukan_suhu varchar(255) DEFAULT NULL,
    rujukan_p varchar(255) DEFAULT NULL,
    rujukan_spo2 varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_rujukan_prosedur_operasi`
--

DROP TABLE IF EXISTS rs_rujukan_prosedur_operasi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_rujukan_prosedur_operasi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_surat_rujukan varchar(255) NOT NULL,
    detail_prosedur_operasi varchar(max) NOT NULL,
    waktu_prosedur_operasi datetime2 (0) NOT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_rujukan_serah_terima`
--

DROP TABLE IF EXISTS rs_rujukan_serah_terima;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_rujukan_serah_terima (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_surat_rujukan varchar(255) DEFAULT NULL,
    rujukan_terima_tanggal date DEFAULT NULL,
    rujukan_terima_jam time(0) DEFAULT NULL,
    rujukan_terima_kondisi varchar(255) DEFAULT NULL,
    rujukan_terima_gcs_e varchar(255) DEFAULT NULL,
    rujukan_terima_gcs_m varchar(255) DEFAULT NULL,
    rujukan_terima_gcs_v varchar(255) DEFAULT NULL,
    rujukan_terima_td varchar(255) DEFAULT NULL,
    rujukan_terima_n varchar(255) DEFAULT NULL,
    rujukan_terima_suhu varchar(255) DEFAULT NULL,
    rujukan_terima_p varchar(255) DEFAULT NULL,
    rujukan_terima_sp02 varchar(255) DEFAULT NULL,
    rujukan_terima_skala_nyeri varchar(255) DEFAULT NULL,
    rujukan_terima_lab varchar(255) DEFAULT NULL,
    rujukan_terima_xray varchar(255) DEFAULT NULL,
    rujukan_terima_mri varchar(255) DEFAULT NULL,
    rujukan_terima_ct_scan varchar(255) DEFAULT NULL,
    rujukan_terima_ekg varchar(255) DEFAULT NULL,
    rujukan_terima_echo varchar(255) DEFAULT NULL,
    diserahkan_oleh_user_id bigint DEFAULT NULL,
    diserahkan_oleh_nama varchar(255) DEFAULT NULL,
    diserahkan_waktu datetime2 (0) DEFAULT NULL,
    diterima_oleh_user_id bigint DEFAULT NULL,
    diterima_oleh_nama varchar(255) DEFAULT NULL,
    diterima_waktu datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_rujukan_status_pasien`
--

DROP TABLE IF EXISTS rs_rujukan_status_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_rujukan_status_pasien (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_surat_rujukan varchar(255) NOT NULL,
    waktu datetime2 (0) NOT NULL,
    kesadaran varchar(255) DEFAULT NULL,
    td varchar(255) DEFAULT NULL,
    hr varchar(255) DEFAULT NULL,
    rr varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_tindakan_medis_informasi`
--

DROP TABLE IF EXISTS rs_tindakan_medis_informasi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_tindakan_medis_informasi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    informasi_kode_tindakan varchar(255) DEFAULT NULL,
    informasi_nama_tindakan varchar(255) DEFAULT NULL,
    ParamedicCode varchar(255) DEFAULT NULL,
    informasi_pemberi_info varchar(255) DEFAULT NULL,
    informasi_penerima_info varchar(255) DEFAULT NULL,
    informasi_diberikan_pada datetime2 (0) DEFAULT NULL,
    informasi_diagnosis_text varchar(255) DEFAULT NULL,
    informasi_dasar_diagnosis_text varchar(255) DEFAULT NULL,
    informasi_tindakan_kedokteran_text varchar(255) DEFAULT NULL,
    informasi_indikasi_tindakan_text varchar(255) DEFAULT NULL,
    informasi_tata_cara_text varchar(255) DEFAULT NULL,
    informasi_tujuan_text varchar(255) DEFAULT NULL,
    informasi_risiko_text varchar(255) DEFAULT NULL,
    informasi_komplikasi_text varchar(255) DEFAULT NULL,
    informasi_prognosis_text varchar(255) DEFAULT NULL,
    informasi_alternatif_text varchar(255) DEFAULT NULL,
    informasi_lain_lain_text varchar(255) DEFAULT NULL,
    informasi_diagnosis_paraf varchar(255) DEFAULT NULL,
    informasi_dasar_diagnosis_paraf varchar(255) DEFAULT NULL,
    informasi_tindakan_kedokteran_paraf varchar(255) DEFAULT NULL,
    informasi_indikasi_tindakan_paraf varchar(255) DEFAULT NULL,
    informasi_tata_cara_paraf varchar(255) DEFAULT NULL,
    informasi_tujuan_paraf varchar(max),
    informasi_risiko_paraf varchar(max),
    informasi_komplikasi_paraf varchar(max),
    informasi_prognosis_paraf varchar(max),
    informasi_alternatif_paraf varchar(max),
    informasi_lain_lain_paraf varchar(max),
    informasi_ttd_dokter varchar(max),
    informasi_ttd_penerima_informasi varchar(max),
    kode_tindakan_medis_setuju_tolak varchar(255) DEFAULT NULL,
    nama_dokter varchar(255) DEFAULT NULL,
    nama_penerima_informasi varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_tindakan_medis_penolakan`
--

DROP TABLE IF EXISTS rs_tindakan_medis_penolakan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_tindakan_medis_penolakan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    penolakan_nama_1 varchar(255) DEFAULT NULL,
    penolakan_jenis_kelamin_1 varchar(255) DEFAULT NULL,
    penolakan_tanggal_lahir_1 varchar(255) DEFAULT NULL,
    penolakan_alamat_1 varchar(255) DEFAULT NULL,
    penolakan_pernyataan varchar(255) DEFAULT NULL,
    penolakan_terhadap varchar(255) DEFAULT NULL,
    penolakan_nama_2 varchar(255) DEFAULT NULL,
    penolakan_jenis_kelamin_2 varchar(255) DEFAULT NULL,
    penolakan_tanggal_lahir_2 varchar(255) DEFAULT NULL,
    penolakan_alamat_2 varchar(255) DEFAULT NULL,
    penolakan_tanggal_ttd datetime2 (0) DEFAULT NULL,
    penolakan_ttd_yg_menyatakan varchar(max),
    penolakan_ttd_dokter varchar(max),
    penolakan_ttd_keluarga varchar(max),
    penolakan_ttd_perawat varchar(max),
    kode_tindakan_medis_setuju_tolak varchar(255) DEFAULT NULL,
    nama_penolakan_penerima varchar(255) DEFAULT NULL,
    nama_penolakan_dokter varchar(255) DEFAULT NULL,
    nama_penolakan_keluarga varchar(255) DEFAULT NULL,
    nama_penolakan_perawat varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `rs_tindakan_medis_persetujuan`
--

DROP TABLE IF EXISTS rs_tindakan_medis_persetujuan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE rs_tindakan_medis_persetujuan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    persetujuan_nama_1 varchar(255) DEFAULT NULL,
    persetujuan_jenis_kelamin_1 varchar(255) DEFAULT NULL,
    persetujuan_tanggal_lahir_1 varchar(255) DEFAULT NULL,
    persetujuan_alamat_1 varchar(255) DEFAULT NULL,
    persetujuan_pernyataan varchar(255) DEFAULT NULL,
    persetujuan_terhadap varchar(255) DEFAULT NULL,
    persetujuan_nama_2 varchar(255) DEFAULT NULL,
    persetujuan_jenis_kelamin_2 varchar(255) DEFAULT NULL,
    persetujuan_tanggal_lahir_2 varchar(255) DEFAULT NULL,
    persetujuan_alamat_2 varchar(255) DEFAULT NULL,
    persetujuan_tanggal_waktu_ttd datetime2 (0) DEFAULT NULL,
    persetujuan_ttd_yg_menyatakan varchar(max),
    persetujuan_ttd_dokter varchar(max),
    persetujuan_ttd_keluarga varchar(max),
    persetujuan_ttd_perawat varchar(max),
    kode_tindakan_medis_setuju_tolak varchar(255) DEFAULT NULL,
    nama_persetujuan_penerima varchar(255) DEFAULT NULL,
    nama_persetujuan_dokter varchar(255) DEFAULT NULL,
    nama_persetujuan_keluarga varchar(255) DEFAULT NULL,
    nama_persetujuan_perawat varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `skor_sad_person_anak`
--

DROP TABLE IF EXISTS skor_sad_person_anak;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE skor_sad_person_anak (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    sex smallint DEFAULT NULL,
    age smallint DEFAULT NULL,
    depresi smallint DEFAULT NULL,
    suicide smallint DEFAULT NULL,
    alcohol smallint DEFAULT NULL,
    thinking_loss smallint DEFAULT NULL,
    separated smallint DEFAULT NULL,
    organized_plan smallint DEFAULT NULL,
    no_social_support smallint DEFAULT NULL,
    sickness smallint DEFAULT NULL,
    skor_sad_person int DEFAULT NULL,
    created_by varchar(100) DEFAULT NULL,
    updated_by varchar(100) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `skrining_gizi`
--

DROP TABLE IF EXISTS skrining_gizi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE skrining_gizi (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_medrec varchar(255) NOT NULL,
    reg_no varchar(255) NOT NULL,
    turun_berat_badan varchar(255) NOT NULL,
    turun_nafsu_makan varchar(255) NOT NULL,
    ketegori varchar(255) NOT NULL,
    catatan varchar(255) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    total_skor varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `skrining_gizi_anak`
--

DROP TABLE IF EXISTS skrining_gizi_anak;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE skrining_gizi_anak (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    tampak_kurus smallint DEFAULT NULL,
    penurunan_bb smallint DEFAULT NULL,
    kondisi_anak smallint DEFAULT NULL,
    resiko_malnutrisi smallint DEFAULT NULL,
    skor_gizi_anak int DEFAULT NULL,
    kategori_gizi varchar(5) DEFAULT NULL,
    diketahui_dietisien smallint DEFAULT NULL,
    diketahui_pukul time(0) DEFAULT NULL,
    sebab_malnutrisi varchar(max),
    sebab_malnutrisi_lain varchar(255) DEFAULT NULL,
    created_by varchar(100) DEFAULT NULL,
    updated_by varchar(100) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `skrining_gizi_anak_old`
--

DROP TABLE IF EXISTS skrining_gizi_anak_old;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE skrining_gizi_anak_old (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    reg_medrec varchar(255) NOT NULL,
    asper_kurus_anak varchar(255) DEFAULT NULL,
    asper_penurunan_bb_anak varchar(255) DEFAULT NULL,
    asper_kondisi_anak varchar(255) DEFAULT NULL,
    asper_penyakit_anak varchar(255) DEFAULT NULL,
    asper_skor_anak varchar(255) DEFAULT NULL,
    asper_sebab_malnutrisi varchar(max),
    asper_sebab_malnutrisi_lain varchar(255) DEFAULT NULL,
    total_skor_gizi_anak varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `skrining_nyeri`
--

DROP TABLE IF EXISTS skrining_nyeri;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE skrining_nyeri (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_medrec varchar(255) NOT NULL,
    reg_no varchar(255) NOT NULL,
    merasakan_nyeri varchar(255) DEFAULT NULL,
    durasi varchar(255) DEFAULT NULL,
    frekuensi varchar(255) DEFAULT NULL,
    pencetus_nyeri varchar(255) DEFAULT NULL,
    kapan_terjadi_nyeri varchar(255) DEFAULT NULL,
    tipe_nyeri varchar(255) DEFAULT NULL,
    ekspresi_wajah varchar(255) DEFAULT NULL,
    bps_wajah varchar(255) DEFAULT NULL,
    bps_ekstremitas_atas varchar(255) DEFAULT NULL,
    bps_compleance_atas varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `skrining_nyeri_anak`
--

DROP TABLE IF EXISTS skrining_nyeri_anak;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE skrining_nyeri_anak (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    skala_wong_baker smallint DEFAULT NULL,
    nyeri_skala smallint DEFAULT NULL,
    merasa_nyeri smallint DEFAULT NULL,
    lokasi_nyeri varchar(255) DEFAULT NULL,
    detail_skala_nyeri varchar(255) DEFAULT NULL,
    durasi_nyeri varchar(30) DEFAULT NULL,
    frekuensi_nyeri varchar(30) DEFAULT NULL,
    pencetus_nyeri varchar(255) DEFAULT NULL,
    tipe_nyeri varchar(255) DEFAULT NULL,
    menjalar_ket varchar(255) DEFAULT NULL,
    ekspresi_wajah varchar(30) DEFAULT NULL,
    skala_flacc smallint DEFAULT NULL,
    wajah smallint DEFAULT NULL,
    ekstremitas smallint DEFAULT NULL,
    gerakan smallint DEFAULT NULL,
    menangis smallint DEFAULT NULL,
    ketenangan smallint DEFAULT NULL,
    total_skor_flacc int DEFAULT NULL,
    created_by varchar(255) DEFAULT NULL,
    updated_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `specialty`
--

DROP TABLE IF EXISTS specialty;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE specialty (
    id int NOT NULL IDENTITY,
    name_specialty varchar(150) DEFAULT NULL,
    tanggal datetime2 (0) DEFAULT NULL,
    id_pasien varchar(25) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `transfer_internal`
--

DROP TABLE IF EXISTS transfer_internal;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE transfer_internal (
    transfer_id bigint check (transfer_id > 0) NOT NULL IDENTITY,
    transfer_reg varchar(255) NOT NULL,
    transfer_alergi_text varchar(max),
    transfer_alat_terpasang varchar(255) DEFAULT NULL,
    transfer_data varchar(max),
    status_transfer smallint NOT NULL DEFAULT '0',
    transfer_deleted int DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    kode_transfer_internal varchar(255) DEFAULT NULL,
    medrec varchar(255) DEFAULT NULL,
    ditransfer_oleh_user_id bigint DEFAULT NULL,
    ditransfer_oleh_nama varchar(255) DEFAULT NULL,
    ditransfer_waktu datetime2 (0) DEFAULT NULL,
    diterima_oleh_user_id bigint DEFAULT NULL,
    diterima_oleh_nama varchar(255) DEFAULT NULL,
    diterima_waktu datetime2 (0) DEFAULT NULL,
    transfer_terima_tanggal datetime2 (0) DEFAULT NULL,
    transfer_terima_kondisi varchar(255) DEFAULT NULL,
    transfer_terima_gcs_e varchar(255) DEFAULT NULL,
    transfer_terima_gcs_m varchar(255) DEFAULT NULL,
    transfer_terima_gcs_v varchar(255) DEFAULT NULL,
    transfer_terima_td varchar(255) DEFAULT NULL,
    transfer_terima_n varchar(255) DEFAULT NULL,
    transfer_terima_suhu varchar(255) DEFAULT NULL,
    transfer_terima_p varchar(255) DEFAULT NULL,
    transfer_terima_lab varchar(255) DEFAULT NULL,
    transfer_terima_xray varchar(255) DEFAULT NULL,
    transfer_terima_mri varchar(255) DEFAULT NULL,
    transfer_terima_ct_scan varchar(255) DEFAULT NULL,
    transfer_terima_ekg varchar(255) DEFAULT NULL,
    transfer_terima_echo varchar(255) DEFAULT NULL,
    transfer_dokumen_yang_disertakan varchar(max),
    signature_doctor varchar(max),
    signature_nurse varchar(max),
    signature_doctor_2 varchar(max),
    signature_nurse_2 varchar(max),
    transfer_unit_asal varchar(255) DEFAULT NULL,
    transfer_unit_tujuan varchar(255) DEFAULT NULL,
    class varchar(50) DEFAULT NULL,
    charge_class varchar(50) DEFAULT NULL,
    transfer_rawat_intensif smallint DEFAULT '0',
    transfer_unit_tujuan_petugas varchar(255) DEFAULT NULL,
    transfer_kategori varchar(255) DEFAULT NULL,
    transfer_alasan_masuk varchar(255) DEFAULT NULL,
    transfer_diagnosis varchar(255) DEFAULT NULL,
    transfer_temuan varchar(255) DEFAULT NULL,
    transfer_alergi varchar(255) DEFAULT NULL,
    transfer_kewaspaan varchar(255) DEFAULT NULL,
    transfer_gcs_e varchar(255) DEFAULT NULL,
    transfer_gcs_m varchar(255) DEFAULT NULL,
    transfer_gcs_v varchar(255) DEFAULT NULL,
    transfer_td varchar(255) DEFAULT NULL,
    transfer_N varchar(255) DEFAULT NULL,
    transfer_skala_nyeri varchar(255) DEFAULT NULL,
    transfer_suhu varchar(255) DEFAULT NULL,
    transfer_p varchar(255) DEFAULT NULL,
    transfer_spo2 varchar(255) DEFAULT NULL,
    transfer_waktu_hubungi datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (transfer_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `transfer_internal_alat_terpasang`
--

DROP TABLE IF EXISTS transfer_internal_alat_terpasang;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE transfer_internal_alat_terpasang (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_transfer_internal varchar(255) NOT NULL,
    nama_alat_terpasang varchar(max) NOT NULL,
    waktu_alat_terpasang datetime2 (0) NOT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `transfer_internal_diagnostik`
--

DROP TABLE IF EXISTS transfer_internal_diagnostik;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE transfer_internal_diagnostik (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_transfer_internal varchar(255) NOT NULL,
    lab varchar(255) DEFAULT NULL,
    xray varchar(255) DEFAULT NULL,
    mri varchar(255) DEFAULT NULL,
    ct_scan varchar(255) DEFAULT NULL,
    ekg varchar(255) DEFAULT NULL,
    echo varchar(255) DEFAULT NULL,
    hapus smallint NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    created_by_username varchar(255) NOT NULL,
    deleted_by_username varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `transfer_internal_kejadian`
--

DROP TABLE IF EXISTS transfer_internal_kejadian;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE transfer_internal_kejadian (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_transfer_internal varchar(255) NOT NULL,
    waktu datetime2 (0) NOT NULL,
    kejadian varchar(max),
    tindakan varchar(max),
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `transfer_internal_obat_dibawa`
--

DROP TABLE IF EXISTS transfer_internal_obat_dibawa;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE transfer_internal_obat_dibawa (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_transfer_internal varchar(255) NOT NULL,
    item_id varchar(255) NOT NULL,
    quantity varchar(255) DEFAULT NULL,
    item_unit_code varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `transfer_internal_status_pasien`
--

DROP TABLE IF EXISTS transfer_internal_status_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE transfer_internal_status_pasien (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    med_rec varchar(255) NOT NULL,
    kode_transfer_internal varchar(255) NOT NULL,
    waktu datetime2 (0) NOT NULL,
    kesadaran varchar(255) DEFAULT NULL,
    td varchar(255) DEFAULT NULL,
    hr varchar(255) DEFAULT NULL,
    rr varchar(255) DEFAULT NULL,
    spo2 varchar(255) DEFAULT NULL,
    aktif int NOT NULL DEFAULT '1',
    aktif_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    aktif_by_user_name varchar(255) DEFAULT NULL,
    hapus int NOT NULL DEFAULT '0',
    hapus_at datetime2 (0) NULL DEFAULT NULL,
    hapus_by_user_name varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NOT NULL DEFAULT GETDATE (),
    created_by_user_name varchar(255) DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL /* ON UPDATE GETDATE() */,
    updated_by_user_name varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `users`
--

DROP TABLE IF EXISTS users;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE users (
    id bigint check (id > 0) NOT NULL IDENTITY,
    level_user varchar(50) DEFAULT NULL,
    name varchar(255) NOT NULL,
    username varchar(255) NOT NULL,
    email_verified_at datetime2 (0) NULL DEFAULT NULL,
    password varchar(255) NOT NULL,
    dokter_id varchar(255) DEFAULT NULL,
    perawat_id varchar(255) DEFAULT NULL,
    service_room varchar(255) DEFAULT NULL,
    is_active int NOT NULL DEFAULT '1',
    site int DEFAULT NULL,
    remember_token varchar(100) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `vital_sign`
--

DROP TABLE IF EXISTS vital_sign;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE vital_sign (
    id int NOT NULL IDENTITY,
    reg_no varchar(150) DEFAULT NULL,
    kategori varchar(150) DEFAULT NULL,
    tanggal_pemberian date DEFAULT NULL,
    data varchar(100) DEFAULT NULL,
    created_at datetime2 (0) DEFAULT NULL,
    updated_at datetime2 (0) DEFAULT NULL,
    jam_pemberian time(0) NOT NULL,
    med_rec varchar(150) NOT NULL,
    shift varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** for database 'rs_ranap'
--
/* SQLINES DEMO *** NE=@OLD_TIME_ZONE */
;

/* SQLINES DEMO *** E=@OLD_SQL_MODE */
;
/* SQLINES DEMO *** _KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/* SQLINES DEMO *** CHECKS=@OLD_UNIQUE_CHECKS */
;
/* SQLINES DEMO *** ER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/* SQLINES DEMO *** ER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/* SQLINES DEMO *** ON_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/* SQLINES DEMO *** ES=@OLD_SQL_NOTES */
;

-- SQLINES DEMO ***  2024-10-17 21:39:43