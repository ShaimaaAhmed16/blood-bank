<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'password', 'email', 'date_birth', 'pin_code', 'last_donation_date', 'blood_type_id', 'city_id','api_token');

    public function donation_requests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function client_governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function client_notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function client_posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function tokens(){
        return $this->hasMany('App\Models\Token');
    }

    protected $hidden = [
        'password','api_token',
    ];
}