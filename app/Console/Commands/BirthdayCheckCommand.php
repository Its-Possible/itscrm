<?php

namespace App\Console\Commands;

use App\Helpers\Interfaces\MailInterface;
use App\Helpers\Scripts\BirthdayMail;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Mail;
use Illuminate\Console\Command;

class BirthdayCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:birthdays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking all birthdays for the current day.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $today = now()->format("m-d");

        $customers = Customer::whereRaw("DATE_FORMAT(birthday, '%m-%d') LIKE '{$today}'");

        if($customers->count() > 0) {
            $this->info("Creating birthday email to customers");
            foreach($customers->get() as $customer) {
                $this->info("Creating email to {decrypt_data($customer->name)} about birthday...");
                BirthdayMail::create("customer", $customer->mail);
            }
        }

        $doctors = Doctor::where("DATE_FORMAT(birthday, '%m-%d') LIKE '{$today}'");

        if($doctors->count() > 0){
            $this->info("Creating birthday email to doctors");
            foreach($doctors->get() as $doctor) {
                $this->info("Creating email to {$doctor->name} about birthday...");
                BirthdayMail::create("doctor", $doctor->mail);
            }
        }

    }
}
