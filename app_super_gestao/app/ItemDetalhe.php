<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';
    protected $fillable = [
        'unidade_id',
        'comprimento',
        'altura',
        'largura',
        'produto_id',
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'produto_id', 'id');
    }
}
