@extends('default')

@section('content')
<div class="panel central">
    <div class="panel-body">
        <h2>Compras</h2>
        <hr>
        <table class="table" id="tb-compras">
            <thead>
                <tr>
                    <th>Nota Fiscal</th>
                    <th>Data de Compra</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
        </table>
        <hr>
        <a href="{{ route('compra.create') }}" class="btn btn-default">Registrar Compra</a>
    </div>
</div>
@stop

@push('scripts')
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#tb-compras').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://localhost/compra/get_datatable',
                columns : [
                    {data: 'nota_fiscal'},
                    {data: 'data_compra'},
                    {data: 'valor_total'}
                ]
            });
        });
    </script>
@endpush

