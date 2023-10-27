<?php

namespace App\Http\Controllers;

use App\Models\Chababounauser;
use App\Models\Student;
use App\Models\Tahdiri;
use App\Models\Tamhidi;
use App\Models\Course;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class ChababounaUserCont extends Controller
{
    
    /* Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $chababounausers = Chababounauser::latest()->paginate(5);
     
       return view('chababounausers.index',compact('chababounausers'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('chababounausers.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $req)
   {
    $this->validate($req,[
        'name' => 'required|max:120',
        'surname' => 'required|max:120',
        'day' => 'required',
        'month' => 'required',
        'year' => 'required',
        'hobby' => 'required|max:120',
        'help' => 'required|max:120',
        'place' => 'required|max:120',
        'residence' => 'required|max:120',
        'email' => 'required|email|unique:users',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'scholar_year' => 'required|max:120',
        'tel' => 'required|regex:/(05)[0-9]{8}/',
        ]);


        if(!empty($req->hasFile('photo'))){

            $image = $req->file('photo');
            $photoname = date('YmdHis').'.'.$image->extension();
            $filePath = public_path('/uploads/utilisateurs');
            $image->move($filePath, $photoname);
            $input['photo'] = $photoname;
            }

        Chababounauser::create($req->except(['status']));

      
       return redirect()->route('chababounausers.index')
                       ->with('success','chababouna User inserted successfully.');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Chababounauser  $student
    * @return \Illuminate\Http\Response
    */
   public function show(Chababounauser $chababounauser)
   {
       return view('chababounausers.show',compact('chababounauser'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Chababounauser  $student
    * @return \Illuminate\Http\Response
    */
   public function edit(Chababounauser $chababounauser)
   {
       return view('chababounausers.edit',compact('chababounauser'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
   public function update(Request $req, Chababounauser $chababounauser)
   {
        $i = $chababounauser->inscripted_in;
        if ($req->btn == "accepted") {
            $chababounauser->update(['status' => 'مقبول']);
            switch($i){
            case('التعليم-القرآني'):
                Student::create([
                    'name'=>$chababounauser->name,
                    'surname'=>$chababounauser->surname,
                    'sex'=>$chababounauser->sex,
                    'job'=>$chababounauser->job,
                    'day'=>$chababounauser->day,
                    'month'=>$chababounauser->month,
                    'year'=>$chababounauser->year,
                    'place'=>$chababounauser->place,
                    'residence'=>$chababounauser->residence,
                    'photo'=>$chababounauser->photo,
                    'email'=>$chababounauser->email,
                    'local'=>$chababounauser->local,
                    'scholar_year'=>$chababounauser->scholar_year,
                    'tel'=>$chababounauser->tel,
                ]);
                if(!empty($req->hasFile('photo'))){

                    $image = $req->file('photo');
                    $photoname = date('YmdHis').'.'.$image->extension();
                    $filePath = public_path('/uploads/utilisateurs');
                    $image->move($filePath, $photoname);
                    $input['photo'] = $photoname;
                    }
            return redirect()->route('chababounausers.index')->with('success', 'تم قبول مستخدم جديد');
            break;

            case('الانخراط'):
                Utilisateur::create([
                    'name'=>$chababounauser->name,
                    'surname'=>$chababounauser->surname,
                    'sex'=>$chababounauser->sex,
                    'job'=>$chababounauser->job,
                    'day'=>$chababounauser->day,
                    'month'=>$chababounauser->month,
                    'year'=>$chababounauser->year,
                    'place'=>$chababounauser->place,
                    'residence'=>$chababounauser->residence,
                    'hobby'=>$chababounauser->hobby,
                    'help'=>$chababounauser->help,
                    'email'=>$chababounauser->email,
                    'photo'=>$chababounauser->photo,
                    'tel'=>$chababounauser->tel,
                ]);
                if(!empty($req->hasFile('photo'))){

                    $image = $req->file('photo');
                    $photoname = date('YmdHis').'.'.$image->extension();
                    $filePath = public_path('/uploads/utilisateurs');
                    $image->move($filePath, $photoname);
                    $input['photo'] = $photoname;
                    }
            return redirect()->route('chababounausers.index')->with('success', 'تم قبول مستخدم جديد');
            break;

            case('التحضيري'):
                Tahdiri::create([
                    'name'=>$chababounauser->name,
                    'surname'=>$chababounauser->surname,
                    'sex'=>$chababounauser->sex,
                    'job'=>$chababounauser->job,
                    'day'=>$chababounauser->day,
                    'month'=>$chababounauser->month,
                    'year'=>$chababounauser->year,
                    'place'=>$chababounauser->place,
                    'residence'=>$chababounauser->residence,
                    'photo'=>$chababounauser->photo,
                    'local'=>$chababounauser->local,
                    'tel'=>$chababounauser->tel,
                ]);
                if(!empty($req->hasFile('photo'))){

                    $image = $req->file('photo');
                    $photoname = date('YmdHis').'.'.$image->extension();
                    $filePath = public_path('/uploads/utilisateurs');
                    $image->move($filePath, $photoname);
                    $input['photo'] = $photoname;
                    }
            return redirect()->route('chababounausers.index')->with('success', 'تم قبول مستخدم جديد');
            break;

            case('التمهيدي'):
                Tamhidi::create([
                    'name'=>$chababounauser->name,
                    'surname'=>$chababounauser->surname,
                    'sex'=>$chababounauser->sex,
                    'job'=>$chababounauser->job,
                    'day'=>$chababounauser->day,
                    'month'=>$chababounauser->month,
                    'year'=>$chababounauser->year,
                    'place'=>$chababounauser->place,
                    'residence'=>$chababounauser->residence,
                    'photo'=>$chababounauser->photo,
                    'scholar_year'=>$chababounauser->scholar_year,
                    'local'=>$chababounauser->local,
                    'tel'=>$chababounauser->tel,
                ]);
                if(!empty($req->hasFile('photo'))){

                    $image = $req->file('photo');
                    $photoname = date('YmdHis').'.'.$image->extension();
                    $filePath = public_path('/uploads/utilisateurs');
                    $image->move($filePath, $photoname);
                    $input['photo'] = $photoname;
                    }
            return redirect()->route('chababounausers.index')->with('success', 'تم قبول مستخدم جديد');
            break;
            }
        } elseif ($req->btn == "rejected"){
            $chababounauser->update(['status' => 'مرفوض']);
    
            return redirect()->route('chababounausers.index')->with('success', 'تم رفض مستخدم جديد');
        }
        

       $chababounauser->update($req->all());

       return redirect()->route('chababounausers.index')
                       ->with('success','User updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
   public function destroy(Chababounauser $chababounauser)
   {
       $chababounauser->delete();
      
       return redirect()->route('chababounausers.index')
                       ->with('success','Chababouna User deleted successfully');
   }


//    //My other controllers' functions
//    function AddCourse(Request $req){
//     $this->validate($req,[
//         'name' => 'required|max:120',
//         'surname' => 'required|max:120',
//        'scholar_year' => 'required|max:120',
//         'tel' => 'required|regex:/(0)[0-9]{9}/',
//         'DadTel' => 'required|regex:/(0)[0-9]{9}/',
//         ]);

//     $e = new Chababounauser;
//     $e->name = strip_tags($req->name);
//     $e->surname = strip_tags($req->surname);
//     $e->sex = $req->sex;
//     $e->scholar_year = strip_tags($req->scholar_year);
//     $e->tel = strip_tags($req->tel);
//     $e->DadTel = strip_tags($req->DadTel);
//     $e->save();
//     }

//     function AddStudent(Request $req){
//         // dump($req);
//         $this->validate($req,[
//             'name' => 'required|max:120',
//             'surname' => 'required|max:120',
//             'job' => 'max:120',
//             'day' => 'required|max:120',
//             'month' => 'required|max:120',
//             'year' => 'required|max:120',
//             'place' => 'required|max:120',
//             'residence' => 'required|max:120',
//             'email' => 'required|email|unique:users',
//             'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'scholar_year' => 'required|max:120',
//             'tel' => 'required|regex:/(0)[0-9]{9}/',
//             ]);

//         $e = new Chababounauser;
//         $e->name = strip_tags($req->name);
//         $e->surname = strip_tags($req->surname);
//         $e->sex = $req->sex;
//         $e->job = strip_tags($req->job);
//         $e->day = strip_tags($req->day);
//         $e->month = strip_tags($req->month);
//         $e->year = strip_tags($req->year);
//         $e->place = strip_tags($req->place);
//         $e->residence = strip_tags($req->residence);
//         $e->email = strip_tags($req->email);
//         if($req->hasfile('photo')){
//             $file = $req->file('photo');
//             $extension = $file->getClientOriginalExtension();
//             $filename = time().'.'.$extension;
//             $file->move('uploads/students', $filename);
//             $e->photo = $filename;
//         }
//         $e->scholar_year = strip_tags($req->scholar_year);
//         $e->tel = strip_tags($req->tel);
//         $e->save();
//     }

//     function AddChild(Request $req){
//         // dump($req);
//         $this->validate($req,[
//             'name' => 'required|max:120',
//             'surname' => 'required|max:120',
//             'job' => 'max:120',
//             'day' => 'required|max:120',
//             'month' => 'required|max:120',
//             'year' => 'required|max:120',
//             'place' => 'required|max:120',
//             'residence' => 'required|max:120',
//             'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'tel' => 'required|regex:/(0)[0-9]{9}/',
//             ]);

//         $e = new Chababounauser;
//         $e->name = strip_tags($req->name);
//         $e->surname = strip_tags($req->surname);
//         $e->sex = $req->sex;
//         $e->job = strip_tags($req->job);
//         $e->day = strip_tags($req->day);
//         $e->month = strip_tags($req->month);
//         $e->year = strip_tags($req->year);
//         $e->place = strip_tags($req->place);
//         $e->residence = strip_tags($req->residence);
//         if($req->hasfile('photo')){
//             $file = $req->file('photo');
//             $extension = $file->getClientOriginalExtension();
//             $filename = time().'.'.$extension;
//             $file->move('uploads/children', $filename);
//             $e->photo = $filename;
//         }
//         $e->tel = strip_tags($req->tel);
//         $e->save();
//     }

//     function AddUser(Request $req){
//         $e = new Chababounauser;
//         $e->name = strip_tags($req->name);
//         $e->surname = strip_tags($req->surname);
//         $e->sex = $req->sex;
//         $e->job = strip_tags($req->job);
//         $e->day = strip_tags($req->day);
//         $e->month = strip_tags($req->month);
//         $e->year = strip_tags($req->year);
//         $e->place = strip_tags($req->place);
//         $e->residence = strip_tags($req->residence);
//         $e->hobby = strip_tags($req->hobby);
//         $e->help = strip_tags($req->help);
//         $e->email = strip_tags($req->email);
//         if($req->hasfile('photo')){
//             $file = $req->file('photo');
//             $extension = $file->getClientOriginalExtension();
//             $filename = time().'.'.$extension;
//             $file->move('uploads/utilisateurs', $filename);
//             $e->photo = $filename;
//         }
//         $e->tel = strip_tags($req->tel);
//         $e->save();
//     }

//     function AddIlliterate(Request $req){
//         $i = new Chababounauser;
//         $i->name = strip_tags($req->name);
//         $i->surname = strip_tags($req->surname);
//         $i->sex = $req->sex;
//         $i->day = $req->day;
//         $i->month = $req->month;
//         $i->year = strip_tags($req->year);
//         $i->place = strip_tags($req->place);
//         $i->residence = strip_tags($req->residence);
//         if($req->hasfile('photo')){
//             $file = $req->file('photo');
//             $extension = $file->getClientOriginalExtension();
//             $filename = time().'.'.$extension;
//             $file->move('uploads/illiterates', $filename);
//             $i->photo = $filename;
//         }
//         $i->tel = strip_tags($req->tel);
//         $i->save();
//     }
}
