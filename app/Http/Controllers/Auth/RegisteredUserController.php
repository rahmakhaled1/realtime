<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Events\NewUserRegisteredEvent;
use Illuminate\Auth\Events\Registered;
use App\Events\NewUserRegisteredEvent2;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use App\Notifications\NewUserRegisteredNotification;

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
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $admin = Admin::find(2);
        $admin->notify(new NewUserRegisteredNotification($user));

        NewUserRegisteredEvent::dispatch($user);
        // NewUserRegisteredEvent2::dispatch('Hello from event 2');

        // Broadcast(new NewUserRegisteredEvent($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
