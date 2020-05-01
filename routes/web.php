<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/save-menu', function(Request $request) {
    $img = Image::make(public_path('img/bg_screen01.png'));

    $leftTitle = $request->left_title ?? 'FAJITAS';
    $img->text(strtoupper($leftTitle), 25, 50, function($font) {
        $font->file(public_path('font/Roboto/Roboto-Bold.ttf'));
        $font->size(60);
        $font->color('#FFFFFF');
        $font->valign('top');
    });

    $centerTitle = $request->center_title ?? 'BURRITOS';
    $img->text(strtoupper($centerTitle), 730, 50, function($font) {
        $font->file(public_path('font/Roboto/Roboto-Bold.ttf'));
        $font->size(60);
        $font->color('#FFFFFF');
        $font->valign('top');
    });

    $rightTitle = $request->right_title ?? 'TACOS';
    $img->text(strtoupper($rightTitle), 1350, 50, function($font) {
        $font->file(public_path('font/Roboto/Roboto-Bold.ttf'));
        $font->size(60);
        $font->color('#FFFFFF');
        $font->valign('top');
    });

    $image = $request->image ?? 'img/fajitas.png';
    $img->insert(public_path($image), 'top-left', 15, 165);
    $img->save(public_path('img/bg_screen01_output.png'));
    return response()->json(['status' => true]);
})->name('saveMenu');

Route::get('/player', function(Request $request) {
    return view('player');
})->name('player');

Route::get('/get-menu', function(Request $request) {
    return response()->json([
        'status' => true,
        'imagePath' => 'img/bg_screen01_output.png?ver='.uniqid(),
        'videoPath' => 'video/ch.mp4',
    ]);
})->name('getMenu');
