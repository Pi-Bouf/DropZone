<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function etapes()
    {
        return $this->hasMany('App\Etape');
    }

    public function cities()
    {
        return $this->hasManyThrough('App\Ville', 'App\Etape', 'transport_id', 'id', 'ville_id')->where('etapes.transport_id', $this->id);
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