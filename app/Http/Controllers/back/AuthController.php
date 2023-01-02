<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(){
        Auth::logout();
        return view('back.auth.login');
    }

    public function loginPost(Request $request){
        $rules = [
            'email'   => 'required|email',
            'password'    => 'required|min:5'
        ];
        $valid = Validator::make($request->post(),$rules);

        if($valid->fails()){
            return redirect()->route('login')->withErrors($valid);
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]) ){
            return  redirect()->route('adminDashboard');
        }
        else{
            return redirect()->route('login')->withErrors('Email adresi veya şifre yanlıştır.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
