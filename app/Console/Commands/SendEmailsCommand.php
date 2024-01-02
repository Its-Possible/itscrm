<?php

namespace App\Console\Commands;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $mails = Mail::all();

        if($mails){
            foreach($mails as $mail) {
                dd($mail);
            }
        }
    }
}
