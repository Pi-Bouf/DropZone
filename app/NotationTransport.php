<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotationTransport extends Model
{
    public function demandeTransport() {
        return $this->belongsTo('\App\DemandeTransport', 'demande_transport_id');
    }
}

?>