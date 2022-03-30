<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\Recordcontroller;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dashboard Routes
//return total # of records
Route::get('/loadStats', [DashboardController::class, 'index']);
//return loggedIn use
Route::get('/userInfo', [DashboardController::class, 'index']);
//return total # of users
Route::get('/totalUsers', [DashboardController::class, 'index']);

//Record routes
//download file in Excel format
Route::get('/downloadExcel', [FileController::class, 'export']);
//return all records
Route::get('/records', [Recordcontroller::class, 'index']);
//store a record
Route::post('/addRecord', [Recordcontroller::class, 'store']);
//view single Record
Route::get('/viewRecord/{id}', [Recordcontroller::class, 'show']);
//return record to edit
Route::get('/editRecord/{id}', [Recordcontroller::class, 'edit']);
//update selected record
Route::post('/updateRecord/{id}', [Recordcontroller::class, 'update'])->name('updateRecord');
//view Record to add notes to
Route::post('/addComment/{id}', [CommentsController::class, 'store'])->name('addComment');
//return notedRecords
Route::get('/notedRecords', [CommentsController::class, 'index']);

//Review Routes
//to review record
Route::post('/reviewRecord/{model}', [ReviewController::class, 'index']);
//return reviewed records
Route::get('/reviewedRecords', [ReviewController::class, 'show']);

//Currency Conversion Routes
Route::post('/convert', [RatesController::class, 'store']);

//User Controller
//return all users
Route::get('/accessUsers', [AccessController::class, 'show']);
//return user to edit
Route::get('/getUserLevel/{id}', [AccessController::class, 'edit']);
//update user access level
Route::post('/updateUserLevel/{id}', [AccessController::class, 'update'])->name('updateUserLevel');

//system reports
Route::get('/systemReports', [ReportsController::class, 'index']);


Route::middleware('guest')->group(function (){
    Route::get('/login' , [ AuthController::class , 'loginView' ])->name('login');
    Route::get('/register' , [ AuthController::class , 'registerView' ])->name('register');
    Route::post('/registerUser', [AuthController::class, 'registerUser']);
    Route::post('/login' , [ AuthController::class , 'login']);
});

Route::post('/logout' , [AuthController::class , 'logout'])->name('logout');
Route::get('/password/reset' , [AuthController::class , 'getResetForm']);
Route::post('/password/reset' , [AuthController::class , 'reset']);
Route::post('/reset' , [AuthController::class , 'resetPassword']);

Route::middleware('auth')->group(function (){

    Route::post('/password' , [AuthController::class , 'password']);
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    /*
     * Users
     *
     */

    Route::prefix('users')->group(function (){
        Route::get('/' ,  [UserController::class , 'index'])->middleware('can:admin,'. User::class);
        Route::post('/create' ,  [UserController::class , 'store'])->middleware('can:admin,'. User::class);
        Route::get('/{model}/view' ,  [UserController::class , 'view'])->middleware('can:admin,'. User::class);
        Route::get('/{model}/activate' ,  [UserController::class , 'activate'])->middleware('can:admin,'. User::class);
        Route::get('/{model}/deactivate' ,  [UserController::class , 'deactivate'])->middleware('can:admin,'. User::class);
        Route::post('/{model}/update' ,  [UserController::class , 'update'])->middleware('can:admin,'. User::class);
    });

    Route::prefix('roles')->group(function (){
        Route::get('/' ,  [RoleController::class , 'index']);
        Route::post('/create' ,  [RoleController::class , 'store']);
        Route::get('/{model}/view' ,  [RoleController::class , 'view']);
        Route::post('/{model}/update' ,  [RoleController::class , 'update']);
    });

    Route::prefix('permissions')->group(function (){
        Route::get('/' ,  [PermissionController::class , 'index']);
    });

});



