<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\RegisterController;

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

Route::get('/', function(){
    return view('dashboard/home');
})->name('home');

Route::get('/register', function(){
    return view('dashboard/register');
})->name('register');

Route::get('/main', function(){
    return view('dashboard/main');
})->name('main');

Route::get('/produto', function(){
    $produtos = App\Models\Produto::all();
    return view('dashboard/produto', compact('produtos'));
})->name('produto');

Route::post('/produto/cadastrar', [App\Http\Controllers\ProdutoController::class, 'cadastrar'])->name('produto_cadastrar');

Route::get('/produto/{produto_id}', [App\Http\Controllers\ProdutoController:: class, 'edit']);
Route::put('/produto/{produto_id}', [App\Http\Controllers\ProdutoController:: class, 'update'])->name('editar_produto');
Route::get('/produto/excluir/{produto_id}', [App\Http\Controllers\ProdutoController:: class, 'excluir']);
Route::delete('/produto/excluir/{produto_id}', [App\Http\Controllers\ProdutoController::class, 'destroy'])->name('excluir_produto');

Route::get('/compra', function(){
    return view('dashboard/compra');
})->name('compra');

Route::get('/venda', function(){
    return view('dashboard/venda');
})->name('venda');

Route::get('/estoque', function(){
    $produtos = App\Models\Produto::all();
    return view('dashboard/estoque', compact('produtos'));
})->name('estoque');

Route::get('/imposto', function(){
    return view('dashboard/imposto');
})->name('imposto');


Route::post('', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/register/submit', [App\Http\Controllers\RegisterController:: class, 'register'])->name('register/submit');