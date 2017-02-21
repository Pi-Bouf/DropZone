<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    public function scopeDefault() {
        return $this->where('isDefault', true);
    }
}

?>