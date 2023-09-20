<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\OilRates;
use App\Models\UserTrades;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;
class CustomerController extends Controller
{
    public function index(){
        return view('auth.login');
    }


    public function dashboard() {

        $userid         = Auth::user()->id;
        $balance        = $this->userCurrentBalance($userid);

        $totalUsers     = User::where('user_type',0)->count();

        $positions      = Auth::user()->getPosition();

//        foreach ($users as $user) {
//            $position = $user->getPosition();
//            // Now, you can use $user and $position as needed.
//            echo "User {$user->id} has a balance of {$user->balance} and is in position {$position}<br>";
//        }
        //dd($positions,$totalUsers);

        $trade_rates    = OilRates::select('time_stamp','open_rate','high_rate','low_rate','close_rate','date','time')->orderBy('created_at','asc')->get();

        $activeTrade    = UserTrades::where('user_id',$userid)->where('status',"Active")->first();

        return view('customer.dashboard',compact(['balance','trade_rates','activeTrade','totalUsers','positions']));

    }


    public function trades_history() {

        $userid         = Auth::user()->id;
        $user_type      = Auth::user()->user_type;
        $balance        = $this->userCurrentBalance($userid);
        $totalUsers     = User::where('user_type',0)->count();
        $positions      = Auth::user()->getPosition();

        if($user_type == 1) {

            $userTradeHistory       =   UserTrades::where('status','Completed')->orderBy('trade_closing_amount','desc')->get();
            $total                  =   count($userTradeHistory);

        } else {

            $userTradeHistory       =   UserTrades::with('user')->where('status','Completed')->where('user_id',$userid)->orderBy('created_at','desc')->get();
            $total                  =   count($userTradeHistory);
        }

        return view('customer.trade_results',compact(['balance','userTradeHistory','total','user_type','totalUsers','positions']));
    }

    public function trade_api_data(Request $request) {

        if(isset($request->startDate) && $request->startDate != null) {
            $startDate  =  $request->startDate;
        } else {
            $startDate  =  now()->toDateString(); // Sets the start date to today
        }

        if(isset($request->endDate) && $request->endDate != null) {
            $endDate   =  $request->endDate;
        } else {
            $endDate   =  now()->endOfDay()->toDateString(); // Sets the end date to the end of today
        }

//        $trade_rates   =  OilRates::whereBetween('date', [$startDate, $endDate])->orderBy('created_at','asc')->get();
        $trade_rates   =  OilRates::select('time_stamp','open_rate as open','high_rate as high','low_rate as low','close_rate as close','date','time')->orderBy('created_at','asc')->get()->toArray();

        return json_encode($trade_rates);

    }


    public function startNewBuyTrade(Request $request) {

        $userid             = Auth::user()->id;

        $balance            = $this->userCurrentBalance($userid);

        $oldActiveTrade     = UserTrades::where('user_id',$userid)->where('status',"Active")->first();

        if(!isset($oldActiveTrade) || $oldActiveTrade == null) {

            if(isset($request->amount) && $request->amount > $balance) {
                return redirect()->back()->withErrors("Low Balance ,Invalid trade amount.");
            } else if (isset($request->amount) && $request->amount <= $balance) {
                $balance    =   $request->amount;
            }

            $investedAmount   = $balance;

            $tradeRateData    = OilRates::orderby('created_at','desc')->first();

            $barrels          = round(($investedAmount / $tradeRateData->close_rate), 2);

            $this->saveTrade($investedAmount,$tradeRateData->id,"Buy", $barrels);

            return redirect()->route('dashboard')->withSuccess("Trade starts successfully.");

        } else {

            return redirect()->back()->withErrors("You have already active trade, close first before start new trade.");
        }

        //return view('admin.trades',compact('rateData'));
    }

    public function startNewSellTrade(Request $request) {

        $userid             = Auth::user()->id;
        $balance            = $this->userCurrentBalance($userid);
        //dd($balance);
        //dd($balance);
        $oldActiveTrade     = UserTrades::where('user_id',$userid)->where('status',"Active")->first();
        //dd($oldActiveTrade);
        if(!isset($oldActiveTrade) && $oldActiveTrade == null) {

            if(isset($request->amount) && $request->amount > $balance) {
                return redirect()->back()->withErrors("Invalid Amount.");
            } else if (isset($request->amount) && $request->amount <= $balance) {
                $balance      = $request->amount;
            }

            $investedAmount   = round($balance , 2);

            $tradeRateData    = OilRates::orderby('created_at','desc')->first();

            $barrels          = round(($investedAmount / $tradeRateData->close_rate), 2);

            $this->saveTrade($investedAmount,$tradeRateData->id,"Sell", $barrels);

            return redirect()->route('dashboard')->withSuccess("Trade starts successfully.");

        } else {
            return redirect()->back()->withErrors("You have already active trade, close first before start new trade.");
        }

        //return view('admin.trades',compact('rateData'));
    }

