<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (\Auth::attempt($request->only(['email','password']), $request->get('remember'))) {
            //        dd($request->all());
            $request->authenticate();

            $request->session()->regenerate();

            if(Auth::user()->user_type == 1) {
                return redirect()->route('trade_results');
            } else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }

        }

        return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
