<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TwoFactorCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TwoFactorController extends Controller
{
    //
    public function show(): View
    {
        return view('auth.two-factor');
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $user = Auth::user();

        if (!$user->verifyTwoFactorCode($request->code)) {
            return back()->withErrors([
                'code' => 'The verification code is invalid or has expired.',
            ]);
        }

        return redirect()->intended(route('dashboard'));
    }

    public function enable(): RedirectResponse
    {
        $user = Auth::user();
        $user->enableTwoFactor();
        
        $code = $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode($code));

        return back()->with('status', 'Two-factor authentication has been enabled. Check your email for the verification code.');
    }

    public function disable(): RedirectResponse
    {
        $user = Auth::user();
        $user->disableTwoFactor();

        return back()->with('status', 'Two-factor authentication has been disabled.');
    }
}
