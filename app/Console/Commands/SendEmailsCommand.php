<?php

namespace App\Console\Commands;

use App\Helpers\Interfaces\MailInterface;
use App\Mail\BirthdayPersonalizedMail;
use App\Mail\BirthdayReminderPersonalizedMail;
use App\Models\Customer;
use App\Models\Mail;
use Illuminate\Console\Command;

class SendEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail send emails saved on database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $mails = Mail::where('status', MailInterface::STATUS_PENDING)->limit(5)->get();

        if($mails){
            foreach($mails as $mail) {

                $customer = Customer::where('email', $mail->to)->first();

]                switch($mail->layout)
                {
                    case MailInterface::LAYOUT_BIRTHDAY_CUSTOM:
                        \Mail::to($mail->to)->send(new BirthdayPersonalizedMail("customer", $customer));
                        break;
                    case MailInterface::LAYOUT_BIRTHDAY_REMINDER_CUSTOM:
                        \Mail::to($mail->to)->send(new BirthdayReminderPersonalizedMail("weekly", $customer));
                        break;
                }

                if(!$mail->save()) {
                    $mail->status = MailInterface::STATUS_FAILED;
                    $this->info("ID: {$mail->id} | CUSTOMER ID: {$customer->id} | SENDING BIRTHDAY EMAIL | MAIL LAYOUT: {$mail->layout} | STATUS: {$mail->status}");
                }else{
                    $mail->status = MailInterface::STATUS_SENT;
                    $this->info("ID: {$mail->id} | CUSTOMER ID: {$customer->id} | SENDING BIRTHDAY EMAIL | MAIL LAYOUT: {$mail->layout} | STATUS: {$mail->status}");
                }
            }
        }
    }
}
