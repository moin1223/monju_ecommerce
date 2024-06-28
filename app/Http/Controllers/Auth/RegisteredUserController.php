<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\RequestedUser;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . RequestedUser::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $requestedUser = RequestedUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 0,
        ]);

        $checkIfTheUserIsAccepted = RequestedUser::where([['email', $request->email], ['status', 0]])->first();
        if ($checkIfTheUserIsAccepted) {
            throw ValidationException::withMessages([
                'email' => "Account created. Please wait untill the director accept your request.",
            ]);
        }

        // event(new Registered($user));
        // Auth::login($user);
        // return redirect(RouteServiceProvider::HOME);

        return redirect()->back()->with("");
    }
}
