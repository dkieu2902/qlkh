<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});


//trang home
Route::get('/home', function () {
    return view('components.home.home');
});

//trang giới thiệu
Route::get('/introduction', function () {
    return view('components.home.Introduction');
});
//trang điều khoản
Route::get('/clause', function () {
    return view('components.home.clause');
});
//trang khoa học
Route::get('/courses', function () {
    return view('components.home.course');
});
//trang thêm sửa xóa khóa học
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Video của khóa học
Route::post('/courses/{courseId}/videos/store', [VideoController::class, 'store'])->name('videos.store');
Route::get('/courses/{courseId}/learn', [VideoController::class, 'learn'])->name('videos.learn');
Route::get('/courses/{courseId}/videos/{videoId}', [VideoController::class, 'watch'])->name('videos.watch');

Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

//cho vào học
Route::post('/courses/{id}/register', [CourseController::class, 'register'])->name('courses.register');

//trang giáo viên
Route::get('/teacher', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
Route::post('/teacher/approve/{id}', [TeacherController::class, 'approve'])->name('teacher.approve');
require __DIR__.'/auth.php';
