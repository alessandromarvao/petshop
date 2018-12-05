@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <h2>Listar Vendas</h2>
        <hr>
        <table class="table" id="tb-vendas">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
        </table>
        <hr>
        <a href="{{ route('venda.create') }}" class="btn btn-default">Registrar Venda</a>
    </div>
</div>
@stop

@push('scripts')
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#tb-vendas').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://localhost/venda/get_datatable',
                columns : [
                    {data: 'id'},
                    {data: 'data'},
                    {data: 'valor_total'}
                ]
            });
        });
    </script>
@endpush

