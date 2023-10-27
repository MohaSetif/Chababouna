<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Illiterate;

class IlliterateController extends Controller
{
    function AddIlliterate(Request $req){

        $this->validate($req,[
            'name' => 'required|max:120',
            'surname' => 'required|max:120',
            'sex' => 'required',
            'day' => 'required|max:120',
            'month' => 'required|max:120',
            'year' => 'required|max:120',
            'place' => 'required|max:120',
            'residence' => 'required|max:120',
            'photo' => 'required',
            'email' => 'email|required',
            'tel' => 'required|regex:/(0)[0-9]{9}/',
            ]);
    
          $illiterate = Illiterate::where([
            'name' => $req->name,
            'surname' => $req->surname,
            'day' => $req->day,
            'month' => $req->month,
            'year' => $req->year
          ])->first();
          if(!$illiterate){
        $i = new Illiterate;
        $i->name = strip_tags($req->name);
        $i->surname = strip_tags($req->surname);
        $i->sex = $req->sex;
        $i->day = $req->day;
        $i->month = $req->month;
        $i->year = strip_tags($req->year);
        $i->place = strip_tags($req->place);
        $i->residence = strip_tags($req->residence);
        if($req->hasfile('photo')){
            $file = $req->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/utilisateurs', $filename);
            $i->photo = $filename;
        }
        $i->inscripted_in = 'محو-الأمية';
        $i->email = strip_tags($req->email);
        $i->tel = strip_tags($req->tel);

        // $userCount = Illiterate::where('tel', $i->tel);
	    // if ($userCount->count()) {
		//     return Response::json(array('msg' => 'true'));
	    // } else {
		//     return Response::json(array('msg' => 'false'));
	    // }

        $i->save();
        return redirect('الصفحة-الرئيسية');
       }
       else{
        echo "<script>";
        echo "alert('بريدك الالكتروني موجود');";
        echo "</script>";
       }
    }
}
