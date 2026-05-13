<?php

use App\Http\Controllers\AIChatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

Route::redirect('/', '/home');

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

    Route::get('/introduction', function () {
        return view('components.home.Introduction');
    })->name('introduction');

    Route::get('/clause', function () {
        return view('components.home.clause');
    })->name('clause');

    Route::delete('/search-histories/{id}', [CourseController::class, 'destroySearchHistory'])
        ->name('search-histories.destroy');

    // Khóa học
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

    Route::post('/courses/{id}/register', [CourseController::class, 'register'])
        ->name('courses.register');

    // Theo dõi tiến độ học - đổi name để không trùng videos.watch
    Route::get('/courses/{course}/progress/{video}', [CourseController::class, 'watch'])
        ->name('courses.progress.watch');

    // Video khóa học
    Route::post('/courses/{courseId}/videos/store', [VideoController::class, 'store'])
        ->name('videos.store');

    Route::get('/courses/{courseId}/learn', [VideoController::class, 'learn'])
        ->middleware(['auth', 'approved.course'])
        ->name('videos.learn');

    Route::get('/courses/{courseId}/videos/{videoId}', [VideoController::class, 'watch'])
        ->name('videos.watch');

    Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/teacher', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
        Route::post('/teacher/approve/{id}', [TeacherController::class, 'approve'])->name('teacher.approve');
        Route::delete('/teacher/request/{id}', [TeacherController::class, 'destroyRequest'])->name('teacher.request.destroy');
        Route::get('/teacher/course/{courseId}/members', [TeacherController::class, 'members'])->name('teacher.members');
        Route::delete('/teacher/member/{id}', [TeacherController::class, 'removeMember'])->name('teacher.member.destroy');
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
    });
});

Route::post('/ai-chat', [AIChatController::class, 'chat'])
    ->middleware(['auth'])
    ->name('ai.chat');

require __DIR__ . '/auth.php';
