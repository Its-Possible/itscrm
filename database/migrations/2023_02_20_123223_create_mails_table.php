<?php

use App\Helpers\Interfaces\MailInterface;
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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->string('subject');
            $table->string('body');
            $table->string('attachment')->nullable();
            $table->string('type')->default(MailInterface::TYPE_HTML);
            $table->string('status')->default(MailInterface::STATUS_PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
