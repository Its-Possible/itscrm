<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportContacts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:contacts {filename?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import contacts';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        if(!is_null($this->argument('filename')))
        {
            echo $this->argument('filename');
        }
    }
}
