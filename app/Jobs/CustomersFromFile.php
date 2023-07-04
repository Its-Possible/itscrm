<?php

namespace App\Jobs;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CustomersFromFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $file;

    /**
     * Create a new job instance.
     */
    public function __construct(string $file)
    {
        //
        $this->file = $file;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $file = new \SplFileObject($this->file);
        $file->setFlags(\SplFileObject::READ_CSV);

        foreach($file as $row) {
            // Logic to save customer
        }
    }
}
