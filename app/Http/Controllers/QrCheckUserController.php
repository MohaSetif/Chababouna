<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class QrCheckUserController extends Controller
{
    public function index(Request $request) {
    
		return view('qr_checker.check_user');
	}

    public function generate(Request $request) {
        $student = Student::where('email', Auth::user()->email)->first();
        if ($student) {
            $combinedData = json_encode([
                'id' => $student->id,
                'email' => $student->email
            ]);
            return view('generate_code', compact('combinedData'));
        }
    }    
    
    public function checkUser(Request $request) {
        $requestData = $request->input('data');
        \Log::info($requestData);
        $data = json_decode($requestData, true);
        $student = json_decode($data, true);  // Use the true parameter to decode as an associative array
        \Log::info($student);
        if (isset($student['id']) && isset($student['email'])) {
            $id = $student['id'];
            $email = $student['email'];

            $user = Student::where('id', $id)
            ->where('email', $email)
            ->first();
        
            if ($user) {
                // User found, return user data
                return response()->json(['user' => json_encode($user)]);
            } else {
                // User not found, return a message
                return response()->json(['message' => 'User not found']);
            }

        } else {
            return response()->json(['message' => 'Invalid QR code data']);
        }
    }
      
    
}