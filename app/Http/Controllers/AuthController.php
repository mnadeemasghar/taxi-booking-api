<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function login_check(Request $request){
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->route('BookingRequest.index');
        }
        else{
            return redirect()->back();
        }
    }
    
    public function register(){
        return view('auth.register');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
    
    public function store(Request $request){
        $data = $request->except('_token');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('BookingRequest.home');
    }
}
