<?php

namespace App\Traits;

use Hidehalo\Nanoid\Client;

trait NanoIDTraits
{

    public static function generateID($length = 21)
    {
        $client = new Client();
        $alphabets = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return $client->formatedId($alphabets, $length);
    }
}
