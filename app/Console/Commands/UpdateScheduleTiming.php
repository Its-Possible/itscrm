<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateScheduleTiming extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:update-timing {schedule-running}';

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
        // Update next time
        $schedule = Schedule::find($this->argument("schedule-running"));
        $schedule->last_executed_at = Carbon::now()->getTimestamp();
        $schedule->next_executed_at = Carbon::now()->addMinutes($schedule->execution_time);
        $schedule->save();
    }
}
