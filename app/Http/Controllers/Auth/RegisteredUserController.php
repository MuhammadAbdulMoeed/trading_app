<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeMailNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Validator;
use Illuminate\Support\Facades\Notification;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $amount                 =   100000;

        if($amount){
            $user->user_balance = $amount;
            $user->save();
            $this->updateWallet($user->id, $amount, "profit", "Startup trade balance for new customer.");
        }

        /*

        try {
//            $user->notify(new \App\Notifications\WelcomeMailNotification($user));
//            or
            Notification::send($user, new WelcomeMailNotification($user));
        } catch (Exception $e) {
            //return $e->getMessage();
        }

        */

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);

    }
}
