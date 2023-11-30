<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Excel;

class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers {filename?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import customers from XLS or CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $file = "hello.xls";

        if(!is_null($this->argument('filename'))) {
            $file = $this->argument('filename');
        }

        $this->info("Importing customers from " . $file);

        Excel::filter('chunk')->load($file)->chunk(200, function ($data) {
            foreach($data->toArray() as $row) {
                $this->info($row);
            }
        });

        $this->info("Customers imported successfully");
    }
}
