<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotationExpedition extends Model
{
    public function expedition() {
        return $this->belongsTo('\App\Expedition', 'expedition_id');
    }




}

?>