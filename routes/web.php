<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { //mainurl 
    return view('welcome');
});

Route::get('/profile', function() {// mainurl/profile
    return view('profile');
});

Route::get('/dashboard', function() { // mainurl/dashboard
    return view('welcome');
});

Route::get('/student',[DashboardController::class,'index'])->name('student.index'); // mainurl/student

Route::post('/student/add',[DashboardController::class,'store'])->name('student.add');
Route::post('/student/delete/{id}',[DashboardController::class,'delete'])->name('student.delete');
Route::post('/student/update',[DashboardController::class,'update'])->name('student.update');

Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::get('/register',[LoginController::class,'register_index'])->name('register.index');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/student', [AdminDashboardController::class, 'student_index'])->name('admin.student.index');

