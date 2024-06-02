<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PremissionController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::group(['middleware' =>['isAdmin']], function () {
     // permmision route
    Route::resource('permission', PremissionController::class);
    Route::get('permission/{permissionId}/delete', [PremissionController::class,'destroy']);
    Route::put('permission/{permission}', [PremissionController::class,'update']);
    
    //role route
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class,'destroy']);
    
    //for role permission give 
    Route::get('roles/{roleId}/give-permission', [RoleController::class,'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permission', [RoleController::class,'updatePermissionToRole']);
    
    //Users Route
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class,'destroy']);

});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
// });

require __DIR__.'/auth.php';
