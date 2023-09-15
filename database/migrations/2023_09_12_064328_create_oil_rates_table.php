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
        Schema::create('oil_rates', function (Blueprint $table) {
            $table->id();
            $table->string('base_currency')->nullable();
            $table->string('symbol')->nullable();
            $table->string('unit')->nullable();
            $table->double('open')->default(0);
            $table->double('open_rate')->default(0);
            $table->double('high')->default(0);
            $table->double('high_rate')->default(0);
            $table->double('low')->default(0);
            $table->double('low_rate')->default(0);
            $table->double('close')->default(0);
            $table->double('close_rate')->default(0);
            $table->string('time_stamp')->nullable();
            $table->time('time')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oil_rates');
    }
};
