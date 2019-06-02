<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    protected $fillable=[
        'item_id',
        'sku',
        'size',
        'price',
        'stock'
    ];

    public function items()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
