<?php

namespace App\Console\Commands;

use App\Helpers\Interfaces\AutomationInterface;
use App\Models\Automation;
use Illuminate\Console\Command;

class ExecuteSheduleTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'automation:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start execute automation scripts';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $automations = Automation::where('status', AutomationInterface::STATUS_WAITING)->get();

        foreach($automations as $automation)
        {
            exec($automation->command);
        }
    }
}
