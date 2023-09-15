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
        Schema::create('user_trades', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->default(0);
            $table->float("trade_amount")->default(0);
            $table->string("trade_type")->comment('Buy','Sell');
            $table->integer("trade_start_rate_id")->default(0);
            $table->integer("trade_end_rate_id")->default(0);
            $table->datetime("trade_start_date_time")->nullable();
            $table->datetime("trade_end_date_time")->nullable();
            $table->string("trade_active_time")->nullable();
            $table->double("trade_rate_difference")->default(0);
            $table->string("status")->nullable()->comment('Active,Completed');
            $table->string("trade_final_effect")->nullable()->comment('Profit,Loss');
            $table->float("trade_closing_amount")->nullable();
            $table->float("final_amount")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_trades');
    }
};
