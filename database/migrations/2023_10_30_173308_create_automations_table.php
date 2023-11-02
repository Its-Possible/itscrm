<?php

use App\Helpers\Interfaces\AutomationInterface;
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
        Schema::create('automations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('schedule');
            $table->string('command');
            $table->string('status')->default(AutomationInterface::STATUS_STOPPED);
            $table->string('notification')->default(AutomationInterface::NOTIFICATION_ON);
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automations');
    }
};
