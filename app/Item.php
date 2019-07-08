<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['itemname', 'price', 'image', 'status', 'isFeatured', 'isRecommended', 'subcat_id', 'brand_id'];

    public function sub_category()
    {
        return $this->belongsTo('App\Subcategory', 'subcat_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }


//==============sidebarko subcategory bhitrako items count garnako lagi===========//
    public static function itemCountSubcat($subcat_id)
    {
        $subcatCount = Item::all()->where('subcat_id', $subcat_id)->count();
        return $subcatCount;
    }

//================brand bhitrako items count garnako lagi==========//
    public static function itemCountBrand($id)
    {
        $brandcount = Item::all()->where('brand_id', $id)->count();
        return $brandcount;

    }

//================ApplicationController ma use hunchha yo method=======//
    public function ItemAttribute()
    {
        return $this->hasMany('App\ItemAttribute','item_id','id');
    }
}
