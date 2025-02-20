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
    Route::get('open-ticket', [HomeController::class, 'open_ticket_page'])->name('guests.open_ticket');
    Route::post('open-ticket', [HomeController::class, 'open_ticket_save'])->name('guests.open_ticket_save');
    Route::get('check-ticket-status', [HomeController::class, 'check_ticket_status'])->name('guests.check_ticket_status');
    Route::post('reply-ticket-form-data', [HomeController::class, 'save_reply_ticket_data'])->name('guests.save_reply_ticket_data');
//  KYC Form
    Route::get('kyc-form', [HomeController::class, 'kyc_form'])->name('guests.kyc_form');
    Route::post('kyc-form-save', [HomeController::class, 'kyc_form_save'])->name('guests.kyc_form_save');

//  Survey Form
    Route::get('survey-form', [HomeController::class, 'survey_form'])->name('guests.survey_form');
    Route::post('survey-form-save', [HomeController::class, 'survey_form_save'])->name('guests.survey_form_save');
});

Route::get('/home', [App\Http\Controllers\Admin\Home\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
// Route::get('opened_tickets','Admin\Tickets\OpenedTicketController')->name('tickets.opened_tickets');
// Route::get('assigned_tickets','Admin\Tickets\AssignedTicketController')->name('tickets.assigned_tickets');
// Route::get('closed_tickets','Admin\Tickets\ClosedTicketController')->name('tickets.closed_tickets');
// Route::get('recent_tickets','Admin\Tickets\RecentTicketController')->name('tickets.recent_tickets');


//Auth::routes();

