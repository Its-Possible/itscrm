<?php

namespace App\Helpers\Scripts;

use App\Helpers\Interfaces\MailInterface;
use App\Models\Mail;
use Illuminate\Support\Facades\Log;

class BirthdayMail {

    public static function create($to): void
    {
        $mail = new Mail();
        $mail->from = config('mail.from.address');
        $mail->to  = $to;
        $mail->subject = "A Clinica Mais deseja-lhe um feliz aniversário!";
        $mail->body = "IGNORE BODY";
        $mail->type = MailInterface::TYPE_CONTENT_HTML;
        $mail->layout = MailInterface::LAYOUT_BIRTHDAY_CUSTOM;

        if(!$mail->save()){
            Log::danger("FAILED | CREATE BIRTHDAY EMAIL TO {$mail->to}! TRY AGAIN, PLEASE!");
        }
    }

    public static function update(int $id, string $status): void
    {
        $mail = Mail::find($id);
        $mail->status = $status;

        if(!$mail->save()){
            Log::danger("FAILED | ID: {$mail->id} | UPDATED BIRTHDAY EMAIL STATUS TO {$mail->to}! TRY AGAIN, PLEASE!");
        }
    }

}
