<?php

namespace App\Console;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule as ScheduleConsole;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use function Symfony\Component\String\s;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(ScheduleConsole $schedule): void
    {
        $schedules = Schedule::all();

        foreach($schedules as $task) {
            $schedule->call(function () use($task) {
                Artisan::call($task->command);
                Log::error("No execute {$task->command}");
                Artisan::call("schedule:update-timing {$task->id}");
            })->everySecond();
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
