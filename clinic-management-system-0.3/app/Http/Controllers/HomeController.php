<?php

namespace App\Http\Controllers;

use App\Models\UserAppointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $userData = auth()->user();
        $user_id = auth()->id();
        $userAppointment = UserAppointment::where('user_id', $user_id)->first();
        return view('home',[
            'userData' => $userData,
            'userAppointment' => $userAppointment
        ]);
    }
}
