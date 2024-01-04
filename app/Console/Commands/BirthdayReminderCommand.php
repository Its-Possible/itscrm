<?php

namespace App\Console\Commands;

use App\Helpers\Scripts\BirthdayMail;
use App\Models\Customer;
use Illuminate\Console\Command;

class BirthdayReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:birthday-reminder {type?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate birthday reminders in the database for the upcoming week';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $customers = match ($this->argument('type')) {
            'montly' || 'month' => Customer::birthdayThisMonth(),
            'weekly' || 'week' => Customer::birthdayThisWeek(),
            default => Customer::birthdayToday(),
        };

        if($customers->count() > 0){
            foreach($customers->get() as $customer){
                BirthdayMail::create($customer->email);
            }
        }



    }
}
