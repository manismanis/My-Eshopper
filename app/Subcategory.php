<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $primaryKey = 'subcat_id';

    protected $fillable = ['subcat_name','cat_id'];

    public function category(){
        return $this->belongsTo('App\Category','cat_id');
    }
}
