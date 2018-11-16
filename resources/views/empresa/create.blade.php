@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <h2>Cadastre aqui a sua empresa</h2>
        <hr>
        <form action="{{ route('empresa.store') }}" method="POST" class="form-group">
            {!! csrf_field() !!}
            <label for="razao_social">Razão Social:</label>
            <input type="text" name="razao_social" id="razao_social" class="form-control" autofocus >
            <br>
            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control">
            <br>
            <input type="submit" value="Enviar" class="btn btn-default btn-lg">
            <hr>
        </form>
    </div>
</div>
@stop