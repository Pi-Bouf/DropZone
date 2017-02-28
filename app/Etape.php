<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    public function ville() {
        return $this->belongsTo('App\Ville');
    }
}

?>