<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function add_member(AddMemberRequest $request){

        $member = Member::query()->where([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'email' => $request->email
          ])->first();

        if(!$member){
            if(!empty($request->hasFile('photo'))){

                $image = $request->file('photo');
                $photoname = date('YmdHis').'.'.$image->extension();
                $filePath = public_path('/uploads/members');
                $image->move($filePath, $photoname);
                $input['photo'] = $photoname;
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
                'photo' => $request->photo,
                'scholar_year' => $request->scholar_year,
                'tel' => $request->tel,
            ]);

            return redirect('إرسال-الاستمارة');
        }else{
            echo "<script>";
            echo "alert('أنت مسجل(ة) من قبل');";
            echo "</script>";
        }
    }
}
