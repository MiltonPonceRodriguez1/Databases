<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('/datos', function () {
    $pdo = DB::getPdo();
    $p1 = 8;

    $stmt = $pdo->prepare("begin myproc(:p1, :p2); end;");
    $stmt->bindParam(':p1', $p1, PDO::PARAM_INT);
    $stmt->bindParam(':p2', $p2, PDO::PARAM_INT);
    $stmt->execute();

    return $p2;

});

Route::get('/test/{var?}', [RegisterController::class, 'test'])->name('Register.test');
Route::post('/register/store', [RegisterController::class, 'store'])->name('Register.store');
Route::get('/show', [RegisterController::class, 'show'])->name('Register.show');
Route::post('/delete', [RegisterController::class, 'delete'])->name('Register.delete');
Route::get('/get-oldest', [RegisterController::class, 'getOldest'])->name('Register.getOldest');
Route::post('/increase-age', [RegisterController::class, 'increase'])->name('Register.increase');
Route::post('/decrease-age', [RegisterController::class, 'decrease'])->name('Register.decrease');