    public function saveTrade($amount,$rate_id,$type="Buy",$barrels=0) {

        $saveTrade                          = new UserTrades();
        $saveTrade->user_id                 = Auth::user()->id;
        $saveTrade->trade_amount            = $amount;
        $saveTrade->total_barrels           = $barrels;
        $saveTrade->trade_type              = $type;
        $saveTrade->trade_start_rate_id     = $rate_id;
        $saveTrade->trade_start_date_time   = Carbon::now();
        $saveTrade->status                  = "Active";
        $saveTrade->save();

        return true;
    }

    public function endCurrentTrade() {

        $userid             = Auth::user()->id;

        $balance            = $this->userCurrentBalance($userid);

        $tradeCurrentRate   = OilRates::orderby('created_at','desc')->first();

        $currentRate        = $tradeCurrentRate->close_rate;

        $activeTrade        = UserTrades::where('user_id',$userid)->where('status',"Active")->first();

        if(isset($activeTrade) && $activeTrade !=  null)
        {

            $startRateData  = OilRates::where('id',$activeTrade->trade_start_rate_id)->first();

            $initialRate    = $startRateData->close_rate;

            //$result         = $this->calculateTradeProfitLoss($activeTrade->trade_type, $activeTrade->trade_start_rate_id, $tradeRateData->id);
            $trade_final_effect = "";
            $tradeResult        = 0;
            $profitLossAmount   = 0;
            $final_amount       = 0;
            //$barrels            = $activeTrade->total_barrels;
            if($activeTrade->trade_type == "Buy") {

                $barrels     = $balance / $initialRate;
                //formula 1
                $tradeResult = ($currentRate - $initialRate) * $barrels;

                //formula 2
               /*
                $standard_contract_size  = 1000;    // Note default NYMEX barrel size = 1000
                $total_contracts         = 1000/$barrels;
                $tradeResult             = ($currentRate - $initialRate) * $total_contracts * $standard_contract_size;*/


                if( $tradeResult > 0 ){
                    $trade_final_effect = "Profit";
                    $profitLossAmount   = $balance * abs($tradeResult);
                    $final_amount       = $balance + $profitLossAmount;
                } else {
                    $trade_final_effect = "Loss";
                    $profitLossAmount   = $balance * abs($tradeResult);
                    $final_amount       = $balance - $profitLossAmount;
                }
            }
            else if($activeTrade->trade_type == "Sell") {


                $barrels     = $balance / $initialRate;
                //formula 1
                $tradeResult = ($currentRate - $initialRate) * $barrels;

                //formula 2
                /*$standard_contract_size  = 1000;    // Note default NYMEX barrel size = 1000
                $total_contracts         = 1000/$barrels;
                $tradeResult             = ($currentRate - $initialRate) * $total_contracts * $standard_contract_size;*/


                if( $tradeResult < 0 ) {
                    $trade_final_effect = "Profit";
                    $profitLossAmount   = $balance * abs($tradeResult);
                    $final_amount       =  $balance + $profitLossAmount;
                } else {
                    $trade_final_effect = "Loss";
                    $profitLossAmount   = $balance * abs($tradeResult);
                    $final_amount       = $balance - $profitLossAmount;
                }
            }

            if($profitLossAmount > 0) {
                $desc = "Trade has completed with $trade_final_effect and amount : $profitLossAmount";
                $this->updateWallet($userid, $profitLossAmount, $trade_final_effect, $desc);
            }

            $activeTrade->trade_end_rate_id     = $tradeCurrentRate->id;
            $activeTrade->trade_end_date_time   = Carbon::now();
            $activeTrade->status                = "Completed";
            $activeTrade->trade_rate_difference = $tradeResult;
            $activeTrade->trade_final_effect    = $trade_final_effect; // profit or loss
            $activeTrade->trade_closing_amount  = $profitLossAmount;
            $activeTrade->final_amount          = $final_amount;
            $activeTrade->save();

           /*
            $user   =   User::find($userid);
            $user->notify(new \App\Notifications\TradeEndMailNotification($user));
           */

            return redirect()->route('dashboard')->withSuccess("Your Trade Completed successfully.");

        } else {

            return redirect()->route('dashboard')->withErrors("No active trade found.");
        }

        //return view('admin.trades',compact('currentTradeData'));
    }

    /*

    public function calculateTradeProfitLoss($trade_type,$rate_start_id,$rate_end_id)
    {
        $startRate          = OilRates::where('id',$rate_start_id)->first();
        $closeRate          = OilRates::where('id',$rate_end_id)->first();
        $trade_final_effect = "";

        if(isset($startRate) && isset($closeRate)) {
            if($trade_type == "Buy") {
                $finalRate = ($closeRate->close - $startRate->close);
                if( $finalRate > 0 ){
                    $trade_final_effect = "Profit";
                } else {
                    $trade_final_effect = "Loss";
                }
            }
            else if($trade_type == "Sell") {

                $finalRate = ($closeRate->close - $startRate->close);

                if($finalRate > 0) {
                    $trade_final_effect = "Loss";
                } else {
                    $trade_final_effect = "Profit";
                }
            }
        }
    }

    */

}
