<?php

use App\Http\Controllers\MailchimpController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::post('/send-email', [MailchimpController::class, 'sendEmail']);
