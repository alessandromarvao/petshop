@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <table class="table" id="tb-produtos">
            <thead>
                <tr>
                    <th>Quantidade</th>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Tamanho</th>
                    <th>Valor</th>
                </tr>
            </thead>
        </table>
        <a href="{{ route('produto.create') }}" class="btn btn-default">Adicionar</a>
    </div>
</div>
@stop

@push('scripts')
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#tb-produtos').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://localhost/produto/get_datatable',
                columns : [
                    {data: 'quantidade'},
                    {data: 'nome'},
                    {data: 'tipo'},
                    {data: 'tamanho'},
                    {data: 'valor_venda'}
                ]
            });
        });
    </script>
@endpush

