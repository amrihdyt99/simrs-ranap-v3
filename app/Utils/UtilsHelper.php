<?php

namespace App\Utils;

use Carbon\Carbon;
use PhpParser\Node\Expr\FuncCall;

class UtilsHelper
{

    /**
     * Get date by registration number
     * @param string $reg_no ex: QREG/RI/202409270021
     * @return string ex: 2024-09-27
     */
    public function getDateByRegistrationNumber($reg_no)
    {
        if (!is_string($reg_no)) return null;
        $date = explode('/', $reg_no)[2]; // 202409270021
        $date = substr($date, 0, 8); // 20240927
        return $date;
    }

    public function dateFormatter($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }


    /**
     * Get origin care service by registration number
     * @param string $reg_no ex: QREG/RI/202409270021
     * @return string ex: Rawat Inap
     */
    public function getOriginCareService($reg_no)
    {
        if (!is_string($reg_no)) return "-";
        $origin = explode('/', $reg_no)[1]; // RI
        $origin = strtoupper($origin);
        if ($origin == 'RI') return 'Rawat Inap';
        if ($origin == 'RJ') return 'Rawat Jalan';
        if ($origin == 'ER') return 'Unit Gawat Darurat';
        return "-";
    }

    public function parsePatientEducation($generalCode)
    {
        $education = [
            'X0013^01' => "Tamat TK",
            'X0013^02' => "Tamat SD",
            'X0013^03' => "Tamat SMP",
            'X0013^04' => "Tamat SMA",
            'X0013^05' => "Diploma I",
            'X0013^06' => "Diploma III",
            'X0013^07' => "Sarjana (S1)",
            'X0013^08' => "Magister (S2)",
            'X0013^09' => "Doktor (S3)",
        ];
        return $education[$generalCode] ?? '-';
    }

    public function parseMaritalStatus($generalCode)
    {
        $marital_status = [
            '0002^A' => (object)['en' => 'Separated', 'id' => 'Berpisah'],
            '0002^B' => (object)['en' => 'Unmarried', 'id' => 'Belum Menikah'],
            '0002^C' => (object)['en' => 'Common Law', 'id' => 'Nikah Siri'],
            '0002^D' => (object)['en' => 'Divorced', 'id' => 'Cerai'],
            '0002^M' => (object)['en' => 'Married', 'id' => 'Menikah'],
            '0002^O' => (object)['en' => 'Other', 'id' => 'Lainnya'],
            '0002^S' => (object)['en' => 'Single', 'id' => 'Lajang'],
            '0002^W' => (object)['en' => 'Widowed', 'id' => 'Duda/Janda'],
        ];
        return $marital_status[$generalCode] ?? null;
    }

    public function parseOccupation($generalCode)
    {
        $occupation = [
            'X0012^01' => 'Pegawai Swasta',
            'X0012^02' => 'TNI/POLRI/PNS/BUMN',
            'X0012^03' => 'Buruh dan Lainnya',
            'X0012^04' => 'Tdk Kerja/Sekolah/IRT',
            'X0012^06' => 'Wiraswasta/Dagang/Jasa',
            'X0012^08' => 'Petani/Nelayan'
        ];
        return $occupation[$generalCode] ?? '-';
    }
}
