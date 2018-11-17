<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //Exclui as colunas 'created_at' e 'updated_at', padrões do Laravel
    public $timestamps = false;

    //Variável que recebe as colunas da tabela. Muito útil para os métodos INSERT e UPDATE pelo Laravel.
    protected $fillable = [
        'nome',
        'tamanho',
        'tipo',
        'quantidade',
        'cod_barras',
        'valor_venda'
    ];

    //Aponta para o relacionamento M:N entre Compras e Produtos
    public function compra(){
        return $this->belongsToMany('App\Compra', 'compras_has_produtos');
    }

    //Aponta para o relacionamento M:N entre Vendas e Produtos
    public function venda(){
        return $this->belongsToMany('App\Venda', 'vendas_has_produtos');
    }
}
