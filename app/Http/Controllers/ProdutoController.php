<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produto.index');
    }
    
    public function getDatatable(){
        $produtos = Produto::get();
        return Datatables::of($produtos)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            '_method' => $request->input('_method'),
            '_token' => $request->input('_token'),
            'nome' => $request->input('nome'),
            'tipo' => $request->input('tipo'),
            'tamanho' => $request->input('tamanho'),
            'quantidade' => $request->input('quantidade'),
            'cod_barras' => $request->input('cod_barras'),
            'valor_venda' => implode('.', explode(',', $request->input('valor_venda')))
        ];

        $produto = Produto::create($input);
        return view('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cod_barras
     * @return \Illuminate\Http\Response
     */
    public function show($cod_barras)
    {
        $produto = Produto::where('cod_barras', $cod_barras);

        return Datatables::of($produto)->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
