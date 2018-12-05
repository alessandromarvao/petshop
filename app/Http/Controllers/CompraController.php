<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Compra;
use App\ComprasDeProdutos;
use App\Produto;
use Yajra\Datatables\Facades\Datatables;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compra.index');
    }
    
    public function getDatatable(){
        $produtos = Compra::get();
        return Datatables::of($produtos)->make(true);
        // return $produtos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Armazena os dados da compra em geral
        Compra::create([
            '_token' => $request->input('_token'),
            'empresa_id' => '1',
            'nota_fiscal' => $request->input('nota_fiscal'),
            'data_compra' => $request->input('data_compra'),
            'valor_total' => $request->input('valor_total')
        ]);
        $id =  DB::getPdo()->lastInsertId();

        foreach($request->session()->get('produtos') as $row){
            //Armazena os dados da compra de cada um produto
            $compraProduto = ComprasDeProdutos::create([
                '_token' => $request->input('_token'),
                'compra_id' => $id,
                'produto_id' => $row['id'],
                'quantidade' => $row['quantidade'],
                'valor_custo' => $row['valor'],
            ]);

            //Atualiza a quantidade de itens do produto no estoque
            $produto = Produto::findOrFail($row['id']);
            $produto->quantidade = $produto->quantidade + $row['quantidade'];
            $produto->save();
        }
        
        $request->session()->flush();
        
        return view('compra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
