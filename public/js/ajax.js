

//Exibe a descrição do produto a partir do código de barras selecionado
function get_produto(){
    id_cod_barras = $('input[name=cod_barras]').val();
    if(id_cod_barras !== ''){
        $.get('/produto/' + id_cod_barras, function(produtos){
            $('input[name=nome]').val(produtos['data'][0]['nome']);
            $('input[name=id]').val(produtos['data'][0]['id']);       
        });
    }
}

function add_produto(link){
    var id = $('input[name=id]').val();
    var cod_barras = $('input[name=cod_barras]').val(); 
    var nome = $('input[name=nome]').val(); 
    var qtde = $('input[name=quantidade]').val();
    var valor = $('input[name=valor_custo]').val();

    $.get(link + id + '/' + qtde + '/' + valor, function(produto){
        var markup = "<tr><td>" + cod_barras + "</td><td>" + nome + "</td><td>" + qtde + "</td><td>" + valor + "</td><td>" + (qtde*valor)+ "</td></tr>";
        $("table tbody").append(markup);
        $('input[name=valor_total]').val(produto);
    });
    $('input[name=cod_barras]').val('');
    $('input[name=cod_barras]').focus();
    $('input[name=nome]').val('');
    $('input[name=valor_custo]').val('');
    $('input[name=quantidade]').val('');
}