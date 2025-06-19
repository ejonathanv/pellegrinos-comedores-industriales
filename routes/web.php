<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LangMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;


Route::get('/setlocale/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');

Route::get('/', [WebsiteController::class, 'index'])->name('website.index')->middleware(LangMiddleware::class);

Route::post('/contact-to-pellegrinos', [WebsiteController::class, 'contactToPellegrinos'])->name('contact-to-pellegrinos');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
