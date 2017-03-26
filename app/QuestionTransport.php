<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionTransport extends Model
{
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function reponseAtQuestion(){
        return $this->hasMany('\App\QuestionTransport', 'question_transport_id');
    }

}

?>