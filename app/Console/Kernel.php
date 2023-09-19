<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\updateTradeRates;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        //cleanCancelledBookings::class,
//        updateTradeRates::class
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
//        $schedule->command('update:rates')->dailyAt('00:00:00');
//        $schedule->command('update:rates')->everyMinute();
//        $schedule->command('app:update-trade-rates')->everyTenMinutes();
        $schedule->command('app:update-trade-rates')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
