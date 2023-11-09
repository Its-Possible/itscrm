<?php

use App\Repositories\NotificationRepository;
use Illuminate\Database\Eloquent\Collection;
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

function date_format_trans(string $date, bool $with_week = false): string
{
    $weeks = ["Sun" => "Domingo","Mon" => "Segunda", "Tue" => "Terça", "Wed" => "Quarta","Thu" => "Quinta","Fri" => "Sexta","Sat" => "Sábado"];

    $months = [
        "Jan" => "Janeiro", "Feb" => "Fevereiro", "Mar" => "Março", "Apr" => "Abril", "May" => "Maio", "Jun" => "Junho", "Jul" => "Julho", "Aug" => "Agosto", "Sep" => "Setembro", "Oct" => "Outubro", "Nov" => "Novembro", "Dec" => "Dezembro"
    ];

    $date = (new DateTime())->setDate(date('Y'), date_format(date_create($date), 'm'), date_format(date_create($date), 'd'));

    if ($with_week == false) {
        $date = $date->format('M, d');

    } else {
        $date = $date->format('D, M, d');
    }

    $date = explode(", ", $date);

    if($with_week && !array_key_exists($date[1], $months)){
        return "Invalid date";
    }else if($with_week && !array_key_exists($date[0], $weeks)){
        return "Invalid date";
    }else if(!$with_week && !array_key_exists($date[0], $months)){
        return "Invalid date";
    }

    return $with_week ? $weeks[$date[0]] .", ". $months[$date[1]] .", ". $date[2] : $months[$date[0]] . ", " . $date[1];
}

function notifications($type = "list"): int|array|Collection
{
    $notificationRepository = new NotificationRepository();

    switch($type) {
        case "counter": return $notificationRepository->getNotificationsGlobalNotRead()->count();
        case "list": return $notificationRepository->getNotificationsGlobalNotRead()->toArray();
        case "collection":
        default: return $notificationRepository->getNotificationsGlobalNotRead()->get();
    }
}
