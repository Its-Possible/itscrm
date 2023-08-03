<?php

namespace App\Console\Commands;

use App\Jobs\SendBirthdayEmailJob;
use App\Models\Customer;
use Illuminate\Console\Command;

class BirthdayCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all birthdays today';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $today = now()->format('m-d');

        $customers = Customer::whereRaw("DATE_FORMAT(birthday, '%m-%d') LIKE '{$today}'")->get();

        foreach($customers as $customer)
        {
            $this->info(decrypt_data($customer->email));
            SendBirthdayEmailJob::dispatch($customer);
        }

    }
}
