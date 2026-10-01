<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/resume', function () {
    $path = public_path('documents/ryan-beard-resume.pdf');

    if (! file_exists($path)) {
        abort(404, 'Resume not available yet. The Foundation is still compiling Ryan\'s impressive credentials.');
    }

    return response()->file($path, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="ryan-beard-resume.pdf"',
    ]);
})->name('resume.download');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
