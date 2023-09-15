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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->double("amount")->default(0);
            $table->string("payment_type")->comment('credit','debit')->nullable();
            $table->string("trade_value")->comment('profit','loss')->nullable();
            $table->double("previous_balance")->default(0);
            $table->string("details")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
