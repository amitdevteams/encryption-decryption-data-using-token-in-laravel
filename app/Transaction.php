<?php

namespace App;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;


class Transaction extends Model
{
    // for using data encrypt 

    // protected $table = 'card_name','card_no','exp_month','cvv','token';
    protected $fillable =['name','email','address','city','token'];
    
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Crypt::encryptString($value);
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = Crypt::encryptString($value);
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = Crypt::encryptString($value);
    }

    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = Crypt::encryptString($value);
    }

    // for decrypt data using

    // public function getCardNoAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     }catch(\Exception $e){
    //         return $value;
    //     }
    // }

    // public function getExpMonthAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     }catch(\Exception $e){
    //         return $value;
    //     }
    // }
    // public function getCvvAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     }catch(\Exception $e){
    //         return $value;
    //     }
    // }
    // public function getCardNameAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     }catch(\Exception $e){
    //         return $value;
    //     }
    // }
    // public function getTokenAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     }catch(\Exception $e){
    //         return $value;
    //     }
    // }

    
}
