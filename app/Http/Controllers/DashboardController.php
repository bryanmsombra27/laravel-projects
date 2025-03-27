<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index (){
        // get logged in user
        $user = Auth::user();

// get the users listings
        $jobs = Job::where("user_id",$user->id)->get();
     
        return view("dashboard.index",compact("user","jobs"));
    }
}
