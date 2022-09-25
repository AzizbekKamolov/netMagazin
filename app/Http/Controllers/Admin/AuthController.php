<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        auth()->login($user);
        return redirect('/product')->with('success', 'your registered successfully');
    }
    public function login(Request $request){
        if (auth()->attempt($request->only(['email', 'password']))){
            return redirect('/product')->with('success', 'your logined successfully');
        }

        return back()->with('error', 'wrong email or password');
    }
}
