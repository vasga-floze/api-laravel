<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\PostController as v1;
use App\Http\Controllers\API\v2\PostController as v2;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::apiResource('/v1/posts', v1::class)
    ->only(['index', 'show']); //habilita para la api index y show

Route::apiResource('/v2/posts', v2::class)
    ->only(['index', 'show']);