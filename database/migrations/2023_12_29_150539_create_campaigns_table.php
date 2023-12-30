<?php

use App\Helpers\Interfaces\CampaignInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('subject');
            $table->string('previewText');
            $table->longText('htmlContent');
            $table->string('scheduledAt')->nullable();
            $table->dateTime('scheduledStart')->nullable();
            $table->dateTime('scheduledEnd')->nullable();
            $table->string('status')->default(CampaignInterface::STATUS_DRAFT);
            $table->string('local')->default('local');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
