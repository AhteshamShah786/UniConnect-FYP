<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NetworkingController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUniversityController;
use App\Http\Controllers\Admin\AdminScholarshipController;
use App\Http\Controllers\Admin\AdminPostController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// University routes
Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
Route::get('/universities/{university}', [UniversityController::class, 'show'])->name('universities.show');
Route::get('/universities/search', [UniversityController::class, 'search'])->name('universities.search');

// Scholarship routes
Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
Route::get('/scholarships/search', [ScholarshipController::class, 'search'])->name('scholarships.search');
Route::get('/scholarships/eligibility-check', [ScholarshipController::class, 'eligibilityCheck'])->name('scholarships.eligibility-check');
Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'show'])->name('scholarships.show');

// Dashboard route (redirect to home for now)
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Networking routes (public viewing, auth required for create/edit)
Route::get('/networking', [NetworkingController::class, 'index'])->name('networking.index');
Route::get('/networking/create', [NetworkingController::class, 'create'])->middleware('auth')->name('networking.create');
Route::get('/networking/{post}', [NetworkingController::class, 'show'])->name('networking.show');

// Profile routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['put', 'patch'], '/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Networking routes (auth required for create/edit/delete)
    Route::post('/networking', [NetworkingController::class, 'store'])->name('networking.store');
    Route::get('/networking/{post}/edit', [NetworkingController::class, 'edit'])->name('networking.edit');
    Route::put('/networking/{post}', [NetworkingController::class, 'update'])->name('networking.update');
    Route::delete('/networking/{post}', [NetworkingController::class, 'destroy'])->name('networking.destroy');
});

// Chatbot routes
Route::post('/chatbot/message', [ChatbotController::class, 'sendMessage'])->name('chatbot.message');
Route::get('/chatbot/languages', [ChatbotController::class, 'getLanguages'])->name('chatbot.languages');

// Admin routes
Route::prefix('admin')->group(function () {
    // Admin authentication routes (public)
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Admin protected routes (require admin authentication)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        
        // Universities management
        Route::resource('universities', AdminUniversityController::class)->names([
            'index' => 'admin.universities.index',
            'create' => 'admin.universities.create',
            'store' => 'admin.universities.store',
            'show' => 'admin.universities.show',
            'edit' => 'admin.universities.edit',
            'update' => 'admin.universities.update',
            'destroy' => 'admin.universities.destroy',
        ]);
        
        // Scholarships management
        Route::resource('scholarships', AdminScholarshipController::class)->names([
            'index' => 'admin.scholarships.index',
            'create' => 'admin.scholarships.create',
            'store' => 'admin.scholarships.store',
            'show' => 'admin.scholarships.show',
            'edit' => 'admin.scholarships.edit',
            'update' => 'admin.scholarships.update',
            'destroy' => 'admin.scholarships.destroy',
        ]);
        
        // Posts management
        Route::resource('posts', AdminPostController::class)->only(['index', 'show', 'update', 'destroy'])->names([
            'index' => 'admin.posts.index',
            'show' => 'admin.posts.show',
            'update' => 'admin.posts.update',
            'destroy' => 'admin.posts.destroy',
        ]);
    });
});

require __DIR__.'/auth.php';
