<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
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