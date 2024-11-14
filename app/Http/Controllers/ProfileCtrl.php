<?php

namespace App\Http\Controllers;

use App\Models\Chababounauser;
use App\Models\Member;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCtrl extends Controller
{
    public function index()
{
    $school_regs = Student::query()->where('email', Auth::user()->email)->get();
    $membership_regs = Member::query()->where('email', Auth::user()->email)->get();
  
    return view('profile', compact('school_regs', 'membership_regs'));
} 

}
