<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public static function pluck($id)
    {
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donations()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function client_boold_types()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}