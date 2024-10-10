<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Radiologi | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="http://rsud.sumselprov.go.id/labor/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="http://rsud.sumselprov.go.id/labor/adminlte/dist/css/adminlte.min.css">
    <link href="fonts.googleapis.com/css610e.css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="http://rsud.sumselprov.go.id/labor/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css">
    <style>
        .p1 {
            font-family: 'Courier New', monospace;
            font-size: 12px;
        }

        thead tr th {
            border-bottom: 2px solid black;
            border-top: 2px solid black;
            border-collapse: separate;
            border-spacing: 5px 5px;
        }

        table {
            width: 100%;
        }

        .border-custom {
            border: 1px solid black;
        }

        * {
            margin:0;
            padding: 0;
        }
        body{
            background: #ffffff;
        }
        .whistle{
            width: 20%;
            fill: #f95959;
            margin: 100px 40%;
            text-align: left;
            transform: translate(-50%, -50%);
            transform: rotate(0);
            transform-origin: 80% 30%;
            animation: wiggle .2s infinite;
        }

        @keyframes  wiggle {
            0%{
                transform: rotate(3deg);
            }
            50%{
                transform: rotate(0deg);
            }
            100%{
                transform: rotate(3deg);
            }
        }
        h1{
            margin-top: -100px;
            margin-bottom: 20px;
            color: #facf5a;
            text-align: center;
            font-family: 'Raleway';
            font-size: 90px;
            font-weight: 800;
        }
        h2{
            color: #455d7a;
            text-align: center;
            font-family: 'Raleway';
            font-size: 30px;
            text-transform: uppercase;
        }
    </style>

    <link rel="stylesheet" href="http://rsud.sumselprov.go.id/labor/waitMe.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed" >
