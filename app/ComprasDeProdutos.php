<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComprasDeProdutos extends Model
{
    //Identifica a tabela no banco de dados
    protected $table = 'compras_has_produtos';

    //Informa que as chaves primárias não são do tipo autoincrementável
    public $incrementing = false;
    
    //Seta as chaves primárias
    public $primaryKey = ['compra_id', 'produto_id'];

    //Exclui as colunas 'created_at' e 'updated_at', padrões do Laravel
    public $timestamps = false;

    //Variável que recebe as colunas da tabela. Muito útil para os métodos INSERT e UPDATE pelo Laravel.
    protected $fillable = [
        'compra_id',
        'produto_id',
        'quantidade',
        'valor_custo',
        'data_vencimento'
    ];
}
