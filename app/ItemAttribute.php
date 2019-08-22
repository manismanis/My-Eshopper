<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    protected $fillable=[
        'item_id',
        'sku',
        'size',
        'color',
        'stock'
    ];

    public function items()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
