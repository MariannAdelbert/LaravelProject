<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\Array_;
use App\Jobs\TranslateJob;
use App\Models\Job;

Route::get('test', function () {
    $job = Job::first();

    TranslateJob::dispatch($job);

    return 'Done';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

 Route::get('/jobs', [JobController::class, 'index']);
 Route::get('/jobs/create', [JobController::class, 'create']);
 Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
 Route::get('/jobs/{job}', [JobController::class, 'show']);

 Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
     ->middleware('auth')
     ->can('edit', 'job');

 Route::patch('/jobs/{job}', [JobController::class, 'update']);
 Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//Day 20 tegime teise ajutise app projecti

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::post('/logout', [SessionController::class, 'destroy']);

//Day27: https://github.com/MariannAdelbert/pixel-positions.git
//Day28: https://github.com/MariannAdelbert/pixel-positions.git
//Day29: https://github.com/MariannAdelbert/pixel-positions.git
//Day30: https://github.com/MariannAdelbert/pixel-positions.git
