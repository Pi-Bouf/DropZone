<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastName', 'firstName', 'login', 'birthday', 'email', 'password', 'facebook_id', 'picLink'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vehicules() {
        return $this->hasMany('App\Vehicule')->orderBy('isDefault', 'desc');
    }

    public function vehiculeDefault() {
        return $this->hasOne('App\Vehicule')->where('isDefault', true);
    }

    public function transports() {
        return $this->hasMany('App\Transport');
    }

    public function transportsWaiting() {
        return $this->hasMany('App\Transport')
        ->where('beginningDate', '>=', date( 'Y-m-d 00:00:00'))
        ->orWhere('regularyEndingDate', '>=', date( 'Y-m-d 00:00:00'))
        ->where('user_id', $this->id);

        /* ############ On pose ça là, au cas où
        ->where(function ($query) {
            $query->where('natureTransport', 0)
            ->where('beginningDate', '>', date( 'Y-m-d H:i:s'));
        })
        ->orWhere(function ($query) {
            $query->where('natureTransport', 1)
            ->where('regularyEndingDate', '>', date( 'Y-m-d H:i:s'));
        }); */
    }

    public function transportsOK() {
        return $this->hasMany('App\Transport')
        ->where('beginningDate', '<', date( 'Y-m-d 00:00:00'))
        ->orWhere('regularyEndingDate', '<', date( 'Y-m-d 00:00:00'))
        ->where('user_id', $this->id);
    }

    public function expeditions() {
        return $this->hasMany('App\Expedition');
    }

    public function default_vehicule(){
      return $this->hasOne('App\Vehicule')->where('isDefault', 1);
    }

    public function scopeChecked() {
        return $this->where('isChecked', true);
    }

    public function scopeNotChecked() {
        return $this->where('isChecked', false);
    }

    public function scopeBanned() {
        return $this->where('isBanned', true);
    }

    public function noteTransport(){
        return $this->hasMany('App\NotationTransport');
    }

    public function noteExpedition(){
        return $this->hasMany('App\NotationExpedition');
    }

    public function demandesExpedition(){
        return $this->hasMany('App\DemandeExpedition');
    }

    public function demandesTransport(){
        return $this->hasMany('App\DemandeTransport');
    }

    public function nbNotes() {
        $nbNote = $this->noteTransport->count();
        $nbNote += $this->noteExpedition->count();

        return $nbNote;
    }

    public function note() {

        $totalNote = $this->noteTransport->sum('note');
        $totalNote += $this->noteExpedition->sum('note');
        $nbNote = $this->nbNotes();
        if($nbNote > 0) {
            $note =  round($totalNote / $nbNote, 2);
        } else {
            $note = '';
        }

        return $note;
    }
}
