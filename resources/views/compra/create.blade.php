@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <h2>Registrar Compra</h2>
        <hr>
        <form action="{{ route('compra.store') }}" method="POST" class="form-group">
            {!! csrf_field() !!}
            <div class="col-md-6">
                <label for="nota_fiscal">Número da nota fiscal:</label>
                <input type="text" name="nota_fiscal" id="nota_fiscal" class="form-control" autofocus required>
                <br>
                <label for="data_compra">Data da compra:</label>
                <input type="date" name="data_compra" id="data_compra" class="form-control" required>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="cod_barras">Código de barras do produto:</label>
                        <input type="text" name="cod_barras" id="cod_barras" class="form-control" onblur="get_produto()">
                    </div>
                    <div class="col-md-2">
                        <label for="quantidade">Qtde.:</label>
                        <input type="text" name="quantidade" id="quantidade" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="valor_custo">Valor unitário:</label>
                        <input type="text" name="valor_custo" id="valor_custo" class="form-control">
                    </div>
                </div>
                <br>
                <label for="nome">Descrição:</label>
                <div class="input-group">
                    <input type="text" name="nome" id="nome" class="form-control" disabled>
                    <span class="input-group-btn">
                        <input type="button" value="Clique aqui para adicionar" id="btn-enviar" class="btn btn-default" onclick="add_produto('../compras_de_produtos/set_session/')">
                    </span>
                </div>
                <input type="text" name="id" id="id" class="hidden">
                <br>
                <label for="valor_total">Valor total da compra:</label>
                <input type="text" name="valor_total" id="valor_total" class="form-control" readonly>
                <br>
                <input type="submit" value="Enviar" class="btn btn-default btn-lg">
            </div>
        </form>
        <div class="col-md-6">
            <table class="table" id="tb-produtos">
                <thead>
                    <tr>
                        <th>Cód. de Barras</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script src="/js/ajax.js"></script>
<script>
    //Limpa sessão ao fechar a página
    window.onload = function() {
        $.get('/compras_de_produtos/flush');
        alert('ok');
    };
</script>
@endpush