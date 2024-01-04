<?php

namespace App\Console\Commands;

use App\Helpers\Interfaces\MailInterface;
use App\Mail\BirthdayPersonalizedMail;
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
    protected $description = 'Mail send emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $mails = Mail::all();

        if($mails){
            foreach($mails as $mail) {
                $customer = Customer::where('email', $mail->to)->first();
                $layout = match ($mail->layout) {
                    MailInterface::LAYOUT_BIRTHDAY_CUSTOM => \Mail::to($mail->to)->send(new BirthdayPersonalizedMail("customer", $customer)),
                };

                $this->info("ID: {$mail->id} | CUSTOMER ID: {$customer->id} | SENDING BIRTHDAY EMAIL | MAIL LAYOUT: {$mail->layout}");
            }
        }
    }
}
