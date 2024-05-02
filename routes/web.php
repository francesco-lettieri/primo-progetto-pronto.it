<?php

use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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
// ROTTA PUBBLICA 
Route::get('/', [PublicController::class,'home'])->name('homePage');
Route::get('/category/show/{category}', [PublicController::class,'show'])->name('showPage');
// ROTTE PRODOTTI 
Route::get('/create', [AnnouncementController::class,'create'])->name('createPage');
Route::get('/detail/announcement/{announcement}', [AnnouncementController::class,'show'])->name('showAnnouncement');
Route::get('/annoucement/index', [AnnouncementController::class,'index'])->name('indexPage');

// ROTTA PER RICERCA ANNUNCIO 
Route::get('/search/announcement', [PublicController::class,'search'])->name('searchPage');
// REVISORE
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('indexRevisorHome');
//ACCETTA ANNUNCIO
Route::patch('/accept/announcement/{announcement}',[RevisorController::class,'acceptAnnouncement'])->name('revisor.accept_announcement');
//RIFIUTA ANNUNCIO
Route::patch('/reject/announcement/{announcement}',[RevisorController::class,'rejectAnnouncement'])->name('revisor.reject_announcement');
//ROTTA REVISORE
Route::get('/request/revisor',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('become.revisor');
//rendere revisore
Route::get('make/revisor/{user}',[RevisorController::class,'makeRevisor'])->name('make.revisor');
// rotta annunci accettati 
Route::get('/announcements/revisor',[RevisorController::class,'indexRevisor'])->name('indexRevisor');
Route::put('announcements/cancelled/{announcement}',[RevisorController::class,'nullableAnnouncement'])->name('goBackAnnouncement');

//ROTTA INVIO  MAIL
Route::get('/send/mail',[BecomeRevisor::class,'mailSend'])->name('sendMail');
//rotta lingue
Route::post('/language/{lang}',[PublicController::class,'setLanguage'])->name('set_language_locale');