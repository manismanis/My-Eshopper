<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    protected $table = 'primary_payment_methods';
    // * The attributes that are mass assignable.
    protected $fillable = [
        'title'
    ];
}
