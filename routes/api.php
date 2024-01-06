<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Open API Route
 */

Route::controller(UserController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

/**
 * Protected API Route
 */
Route::group([
    'middleware'=> ['auth:api'], // From JWT middleware
], function(){
    // User Controller
    Route::get('profile', [UserController::class, 'profile']);
    Route::get('refresh', [UserController::class, 'refreshToken']);
    Route::get('logout', [UserController::class, 'logout']);

    // Course Controller 
    Route::post('course-enroll', [CourseController::class,'courseEnroll']);
    Route::get('list-course', [CourseController::class,'listCourse']);
    Route::delete('delete-course', [CourseController::class,'deleteCourse']);
});