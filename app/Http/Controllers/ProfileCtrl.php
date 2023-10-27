<?php

namespace App\Http\Controllers;

use App\Models\Chababounauser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCtrl extends Controller
{
    public function index()
{
    $registrations = Chababounauser::query()->where('email', Auth::user()->email)->get();
  
    return view('profile', compact('registrations'));
} 

}
