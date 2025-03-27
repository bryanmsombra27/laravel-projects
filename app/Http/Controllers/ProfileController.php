<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function update(Request $request){
        $user = Auth::user();

        //  validate data
        $validatedData = $request->validate([
            "name"=> "required|string",
            "email"=> "required|string|email",
            "avatar"=> "nullable|image|mimes:jpeg,jpg,png,gif|max:2048"
        ]);
// get user name and email
        $user->name =$request->input("name");
        $user->email =$request->input("email");

        if($request->hasFile("avatar")){
            // delete old avatar image
            if($user->avatar){
                Storage::delete("public/". $user->avatar);
            }
            // store new avatar
            $avatarPath = $request->file("avatar") ->store("avatars","public");
            $user->avatar = $avatarPath;

        }
        // update user info
    // $user->update($validatedData);
    $user->save();

    return redirect()->route("dashboard")->with("success","Profile info updated");

    }
}
