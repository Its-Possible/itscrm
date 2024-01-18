<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

class CreateCampaignMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:campaigns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create campaigns mail from schedule task';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $customersWithCampaigns = Customer::with('tags.campaigns')
            ->whereHas('tags.campaigns');
    }
}
