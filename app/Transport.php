<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Transport extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule');
    }

    public function etapes()
    {
        return $this->hasMany('App\Etape');
    }
    
    public function villeDepart()
    {
        return $this->hasOne('App\Etape')->where('ville_position', 1);
    }

    public function villeArrivee()
    {
        return $this->hasOne('App\Etape')->where('ville_position', 7);
    }
}

?>