<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['id_cliente'];

    public function produtos() {
        // return $this->belongsToMany(Produto::class, 'pedidos_produtos');
       
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at');
    }
}
