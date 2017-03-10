<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function villeDep()
    {
        return $this->belongsTo('App\Ville', "beginning_ville_id");
    }

    public function villeArr()
    {
        return $this->belongsTo('App\Ville', "ending_ville_id");
    }
}

?>