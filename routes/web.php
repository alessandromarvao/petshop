<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'EmpresaController@checkEmpresa');
Route::get('/produto/get_datatable', 'ProdutoController@getDatatable');
Route::get('/compra/get_datatable', 'CompraController@getDatatable');

Route::resources([
    'empresa' => 'EmpresaController',
    'produto' => 'ProdutoController',
    'compra' => 'CompraController',
    'compras_de_produtos' => 'ComprasDeProdutosController'
]);

