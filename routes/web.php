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
Route::get('/venda/get_datatable', 'VendaController@getDatatable');
Route::get('/vendas_de_produtos/set_session/{id}/{quantidade}/{valor}', 'ComprasDeProdutosController@set_session');
Route::get('/compras_de_produtos/set_session/{id}/{quantidade}/{valor}', 'ComprasDeProdutosController@set_session');
Route::get('/compras_de_produtos/flush', 'ComprasDeProdutosController@flush_session');

Route::resources([
    'empresa' => 'EmpresaController',
    'produto' => 'ProdutoController',
    'venda' => 'VendaController',
    'compra' => 'CompraController',
    'compras_de_produtos' => 'ComprasDeProdutosController'
]);

