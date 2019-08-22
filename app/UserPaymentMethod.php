<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    // * The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'payment_method_id',
        'payment_method_title',
        'payment_method_no',
        'payment_method_details',
        'isPreferred',
    ];

    //--- User
    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    //--- Payment Method
    public function PaymentMethod()
    {
        return $this->belongsTo('App\PaymentMethods', 'payment_method_id');
    }

    //-- Payment Options by User ID
    public static function GetUserPaymentOptionsList($userID){
        return UserPaymentMethod::all()->where('user_id', $userID);
    }
    //-- Preferred Payment Option by User ID
    public static function GetUserPreferredPaymentOption($userID){
        return UserPaymentMethod::all()->where('user_id', $userID)->where('isPreferred', 1)->first();
    }
    //-- Preferred Payment Option by User ID
    public static function GetUserPaymentOptionById($id){
        return UserPaymentMethod::all()->where('id', $id)->first();
    }

    //-- Payment Options by User ID
    public static function GetUserPreferredPayment($userID){
        return UserPaymentMethod::all()->where('user_id', $userID)->where('isPreferred', 1)->first();
    }
}
