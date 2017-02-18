<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    public function scopeDefault() {
        return $this->where('isDefault', true);
    }
}

?>