<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotationExpedition extends Model
{
    public function expedition() {
        return $this->hasone('\App\Expedition');
    }

    public function monExpedition() {
        return $this->hasOne('\App\Expedition', 'id');
    }


}

?>