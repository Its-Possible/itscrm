<?php

namespace App\Console\Commands;

use App\Events\TaskRunning;
use App\Helpers\Interfaces\TaskInterface;
use App\Models\Task;
use Auth;
use Illuminate\Console\Command;

class TasksScheduleRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start run all schedules tasks!';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $tasks = Task::where('status', 'NOT LIKE', TaskInterface::STATUS_STOPPED)
            ->where('status', 'NOT LIKE', TaskInterface::STATUS_PAUSED);

        if($tasks->count() > 0) {
            foreach($tasks->get() as $task) {
                if($task->notification === TaskInterface::NOTIFICATION_ON) {
                    echo "Tem as notificações ativas \n";
                    event(new TaskRunning("Execução de tarefa", "A tarefa {$task->name} deu inicio!"));
                    sleep(2);
                }
            }
        }
    }
}
