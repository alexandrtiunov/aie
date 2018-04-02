<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 29.03.2018
 * Time: 11:42
 */

namespace App\GetCurrency;
use SimpleXMLElement;


class CurrencyPB
{

    public static function getKurs() {
        global $dna; $dna = true;
        $curl = curl_init();
        if ( $curl ){
            // Скачанные данные не выводить поток
            curl_setopt($curl, CURLOPT_URL, "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            // Скачиваем
            $page = curl_exec($curl);   //В переменную $page помещается страница
            curl_close($curl);
            unset($curl);

            $page = json_decode($page, true);

            return $page[0]['sale'];
//            $xml = new SimpleXMLElement($page);

//            return (double)$xml->row[0]->exchangerate['sale']->__toString();
        }
    }
}