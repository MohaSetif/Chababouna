<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function add_member(Request $request)
    {
        $memberExists = Member::where([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'email' => Auth::user()->email,
        ])->exists();

        if ($memberExists) {
            return redirect()->back()->with('error', 'أنت مسجل(ة) من قبل');
        }

        $photoname = null;
        if(!empty($request->hasFile('photo'))){
            $image = $request->file('photo');
            $photoname = date('YmdHis').'.'.$image->extension();
            $image->storeAs('members', $photoname, 'public');
        }

        Member::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'sex' => $request->sex,
            'birthdate' => $request->birthdate,
            'job' => $request->job,
            'hobby' => $request->hobby,
            'help' => $request->help,
            'place' => $request->place,
            'residence' => $request->residence,
            'email' => Auth::user()->email,
            'photo' => $photoname,
            'scholar_year' => $request->scholar_year,
            'tel' => $request->tel,
        ]);

        return redirect('إرسال-الاستمارة')->with('success', 'تم التسجيل بنجاح');
    }
}
