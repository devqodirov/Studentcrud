<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\StudentController;



  Route::get('/', fn() => redirect('/students'));
Route::resource('students', StudentController::class);


require __DIR__.'/auth.php';
