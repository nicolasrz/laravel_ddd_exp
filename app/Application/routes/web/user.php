<?php

use App\Presentation\Web\Action\User\GetLoginAction;
use App\Presentation\Web\Action\User\PostLoginAction;
use Illuminate\Support\Facades\Route;



Route::get('/login', GetLoginAction::class)->name('get_user_login');
Route::post('/login', PostLoginAction::class)->name('get_user_login');
