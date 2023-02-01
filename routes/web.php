<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//home page display
Route::get('dashboard', [AuthController::class, 'dashboard']); 

//display login and check
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 

// display registration page and insert user
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 

//logout
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

//view employee data
Route::get('auth.view',[AdminController::class,'index'])->name('emp.index');
Route::get('viewadd',[AdminController::class,'viewadd']);

//add update delete data of user
Route::resource('user',AdminController::class);

//profile view
Route::get('profileview',[AdminController::class,'profileview'])->middleware('auth')->name('profileview');

//change active status
Route::get('user_status/{user_id}',[AdminController::class,'status'])->name('status');
Route::Post('update_user',[AdminController::class,'update_user'])->name('update_user');

//forgot password
Route::get('forget',function(){return view('auth.forget');});

//check mail is exist or not and send email for reset link
Route::POST('forgot-my-password',[AuthController::class,'checkemail'])->middleware('guest')->name('password.request');

// check reset link token and redirect to reset page for password reseting
Route::post('reset-password',[AuthController::class,'resetFun'])->name('pass.reset');
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::get('email-test', function(){

  

    $details['email'] = 'devangparekh41email@gmail.com';

  

    dispatch(new App\Jobs\SendEmailJob($details));

  

    dd('done');

});