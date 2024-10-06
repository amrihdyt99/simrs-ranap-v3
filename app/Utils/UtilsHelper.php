<?php

namespace App\Utils;

use Carbon\Carbon;

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
}
