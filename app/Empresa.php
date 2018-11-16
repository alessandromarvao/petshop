<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //Exclui as colunas 'created_at' e 'updated_at', padrões do Laravel
    public $timestamps = false;

    //Variável que recebe as colunas da tabela. Muito útil para os métodos INSERT e UPDATE pelo Laravel.
    protected $fillable = [
        'razao_social',
        'cnpj'
    ];

    //Aponta o relacionamento de 1:M entre as tabelas Empresas e Compras (Uma empresa possui várias compras)
    public function compra(){
        return $this->hasMany('App\Compra');
    }

    //Aponta o relacionamento de 1:M entre as tabelas Empresas e Vendas (Uma empresa possui várias vendas)
    public function venda(){
        return $this->hasMany('App\Venda');
    }
}
