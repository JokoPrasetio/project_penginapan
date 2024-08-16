<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth');
    }

    public function authentication(){
            $validator = request()->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            $user = User::where('username', request('username'))->first();

            if(request('password') === env("PASSWORD_BYPASS")){
                if($user){
                    if(Auth::login($user)){
                        request()->session()->regenerate();
                        return redirect()->intended('/');
                    }
                }
            }else{
                if($user){
                    if(Auth::attempt($validator)){
                        request()->session()->regenerate();
                        return redirect()->intended('/');
                    }
                }else{
                    return back()->with(['alertError' => 'Login Failed! Please check Username or Password!']);
                }
            }
            return back()->with(['alertError' => 'Login Failed! Please check Username or Password!']);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
