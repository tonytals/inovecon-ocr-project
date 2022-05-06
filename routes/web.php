<?php

use App\Http\Controllers\PdfParaImagemController;
use App\Http\Controllers\SmalotParserController;
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


Route::get('/pdfparatexto', [SmalotParserController::class, 'pdfParaTexto']);

Route::get('/pdfparaimagem/{filename}', [PdfParaImagemController::class, 'PdfParaImagem']);
