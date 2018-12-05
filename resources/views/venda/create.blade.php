@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <h2>Registrar Venda</h2>
        <hr>
        <form action="{{ route('venda.store') }}" method="POST" class="form-group">
            {!! csrf_field() !!}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="cod_barras">Código de barras do produto:</label>
                        <input type="text" name="cod_barras" id="cod_barras" class="form-control" onblur="get_produto('venda')">
                    </div>
                    <div class="col-md-2">
                        <label for="quantidade">Qtde.:</label>
                        <input type="text" name="quantidade" id="quantidade" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="valor">Valor unitário:</label>
                        <input type="text" name="valor" id="valor" class="form-control" disabled>
                    </div>
                </div>
                <br>
                <label for="nome">Descrição:</label>
                <div class="input-group">
                    <input type="text" name="nome" id="nome" class="form-control" disabled>
                    <span class="input-group-btn">
                        <input type="button" value="Clique aqui para adicionar" id="btn-enviar" class="btn btn-default" onclick="add_produto('../vendas_de_produtos/set_session/')">
                    </span>
                </div>
                <input type="text" name="id" id="id" class="hidden">
                <br>
                <label for="valor_total">Valor total da venda:</label>
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
    };
</script>
@endpush