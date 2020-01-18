<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public function clients(){
        return $this->belongsTo('App\Models\Client');
    }
}
