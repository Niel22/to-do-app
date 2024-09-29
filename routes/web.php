<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Admin\Users;
use App\Livewire\HomePage;
use App\Livewire\Task\Add;
use App\Livewire\Task\Edit;
use App\Livewire\Task\Index;
use App\Livewire\Task\View;
use App\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){

    Route::get('/', HomePage::class)->name('home');

    // Tasks
    Route::get('tasks', Index::class)->name('tasks.list');
    Route::get('tasks/add', Add::class)->name('task.add');
    Route::get('tasks/{slug}', View::class)->name('task.view');
    Route::get('tasks/{slug}/edit', Edit::class)->name('task.edit');

    // User Profile
    Route::get('profile', Profile::class)->name('user.profile');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('users', Users::class)->name('admin.user')->middleware('admin');
});

// Auth
Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
});
