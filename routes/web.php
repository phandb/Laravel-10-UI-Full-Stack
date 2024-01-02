<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;

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

Auth::routes();

Route::group(['prefix' => 'candidates', 'middleware' => 'auth'], function() {
    
    Route::get('/', [CandidateController::class, 'index'])->name('candidates.index');
    Route::get('/edit/{id}', [CandidateController::class, 'edit'])->name('candidates.edit');
    Route::put('/update/{id}', [CandidateController::class, 'update'])->name('candidates.update');

    //Route::post('/candidates/upload/{id}', [CandidateController::class, 'uploadFile'])->name('candidates.upload-file');

});




