<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function add_student(Request $request)
    {
        $studentExists = Student::where([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'email' => Auth::user()->email,
        ])->exists();

        if ($studentExists) {
            return redirect()->back()->with('error', 'أنت مسجل(ة) من قبل');
        }

        $photoname = null;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $photoname = date('YmdHis').'.'.$image->extension();
            $image->storeAs('students', $photoname, 'public');
        }

        Student::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'sex' => $request->sex,
            'birthdate' => $request->birthdate,
            'job' => $request->job,
            'dad_job' => $request->dad_job,
            'mom_job' => $request->mom_job,
            'place' => $request->place,
            'residence' => $request->residence,
            'email' => Auth::user()->email,
            'photo' => $photoname ? 'students/' . $photoname : null,
            'scholar_year' => $request->scholar_year,
            'study_local' => $request->study_local,
            'dad_tel' => $request->dad_tel,
            'tel' => $request->tel,
        ]);

        return redirect('إرسال-الاستمارة')->with('success', 'تم التسجيل بنجاح');
    }
}
