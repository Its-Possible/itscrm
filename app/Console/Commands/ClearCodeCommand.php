<?php

namespace App\Console\Commands;

use App\Helpers\Scripts\ClearCode\ClearCode;
use Illuminate\Console\Command;

class ClearCodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'html:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $code = new ClearCode();
        $v = "[!USER_NAME]";

        echo($v);

        echo $code->content($v)->render();
    }
}
