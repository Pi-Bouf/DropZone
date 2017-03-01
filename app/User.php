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
        'lastName', 'firstName', 'login', 'birthday', 'email', 'password',
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
        ->where('beginningDate', '>', date( 'Y-m-d H:i:s'))
        ->orWhere('regularyEndingDate', '>', date( 'Y-m-d H:i:s'));

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
        ->where('beginningDate', '<', date( 'Y-m-d H:i:s'))
        ->orWhere('regularyEndingDate', '<', date( 'Y-m-d H:i:s'));
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
}
