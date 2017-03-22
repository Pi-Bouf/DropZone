<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemandeTransport extends Model
{
  use SoftDeletes;

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
