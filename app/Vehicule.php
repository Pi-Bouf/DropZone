<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicule extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function vehiculetype() {
        return $this->belongsTo('App\VehiculeType', 'vehicule_type_id');
    }
    
    public function scopeDefault() {
        return $this->where('isDefault', true);
    }

    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function inTransports() {
        return $this->hasMany('App\Transport');
    }
}

?>