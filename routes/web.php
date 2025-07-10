<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\PostContoller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

//jobs routes

Route::controller(JobController::class)->group(
    function () {
        Route::get("/", "index")->name("jobs.index");
        Route::get("/jobs", "index")->name("jobs.index");
        Route::get("/jobs/search", "search")->name("jobs.search");
        Route::get("/jobs/create", "create")->name("jobs.create")->middleware("auth");
        Route::delete("/jobs/{job}", "destroy")->name("jobs.destroy")->middleware("auth");
        Route::get("/jobs/{job}", "show")->name("jobs.show")->middleware("auth");
        Route::post("/jobs", "store")->name("jobs.store")->middleware("auth");
        Route::get("/jobs/{job}/edit", "edit")->name("jobs.edit")->middleware("auth");
        Route::patch("/jobs/{job}", "update")->name("jobs.update")->middleware("auth");
    }
);

// Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::apiResource('posts', PostContoller::class);


Route::get('/send-test', function () {
    Mail::raw('This is a test email from Laravel using Mailtrap', function ($message) {
        $message->to('khaledhamdy@mail.com')
            ->subject('Mailtrap Test');
    });

    return 'Sent (check Mailtrap inbox)';
});

require __DIR__ . '/auth.php';


Route::get("/test" , function(){
    return view("test" , ["name" => "aya"]);
});