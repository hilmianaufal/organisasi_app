<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SettingController;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\News;
use App\Models\Program;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $latestNews = News::latest()->take(3)->get();
    $latestPrograms = Program::latest()->take(3)->get();
    $totalNews = News::count();
    $totalPrograms = Program::count();
    $totalGalleries = Gallery::count();
    $totalMembers = Member::count();

    return view('pages.home', compact(
        'latestNews',
        'latestPrograms',
        'totalNews',
        'totalPrograms',
        'totalGalleries',
        'totalMembers'
    ));
});


Route::get('/profil', [MemberController::class, 'publicProfile']);
Route::get('/pengumuman', [AnnouncementController::class, 'publicIndex']);
Route::get('/program', [ProgramController::class, 'publicIndex']);

Route::get('/berita', [NewsController::class, 'publicIndex']);
Route::get('/berita/{slug}', [NewsController::class, 'publicShow']);
Route::post('/aspirasi', [AspirationController::class, 'store'])->name('aspirations.store');


Route::get('/galeri', function () {
    return view('pages.galeri');
});

Route::get('/kontak', function () {
    return view('pages.kontak');
});

Route::get('/galeri', [GalleryController::class, 'publicIndex']);
/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $totalNews = News::count();
    $totalPrograms = Program::count();

    return view('dashboard', compact('totalNews', 'totalPrograms'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
     Route::resource('programs', ProgramController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('aspirations', AspirationController::class)->only(['index', 'destroy']);
    Route::resource('members', MemberController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::get('/settings/general', [SettingController::class, 'edit'])
    ->name('settings.general');

    Route::put('/settings/general', [SettingController::class, 'update'])
    ->name('settings.general.update');  
    Route::post('/users', [AdminUserController::class, 'store'])
    ->name('users.store');

    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
        ->name('users.destroy');
});


/*
|--------------------------------------------------------------------------
| PROFILE USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';