<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function updateWallet($user_id,$amount,$trade_value=null,$desc=null)
    {

        $user               = Auth::user();
        $payment_type       = "credit";

        if($trade_value == "Profit" || $trade_value == "profit")
        {
            $payment_type   = "credit";
        } else if($trade_value == "Loss" || $trade_value == "loss") {
            $payment_type   = "debit";
        }

        if(isset($user->user_balance) && $user->user_balance > 0) {
            $user_balance   =   $user->user_balance;
        } else {
            $user_balance   =   0;
        }

        $updateWalletBalance                    =  new Wallet();
        $updateWalletBalance->user_id           =  $user_id;
        $updateWalletBalance->amount            =  round($amount,2);
        $updateWalletBalance->payment_type      =  $payment_type;
        $updateWalletBalance->trade_value       =  $trade_value;
        $updateWalletBalance->previous_balance  =  round($user_balance,2);

        if(isset($desc) && $desc !=  null) {
            $updateWalletBalance->details       =  $desc;
        } else {
            $updateWalletBalance->details       =  "Wallet update with $trade_value amount : $amount.";
        }

        $updateWalletBalance->save();

        //$userBalance                          = User::where('id', $user_id)->first();
        $current_balance                        = $this->userCurrentBalance($user_id);
        if( $current_balance && $current_balance >= 0 ) {
            $updateUserBalance                  = User::where('id', $user_id)->update(['user_balance' => $current_balance,'last_trade_date'=>Carbon::now()]);
        }

        if( isset($user) && $user->user_balance < 0 ) {
            $updateUserBalance                  = User::where('id', $user_id)->update(['user_balance' => 0]);
        }

        return $current_balance;
    }

    public function userCurrentBalance($user_id) {

        $totalCreditAmount  = Wallet::where('user_id',$user_id)->where('payment_type','credit')->sum('amount');
        $totalDebitAmount   = Wallet::where('user_id',$user_id)->where('payment_type','debit')->sum('amount');
        $balance            = round(($totalCreditAmount - $totalDebitAmount),2);
        if($balance < 0) {
            $balance        = 0;
        }
        return $balance;
    }

}
