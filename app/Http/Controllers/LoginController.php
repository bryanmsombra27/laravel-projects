<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        //
        public function login(){
            return view("auth.login");
        }
        public function authenticate(Request $request){
            $credentials = $request ->validate([
                "email" => "required|string|email|max:100",
                "password" => "required|string",
            ]);
            // attempt to autenticate user
            if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])){
                // regenerate session to prevent fixtation attacks
                $request-> session()->regenerate();
                return redirect()->intended(route("home")) -> with("success","You are now logged in!");
            }
            // redirect back with errors
            return back()-> withErrors(
                ['email' =>'the provided credentials do not match']
            )->onlyInput("email");
    
    
        
            
        }
        
        public function logout(Request $request){

            Auth::logout();
            $request-> session()-> invalidate();
            $request-> session()-> regenerateToken();

            return redirect("/");
        }

}
