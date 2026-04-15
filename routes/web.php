<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

Route::redirect('/', '/home');

// Tất cả trang bên dưới đều bắt buộc đăng nhập
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('components.home.home');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // trang giới thiệu
    Route::get('/introduction', function () {
        return view('components.home.Introduction');
    });

    // trang điều khoản
    Route::get('/clause', function () {
        return view('components.home.clause');
    });

    // khóa học
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

    // đăng ký vào học
    Route::post('/courses/{id}/register', [CourseController::class, 'register'])->name('courses.register');

    // video khóa học
    Route::post('/courses/{courseId}/videos/store', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/courses/{courseId}/learn', [VideoController::class, 'learn'])->name('videos.learn');
    Route::get('/courses/{courseId}/videos/{videoId}', [VideoController::class, 'watch'])->name('videos.watch');
    Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');

    // chỉ admin vào được teacher
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/teacher', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
        Route::post('/teacher/approve/{id}', [TeacherController::class, 'approve'])->name('teacher.approve');
        Route::delete('/teacher/request/{id}', [TeacherController::class, 'destroyRequest'])->name('teacher.request.destroy');
        Route::get('/teacher/course/{courseId}/members', [TeacherController::class, 'members'])->name('teacher.members');
        Route::delete('/teacher/member/{id}', [TeacherController::class, 'removeMember'])->name('teacher.member.destroy');
    });

    // chỉ user vào được student
    Route::middleware(['role:user'])->group(function () {
        Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
    });
});

require __DIR__.'/auth.php';
