<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expedition extends Model
{
  use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function villeDep()
    {
        return $this->belongsTo('App\Ville', "beginning_ville_id");
    }

    public function villeArr()
    {
        return $this->belongsTo('App\Ville', "ending_ville_id");
    }

    public function questionsExpedition()
    {
        return $this->hasMany('App\QuestionExpedition')->where('question_expedition_id', null);
    }

    public function demandeExpedition()
    {
      return $this->hasMany('App\DemandeExpedition');
    }

    public function demandeAccepte()
    {
        return $this->hasOne('App\DemandeExpedition')->where('isAccepted', 3);
    }

    public function notation(){
        return $this->hasOne('\App\NotationExpedition')->where('UserOrTransporter' , 0);
    }

    public function notationTransporter(){
        return $this->hasOne('\App\NotationExpedition')->where('UserOrTransporter' , 1);
    }

    public static function accepted() {
        return Expedition::where('isAccepted', true);
    }

    public static function waiting() {
        return Expedition::where('isAccepted', false);
    }
}

?>
