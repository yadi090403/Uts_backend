<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
# mengimport controller pasien 
use App\Http\Controllers\pasienController;
# panggil controller
use App\Http\Controllers\AuthController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
# Route pasien
# Method GET
Route::get('/pasiens', [pasienController::class, 'index']);
Route::get('/pasiens/{id}', [pasienController::class, 'show']);

# Method POST
Route::post('/pasiens', [pasienController::class, 'store']);
Route::put('/pasiens/{id}', [pasienController::class, 'update']);
Route::delete('/pasiens/{id}', [pasienController::class, 'destroy']);
});

# untuk register dan login pake auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
