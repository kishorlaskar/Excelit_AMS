<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// this route for home dashboard
Route::get('redirects',[HomeController::class,'index'])->name('redirects');
// this route for home logout
Route::get('logout',[HomeController::class,'logout'])->name('logout');

// this route for home manage-employee
Route::get('/employee',[EmployeeController::class,'index'])->name('manage-employee');
Route::get('/add-employee',[EmployeeController::class,'create'])->name('add-employee');
Route::post('/save-employee',[EmployeeController::class,'store'])->name('store-employee');
Route::get('/edit-employee/{id}',[EmployeeController::class,'edit'])->name('edit-employee');
Route::post('/update-employee/{id}',[EmployeeController::class,'update'])->name('update-employee');
Route::get('/delete-employee/{id}',[EmployeeController::class,'destroy'])->name('delete-employee');


// this route for home user
Route::get('user',[AdminController::class,'user'])->name('user');
Route::get('addUserForm',[AdminController::class,'addUserForm'])->name('addUserForm');
Route::post('storeUser',[AdminController::class,'StoreUser'])->name('storeUser');
Route::get('/editUser/{id}',[AdminController::class,'EditUser'])->name('editUser');
Route::post('/updateUser/{id}',[AdminController::class,'updateUser'])->name('updateUser');
Route::get('/deleteUser/{id}',[AdminController::class,'deleteUser'])->name('deleteUser');
Route::get('/inactiveUser/{id}', [AdminController::class,'inactive'])->name('inactive');
Route::get('/activeUser/{id}', [AdminController::class,'active'])->name('active');



// Profile Route --- Not Working Yet
Route::get('profile',[AdminController::class,'profile'])->name('profile');
Route::post('/update-profile',[AdminController::class,'update_profile'])->name('update-profile');
Route::get('/change-password',[AdminController::class,'change-password'])->name('change-password');
Route::post('/update-password',[AdminController::class,'update-password'])->name('update-password');
