<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\RegionController;

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
    return view('welcome');
});

Route::get('/http',function(){
   $response = Http::get('http://jsonplaceholder.typicode.com/posts');
    
    return $response->json();
 /*
$response = Http::delete('http://jsonplaceholder.typicode.com/posts/7');
return $response->json(); */
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('Pays/export/', [PaysController::class, 'export'])->name('pays.export');
Route::post('Pays/import/', [PaysController::class, 'import'])->name('pays.import');
Route::resource('pays',PaysController::class);
Route::resource('region',RegionController::class)->middleware(['check.admin','auth']);//vérifie si vous etes administrateurs et authentifier


require __DIR__.'/auth.php';
