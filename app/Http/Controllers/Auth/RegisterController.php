<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
                'name' => [
                    'required',
                    'max:255',
                ],
                'username' => [
                    'required',
                    'max:255',
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                ],
                'password' => [
                    'required',
                    'confirmed',
                ],
            ]);

        $user->create($request->all());

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
