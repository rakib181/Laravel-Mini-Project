<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('jobs/create', 'create')->name('jobs.create');
    Route::post('jobs', 'store')->name('jobs.store')
        ->middleware('auth');

    Route::get('/jobs/{job}', 'show')->name('jobs.show');

    Route::get('jobs/{job}/edit', 'edit')->name('jobs.edit')
        ->middleware('auth')
        ->can('edit', 'job');

    Route::patch('jobs/{job}', 'update')->name('jobs.update')
        ->middleware('auth');

    Route::delete('jobs/{job}', 'destroy')->name('jobs.destroy')
        ->middleware('auth');

});


Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store')->middleware('throttle:5,1');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::view('/contact', 'contact')->name('contact');


//Route::get('/test', function () {
//   dispatch(function (){
//       logger()->info("test");
//   })->delay(now()->addSeconds(5));
//   return "done";
//});
//Route::get('/test', function () {
//    $job = Job::query()->first();
//    TranslateJob::dispatch($job);
//});

