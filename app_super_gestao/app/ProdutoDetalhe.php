<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = [
        'unidade_id',
        'comprimento',
        'altura',
        'largura',
        'produto_id',
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
