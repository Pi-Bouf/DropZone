<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function scopeDefault() {
        return $this->where('isDefault', true);
    }
}

?>