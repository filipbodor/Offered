<?php


use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FavoriteAdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LocationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $categories = CategoryController::getAllCategories();
    return view('welcome', compact( 'categories'));
})->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




/* stare */
Route::get('/subcategories/{subcategory}/advertisements', [CategoryController::class, 'subcategory'])->name('subcategory.advertisements');
Route::get('/categories/{categoryId}/subcategories', [CategoryController::class, 'forCategory']);
Route::get('/advertisements/filter', [AdvertisementController::class, 'filter'])->name('advertisements.filter');


Route::middleware(['auth'])->group(function () {
    Route::get('/load-chat-interface', [ChatController::class, 'loadChatInterface']);

    Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
    Route::post('/receive', 'App\Http\Controllers\PusherController@receive');
    Route::post('/store-message', [ChatController::class, 'storeMessage'])->name('store.message');

    Route::get('/user-profile-pic/{userId}', 'UserController@getUserProfilePic');

});


Route::get('/categories/{category}/{subcategory?}', [AdvertisementController::class, 'getByCategoryAndSubcategory'])->name('advertisements.byCategoryAndSubcategory');
//Route::get('/advertisements/category/{category}', [AdvertisementController::class, 'getByCategory'])->name('advertisements.category');
Route::get('/advertisements', [AdvertisementController::class, 'index'])->name('advertisements.index');
Route::get('/advertisements/search', [AdvertisementController::class, 'search'])->name('advertisements.search');

Route::middleware(['auth'])->group(function () {
    /*Route::get('/profile/{user}', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit/{user}', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{user}', [UserProfileController::class, 'update'])->name('profile.update');*/

    Route::post('/advertisements/{advertisement}/favorite', [FavoriteAdvertisementController::class, 'add'])->name('advertisements.favorite');
    Route::delete('/advertisements/{advertisement}/unfavorite', [FavoriteAdvertisementController::class, 'remove'])->name('advertisements.unfavorite');

    Route::get('/advertisements/{advertisement}/rate', [RatingController::class, 'create'])->name('ratings.create');
    Route::post('/advertisements/{advertisement}/rate', [RatingController::class, 'store'])->name('ratings.store');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
});
Route::get('/advertisements/{advertisement}/rate', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/advertisements/{advertisement}/rate', [RatingController::class, 'store'])->name('ratings.store');
Route::put('/advertisements/{id}', [AdvertisementController::class, 'update'])->name('advertisements.update');
Route::get('/advertisements/{id}/edit', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
Route::resource('advertisements', AdvertisementController::class);
Route::get('/location-search', [LocationController::class, 'search'])->name('location.search');



Route::get('send/{senderId}/{receiverId}', [ChatController::class, 'sendNotification']);

