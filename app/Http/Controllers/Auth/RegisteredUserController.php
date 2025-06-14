<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
public function store(Request $request): RedirectResponse
    {

   // dd($request->all());

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|lowercase|email|max:255|unique:users,email',
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

    $nameParts = preg_split('/\s+/', trim($request->name), 2);
    $firstName = $nameParts[0];
    $lastName = $nameParts[1] ?? $firstName;

    $user = User::create([
        'username' => $request->name,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $request->email,
    'password' => Hash::make($request->password),
    ]);

    //logger("Creating user: $username <$request->email>");

    event(new Registered($user));

    Auth::login($user);

    return to_route('dashboard');
}
}
