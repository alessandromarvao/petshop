@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <h2>Registrar Compra</h2>
        <hr>
        <form action="{{ route('compra.store') }}" method="POST" class="form-group">
            {!! csrf_field() !!}
            <label for="nota_fiscal">Número da nota fiscal:</label>
            <input type="text" name="nota_fiscal" id="nota_fiscal" class="form-control" autofocus >
            <br>
            <label for="data_compra">Data da compra:</label>
            <input type="date" name="data_compra" id="data_compra" class="form-control">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="cod_barra">Código de barras do produto:</label>
                    <input type="text" name="cod_barra" id="cod_barra" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="quantidade">Quantidade:</label>
                    <input type="text" name="quantidade" id="quantidade" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="valor_custo">Valor cobrado:</label>
                    <input type="text" name="valor_custo" id="valor_custo" class="form-control">
                </div>
            </div>
            <br>
            <label for="nome">Descrição:</label>
            <div class="input-group">
                <input type="text" name="nome" id="nome" class="form-control" readonly>
                <span class="input-group-btn">
                    <input type="button" value="Clique aqui para adicionar" id="btn-enviar" class="btn btn-default">
                </span>
            </div>
            <br>
            <label for="valor_total">Valor total da compra:</label>
            <input type="text" name="valor_total" id="valor_total" class="form-control" readonly>
            <br>
            <input type="submit" value="Enviar" class="btn btn-default btn-lg">
            <hr>
        </form>
    </div>
</div>
@stop