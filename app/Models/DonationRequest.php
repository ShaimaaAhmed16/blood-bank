<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'notes', 'age', 'bags_number', 'hospital_name', 'hospital_address', 'latitude', 'longitude', 'city_id', 'blood_type_id', 'client_id');

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }


}