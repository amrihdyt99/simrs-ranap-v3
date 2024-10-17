-- SQLINES DEMO ***  Distrib 8.0.30, for Win64 (x86_64)
--
-- SQLINES DEMO ***   Database: master_siti_fatimah
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
-- SQLINES DEMO *** or table `businesspartner`
--

DROP TABLE IF EXISTS businesspartner;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;
-- SQLINES FOR EVALUATION USE ONLY (14 DAYS)
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
-- SQLINES DEMO *** or table `ketersediaan_ruangan`
--

DROP TABLE IF EXISTS ketersediaan_ruangan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE ketersediaan_ruangan (
    id int NOT NULL IDENTITY,
    id_paviliun varchar(100) DEFAULT NULL,
    nama_pavilun varchar(100) DEFAULT NULL,
    room_code varchar(100) DEFAULT NULL,
    nama_ruangan varchar(100) DEFAULT NULL,
    nomor_bed varchar(100) DEFAULT NULL,
    status_ketersediaan varchar(2) DEFAULT NULL,
    id_kelas varchar(2) DEFAULT NULL,
    nama_kelas varchar(50) DEFAULT NULL,
    harga_perhari varchar(25) DEFAULT NULL,
    is_temporary varchar(30) check (is_temporary in ('0', '1')) DEFAULT '0',
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_bed`
--

DROP TABLE IF EXISTS m_bed;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_bed (
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
    bed_id int check (bed_id > 0) NOT NULL IDENTITY,
    PRIMARY KEY (bed_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_bed_history`
--

DROP TABLE IF EXISTS m_bed_history;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_bed_history (
    id bigint check (id > 0) NOT NULL IDENTITY,
    RegNo varchar(50) NOT NULL,
    MedicalNo varchar(50) NOT NULL,
    FromServiceUnitID bigint check (FromServiceUnitID > 0) DEFAULT NULL,
    FromBedID bigint check (FromBedID > 0) DEFAULT NULL,
    FromClassCode varchar(50) DEFAULT NULL,
    FromChargeClassCode varchar(50) DEFAULT NULL,
    ToUnitServiceID bigint check (ToUnitServiceID > 0) DEFAULT NULL,
    ToBedID bigint check (ToBedID > 0) DEFAULT NULL,
    ToClassCode varchar(50) DEFAULT NULL,
    ToChargeClassCode varchar(50) DEFAULT NULL,
    CreatedBy varchar(100) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    HistoryRefCode varchar(255) DEFAULT NULL,
    RequestTransferDate date DEFAULT NULL,
    RequestTransferTime time(0) DEFAULT NULL,
    RequestedBy varchar(100) DEFAULT NULL,
    ReceivedBy varchar(100) DEFAULT NULL,
    TableRef varchar(255) DEFAULT NULL,
    ReceiveTransferDate date DEFAULT NULL,
    ReceiveTransferTime time(0) DEFAULT NULL,
    Description varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_class_category`
--

DROP TABLE IF EXISTS m_class_category;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_class_category (
    ClassCategoryCode varchar(20) NOT NULL,
    ClassCategoryName varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint NOT NULL DEFAULT '0',
    LastUpdatedBy varchar(50) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (ClassCategoryCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_clinical_pathway`
--

DROP TABLE IF EXISTS m_clinical_pathway;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_clinical_pathway (
    id int NOT NULL IDENTITY,
    kode_path varchar(255) NOT NULL,
    nama_path varchar(255) NOT NULL,
    username varchar(200) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT kode_path_UNIQUE UNIQUE (kode_path)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_daftar_diagnosa_keperawatan`
--

DROP TABLE IF EXISTS m_daftar_diagnosa_keperawatan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_daftar_diagnosa_keperawatan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    kode varchar(10) NOT NULL,
    diagnosa_keperawatan varchar(50) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_daftar_masalah`
--

DROP TABLE IF EXISTS m_daftar_masalah;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_daftar_masalah (
    masalah_kode varchar(50) NOT NULL,
    masalah_nama varchar(255) DEFAULT NULL,
    masalah_layanan varchar(50) DEFAULT NULL,
    updated_by varchar(150) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (masalah_kode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_departemen`
--

DROP TABLE IF EXISTS m_departemen;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_departemen (
    DepartmentCode varchar(20) NOT NULL,
    DepartmentName varchar(255) NOT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Initial varchar(30) DEFAULT NULL,
    DisplayOrder smallint DEFAULT NULL,
    IsHasRegistration smallint DEFAULT NULL,
    IsHasPrescription smallint DEFAULT NULL,
    IsGenerateMedicalNo smallint DEFAULT NULL,
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint NOT NULL DEFAULT '0',
    LastUpdatedBy varchar(50) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (DepartmentCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_detail_orders`
--

DROP TABLE IF EXISTS m_detail_orders;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_detail_orders (
    id int NOT NULL IDENTITY,
    kode_order varchar(150) DEFAULT NULL,
    kode_tindakan varchar(50) DEFAULT NULL,
    nama_tindakan varchar(200) DEFAULT NULL,
    harga_tindakan int DEFAULT NULL,
    jumlah_diambil int DEFAULT NULL,
    hasil_order varchar(200) DEFAULT NULL,
    nama_petugas varchar(200) DEFAULT NULL,
    is_delete varchar(30) check (is_delete in ('0', '1')) DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_diagnosis`
--

DROP TABLE IF EXISTS m_diagnosis;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_diagnosis (
    id int NOT NULL IDENTITY,
    kode_path varchar(255) NOT NULL,
    nama_diagnosis varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_draft`
--

DROP TABLE IF EXISTS m_draft;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_draft (
    draft_id bigint check (draft_id > 0) NOT NULL IDENTITY,
    draft_nama varchar(255) DEFAULT NULL,
    draft_jenis varchar(255) DEFAULT NULL,
    draft_kategori varchar(255) DEFAULT NULL,
    draft_user bigint check (draft_user > 0) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (draft_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_dtd`
--

DROP TABLE IF EXISTS m_dtd;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_dtd (
    DTDNo varchar(100) NOT NULL,
    DTDName varchar(255) DEFAULT NULL,
    DTDLabel varchar(255) DEFAULT NULL,
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint NOT NULL DEFAULT '0',
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (DTDNo)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_education`
--

DROP TABLE IF EXISTS m_education;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_education (
    EducationID bigint check (EducationID > 0) NOT NULL IDENTITY,
    EducationCode varchar(255) DEFAULT NULL,
    EducationName varchar(255) DEFAULT NULL,
    EffectiveDate date DEFAULT NULL,
    PRIMARY KEY (EducationID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_gejala`
--

DROP TABLE IF EXISTS m_gejala;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_gejala (
    id int check (id > 0) NOT NULL IDENTITY,
    kode varchar(50) NOT NULL,
    gejala varchar(max) NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    username varchar(200) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT kode_UNIQUE UNIQUE (kode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_general_code`
--

DROP TABLE IF EXISTS m_general_code;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_general_code (
    GeneralCodeId varchar(50) NOT NULL,
    GeneralCodeName1 varchar(255) DEFAULT NULL,
    GeneralCodeName2 varchar(255) DEFAULT NULL,
    ParentID varchar(50) DEFAULT NULL,
    IsHeader smallint DEFAULT NULL,
    IsUsedBySystem smallint DEFAULT NULL,
    Remarks varchar(max),
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (GeneralCodeId)
);

CREATE INDEX idx_general_code_name1 ON m_general_code (GeneralCodeName1);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_intervention`
--

DROP TABLE IF EXISTS m_intervention;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_intervention (
    id int NOT NULL IDENTITY,
    kode_path varchar(255) NOT NULL,
    nama_intervention varchar(255) NOT NULL,
    username varchar(200) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_item`
--

DROP TABLE IF EXISTS m_item;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_item (
    ItemID bigint check (ItemID > 0) NOT NULL IDENTITY,
    ItemCode varchar(255) NOT NULL,
    GCItemType varchar(255) DEFAULT NULL,
    ItemGroupCode varchar(255) DEFAULT NULL,
    ItemCategory bigint check (ItemCategory > 0) DEFAULT NULL,
    ProductLineID varchar(255) DEFAULT NULL,
    ItemName1 varchar(255) DEFAULT NULL,
    ItemName2 varchar(255) DEFAULT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint DEFAULT NULL,
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
    ItemBundle varchar(255) DEFAULT NULL,
    ItemType varchar(255) DEFAULT NULL,
    ItemServiceUnit varchar(255) DEFAULT NULL,
    ActivePeriode varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (ItemID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_item_group`
--

DROP TABLE IF EXISTS m_item_group;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_item_group (
    ItemGroupCode varchar(255) NOT NULL,
    GCItemType varchar(255) DEFAULT NULL,
    ItemGroupName1 varchar(255) DEFAULT NULL,
    ItemGroupName2 varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    FactGroup varchar(255) DEFAULT NULL,
    OrderNo varchar(255) DEFAULT NULL,
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint NOT NULL DEFAULT '0',
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    PRIMARY KEY (ItemGroupCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_item_tarif`
--

DROP TABLE IF EXISTS m_item_tarif;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_item_tarif (
    tarif_id bigint check (tarif_id > 0) NOT NULL IDENTITY,
    SiteCode varchar(50) NOT NULL,
    GCMember varchar(255) DEFAULT NULL,
    DocumentNo varchar(255) DEFAULT NULL,
    ItemID bigint check (ItemID > 0) DEFAULT NULL,
    ClassCategoryCode varchar(255) DEFAULT NULL,
    RevisionNo varchar(255) DEFAULT NULL,
    DocumentDate datetime2 (0) DEFAULT NULL,
    StartingDate datetime2 (0) DEFAULT NULL,
    EndingDate datetime2 (0) DEFAULT NULL,
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
    BundlePrice float DEFAULT NULL,
    PatientType varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (tarif_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_kelas_ruangan_baru`
--

DROP TABLE IF EXISTS m_kelas_ruangan_baru;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_kelas_ruangan_baru (
    id int NOT NULL IDENTITY,
    nama_kelas varchar(200) DEFAULT NULL,
    tarif_kelas int DEFAULT NULL,
    is_active varchar(30) check (is_active in ('0', '1')) DEFAULT '1',
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_keluarga_pasien`
--

DROP TABLE IF EXISTS m_keluarga_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_keluarga_pasien (
    MedicalNo varchar(255) NOT NULL,
    SequenceNo int DEFAULT NULL,
    FamilyMedicalNo varchar(max),
    FamilyName varchar(255) NOT NULL,
    DateOfBirth date NOT NULL,
    Sex varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_location`
--

DROP TABLE IF EXISTS m_location;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_location (
    LocationID int NOT NULL,
    SiteCode varchar(255) DEFAULT NULL,
    LocationCode varchar(255) DEFAULT NULL,
    LocationName varchar(255) DEFAULT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Initial varchar(255) DEFAULT NULL,
    PermissionCode varchar(255) DEFAULT NULL,
    ParentID varchar(255) DEFAULT NULL,
    Remarks varchar(255) DEFAULT NULL,
    IsAllowOverIssued int DEFAULT NULL,
    IsNettable int DEFAULT NULL,
    IsHoldForTransaction int DEFAULT NULL,
    IsDisplayStock int DEFAULT NULL,
    IsActive int DEFAULT NULL,
    IsDeleted int DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_log_activity`
--

DROP TABLE IF EXISTS m_log_activity;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_log_activity (
    id bigint check (id > 0) NOT NULL IDENTITY,
    log_reg varchar(255) DEFAULT NULL,
    log_medrec varchar(255) DEFAULT NULL,
    log_title varchar(255) DEFAULT NULL,
    log_desc varchar(max),
    log_user_id int DEFAULT NULL,
    log_user_name varchar(255) DEFAULT NULL,
    log_desc_revision varchar(max),
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    raw_data NVARCHAR (MAX) DEFAULT NULL,
    raw_previous_data NVARCHAR (MAX) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_medicine`
--

DROP TABLE IF EXISTS m_medicine;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_medicine (
    id int IDENTITY (1, 1) NOT NULL CHECK (id > 0),
    item_id varchar(50) NOT NULL,
    item_name varchar(250) NOT NULL,
    harga_jual int NOT NULL,
    total int NOT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    satuan_dosis varchar(255) DEFAULT NULL,
    satuan_dasar varchar(255) DEFAULT NULL,
    dosis varchar(255) DEFAULT NULL,
    expired_date varchar(255) DEFAULT NULL,
    komposisi varchar(max),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_orders`
--

DROP TABLE IF EXISTS m_orders;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_orders (
    id int NOT NULL IDENTITY,
    kode_order varchar(150) DEFAULT NULL,
    kategori varchar(30) check (
        kategori in (
            'laboratorium',
            'radiologi',
            'fisioterapy'
        )
    ) DEFAULT NULL,
    user_order varchar(200) DEFAULT NULL,
    reg_user varchar(150) DEFAULT NULL,
    med_rec varchar(100) DEFAULT NULL,
    status_order varchar(1) DEFAULT NULL,
    tanggal_order date DEFAULT NULL,
    waktu_order time(0) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_organization`
--

DROP TABLE IF EXISTS m_organization;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_organization (
    OrganizationCode varchar(255) NOT NULL,
    OrganizationName varchar(255) NOT NULL,
    OrganizationHead varchar(255) DEFAULT NULL,
    OrganizationLevel varchar(255) NOT NULL,
    ParentOrganization varchar(255) DEFAULT NULL,
    OrganizationPercentage varchar(255) DEFAULT NULL,
    IsActive varchar(255) NOT NULL,
    IsDeleted varchar(255) NOT NULL,
    LastUpdatedBy bigint check (LastUpdatedBy > 0) DEFAULT NULL,
    LastUpdatedDateTime datetime2 (0) DEFAULT NULL,
    PRIMARY KEY (OrganizationCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_outcome`
--

DROP TABLE IF EXISTS m_outcome;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_outcome (
    id int NOT NULL IDENTITY,
    kode_path varchar(255) NOT NULL,
    nama_outcome varchar(255) NOT NULL,
    username varchar(200) DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_paramedis`
--

DROP TABLE IF EXISTS m_paramedis;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_paramedis (
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
    Remarks varchar(max),
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
    ParamedicIHS varchar(255) DEFAULT NULL,
    ParamedicIHSsanbox varchar(255) DEFAULT NULL,
    STR varchar(255) DEFAULT NULL,
    PRIMARY KEY (ParamedicID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_paramedis_ruangan`
--

DROP TABLE IF EXISTS m_paramedis_ruangan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_paramedis_ruangan (
    id bigint check (id > 0) NOT NULL IDENTITY,
    ParamedicType varchar(255) DEFAULT NULL,
    ParamedicCode varchar(255) DEFAULT NULL,
    ParamedicAccessRoom varchar(max),
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_pasien`
--

DROP TABLE IF EXISTS m_pasien;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_pasien (
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
    PatientCity varchar(150) DEFAULT NULL,
    PatientProvince varchar(150) DEFAULT NULL,
    PatientAddress varchar(150) DEFAULT NULL,
    PRIMARY KEY (MedicalNo)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_pasien_vclaim`
--

DROP TABLE IF EXISTS m_pasien_vclaim;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_pasien_vclaim (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    card_no varchar(255) NOT NULL,
    sep_no varchar(255) NOT NULL,
    business_partner_id bigint check (business_partner_id > 0) NOT NULL,
    created_by varchar(255) NOT NULL,
    updated_by varchar(255) DEFAULT NULL,
    is_deleted smallint DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_physician_team`
--

DROP TABLE IF EXISTS m_physician_team;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_physician_team (
    id int NOT NULL IDENTITY,
    reg_no varchar(150) DEFAULT NULL,
    kode_dokter varchar(50) DEFAULT NULL,
    kategori varchar(20) DEFAULT NULL,
    parent_id int DEFAULT NULL,
    catatan varchar(max),
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_physician_team_konsul`
--

DROP TABLE IF EXISTS m_physician_team_konsul;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_physician_team_konsul (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    kode_dokter varchar(255) NOT NULL,
    tanggal_konsul date DEFAULT NULL,
    isi_konsul varchar(max),
    tanggal_jawaban_konsul date DEFAULT NULL,
    jawaban_konsul varchar(max),
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_poliklinik`
--

DROP TABLE IF EXISTS m_poliklinik;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_poliklinik (
    RoomID bigint check (RoomID > 0) NOT NULL IDENTITY,
    RoomCode varchar(255) DEFAULT NULL,
    RoomName varchar(255) DEFAULT NULL,
    IP varchar(255) DEFAULT NULL,
    IsActive varchar(255) DEFAULT NULL,
    IsUsed varchar(255) DEFAULT NULL,
    IsDeleted varchar(255) DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (RoomID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_registrasi`
--

DROP TABLE IF EXISTS m_registrasi;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_registrasi (
    reg_no varchar(255) NOT NULL,
    reg_medrec varchar(255) DEFAULT NULL,
    reg_lama varchar(255) DEFAULT NULL,
    reg_lama_igd varchar(255) DEFAULT NULL,
    reg_status varchar(255) DEFAULT NULL,
    reg_tgl varchar(255) DEFAULT NULL,
    reg_jam varchar(255) DEFAULT NULL,
    reg_poli varchar(255) DEFAULT NULL,
    reg_dokter varchar(255) DEFAULT NULL,
    reg_dokter_care varchar(max),
    reg_perawat_care varchar(max),
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
    reg_pjawab_nik varchar(255) DEFAULT NULL,
    reg_cttn_kunj varchar(255) DEFAULT NULL,
    reg_datang time(0) DEFAULT NULL,
    reg_pemeriksaan_mulai time(0) DEFAULT NULL,
    reg_pemeriksaan_selesai time(0) DEFAULT NULL,
    reg_selesai date DEFAULT NULL,
    reg_pulang_partials int DEFAULT NULL,
    reg_discharge int NOT NULL DEFAULT '0',
    reg_user int DEFAULT NULL,
    reg_deleted varchar(255) DEFAULT NULL,
    reg_deleted_by varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    bed varchar(250) DEFAULT NULL,
    service_unit varchar(250) DEFAULT NULL,
    departemen_asal varchar(250) DEFAULT NULL,
    link_regis varchar(250) DEFAULT NULL,
    room_class varchar(45) DEFAULT NULL,
    charge_class_code varchar(255) DEFAULT NULL,
    reg_pjawab_hub varchar(150) DEFAULT NULL,
    reg_pjawab_alamat varchar(150) DEFAULT NULL,
    reg_pjawab_nohp varchar(150) DEFAULT NULL,
    reg_ketersidaan_kamar varchar(1) DEFAULT NULL,
    reg_info_kewajiban varchar(150) DEFAULT NULL,
    reg_info_general_consent varchar(150) DEFAULT NULL,
    reg_info_carabayar varchar(150) DEFAULT NULL,
    ttd_admisi varchar(max),
    ttd_gc_hal_dua varchar(max),
    purpose varchar(25) DEFAULT NULL,
    kategori_pasien varchar(255) DEFAULT NULL,
    reg_sep_no varchar(255) DEFAULT NULL,
    reg_cttn varchar(max),
    asal_rujukan varchar(255) DEFAULT NULL,
    kasus_polisi smallint DEFAULT NULL,
    PRIMARY KEY (reg_no)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_registrasi_pj`
--

DROP TABLE IF EXISTS m_registrasi_pj;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_registrasi_pj (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    reg_pjawab_nama varchar(255) NOT NULL,
    tanggal_lahir date DEFAULT NULL,
    jenis_kelamin varchar(255) DEFAULT NULL,
    reg_hub_pasien varchar(255) NOT NULL,
    reg_pjawab_nohp varchar(255) DEFAULT NULL,
    reg_pjawab_nik varchar(255) DEFAULT NULL,
    pekerjaan_keluarga varchar(255) DEFAULT NULL,
    reg_pjawab_bayar varchar(255) DEFAULT NULL,
    reg_pjawab_alamat varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_room_class`
--

DROP TABLE IF EXISTS m_room_class;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_room_class (
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
    LastUpdatedDateTime datetime2 (0) DEFAULT NULL,
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint NOT NULL DEFAULT '0',
    LastUpdatedBy varchar(50) DEFAULT NULL,
    PRIMARY KEY (ClassCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_ruangan`
--

DROP TABLE IF EXISTS m_ruangan;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_ruangan (
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
-- SQLINES DEMO *** or table `m_ruangan_baru`
--

DROP TABLE IF EXISTS m_ruangan_baru;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_ruangan_baru (
    id int NOT NULL IDENTITY,
    nama_ruangan varchar(200) DEFAULT NULL,
    is_active varchar(30) check (is_active in ('0', '1')) DEFAULT '1',
    created_at datetime2 (0) NULL DEFAULT GETDATE (),
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_service_unit_room`
--

DROP TABLE IF EXISTS m_service_unit_room;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_service_unit_room (
    RoomID int NOT NULL,
    ServiceUnitID int NOT NULL,
    LastUpdatedBy varchar(255) NOT NULL,
    LastUpdatedDateTime datetime2 (0) NOT NULL
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_site`
--

DROP TABLE IF EXISTS m_site;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_site (
    SiteCode varchar(255) NOT NULL,
    SiteName varchar(255) DEFAULT NULL,
    ShortName varchar(255) DEFAULT NULL,
    Initial varchar(255) DEFAULT NULL,
    TaxRegistrantNo varchar(255) DEFAULT NULL,
    IsActive int DEFAULT NULL,
    IsDeleted int DEFAULT NULL,
    LastUpdatedBy varchar(255) DEFAULT NULL,
    LastUpdatedDateTime varchar(255) DEFAULT NULL
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_site_departemen`
--

DROP TABLE IF EXISTS m_site_departemen;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_site_departemen (
    SiteDepartmentID bigint check (SiteDepartmentID > 0) NOT NULL IDENTITY,
    SiteCode varchar(50) NOT NULL,
    DepartmentCode varchar(255) NOT NULL,
    OfficerName varchar(255) DEFAULT NULL,
    IsActive smallint DEFAULT NULL,
    IsDeleted smallint NOT NULL DEFAULT '0',
    LastUpdatedBy varchar(50) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (SiteDepartmentID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_tarif`
--

DROP TABLE IF EXISTS m_tarif;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_tarif (
    tarif_id bigint check (tarif_id > 0) NOT NULL IDENTITY,
    tarif_item varchar(255) DEFAULT NULL,
    tarif_kelas varchar(500) DEFAULT NULL,
    tarif_harga float DEFAULT NULL,
    deleted char(255) NOT NULL DEFAULT '0',
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    deleted_at datetime2 (0) NULL DEFAULT NULL,
    created_by char(255) DEFAULT NULL,
    updated_by char(255) DEFAULT NULL,
    deleted_by char(255) DEFAULT NULL,
    tarif_tindakan varchar(200) DEFAULT NULL,
    tarif_sub_tindakan varchar(200) DEFAULT NULL,
    sub_harga varchar(max),
    PRIMARY KEY (tarif_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_unit`
--

DROP TABLE IF EXISTS m_unit;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_unit (
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
    IsExecutive varchar(255) DEFAULT NULL,
    PRIMARY KEY (ServiceUnitCode)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_unit_departemen`
--

DROP TABLE IF EXISTS m_unit_departemen;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_unit_departemen (
    GcDefaultOrderType varchar(255) DEFAULT NULL,
    IsLockedLocation int DEFAULT NULL,
    IsActive int DEFAULT NULL,
    LastUpdatedBy varchar(255) NOT NULL,
    LastUpdatedDateTime datetime2 (0) NOT NULL,
    ServiceUnitID bigint check (ServiceUnitID > 0) NOT NULL IDENTITY,
    SiteDepartmentID bigint check (SiteDepartmentID > 0) NOT NULL,
    ServiceUnitCode varchar(255) NOT NULL,
    ContactPerson1 varchar(255) DEFAULT NULL,
    ContactPerson2 varchar(255) DEFAULT NULL,
    LocationID bigint check (LocationID > 0) DEFAULT NULL,
    PRIMARY KEY (ServiceUnitID)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `m_unit_item`
--

DROP TABLE IF EXISTS m_unit_item;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE m_unit_item (
    ServiceUnitID int NOT NULL,
    ItemID int NOT NULL,
    LastUpdatedBy varchar(255) NOT NULL,
    LastUpdatedDateTime datetime2 (0) NOT NULL
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
-- SQLINES DEMO *** or table `slip_pernyataan_ranap`
--

DROP TABLE IF EXISTS slip_pernyataan_ranap;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE slip_pernyataan_ranap (
    slip_pernyataan_id bigint check (slip_pernyataan_id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    medrec varchar(255) DEFAULT NULL,
    ttd_dokter varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (slip_pernyataan_id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `surat_persetujuan_medis`
--

DROP TABLE IF EXISTS surat_persetujuan_medis;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE surat_persetujuan_medis (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) DEFAULT NULL,
    penanggung_jawab varchar(255) DEFAULT NULL,
    umur_penanggung_jawab int DEFAULT NULL,
    alamat_penanggung_jawab varchar(max),
    hubungan_penanggung_jawab varchar(255) DEFAULT NULL,
    penanggung_jawab_2 varchar(255) DEFAULT NULL,
    umur_penanggung_jawab_2 int DEFAULT NULL,
    alamat_penanggung_jawab_2 varchar(max),
    hubungan_penanggung_jawab_2 varchar(255) DEFAULT NULL,
    kondisi_medis varchar(255) DEFAULT NULL,
    kondisi_medis_lain_lain varchar(255) DEFAULT NULL,
    signature1 varchar(max),
    witness1 varchar(max),
    witness2 varchar(max),
    nama_witness2 varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** or table `surat_rawat_intensif`
--

DROP TABLE IF EXISTS surat_rawat_intensif;
/* SQLINES DEMO *** cs_client     = @@character_set_client */
;
/* SQLINES DEMO *** er_set_client = utf8mb4 */
;

CREATE TABLE surat_rawat_intensif (
    id bigint check (id > 0) NOT NULL IDENTITY,
    reg_no varchar(255) NOT NULL,
    penanggung_jawab varchar(255) DEFAULT NULL,
    umur_penanggung_jawab int DEFAULT NULL,
    jenis_kelamin varchar(255) DEFAULT NULL,
    alamat_penanggung_jawab varchar(max),
    keluarga_signature varchar(max),
    keluarga_signature_2 varchar(max),
    penanggung_jawab_2 varchar(255) DEFAULT NULL,
    created_at datetime2 (0) NULL DEFAULT NULL,
    updated_at datetime2 (0) NULL DEFAULT NULL,
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
    user_active_by varchar(255) DEFAULT NULL,
    user_active_at datetime2 (0) DEFAULT NULL,
    is_deleted int NOT NULL DEFAULT '0',
    user_deleted_by varchar(255) DEFAULT NULL,
    user_deleted_at datetime2 (0) DEFAULT NULL,
    signature varchar(max),
    PRIMARY KEY (id)
);
/* SQLINES DEMO *** er_set_client = @saved_cs_client */
;

--
-- SQLINES DEMO *** for database 'master_siti_fatimah'
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

-- SQLINES DEMO ***  2024-10-17 21:33:31