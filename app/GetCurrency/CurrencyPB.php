<?php

namespace App\GetCurrency;

class CurrencyPB
{
    /**
     * Get currency from privat bank API
     * @return string
     */
    public static function getKurs() {
        $curl = curl_init();
        if ( $curl ){
            curl_setopt($curl, CURLOPT_URL, "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $page = curl_exec($curl);

            curl_close($curl);
            unset($curl);

            $page = json_decode($page, true);

            return $page[0]['sale'];
        }
    }
}