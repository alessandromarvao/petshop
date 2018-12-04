@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <h2>Produto - <small>Novo</small></h2>
        <hr>
        <form action="{{ route('produto.store') }}" method="POST" class="form-group">
            {!! csrf_field() !!}
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" autofocus >
            <br>
            <label for="tipo">TIpo de produto:</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="Produto para cão">Produto para cão</option>
                <option value="Produto para gato">Produto para gato</option>
            </select>
            <br>
            <label for="tamanho">Tamanho da embalagem:</label>
            <select name="tamanho" id="tamanho" class="form-control">
                <option value="Pequeno">Pequeno</option>
                <option value="Médio">Médio</option>
                <option value="Grande">Grande</option>
            </select>
            <br>
            <label for="validade">Data de vencimento:</label>
            <input type="date" name="validade" id="validade" class="form-control">
            <br>
            <label for="quantidade">Quantidade em estoque:</label>
            <input type="text" name="quantidade" id="quantidade" class="form-control">
            <br>
            <label for="cod_barras">Código de Barras:</label>
            <input type="text" name="cod_barras" id="cod_barras" class="form-control">
            <br>
            <label for="valor_venda">Preço:</label>
            <input type="text" name="valor_venda" id="valor_venda" class="form-control">
            <br>
            <input type="submit" value="Enviar" class="btn btn-default btn-lg">
            <hr>
        </form>
    </div>
</div>
@stop