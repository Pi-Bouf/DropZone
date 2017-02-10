<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    public function type() {
        return $this->belongTo('App\Vehicule_Type');
    }
}

?>