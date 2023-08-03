<?php

namespace App\Jobs;

use App\Mail\BirthdayEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBirthdayEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private object $customer;

    /**
     * Create a new job instance.
     */
    public function __construct(object $customer)
    {
        //
        $this->customer = $customer;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        \Mail::to(decrypt_data($this->customer->email))->send(new BirthdayEmail($this->customer));
    }
}
