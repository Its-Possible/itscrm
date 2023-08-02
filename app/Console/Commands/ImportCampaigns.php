<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use App\Services\BrevoService;
use Illuminate\Console\Command;

class ImportCampaigns extends Command
{
    private BrevoService $brevo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:campaigns {service?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import campaigns from services';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $this->brevo = new BrevoService();

        $this->info("\nImporting campaigns...\n");

        foreach ($this->brevo->getCampaigns() as $campaign) {
            if(Campaign::where("code", "cbrevo#" . $campaign['id'])->count() == 0) {
                $import_campaign = new Campaign();
                $import_campaign->code  = "cbrevo#" . $campaign['id'];
                $import_campaign->name = $campaign['name'];
                $import_campaign->subject = $campaign['subject'];
                $import_campaign->previewText = $campaign['previewText'];
                $import_campaign->htmlContent = $campaign['htmlContent'];
                $import_campaign->local = 'brevo';

                if($import_campaign->save())
                    $this->comment("{$import_campaign->name} Campaign imported with sucessfully!");
                else
                    $this->warn("\n{$import_campaign->name} Campaign not imported with sucessfully!\n");
            }
        }

    }
}
