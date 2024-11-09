<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinControl;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\Bookstore;
use App\Http\Controllers\BookCont;
use App\Http\Controllers\ChababounaUserCont;
use App\Http\Controllers\QrCheckUserController;
use App\http\Controllers\PendingStatus;
use App\Http\Controllers\ProfileCtrl;
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

Route::get('/', function () {
    return redirect('الصفحة-الرئيسية');
});

Route::get('مكتبتنا', [Bookstore::class, 'list']);
Route::view('الصفحة-الرئيسية', 'MainPage');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/home', function () {
        return redirect('الصفحة-الرئيسية');
    });

    // Route::group(['prefix' => 'ChababounaAdmin'], function () {
    //     Voyager::routes();
    // });
    
    
    Route::get('حسابي', [ProfileCtrl::class, 'index']);
    
    Route::view('التسجيل-في-المدرسة-القرآنية', 'Signin');
    Route::view('صفحة-الدخول', 'UserExists');
    Route::post('التسجيل', [EtudiantController::class, 'AddStudent']);
    Route::post('صفحة-الدخول', [EtudiantController::class, 'loginUser']);
    
    
    Route::view('إرسال-الاستمارة', 'AfterSignin');
    
    
    // Route::view("add", 'Emp');
    // Route::post('add', [EmpCont::class, 'add']);
    
    
    Route::resource('books', BookCont::class)->middleware('is_admin');
    Route::resource('chababounausers', ChababounaUserCont::class)->middleware('is_admin');;
    Route::post('PendingStatus', [PendingStatus::class, 'changeStatus']);
    
    Route::get('/logout', function () { 
        if(session()->has('name')){
            session()->pull('name');
        }
        return redirect('الصفحة-الرئيسية');
    });
    
    
    Route::view('اختيار-المقر', 'Children');
    Route::view('سجلوا-أولادكم', 'ChildrenLogin');
    Route::view('user', 'MemberData');
    Route::view('childData', 'DisplayChildData');
    Route::view('memberLog', 'memberLog');
    
    
    Route::view('الانضمام-إلى-الجمعية', 'Join');
    Route::post('NewJoin', [JoinControl::class, 'AddUser']);
    
    Route::view('الخيارات', 'LinkCard');
    


    //===================== QR CODE SCANNER =====================

    Route::get('/check_user', [QRCheckUserController::class, 'index']);
    Route::post('/check_user', [QRCheckUserController::class, 'checkUser']);
    Route::get('/generate_code', [QRCheckUserController::class, 'generate'])->name('generate_code');

    Route::view('/check_user_code', 'check_user_code');
});