<div class="content-access">
    <div class="pt-2">
        <div class="container" style="background-color: white;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="d-flex justify-content-center align-items-center" style="height: 100%">
                        <img src="http://rsud.sumselprov.go.id/labor/images/logo-sumsel.png" width="70" height="95" alt=""
                             srcset="" />
                    </div>
                </div>
                <div class="col-sm-8 text-center">
                    <div class="font-weight-bold">PEMERINTAH PROVINSI SUMATERA SELATAN</div>
                    <div class="font-weight-bold">DINAS KESEHATAN</div>
                    <div class="font-weight-bold">BADAN LAYANAN UMUM DAERAH</div>
                    <div class="font-weight-bold">RSUD SITI FATIMAH PROVINSI SUMATERA SELATAN</div>
                    <div class="font-weight-bold"><small>Jl Kol H. Barlian KM.6 Palembang 30151 Telp. (0711) 5718883 /
                            5718889 Fax.(0711) 7421333</small></div>
                    <div class="font-weight-bold"><small>Email: <span
                                style="color: blue">rsudprovsumsel@gmail.com</span></small></div>
                </div>
                <div class="col-sm-2">
                    <div class="d-flex justify-content-center align-items-center" style="height: 100%">
                        <img src="http://rsud.sumselprov.go.id/labor/images/icon.png" width="80" height="80" alt=""
                             srcset="">
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <hr style="height:2px; border-top:4px solid black; border-bottom:2px solid black;">
            </div>
            <div class="row pb-2">
                <div class="col-sm-12">
                    <div class="font-weight-bold text-center">HASIL PEMERIKSAAN RADIOLOGI</div>
                </div>
            </div>
            <div class="border-custom">
                <div class="row pt-2 pl-2 pr-2 font-weight-bold">
                    <div class="col-sm-2">
                        <div>Nama Pasien</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="patient_name">: {{ $radiologyData['patient_information']['patient_name'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                    <div class="col-sm-2">
                        <div>Pemeriksaan</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="pemeriksaan">: {{ $radiologyData['result']['item_name'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                </div>
                <div class="row pl-2 pr-2 font-weight-bold">
                    <div class="col-sm-2">
                        <div>Tanggal Lahir</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="patient_birth_dttm">: {{ $radiologyData['patient_information']['born'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                    <div class="col-sm-2">
                        <div>No. RM</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="patient_id">: {{ $radiologyData['patient_information']['medical_no'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                </div>
                <div class="row pl-2 pr-2 font-weight-bold">
                    <div class="col-sm-2">
                        <div>Departemen</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="request_department">: RADIOLOGI</div>
                    </div>
                    <div class="col-sm-2">
                        <div>Jenis Kelamin</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="patient_sex">: {{ $radiologyData['patient_information']['gender'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                </div>
                <div class="row pl-2 pr-2 font-weight-bold">
                    <div class="col-sm-2">
                        <div>Tanggal / Jam</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="approve_dttm">: {{ $radiologyData['result']['create_datetime'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                    <div class="col-sm-2">
                        <div>Klinis</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="diagnosis">: {{ $radiologyData['result']['remarks'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                </div>
                <div class="row pb-2 pl-2 pr-2 font-weight-bold">
                    <div class="col-sm-2">
                        <div>Dr Pengirim</div>
                    </div>
                    <div class="col-sm-4">
                        <div>: {{ $radiologyData['patient_information']['dokter_pengirim'] ?? 'Data tidak tersedia' }}</div>
                    </div>
                </div>
            </div>
            <div class="row pt-2 pb-2 pl-2 pr-2">
                <div class="col-sm-12">
                    Yth. TS. dr.Martin Raja Sonang Napitupulu, Sp.Rad.,R.I (K)
                </div>
                <div class="col-sm-12 pt-3 request-name">
                    Deskripsi : {{ $radiologyData['result']['item_name'] ?? 'Data tidak tersedia' }}
                </div>
            </div>
            <div class="row pb-2 pl-2 pr-2">
                <div class="col-sm-12 pt-3 report-text">
                    {{ $radiologyData['result']['report_text'] ?? 'Data tidak tersedia' }}
                </div>
                <div class="col-sm-12 pt-3 conclusion">

                    {{ $radiologyData['result']['conclusion'] ?? 'Data tidak tersedia' }}
                </div>
            </div>
            <div class="row pt-5 pb-2 pl-2 pr-2">
                <div class="col-sm-6 pt-3 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="150" height="150" viewBox="0 0 150 150"><rect x="0" y="0" width="150" height="150" fill="#ffffff"/><g transform="scale(2.632)"><g transform="translate(0,0)"><path fill-rule="evenodd" d="M13 0L13 1L14 1L14 2L15 2L15 4L14 4L14 3L11 3L11 6L10 6L10 5L8 5L8 7L9 7L9 6L10 6L10 7L11 7L11 6L12 6L12 7L13 7L13 8L14 8L14 7L15 7L15 6L16 6L16 8L15 8L15 9L13 9L13 10L15 10L15 9L16 9L16 8L17 8L17 9L18 9L18 10L16 10L16 11L18 11L18 10L19 10L19 11L20 11L20 12L19 12L19 13L18 13L18 12L15 12L15 13L18 13L18 14L17 14L17 15L16 15L16 14L15 14L15 15L16 15L16 16L15 16L15 17L16 17L16 16L17 16L17 17L19 17L19 18L20 18L20 20L23 20L23 21L24 21L24 22L23 22L23 23L22 23L22 22L21 22L21 21L19 21L19 20L17 20L17 18L14 18L14 16L13 16L13 18L12 18L12 20L13 20L13 21L12 21L12 22L10 22L10 24L9 24L9 25L8 25L8 26L5 26L5 25L7 25L7 24L5 24L5 23L3 23L3 22L1 22L1 24L2 24L2 25L1 25L1 27L2 27L2 25L3 25L3 24L5 24L5 25L4 25L4 27L3 27L3 28L1 28L1 29L4 29L4 33L5 33L5 34L3 34L3 32L1 32L1 31L2 31L2 30L0 30L0 32L1 32L1 33L2 33L2 34L0 34L0 35L1 35L1 36L0 36L0 38L1 38L1 39L0 39L0 40L1 40L1 41L0 41L0 42L1 42L1 41L2 41L2 42L4 42L4 43L3 43L3 44L0 44L0 48L5 48L5 47L7 47L7 48L6 48L6 49L7 49L7 48L8 48L8 51L9 51L9 52L8 52L8 57L12 57L12 55L11 55L11 54L13 54L13 56L14 56L14 57L20 57L20 56L22 56L22 55L24 55L24 56L25 56L25 57L26 57L26 56L27 56L27 54L26 54L26 53L28 53L28 54L29 54L29 55L30 55L30 56L29 56L29 57L32 57L32 56L31 56L31 55L32 55L32 54L33 54L33 53L32 53L32 52L33 52L33 51L34 51L34 53L35 53L35 55L36 55L36 53L37 53L37 54L38 54L38 53L39 53L39 54L41 54L41 57L44 57L44 56L43 56L43 55L45 55L45 57L47 57L47 55L49 55L49 56L48 56L48 57L52 57L52 54L53 54L53 56L54 56L54 57L56 57L56 56L55 56L55 55L54 55L54 54L55 54L55 51L56 51L56 49L57 49L57 48L56 48L56 46L57 46L57 43L56 43L56 42L55 42L55 39L57 39L57 37L56 37L56 36L57 36L57 35L56 35L56 33L55 33L55 35L54 35L54 34L52 34L52 33L53 33L53 32L57 32L57 31L55 31L55 30L57 30L57 29L56 29L56 28L57 28L57 27L56 27L56 26L55 26L55 23L56 23L56 24L57 24L57 23L56 23L56 22L57 22L57 21L56 21L56 20L55 20L55 19L56 19L56 17L55 17L55 16L57 16L57 15L56 15L56 14L55 14L55 13L54 13L54 12L55 12L55 11L56 11L56 13L57 13L57 11L56 11L56 10L57 10L57 9L56 9L56 8L55 8L55 9L56 9L56 10L54 10L54 11L53 11L53 10L52 10L52 8L51 8L51 11L50 11L50 12L49 12L49 13L48 13L48 15L47 15L47 14L46 14L46 15L47 15L47 18L45 18L45 17L44 17L44 16L43 16L43 15L45 15L45 13L47 13L47 12L48 12L48 11L46 11L46 10L45 10L45 9L46 9L46 8L45 8L45 9L44 9L44 8L43 8L43 9L42 9L42 7L43 7L43 6L44 6L44 7L45 7L45 5L46 5L46 7L47 7L47 5L48 5L48 0L46 0L46 1L43 1L43 0L40 0L40 1L37 1L37 3L35 3L35 4L37 4L37 5L36 5L36 7L35 7L35 6L34 6L34 7L35 7L35 8L31 8L31 6L32 6L32 7L33 7L33 6L32 6L32 5L33 5L33 4L34 4L34 3L33 3L33 1L32 1L32 0L28 0L28 1L32 1L32 3L33 3L33 4L31 4L31 3L29 3L29 4L27 4L27 3L28 3L28 2L25 2L25 1L26 1L26 0L21 0L21 1L24 1L24 2L23 2L23 3L24 3L24 4L21 4L21 5L22 5L22 7L23 7L23 8L24 8L24 9L22 9L22 8L18 8L18 7L19 7L19 6L20 6L20 7L21 7L21 6L20 6L20 5L19 5L19 4L20 4L20 3L17 3L17 4L16 4L16 2L17 2L17 1L14 1L14 0ZM19 0L19 1L20 1L20 0ZM8 1L8 2L9 2L9 3L8 3L8 4L10 4L10 2L11 2L11 1ZM35 1L35 2L36 2L36 1ZM40 1L40 2L41 2L41 3L40 3L40 4L38 4L38 3L39 3L39 2L38 2L38 3L37 3L37 4L38 4L38 5L37 5L37 8L38 8L38 10L37 10L37 9L36 9L36 10L37 10L37 11L39 11L39 13L38 13L38 12L37 12L37 13L34 13L34 11L32 11L32 13L31 13L31 15L30 15L30 16L32 16L32 17L31 17L31 18L30 18L30 19L29 19L29 14L30 14L30 13L29 13L29 12L30 12L30 11L31 11L31 10L32 10L32 9L31 9L31 10L30 10L30 9L27 9L27 10L22 10L22 9L19 9L19 10L20 10L20 11L21 11L21 12L22 12L22 13L20 13L20 15L19 15L19 16L21 16L21 17L20 17L20 18L21 18L21 17L25 17L25 18L23 18L23 20L24 20L24 19L25 19L25 20L27 20L27 21L25 21L25 22L26 22L26 23L25 23L25 24L24 24L24 23L23 23L23 24L20 24L20 26L21 26L21 27L20 27L20 30L17 30L17 29L18 29L18 28L17 28L17 29L15 29L15 31L16 31L16 32L17 32L17 31L20 31L20 32L19 32L19 33L20 33L20 35L17 35L17 34L18 34L18 33L15 33L15 32L14 32L14 31L13 31L13 29L14 29L14 26L15 26L15 28L16 28L16 26L17 26L17 27L18 27L18 26L19 26L19 25L18 25L18 26L17 26L17 24L19 24L19 23L20 23L20 22L18 22L18 21L17 21L17 20L15 20L15 21L13 21L13 22L12 22L12 23L11 23L11 24L10 24L10 25L11 25L11 27L12 27L12 28L11 28L11 29L9 29L9 30L11 30L11 29L12 29L12 31L11 31L11 32L12 32L12 31L13 31L13 32L14 32L14 34L15 34L15 35L17 35L17 36L16 36L16 37L15 37L15 36L13 36L13 37L12 37L12 35L13 35L13 33L12 33L12 35L11 35L11 38L10 38L10 37L9 37L9 40L10 40L10 41L9 41L9 42L11 42L11 44L12 44L12 45L11 45L11 49L13 49L13 50L11 50L11 51L13 51L13 52L9 52L9 53L10 53L10 54L11 54L11 53L14 53L14 55L16 55L16 56L19 56L19 55L20 55L20 54L19 54L19 53L23 53L23 54L24 54L24 53L23 53L23 52L24 52L24 50L23 50L23 51L22 51L22 52L21 52L21 49L23 49L23 48L24 48L24 49L25 49L25 52L26 52L26 49L25 49L25 48L26 48L26 47L24 47L24 46L23 46L23 44L25 44L25 46L26 46L26 44L27 44L27 47L29 47L29 45L30 45L30 44L32 44L32 45L31 45L31 46L32 46L32 49L31 49L31 52L32 52L32 50L34 50L34 51L35 51L35 52L37 52L37 53L38 53L38 52L39 52L39 51L41 51L41 52L40 52L40 53L41 53L41 54L42 54L42 55L43 55L43 54L42 54L42 53L41 53L41 52L42 52L42 51L44 51L44 50L45 50L45 51L47 51L47 53L45 53L45 52L44 52L44 54L46 54L46 55L47 55L47 54L50 54L50 56L51 56L51 54L52 54L52 53L51 53L51 54L50 54L50 53L48 53L48 51L47 51L47 49L48 49L48 48L53 48L53 50L54 50L54 48L53 48L53 46L54 46L54 47L55 47L55 46L56 46L56 43L55 43L55 44L54 44L54 45L51 45L51 44L53 44L53 43L54 43L54 42L53 42L53 41L54 41L54 40L53 40L53 41L52 41L52 39L55 39L55 37L54 37L54 38L53 38L53 37L52 37L52 36L50 36L50 35L51 35L51 33L50 33L50 32L49 32L49 31L48 31L48 30L47 30L47 29L48 29L48 26L47 26L47 25L48 25L48 24L49 24L49 23L47 23L47 21L49 21L49 19L48 19L48 20L47 20L47 19L45 19L45 18L44 18L44 17L43 17L43 18L44 18L44 19L42 19L42 20L38 20L38 19L39 19L39 17L40 17L40 18L41 18L41 16L38 16L38 14L39 14L39 15L41 15L41 14L40 14L40 13L42 13L42 11L39 11L39 10L41 10L41 8L40 8L40 4L41 4L41 3L43 3L43 1ZM46 1L46 2L47 2L47 1ZM21 2L21 3L22 3L22 2ZM24 2L24 3L25 3L25 4L24 4L24 5L23 5L23 7L24 7L24 8L25 8L25 9L26 9L26 6L25 6L25 4L26 4L26 3L25 3L25 2ZM44 3L44 4L43 4L43 5L45 5L45 4L46 4L46 5L47 5L47 3ZM12 4L12 6L13 6L13 7L14 7L14 6L15 6L15 5L16 5L16 4L15 4L15 5L14 5L14 4ZM13 5L13 6L14 6L14 5ZM17 5L17 7L18 7L18 5ZM27 5L27 8L30 8L30 5ZM38 5L38 7L39 7L39 5ZM41 5L41 7L42 7L42 5ZM24 6L24 7L25 7L25 6ZM28 6L28 7L29 7L29 6ZM48 6L48 9L47 9L47 10L50 10L50 8L49 8L49 6ZM0 8L0 11L3 11L3 10L4 10L4 13L3 13L3 12L2 12L2 14L0 14L0 16L1 16L1 17L3 17L3 18L4 18L4 19L1 19L1 18L0 18L0 19L1 19L1 20L0 20L0 21L4 21L4 22L5 22L5 20L4 20L4 19L5 19L5 18L4 18L4 17L3 17L3 16L2 16L2 14L3 14L3 15L4 15L4 14L5 14L5 13L8 13L8 15L7 15L7 14L6 14L6 15L7 15L7 16L6 16L6 17L7 17L7 18L6 18L6 19L7 19L7 18L8 18L8 20L6 20L6 21L8 21L8 23L9 23L9 20L10 20L10 21L11 21L11 16L12 16L12 15L13 15L13 14L14 14L14 13L11 13L11 11L12 11L12 12L14 12L14 11L12 11L12 8L6 8L6 9L5 9L5 8ZM39 8L39 9L40 9L40 8ZM53 8L53 9L54 9L54 8ZM1 9L1 10L3 10L3 9ZM4 9L4 10L5 10L5 9ZM6 9L6 10L7 10L7 11L6 11L6 12L8 12L8 13L9 13L9 10L10 10L10 11L11 11L11 10L10 10L10 9ZM33 9L33 10L35 10L35 9ZM21 10L21 11L22 11L22 10ZM28 10L28 11L27 11L27 12L26 12L26 11L25 11L25 12L23 12L23 14L21 14L21 15L23 15L23 14L24 14L24 15L25 15L25 16L26 16L26 15L27 15L27 14L26 14L26 13L27 13L27 12L29 12L29 11L30 11L30 10ZM43 10L43 12L44 12L44 13L45 13L45 12L46 12L46 11L45 11L45 12L44 12L44 10ZM35 11L35 12L36 12L36 11ZM50 12L50 14L49 14L49 16L50 16L50 19L51 19L51 20L52 20L52 24L50 24L50 25L49 25L49 26L51 26L51 25L52 25L52 26L53 26L53 27L54 27L54 26L53 26L53 25L54 25L54 24L53 24L53 22L56 22L56 21L54 21L54 20L52 20L52 19L55 19L55 17L54 17L54 18L52 18L52 17L53 17L53 15L55 15L55 14L54 14L54 13L53 13L53 12L52 12L52 13L51 13L51 12ZM37 13L37 14L38 14L38 13ZM52 13L52 15L53 15L53 13ZM25 14L25 15L26 15L26 14ZM34 14L34 15L33 15L33 17L35 17L35 18L31 18L31 21L29 21L29 22L27 22L27 24L29 24L29 22L31 22L31 23L30 23L30 24L31 24L31 23L32 23L32 20L34 20L34 19L35 19L35 18L37 18L37 19L38 19L38 16L35 16L35 14ZM42 14L42 15L43 15L43 14ZM17 15L17 16L18 16L18 15ZM50 15L50 16L51 16L51 15ZM8 16L8 18L9 18L9 16ZM27 16L27 17L26 17L26 18L25 18L25 19L26 19L26 18L27 18L27 19L28 19L28 18L27 18L27 17L28 17L28 16ZM51 18L51 19L52 19L52 18ZM13 19L13 20L14 20L14 19ZM44 19L44 20L43 20L43 21L40 21L40 22L42 22L42 23L41 23L41 24L42 24L42 25L40 25L40 26L41 26L41 27L42 27L42 28L43 28L43 29L39 29L39 30L38 30L38 28L40 28L40 27L39 27L39 26L38 26L38 24L39 24L39 23L37 23L37 22L38 22L38 20L35 20L35 22L34 22L34 23L33 23L33 24L34 24L34 25L35 25L35 26L38 26L38 28L37 28L37 27L35 27L35 28L34 28L34 27L33 27L33 26L32 26L32 25L29 25L29 26L26 26L26 24L25 24L25 25L23 25L23 26L22 26L22 25L21 25L21 26L22 26L22 27L21 27L21 28L22 28L22 29L21 29L21 31L22 31L22 32L21 32L21 35L20 35L20 36L17 36L17 37L16 37L16 38L15 38L15 39L14 39L14 40L13 40L13 38L14 38L14 37L13 37L13 38L12 38L12 41L14 41L14 42L13 42L13 43L12 43L12 44L13 44L13 45L12 45L12 46L14 46L14 47L12 47L12 48L13 48L13 49L14 49L14 47L15 47L15 49L16 49L16 46L14 46L14 44L15 44L15 45L18 45L18 46L19 46L19 47L17 47L17 48L18 48L18 49L17 49L17 50L14 50L14 51L17 51L17 52L18 52L18 53L17 53L17 55L18 55L18 53L19 53L19 52L20 52L20 49L21 49L21 48L19 48L19 47L21 47L21 46L20 46L20 44L21 44L21 45L22 45L22 44L21 44L21 43L22 43L22 42L26 42L26 43L25 43L25 44L26 44L26 43L27 43L27 44L29 44L29 43L31 43L31 42L30 42L30 40L29 40L29 39L31 39L31 40L35 40L35 43L34 43L34 45L35 45L35 46L34 46L34 47L33 47L33 49L35 49L35 50L38 50L38 49L39 49L39 48L36 48L36 46L37 46L37 44L38 44L38 43L37 43L37 44L36 44L36 42L38 42L38 41L39 41L39 38L40 38L40 39L41 39L41 41L42 41L42 42L39 42L39 43L41 43L41 48L43 48L43 49L40 49L40 50L41 50L41 51L42 51L42 50L44 50L44 48L48 48L48 47L47 47L47 46L49 46L49 47L50 47L50 45L49 45L49 44L51 44L51 43L52 43L52 41L50 41L50 42L49 42L49 44L48 44L48 45L47 45L47 46L44 46L44 44L45 44L45 43L44 43L44 42L43 42L43 41L44 41L44 40L43 40L43 38L45 38L45 41L46 41L46 39L47 39L47 40L48 40L48 39L49 39L49 40L50 40L50 38L52 38L52 37L50 37L50 36L49 36L49 37L48 37L48 38L45 38L45 37L47 37L47 36L45 36L45 35L47 35L47 34L45 34L45 33L46 33L46 32L48 32L48 31L47 31L47 30L46 30L46 32L45 32L45 33L44 33L44 31L45 31L45 29L44 29L44 28L46 28L46 29L47 29L47 28L46 28L46 27L47 27L47 26L46 26L46 25L44 25L44 24L45 24L45 23L46 23L46 24L47 24L47 23L46 23L46 22L45 22L45 23L44 23L44 20L45 20L45 19ZM46 20L46 21L47 21L47 20ZM15 21L15 22L13 22L13 23L12 23L12 24L11 24L11 25L12 25L12 24L13 24L13 25L14 25L14 23L15 23L15 24L16 24L16 23L15 23L15 22L16 22L16 21ZM50 21L50 22L51 22L51 21ZM6 22L6 23L7 23L7 22ZM17 22L17 23L18 23L18 22ZM35 22L35 23L36 23L36 22ZM2 23L2 24L3 24L3 23ZM43 23L43 24L44 24L44 23ZM43 25L43 28L44 28L44 27L46 27L46 26L44 26L44 25ZM23 26L23 27L25 27L25 30L23 30L23 29L22 29L22 31L23 31L23 32L22 32L22 33L25 33L25 37L24 37L24 36L20 36L20 37L19 37L19 38L17 38L17 40L16 40L16 39L15 39L15 40L14 40L14 41L15 41L15 43L16 43L16 42L18 42L18 43L17 43L17 44L18 44L18 45L19 45L19 44L20 44L20 42L21 42L21 41L23 41L23 40L21 40L21 39L22 39L22 37L24 37L24 38L23 38L23 39L24 39L24 40L25 40L25 39L26 39L26 40L27 40L27 41L26 41L26 42L29 42L29 40L28 40L28 39L26 39L26 38L28 38L28 37L29 37L29 38L31 38L31 39L32 39L32 38L34 38L34 39L35 39L35 38L36 38L36 39L37 39L37 41L38 41L38 39L37 39L37 38L39 38L39 37L41 37L41 36L38 36L38 37L37 37L37 38L36 38L36 37L35 37L35 36L37 36L37 35L36 35L36 34L37 34L37 33L38 33L38 35L41 35L41 33L42 33L42 32L43 32L43 31L44 31L44 29L43 29L43 30L41 30L41 31L38 31L38 30L37 30L37 33L36 33L36 34L35 34L35 32L36 32L36 31L35 31L35 32L34 32L34 33L33 33L33 32L32 32L32 31L33 31L33 28L31 28L31 29L32 29L32 30L31 30L31 32L30 32L30 33L28 33L28 32L29 32L29 31L28 31L28 32L27 32L27 31L25 31L25 30L26 30L26 26ZM31 26L31 27L32 27L32 26ZM5 27L5 30L8 30L8 27ZM27 27L27 30L30 30L30 27ZM49 27L49 30L52 30L52 27ZM6 28L6 29L7 29L7 28ZM28 28L28 29L29 29L29 28ZM50 28L50 29L51 29L51 28ZM54 28L54 29L53 29L53 30L55 30L55 28ZM34 29L34 30L36 30L36 29ZM16 30L16 31L17 31L17 30ZM5 31L5 32L8 32L8 33L6 33L6 34L5 34L5 35L4 35L4 36L1 36L1 38L3 38L3 39L1 39L1 40L2 40L2 41L4 41L4 42L5 42L5 43L6 43L6 44L5 44L5 45L6 45L6 46L8 46L8 47L9 47L9 48L10 48L10 47L9 47L9 46L10 46L10 43L9 43L9 44L8 44L8 42L7 42L7 41L6 41L6 42L5 42L5 41L4 41L4 38L3 38L3 37L4 37L4 36L5 36L5 40L8 40L8 39L6 39L6 38L7 38L7 37L8 37L8 35L9 35L9 36L10 36L10 35L9 35L9 32L10 32L10 31L9 31L9 32L8 32L8 31ZM25 32L25 33L27 33L27 32ZM31 32L31 33L32 33L32 34L31 34L31 35L30 35L30 34L28 34L28 35L27 35L27 34L26 34L26 37L28 37L28 35L30 35L30 37L31 37L31 38L32 38L32 36L33 36L33 37L34 37L34 36L35 36L35 34L33 34L33 33L32 33L32 32ZM39 33L39 34L40 34L40 33ZM43 33L43 36L42 36L42 37L43 37L43 36L44 36L44 37L45 37L45 36L44 36L44 33ZM49 33L49 34L48 34L48 35L50 35L50 33ZM2 34L2 35L3 35L3 34ZM6 34L6 35L5 35L5 36L6 36L6 37L7 37L7 36L6 36L6 35L7 35L7 34ZM22 34L22 35L23 35L23 34ZM32 34L32 35L31 35L31 36L32 36L32 35L33 35L33 34ZM55 35L55 36L56 36L56 35ZM19 38L19 39L20 39L20 38ZM15 40L15 41L16 41L16 40ZM17 40L17 41L18 41L18 42L20 42L20 40ZM32 41L32 43L33 43L33 41ZM47 41L47 42L48 42L48 41ZM6 42L6 43L7 43L7 42ZM42 42L42 45L43 45L43 44L44 44L44 43L43 43L43 42ZM50 42L50 43L51 43L51 42ZM3 44L3 47L5 47L5 46L4 46L4 44ZM6 44L6 45L8 45L8 44ZM35 44L35 45L36 45L36 44ZM1 45L1 47L2 47L2 45ZM54 45L54 46L55 46L55 45ZM22 46L22 48L23 48L23 46ZM38 46L38 47L40 47L40 46ZM42 46L42 47L44 47L44 46ZM51 46L51 47L52 47L52 46ZM30 47L30 48L31 48L31 47ZM34 47L34 48L35 48L35 47ZM9 49L9 51L10 51L10 49ZM18 49L18 50L17 50L17 51L19 51L19 49ZM27 49L27 52L30 52L30 49ZM49 49L49 52L52 52L52 49ZM28 50L28 51L29 51L29 50ZM50 50L50 51L51 51L51 50ZM56 52L56 53L57 53L57 52ZM15 53L15 54L16 54L16 53ZM29 53L29 54L30 54L30 53ZM31 53L31 54L32 54L32 53ZM21 54L21 55L22 55L22 54ZM9 55L9 56L11 56L11 55ZM25 55L25 56L26 56L26 55ZM33 55L33 56L34 56L34 57L37 57L37 56L38 56L38 57L39 57L39 55L37 55L37 56L34 56L34 55ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM50 0L50 7L57 7L57 0ZM51 1L51 6L56 6L56 1ZM52 2L52 5L55 5L55 2ZM0 50L0 57L7 57L7 50ZM1 51L1 56L6 56L6 51ZM2 52L2 55L5 55L5 52Z" fill="#000000"/></g></g></svg>

                </div>
                <div class="col-sm-6 pt-3 text-center">
                    <div>Palembang, 03/10/2023 09:19:15</div>
                    <div class="pb-5">Hormat Kami,</div>
                    <div class="pt-5">dr.Martin Raja Sonang Napitupulu, Sp.Rad.,R.I (K)</div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="content-not-access" hidden>
    <use>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="whistle">
                <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
            <g><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)">
                    <path d="M4295.8,3963.2c-113-57.4-122.5-107.2-116.8-622.3l5.7-461.4l63.2-55.5c72.8-65.1,178.1-74.7,250.8-24.9c86.2,61.3,97.6,128.3,97.6,584c0,474.8-11.5,526.5-124.5,580.1C4393.4,4001.5,4372.4,4001.5,4295.8,3963.2z"/><path d="M3053.1,3134.2c-68.9-42.1-111-143.6-93.8-216.4c7.7-26.8,216.4-250.8,476.8-509.3c417.4-417.4,469.1-463.4,526.5-463.4c128.3,0,212.5,88.1,212.5,224c0,67-26.8,97.6-434.6,509.3c-241.2,241.2-459.5,449.9-488.2,465.3C3181.4,3180.1,3124,3178.2,3053.1,3134.2z"/><path d="M2653,1529.7C1644,1445.4,765.1,850,345.8-32.7C62.4-628.2,22.2-1317.4,234.8-1960.8C451.1-2621.3,947-3186.2,1584.6-3500.2c1018.6-501.6,2228.7-296.8,3040.5,515.1c317.8,317.8,561,723.7,670.1,1120.1c101.5,369.5,158.9,455.7,360,553.3c114.9,57.4,170.4,65.1,1487.7,229.8c752.5,93.8,1392,181.9,1420.7,193.4C8628.7-857.9,9900,1250.1,9900,1328.6c0,84.3-67,172.3-147.4,195.3c-51.7,15.3-790.8,19.1-2558,15.3l-2487.2-5.7l-55.5-63.2l-55.5-61.3v-344.6V719.8h-411.7h-411.7v325.5c0,509.3,11.5,499.7-616.5,494C2921,1537.3,2695.1,1533.5,2653,1529.7z"/></g></g>
            </svg>
    </use>
    <h1>403</h1>
    <h2>Access Forbidden!</h2>
</div>
<script src="http://rsud.sumselprov.go.id/labor/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="http://rsud.sumselprov.go.id/labor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://rsud.sumselprov.go.id/labor/adminlte/dist/js/adminlte.min.js"></script>
<script src="http://rsud.sumselprov.go.id/labor/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
    const accessAuth = async (enc) => {
        // Swal input form
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Masukkan Password',
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            inputValidator: (value) => {
                if (!value) {
                    return 'Password tidak boleh kosong!'
                }
            }
        }).then(async (result) => {
            let value = result.value;
            if (result.value) {
                await run_waitMe('win8');
                const d = 16;
                const url = "http://rsud.sumselprov.go.id/labor/auth-radiologi";
                const data = {
                    d: d,
                    enc: enc,
                    password: value,
                };
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(data)
                });
                const result = await response.json();
                if (result.code != 200) {
                    await close_waitMe();
                    swalWithBootstrapButtons.fire({
                        title: 'Error!',
                        text: result.message,
                        icon: 'error',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        $('.content-not-access').removeAttr('hidden');
                        $('.content-access').attr('hidden', 'hidden');
                    });
                } else {
                    $('.content-access').removeAttr('hidden');
                    $('.content-not-access').attr('hidden', 'hidden');
                    await close_waitMe();
                    setTimeout(() => {
                        window.print();
                    }, 2000);
                }
            } else {
                $('.content-not-access').removeAttr('hidden');
                $('.content-access').attr('hidden', 'hidden');
            }
        });
    }
    let report_text = `{!! nl2br(e($radiologyData['result']['report_text'] ?? 'Data tidak tersedia')) !!}`;
    let conclusion = `{!! nl2br(e($radiologyData['result']['conclusion'] ?? 'Data tidak tersedia')) !!}`;
    $(document).ready(function() {
        $('.report-text').html(report_text.replaceAll('\n', '<br>'));
        $('.conclusion').html(conclusion.replaceAll('\n', '<br>'));
    });
</script>
<script src="http://rsud.sumselprov.go.id/labor/waitMe.min.js"></script>
<script>
    const run_waitMe = async (effect) => {
        $('body').waitMe({
            //none, rotateplane, stretch, orbit, roundBounce, win8,
            //win8_linear, ios, facebook, rotation, timer, pulse,
            //progressBar, bouncePulse or img
            effect: effect,
            //place text under the effect (string).
            text: 'Loading...',
            //background for container (string).
            bg: 'rgb(45 45 45 / 80%)',
            //color for background animation and text (string).
            color: '#fff',
            //max size
            maxSize: '',
            //wait time im ms to close
            waitTime: -1,
            //url to image
            source: '',
            //or 'horizontal'
            textPos: 'vertical',
            //font size
            fontSize: '20px',
            // callback
            onClose: function() {

            }
        });
    }

    const close_waitMe = async () => {
        $('body').waitMe('hide');
    }
</script>
</body>
</html>
