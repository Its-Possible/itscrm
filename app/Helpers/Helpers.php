<?php

use Illuminate\Support\Facades\Crypt;

function encrypt_data($value): string
{
    return Crypt::encryptString($value);
}

function decrypt_data($value): string
{
    return !is_null($value) ? Crypt::decryptString($value) : "";
}

function getCampaignIdFromCode(string $code): string
{
    return str_replace('#', '', strstr($code, "#"));
}

function date_format_trans(string $date): string {

    $date = date($date);

    $months_pt = [
        1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro"
    ];

    $month_en = [
        1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec"
    ];

    foreach($month_en as $month => $month_en) {
        if(str_contains($date, $month_en)){
            return $months_pt[$month]. " " .date("d");
        }
    }

    return "";

}
