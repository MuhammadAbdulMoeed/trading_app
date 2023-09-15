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
        Schema::table('users', function (Blueprint $table) {
            $table->integer("user_type")->default(0)->after('password');
            $table->decimal("user_balance",8,2)->default(0)->after('user_type');
            $table->datetime("last_trade_date")->nullable()->after('user_balance');
			$table->string("age_group")->nullable()->after('last_trade_date');
            $table->string("trade_experience")->nullable()->after('age_group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("user_type");
            $table->dropColumn("user_balance");
            $table->dropColumn("last_trade_date");
			$table->dropColumn("age_group");
            $table->dropColumn("trade_experience");
        });
    }
};
