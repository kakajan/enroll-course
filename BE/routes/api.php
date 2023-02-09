<?php

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
Route::post('reg', function (Request $request) {
    $niceNames = array(
        'name' => 'نام و نام خانوادگی',
        'phone' => 'شماره همراه',
    );
    $v = Validator::make($request->all(), [
        'fullName' => 'required',
        'phone' => 'required|unique:guests|Min:10|Max:10',
    ]);
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
        $errors = $v->messages();
        $msg = [];
        foreach ($errors->all() as $error) {
            $msg[] = [
                'error' => $error,
            ];
        }
        return $msg;
        exit();
    }
    $guest = new Guest;
    $guest->fullName = $request->fullName;
    $guest->phone = $request->phone;
    $guest->save();
    if ($guest) {
        return 1;
    }
});
