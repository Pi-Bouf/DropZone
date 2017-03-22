<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemandeExpedition extends Model
{
  use SoftDeletes;
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function expedition() {
        return $this->belongsTo('\App\Expedition');
    }


}

?>
