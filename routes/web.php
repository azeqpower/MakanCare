<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MyviController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodbankController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/create', function () {
    return view('create');
});

// Route::get('/googleMaps', [GoogleController::class, 'index']);

Route::get('/myvi', [MyviController::class, 'index']);

Route::view('main', 'main')
	->name('main')
	->middleware(['auth', 'verified']);


// Route::get('/googleMaps', [MapController::class, 'show']);
Route::get('/googleMaps', [MapController::class, 'show']);

Route::get('/marker/{id}', [ FoodController::class, 'marker' ] );

Route::get('/image/{id}', [FoodController::class, 'imageForm']);

Route::post('/image/{id}', [ FoodController::class, 'store' ] );


Route::get('cmarker', [MapController::class, 'imageForm']);

Route::post('cmarker', [ MapController::class, 'store' ] );

Route::get('mapmarker', [ MapController::class, 'markers' ] );



Route::get('edit/{id}', [FoodController::class, 'edit']);
Route::put('update/{id}', [FoodController::class, 'update']);
Route::get('deletes/{id}', [FoodController::class, 'destroy']);

Route::get('editmarker/{id}', [MapController::class, 'edit']);
Route::put('update/{id}', [MapController::class, 'update']);
Route::get('delete/{id}', [MapController::class, 'destroy']);

Route::get('foodbank.create-foodbank', [FoodbankController::class, 'create'])->name('foodbank.create-foodbank');

Route::post('foodbank.create-foodbank', [ FoodbankController::class, 'store' ] );

Route::post('report', [FoodbankController::class, 'report'])->name('submit.report');



/* Route to display notice that user should verify email first before can proceed*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

/* Route to handle requests generated when the user clicks the email verification link in the email*/
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/main');
})->middleware(['auth', 'signed'])->name('verification.verify');

/* Route when user request to resend a verification link if the user accidentally loses the first verification link*/
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('/admin/foodbank-requests', [FoodbankController::class, 'index']);
    Route::get('/admin/history-request', [FoodbankController::class, 'index2']);
    Route::get('/admin/foodbank-report', [FoodbankController::class, 'index3']);
    Route::get('/admin/history-report', [FoodbankController::class, 'index4']);
    

    Route::post('/admin/foodbank-requests/{id}/approve', [FoodbankController::class, 'approve'])->name('foodbank.approve');
    Route::post('/admin/foodbank-requests/{id}/reject', [FoodbankController::class, 'reject'])->name('foodbank.reject');
    Route::post('/admin/foodbank-report/{id}/solve', [FoodbankController::class, 'solve'])->name('foodbank.solve');
});

