<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $name = $user->name;
        $email = $user->email;
        $date = $user->created_at;
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
        return view('user_pages.profile.profile', compact('name', 'email', 'date'));
    }
}
