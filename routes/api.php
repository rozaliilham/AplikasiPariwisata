<?php

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\MobileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/setting',[MobileController::class,'index']);
Route::get('/gallery',[MobileController::class,'gallery']);
Route::get('/wisata',[MobileController::class,'wisata']);
Route::get('/slider',[MobileController::class,'slider']);
Route::get('/wisatapopular',[MobileController::class,'wisatapopular']);
Route::get('/agenda',[MobileController::class,'agenda']);
Route::get('/news',[MobileController::class,'news']);
Route::get('/sambutan',[MobileController::class,'sambutan']);
Route::get('/struktur',[MobileController::class,'struktur']);
Route::get('/visimisi',[MobileController::class,'visimisi']);
Route::get('/gethomestay',[MobileController::class,'gethomestay']);
Route::get('/myreservation/{id}',[MobileController::class,'myreservation']);
Route::get('/updateNewsViews/{id}',[MobileController::class,'updateNewsViews']);
Route::get('/updateEventViews/{id}',[MobileController::class,'updateEventViews']);
Route::get('/updateWisataViews/{id}',[MobileController::class,'updateWisataViews']);
Route::get('/komenwisata/{wisata_id}',[MobileController::class,'komenwisata']);
Route::post('/postCommentWisata',[MobileController::class,'postCommentWisata']);
Route::get('/getsnaptoken/{id}',[MobileController::class,'getsnaptoken']);

Route::post('/kirimpesan',[MobileController::class,'kirimpesan']);
Route::post('/login',[MobileController::class,'login']);
Route::post('/registermember',[MobileController::class,'registermember']);
Route::post('/checkout',[MobileController::class,'checkout']);

Route::post('/midtrans-callback',[CheckOutController::class, 'callback']);
