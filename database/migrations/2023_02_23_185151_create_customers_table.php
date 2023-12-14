<?php

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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avatar_id')->default(1);
            $table->mediumText('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->mediumText('address_line_1')->nullable();
            $table->mediumText('address_line_2')->nullable();
            $table->mediumText('location')->nullable();
            $table->mediumText('postcode')->nullable();
            $table->date('birthday')->nullable();
            $table->string('slug')->unique();
            $table->string('vat')->default('CONSUMIDOR FINAL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
