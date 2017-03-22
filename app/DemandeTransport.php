<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandeTransport extends Model
{
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function transport() {
        return $this->belongsTo('\App\Transport');
    }

    public function notation(){
        return $this->hasOne('\App\NotationTransport')->where('UserOrTransporter' , 1);
    }
}

?>