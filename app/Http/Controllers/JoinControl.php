<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chababounauser;
use Illuminate\Support\Facades\Auth;

class JoinControl extends Controller
{
    function AddUser(Request $req){
        $this->validate($req,[
            'name' => 'required|max:120',
            'surname' => 'required|max:120',
            'job' => 'max:120',
            'day' => 'required|max:120',
            'month' => 'required|max:120',
            'year' => 'required|max:120',
            'place' => 'required|max:120',
            'residence' => 'required|max:120',
            'help' => 'required',
            'hobby' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tel' => 'required|regex:/(0)[0-9]{9}/',
            ]);

            $utilisateur = Chababounauser::where([
                'email' => Auth::user()->email,
                'inscripted_in' => 'الانخراط'
              ])->first();
              if(!$utilisateur){
        $e = new Chababounauser;
        $e->name = strip_tags($req->name);
        $e->surname = strip_tags($req->surname);
        $e->sex = $req->sex;
        $e->job = strip_tags($req->job);
        $e->DadJob = strip_tags($req->DadJob);
        $e->MomJob = strip_tags($req->MomJob);
        $e->day = strip_tags($req->day);
        $e->month = strip_tags($req->month);
        $e->year = strip_tags($req->year);
        $e->place = strip_tags($req->place);
        $e->residence = strip_tags($req->residence);
        $e->hobby = strip_tags($req->hobby);
        $e->help = strip_tags($req->help);
        $e->email = Auth::user()->email;
        if($req->hasfile('photo')){
            $file = $req->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/utilisateurs', $filename);
            $e->photo = $filename;
        }
        $e->inscripted_in = 'الانخراط';
        $e->tel = strip_tags($req->tel);
        $e->save();
        return redirect('إرسال-الاستمارة');
    }else{
        echo "<script>";
        echo "alert('بريدك الالكتروني موجود');";
        echo "</script>";
       }
}
}