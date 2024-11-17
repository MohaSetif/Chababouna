<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinControl;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\Bookstore;
use App\Http\Controllers\BookCont;
use App\Http\Controllers\ChababounaUserCont;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\QrCheckUserController;
use App\http\Controllers\PendingStatus;
use App\Http\Controllers\ProfileCtrl;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('مكتبتنا', [Bookstore::class, 'list']);
Route::view('/', 'MainPage');

Auth::routes();


Route::group(['middleware' => 'auth'], function (){
    
    Route::get('حسابي', [ProfileCtrl::class, 'index']);
    
    Route::view('التسجيل-في-المدرسة-القرآنية', 'StudentRegister');
    Route::view('الانضمام-إلى-الجمعية', 'MemberRegister');

    Route::view('إرسال-الاستمارة', 'AfterSignin');
    
    Route::get('/logout', function () { 
        if(session()->has('name')){
            session()->pull('name');
        }
        return redirect('الصفحة-الرئيسية');
    });
    
    
    Route::post('member_register', [MemberController::class, 'add_member']);
    Route::post('student_register', [StudentController::class, 'add_student']);
    
    Route::view('الخيارات', 'LinkCard');

    //===================== QR CODE SCANNER =====================

    // Route::get('/check_user', [QRCheckUserController::class, 'index']);
    // Route::post('/check_user', [QRCheckUserController::class, 'checkUser']);
    // Route::get('/generate_code', [QRCheckUserController::class, 'generate'])->name('generate_code');

    // Route::view('/check_user_code', 'check_user_code');
});