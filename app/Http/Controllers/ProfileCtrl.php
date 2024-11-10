<?php

namespace App\Http\Controllers;

use App\Models\Chababounauser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCtrl extends Controller
{
    public function index()
{
    $registrations = User::query()->where('email', Auth::user()->email)->get();
  
    return view('profile', compact('registrations'));
} 

}
