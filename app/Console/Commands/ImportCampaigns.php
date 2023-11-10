<?php

namespace App\Console\Commands;

use App\Events\CampaignImportStarted;
use App\Jobs\ProcessImportCampaigns;
use App\Models\Campaign;
use App\Repositories\NotificationRepository;
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
    protected $signature = 'import:campaigns {--user=} {--service=?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import campaigns and updating from services';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $this->brevo = new BrevoService();

        $this->info("\nImporting and updating campaigns...\n");

        $campaignsFromService = $this->brevo->getCampaigns();

        $notificationRepository = new NotificationRepository();
        $notificationRepository->create("Importação de campanhas", "<strong>Eduardo Bessa</strong> inicializou a importação de campanhas");

        foreach ($campaignsFromService as $campaign) {
            $selectedCampaignByCode = Campaign::where("code", "cbrevo#" . $campaign['id']);

            if ($selectedCampaignByCode->count() == 0) {
                $import_campaign = new Campaign();
                $import_campaign->code = "cbrevo#" . $campaign['id'];
                $import_campaign->name = $campaign['name'];
                $import_campaign->subject = $campaign['subject'];
                $import_campaign->previewText = $campaign['previewText'];
                $import_campaign->htmlContent = $campaign['htmlContent'];
                $import_campaign->local = 'brevo';

                if ($import_campaign->save())
                    $this->comment("{$import_campaign->name} Campaign imported with sucessfully!");
                else
                    $this->warn("\n{$import_campaign->name} Campaign not imported with sucessfully!\n");
            }else {

                $updateCampaign = $selectedCampaignByCode->first();
                $updateCampaign->name = $campaign['name'];
                $updateCampaign->subject = $campaign['subject'];
                $updateCampaign->previewText = $campaign['previewText'];
                $updateCampaign->htmlContent = $campaign['htmlContent'];

                if ($updateCampaign->save())
                    $this->comment("{$updateCampaign->name} Campaign updated with sucessfully!");
                else
                    $this->warn("\n{$updateCampaign->name} Campaign not updated with sucessfully!\n");
            }
        }

        $campaignsFromDatabase = Campaign::all();

        // TODO: Delete all campaigns deleted on Brevo

        $this->info("Imported and updated campaigns with sucessfully!");
    }
}
