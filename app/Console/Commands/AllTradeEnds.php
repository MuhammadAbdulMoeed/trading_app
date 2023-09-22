<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Console\Command;
use App\Models\OilRates;
use App\Models\UserTrades;
use App\Models\User;
use Carbon\Carbon;
use DB;
class AllTradeEnds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-trade-ends';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //\Log::info("Cron Starts!");
        $this->info('Trade Ends Command executed successfully.');
        // Create an instance of your controller
        $controller = new Controller();

        $activeTrades = UserTrades::where('status', "Active")->get();

        if (isset($activeTrades) && $activeTrades != null) {

            foreach ($activeTrades as $trade) {

                $userid             = $trade->user_id;
                $balance            = $controller->userCurrentBalance($userid);
                $tradeCurrentRate   = OilRates::orderby('created_at', 'desc')->first();
                $currentCloseRate   = $tradeCurrentRate->close_rate;
                $startRateData      = OilRates::where('id', $trade->trade_start_rate_id)->first();
                $initialRate        = $startRateData->close_rate;

                $trade_final_effect = "";
                $tradeResult        = 0;
                $profitLossAmount   = 0;
                $final_amount       = 0;
                //$barrels            = $activeTrade->total_barrels;
                $barrels            = $balance / $initialRate;
                //formula 1
                $tradeResult        = ($currentCloseRate - $initialRate) * $barrels;

                if ($trade->trade_type == "Buy") {
                    if ($tradeResult > 0) {
                        $trade_final_effect = "Profit";
                        $profitLossAmount = abs($tradeResult);
                        $final_amount = $balance + $profitLossAmount;
                    } else {
                        $trade_final_effect = "Loss";
                        $profitLossAmount = abs($tradeResult);
                        $final_amount = $balance - $profitLossAmount;
                    }
                } else if ($trade->trade_type == "Sell") {

                    if ($tradeResult < 0) {
                        $trade_final_effect = "Profit";
                        $profitLossAmount = abs($tradeResult);
                        $final_amount = $balance + $profitLossAmount;
                    } else {
                        $trade_final_effect = "Loss";
                        $profitLossAmount = abs($tradeResult);
                        $final_amount = $balance - $profitLossAmount;
                    }
                }

                if ($profitLossAmount > 0) {
                    $desc = "Trade has completed with $trade_final_effect and amount : $profitLossAmount";
                    $controller->updateWallet($userid, $profitLossAmount, $trade_final_effect, $desc);
                }

                $activeTrade = UserTrades::find($trade->id);
                $activeTrade->trade_end_rate_id = $tradeCurrentRate->id;
                $activeTrade->trade_end_date_time = Carbon::now();
                $activeTrade->status = "Completed";
                $activeTrade->trade_rate_difference = $tradeResult;
                $activeTrade->trade_final_effect = $trade_final_effect; // profit or loss
                $activeTrade->trade_closing_amount = round($profitLossAmount, 2);
                $activeTrade->final_amount = round($final_amount, 2);
                $activeTrade->save();
            }

            foreach ($activeTrades as $trade) {

                if (isset($trade->user_id)) {
                    $user = User::find($trade->user_id);
                    $position = $user->getPosition();
                    $user->notify(new \App\Notifications\TradeEndMailNotification($user, $position));
                }
            }

            //dd("All Trades Ends and Emails Sends to all by their positions");
        }
        //dd("No Active trade Found");
    }
}
