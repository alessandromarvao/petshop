<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class ComprasDeProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        print_r(($request->session()->get('produtos')));
        // foreach($request->session()->get('produtos') as $row){
        //     echo "Id:" . $row['id'] . "<br>";
        //     echo "Valor:" . $row['valor'] . "<br>";
        // }
    }

    public function set_session(Request $request, $id, $quantidade, $valor)
    {
        $total = 0;
        // $request->session()->flush();
        $array = [
            'id' => $id,
            'quantidade' => $quantidade,
            'valor' => implode('.',explode(',',$valor))
        ];
        $request->session()->push('produtos', $array);
        foreach($request->session()->get('produtos') as $row){
            $total = $total + ($row['valor'] * $row['quantidade']); 
        }

        return $total;
    }

    public function flush_session(Request $request){
        $request->session()->flush();

        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Inicia a transação do BD
        DB::transaction(function(){
            //Armazena os dados da compra em geral
            DB::table('compra')->create([
                '_method' => $request->input('_method'),
                '_token' => $request->input('_token'),
                'nota_fiscal' => $request->input('nota_fiscal'),
                'data_compra' => $request->input('data_compra'),
                'valor_total' => $request->input('valor_total')
            ]);
    
            foreach($request->session()->get('produtos') as $row){
                //Armazena os dados da compra de cada um produto
                $compraProduto = ComprasDeProdutos::create([
                    '_method' => $request->input('_method'),
                    '_token' => $request->input('_token'),
                    'compra_id' => DB::getPdo()->lastInsertId(),
                    'produto_id' => $row['id'],
                    'valor_custo' => $row['valor'],
                ]);
    
                //Atualiza a quantidade de itens do produto no estoque
                $produto = Produto::findOrFail($row['id']);
                $produto->quantidade = $produto->quantidade + $row['quantidade'];
                $produto->save();
            }
        }, 5);


        // $compraProduto = ComprasDeProdutos::create([
        //     '_method' => $request->input('_method'),
        //     '_token' => $request->input('_token'),
        //     'quantidade' => $request->input('quantidade'),
        //     'valor_custo' => $request->input('valor_custo'),
        //     '_token' => $request->input('_token'),
        // ]);
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
