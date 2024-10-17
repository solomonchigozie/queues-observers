<?php

use App\Http\Controllers\PostController;
use App\Jobs\SendWelcomEmail;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//queue
Route::get('/send', function(){
    
    $user = User::find(1);

    dispatch(new SendWelcomEmail($user));

    dd('Email Sent');

} );

/**
 * observer
 */
Route::resource('posts', PostController::class);


