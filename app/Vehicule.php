<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    public function vehiculetype() {
        return $this->belongsTo('App\VehiculeType', 'vehicule_type_id');
    }
    
    public function scopeDefault() {
        return $this->where('isDefault', true);
    }

    public function user() {
        return $this->belongsTo('\App\User');
    }
}

?>