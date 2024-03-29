<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
  use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule');
    }

    public function etapes()
    {
        return $this->hasMany('App\Etape')->orderBy('ville_position', 'ASC');
    }

    public function questionsTransport()
    {
        return $this->hasMany('App\QuestionTransport')->where('question_transport_id', null);
    }


    public function demandesTransport()
    {
        return $this->hasMany('App\DemandeTransport')->orderBy('isAccepted', 'DESC');
    }

    public function demandesTransportAccepted()
    {
        return $this->hasMany('App\DemandeTransport')->where('isAccepted', true);
    }

    public function villeDepart()
    {
        return $this->hasOne('App\Etape')->where('ville_position', 1);
    }

    public function villeArrivee()
    {
        return $this->hasOne('App\Etape')->where('ville_position', 7);
    }

    public static function waiting() {
        return Transport::where('beginningDate', '>', date( 'Y-m-d H:i:s'))
        ->orWhere('regularyEndingDate', '>', date( 'Y-m-d H:i:s'))->get();
    }

    public static function OK() {
        return Transport::where('beginningDate', '<', date( 'Y-m-d H:i:s'))
        ->orWhere('regularyEndingDate', '<', date( 'Y-m-d H:i:s'))->get();
    }

    public static function ponctuel() {
        return Transport::where('natureTransport', false);
    }

    public static function regulier() {
        return Transport::where('natureTransport', true);
    }
}

?>
