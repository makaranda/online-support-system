<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Guests\HomeController;
use App\Http\Controllers\Admin\Email\EmailController;
use App\Http\Controllers\Admin\SMS\SMSController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[HomeController::class, 'home_page'])->name('home');
Route::get('/login',[HomeController::class, 'login_page'])->name('login');

Route::prefix('guests')->group(function () {
    Route::get('open_ticket', [HomeController::class, 'open_ticket_page'])->name('guests.open_ticket');
    Route::post('open_ticket', [HomeController::class, 'open_ticket_save'])->name('guests.open_ticket_save');
    Route::get('check_ticket_status', [HomeController::class, 'check_ticket_status'])->name('guests.check_ticket_status');
    Route::post('reply_ticket_form_data', [HomeController::class, 'save_reply_ticket_data'])->name('guests.save_reply_ticket_data');
//  KYC Form
    Route::get('kyc_form', [HomeController::class, 'kyc_form'])->name('guests.kyc_form');
    Route::post('kyc_form_save', [HomeController::class, 'kyc_form_save'])->name('guests.kyc_form_save');

//  Survey Form
    Route::get('survey_form', [HomeController::class, 'survey_form'])->name('guests.survey_form');
    Route::post('survey_form_save', [HomeController::class, 'survey_form_save'])->name('guests.survey_form_save');
});

//Auth::routes();

