<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admins\AdminsController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::prefix('jobs')->group(function () {
    Route::get('/single/{id}', [JobsController::class, 'single'])->name('single.job');
    Route::post('/save', [JobsController::class, 'saveJob'])->name('save.job');
    Route::post('/apply', [JobsController::class, 'JobApply'])->name('apply.job');
    Route::any('search', [JobsController::class, 'search'])->name('search.job');
});

Route::prefix('categories')->group(function () {
    Route::get('/single/{name}', [CategoriesController::class, 'singleCategory'])->name('categories.single');
});

Route::prefix('users')->group(function () {
    Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
    Route::get('/applications', [UsersController::class, 'applications'])->name('applications');
    Route::get('/savedjobs', [UsersController::class, 'savedJobs'])->name('save.jobs');
    Route::get('/edit-details', [UsersController::class, 'editDetails'])->name('edit.details');
    Route::post('/edit-details', [UsersController::class, 'updateDetails'])->name('update.details');
    Route::get('/edit-cv', [UsersController::class, 'editCV'])->name('edit.cv');
    Route::post('/edit-cv', [UsersController::class, 'updateCV'])->name('update.cv');
    Route::get('/edit-profile-picture', [UsersController::class, 'editProfilePicture'])->name('edit.profile.picture');
    Route::post('/update-profile-picture', [UsersController::class, 'updateProfilePicture'])->name('update.profile.picture');
});

// Admin-related routes
Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
Route::post('admin/login', [AdminsController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [AdminsController::class, 'admins'])->name('view.admins');
    Route::get('/create-admins', [AdminsController::class, 'createAdmins'])->name('create.admins');
    Route::post('/create-admins', [AdminsController::class, 'storeAdmins'])->name('store.admins');
    Route::get('/display-categories', [AdminsController::class, 'displayCategories'])->name('display.categories');
    Route::get('/create-cates', [AdminsController::class, 'createCategories'])->name('create.categories');
    Route::post('/create-cates', [AdminsController::class, 'storeCategories'])->name('store.categories');
    Route::get('/edit-cates/{id}', [AdminsController::class, 'editCategories'])->name('edit.categories');
    Route::post('/edit-cates/{id}', [AdminsController::class, 'updateCategories'])->name('update.categories');
    Route::get('/delete-cates/{id}', [AdminsController::class, 'deleteCategories'])->name('delete.categories');
    Route::get('/display-jobs', [AdminsController::class, 'allJobs'])->name('display.jobs');
    Route::get('/create-jobs', [AdminsController::class, 'createJobs'])->name('create.jobs');
    Route::post('/create-jobs', [AdminsController::class, 'storeJobs'])->name('store.jobs');
    Route::get('/delete-jobs/{id}', [AdminsController::class, 'deleteJobs'])->name('delete.jobs');
    Route::get('/display-apps', [AdminsController::class, 'displayApps'])->name('display.apps');
    Route::get('/delete-apps/{id}', [AdminsController::class, 'deleteApps'])->name('delete.apps');
});




