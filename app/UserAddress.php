<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'user_addresses';

    // * The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'name',
        'phone_no',
        'add1',
        'add2',
        'add3',
        'add4',
        'isPreferred',
    ];

    //--- Users
    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    //-- Addresses by User ID
    public static function GetUserAddressList($userID)
    {
        return UserAddress::all()->where('user_id', $userID);
    }

    //-- Preferred Address by User ID
    public static function GetUserPreferredAddress($userID)
    {
        return UserAddress::all()->where('user_id', $userID)->where('isPreferred', 1)->first();
    }

    //-- User Address by User ID
    public static function GetUserAddressById($id)
    {
        return UserAddress::all()->where('id', $id)->first();
    }
}
