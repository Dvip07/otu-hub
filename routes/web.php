<?php


use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\authenticate\AuthLogin;
use App\Http\Controllers\Auth\LoginRegistrationController;
use App\Http\Controllers\Dashboard\DashboardController;

// Pages Controller
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;

date_default_timezone_set('Asia/Kolkata');
Route::get('/refresh', function () {
    Artisan::call('key:generate');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    return 'Refresh Done';
});

Route::controller(LoginRegistrationController::class)->group(function () {
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/store', 'store')->name('store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/authenticate/login', [AuthLogin::class, 'login'])->name('authenticate-login');
Route::get('/authenticate/register', [AuthLogin::class, 'register'])->name('authenticate-register');

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard-blank');
    Route::get('/dashboard', [DashboardController::class, 'crm'])->name('dashboard-crm');

    // Profile
    Route::get('/profile/{id}', [UserController::class, 'show'])->name('view-profile');

    // Posts
    Route::resource('posts', PostsController::class);

    // Community
    Route::resource('community', CommunityController::class);

    // Engagement
    Route::resource('engagement', EngagementController::class);

    // Likes
    Route::resource('likes', LikesController::class);

    // Comments
    Route::resource('comments', CommentsController::class);

    // Route::get('/add/post', [DashboardController::class, 'add'])->name('add-post');
});
