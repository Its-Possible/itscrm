<?php

namespace App\Helpers\Scripts\Mail;

use App\Helpers\Interfaces\MailInterface;
use App\Models\Campaign;
use App\Models\Mail;
use Illuminate\Support\Facades\Log;

class CampaignMail {

    public static function create(Campaign $campaign, string $to): void
    {
        $mail = new Mail();
        $mail->from = config('mail.from.address');
        $mail->to  = $to;
        $mail->subject = $campaign->subject;
        $mail->body = "IGNORE BODY";
        $mail->type = MailInterface::TYPE_CONTENT_HTML;
        $mail->layout = MailInterface::LAYOUT_CAMPAIGN_CUSTOM;

        if(!$mail->save()) {
            Log::danger("FAILED | CREATE {$campaign->name} EMAIL TO {$mail->to}!");
        }
    }

    public static function update(int $id, Campaign $campaign, string $status): void
    {
        $mail = Mail::find($id);
        $mail->status = $status;

        if(!$mail->save()){
            Log::danger("FAILED | ID: {$mail->id} | UPDATED {$campaign->name} CAMPAIGN EMAIL STATUS TO {$mail->to}! TRY AGAIN!");
        }
    }

}
