<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
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
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function validateField(Request $request)
    {
        $rules = [];

        switch ($request->field) {
            case 'name':
                $rules = ['name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/'];
                break;
            case 'email':
                $rules = ['email' => 'required|string|email|max:255|unique:users,email'];
                break;
            case 'username':
                $rules = ['username' => 'required|string|unique:users,username|max:255|regex:/^[a-zA-Z0-9]+$/'];
                break;
            case 'password':
                $rules = ['password' => 'required|min:8|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'];
                break;
            case 'password_confirmation':
                $rules = ['password_confirmation' => 'required|min:8|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'];
                break;
            default:
                return response()->json(['message' => 'Invalid field'], 400);
        }

        $messages = [
            'name.regex' => 'Name must contain only letters. No numbers or special characters allowed',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'This email is already taken',
            'username.unique' => 'This username is already taken',
            'username.regex' => 'Username must contain only letters and numbers. No spaces or special characters allowed',
            'password.min' => 'Password must be at least 12 characters',
            'password.max' => 'Password must not be greater than 16 characters',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character',
            'password_confirmation.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return response()->json(['message' => 'Valid input'], 200);
    }
}
