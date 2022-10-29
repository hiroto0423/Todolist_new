<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Models\Todo;

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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [TodoController::class,'index']);
    Route::post('/', [TodoController::class,'create']);
    Route::put('/{todo}', [TodoController::class, 'update']);
    Route::delete('/{todo}',[TodoController::class, 'delete']);
    Route::get('/todo/find', [TodoController::class, 'find']);
    Route::post('/todo/search', [TodoController::class, 'search']);
    Route::put('/todo/search/{todo}', [TodoController::class, 'search_update']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
