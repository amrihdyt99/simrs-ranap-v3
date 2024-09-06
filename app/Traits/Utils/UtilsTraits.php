<?php

namespace App\Traits\Utils;

trait UtilTraits
{
    /**
     * * Parse registration number
     * @return string
     * @example "QREG_RJ_202310160236"
     * @return "QREG/RJ/202310160236"
     */
    public function parseRegNo($reg_no)
    {
        return str_replace('_', '/', $reg_no);
    }

    /**
     * * Format registration number
     * @return string
     * @example "QREG/RJ/202310160236"
     * @return "QREG_RJ_202310160236"
     */
    public function formatRegNo($reg_no)
    {
        return str_replace('/', '_', $reg_no);
    }
}
