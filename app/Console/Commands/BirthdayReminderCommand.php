<?php

namespace App\Console\Commands;

use App\Helpers\Scripts\Mail\BirthdayMail;
use App\Helpers\Scripts\Mail\BirthdayReminderMail;
use App\Models\Customer;
use Illuminate\Console\Command;

class BirthdayReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:birthday-reminder {type?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate birthday reminders in the database for the upcoming monthly, weekly or daily';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $birthdays = match ($this->argument('type')) {
            'monthly', 'month' => Customer::birthdayThisMonth(),
            'weekly', 'week' => Customer::birthdayThisWeek(),
            default => Customer::birthdayToday(),
        };

        if($birthdays->count() > 0){
            $customers = Customer::all();
            foreach($customers as $customer){
                BirthdayReminderMail::create($customer->email);
            }
        }



    }
}
