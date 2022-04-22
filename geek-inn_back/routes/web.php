<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |

//USER AUTH PROTECTED ROUTES: //
Route::middleware('auth:sanctum')->group( function () {
    // 2- REVIEWS
    // Route::post('/reviews/create', [ReviewController::class, 'storeReview'])->name('reviews.store');  
});

Route::post('/reviews/create', [ReviewController::class, 'storeReview'])->name('reviews.store'); 
Route::get('/users/index', [UserController::class, 'getAllUsers'])->name('getAllUsers');
Route::get('/users/{id}', [UserController::class, 'readUser'])->name('user.read');
//ADMIN AUTH PROTECTED ROUTES: //
Route::middleware('isAdmin')->group( function () {

// 1- USER
Route::delete('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
// Route::get('/users/{id}', [UserController::class, 'readUser'])->name('user.read');
Route::post('/users/update/{id}',[UserController::class, "updateUser"])->name("user.update");

// 2 - REVIEWS
Route::delete('/reviews/delete/{id}', [ReviewController::class, 'deleteReview'])->name('review.delete');

// 3 - PLACES
Route::post('/places/create', [PlaceController::class, 'storePlace'])->name('place.store');
Route::delete('/places/delete/{id}', [PlaceController::class, 'deletePlace'])->name('place.delete');

// 4 - CATEGORY
Route::post('/categories/create', [CategoryController::class, "storeCategory"])->name("category.create");
Route::delete('/categories/delete/{id}', [CategoryController::class, "deleteCategory"])->name("category.delete");
Route::post('/categories/update/{id}',[CategoryController::class, "updateCategory"])->name("category.update");
//REVIEWS
 Route::post('/reviews/update/{id}',[ReviewController::class, "updateReview"])->name("reviews.update");
//Route::get('/reviews/index', [ReviewController::class, 'showUserReviews'])->name('UserReviews');;
// PLACES
Route::post('/places/update/{id}',[PlaceController::class, "updatePlace"])->name("places.update");

//EVENTS
Route::post('/events/create', [EventController::class, "storeEvents"])->name("events.create");
Route::delete('/events/delete/{id}', [EventController::class, "deleteEvents"])->name("events.delete");
Route::post('/events/update/{id}',[EventController::class, "updateEvents"])->name("events.update");
});

// NON PROTECTED ROUTES: //
// 1 - USER
Route::post('/register', [AuthUserController::class, 'registerUser']);
Route::post('/login', [AuthUserController::class, 'loginUser']);
Route::get('/logout', [AuthUserController::class, 'logoutUser']);
// 2 - REVIEWS
Route::get('/reviews/index', [ReviewController::class, 'getAllReviews'])->name('getAllReviews');
Route::get('/reviews/place/{id}', [ReviewController::class, 'getReviewsByPlaceId'])->name('getReviewsByPlaceId');
Route::get('/reviews/{id}', [ReviewController::class, 'readReview'])->name('review.read');
// 3 - PLACES
Route::get('/places/index', [PlaceController::class, 'getAllPlaces'])->name('getAllPlaces');
// 3.1 - SCHOOL
Route::get('/places/schools', [PlaceController::class, 'getAllSchools'])->name('getAllSchools');
// 3.2 - COMPANIES
Route::get('/places/companies', [PlaceController::class, 'getAllCompanies'])->name('getAllCompanies');
// 3.3 - COWORKING
Route::get('/places/coworkings', [PlaceController::class, 'getAllCoworkings'])->name('getAllCoworkings');
// 3.4 - BARS
Route::get('/places/bars', [PlaceController::class, 'getAllBars'])->name('getAllBars');
// 3.5 - SHOPS
Route::get('/places/shops', [PlaceController::class, 'getAllShops'])->name('getAllShops');

Route::get('/places/{id}', [PlaceController::class, 'readPlace'])->name('place.read');

// 4 - CATEGORIES
Route::get('/categories/index', [CategoryController::class, "getAllCategories"])->name("getAllCategories");
Route::get('/categories/{id}', [CategoryController::class, 'readCategory'])->name('category.read');
// 5 - EVENTS
Route::get('/events/index', [EventController::class, "getAllEvents"])->name("getAllEvents");
Route::get('/events/{id}', [EventController::class, 'readEvent'])->name('event.read');

// 6 - DASHBOARD
Route::get('/dashboard/users/all', [DashboardController::class, 'countAllUsers']);
Route::get('/dashboard/users/last', [DashboardController::class, 'countLastUsers']);
Route::get('/dashboard/users/admin', [DashboardController::class, 'countAdminUsers']);
Route::get('/dashboard/reviews/all', [DashboardController::class, 'countAllReviews']);
Route::get('/dashboard/reviews/last', [DashboardController::class, 'countLastReviews']);
Route::get('/dashboard/reviews/{id}', [DashboardController::class, 'countReviewsByPlaceId']);
Route::get('/dashboard/place/rateav/{id}', [DashboardController::class, 'averageRateByPlaceId']);
Route::get('/dashboard/places/order', [DashboardController::class, 'getPlacesOrderByRate']);

// TOKEN

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();
    return $token;
   });

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
});