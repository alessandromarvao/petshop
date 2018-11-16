<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendasDeProdutos extends Model
{
    //Informa que as chaves primárias não são do tipo autoincrementável
    public $incrementing = false;

    //Seta as chaves primárias
    public $primaryKey = ['venda_id', 'produto_id'];

    //Exclui as colunas 'created_at' e 'updated_at', padrões do Laravel
    public $timestamps = false;

    //Variável que recebe as colunas da tabela. Muito útil para os métodos INSERT e UPDATE pelo Laravel.
    protected $fillable = [
        'quantidade',
        'valor_venda'
    ];
}
