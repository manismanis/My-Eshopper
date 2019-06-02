<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['cat_name'];

    public function subcategory(){
        return $this->hasMany('App\Subcategory','cat_id','id'); // id chai Category table kai ho
                                                                                          //items ko dropdown menu ma along with Category dekhauna 'hasMany' gareko..

    }


}
