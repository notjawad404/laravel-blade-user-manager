<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

// Check database connection
use Illuminate\Support\Facades\DB;

Route::get('/db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'success', 'message' => 'Database connected successfully!']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]);
    }
});

use App\Http\Controllers\UserProfileController;

Route::get('user_profiles', [UserProfileController::class, 'index'])->name('user_profiles.index');
Route::get('user_profiles/create', [UserProfileController::class, 'create'])->name('user_profiles.create');
Route::post('user_profiles', [UserProfileController::class, 'saveProfile'])->name('user_profiles.saveProfile');
Route::get('user_profiles/{userProfile}', [UserProfileController::class, 'displayProfile'])->name('user_profiles.displayProfile');
Route::get('user_profiles/{userProfile}/edit', [UserProfileController::class, 'editProfile'])->name('user_profiles.editProfile');
Route::put('user_profiles/{userProfile}', [UserProfileController::class, 'updateProfile'])->name('user_profiles.updateProfile');
Route::delete('user_profiles/{userProfile}', [UserProfileController::class, 'deleteProfile'])->name('user_profiles.deleteProfile');

