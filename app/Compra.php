<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //Exclui as colunas 'created_at' e 'updated_at', padrões do Laravel
    public $timestamps = false;
    
    //Variável que recebe as colunas da tabela. Muito útil para os métodos INSERT e UPDATE pelo Laravel.
    protected $fillable = [
        'empresa_id',
        'nota_fiscal',
        'data_compra',
        'valor_total'
    ];

    //Aponta para o relacionamento entre esta e a tabela Empresas (chave estrangeira)
    //Por padrão, o Laravel reconhece a chave estrangeira empresa_id. Caso a coluna tivesse outro nome, teria que citar qual a coluna é a chave estrangeira 
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

    //Aponta para o relacionamento entre esta e a tabela Produtos.
    //Como este é um relacionamento M:N, utilizamos o método BelongToMany.
    //Por padrão, o Laravel reconhece a tabela de junção dos relacionamentos M:N como juntas e por ordem alfabética (Nesse caso, seria compra_produto). 
    //Como a tabela criada tem o nome diferente do padrão, temos que apontar para a tabela de ligação (compras_has_produtos)
    public function produto(){
        return $this->belongsToMany('App\Produto', 'compras_has_produtos');
    }
}
