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
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
            $request->validate([
        'name' => [
            'required',
            'string',
            'min:2',
            'max:40',
            'regex:/^[A-Za-zА-Яа-яЁё\s\-]+$/u', // только буквы, пробелы, дефис
        ],
        'email' => [
            'required',
            'string',
            'email:rfc,dns',
            'max:255',
            'unique:users,email',
        ],
        'password' => [
            'required',
            'string',
            'min:8',
            'max:64',
            'regex:/[A-Z]/',      // хотя бы одна заглавная
            'regex:/[a-z]/',      // хотя бы одна строчная
            'regex:/[0-9]/',      // хотя бы одна цифра
            'regex:/[@$!%*#?&]/', // хотя бы один спецсимвол
            'confirmed',
        ],
    ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1, 
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
