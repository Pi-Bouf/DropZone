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

    public function transports() {
        return $this->hasMany('App\Transport');
    }

    public function expeditions() {
        return $this->hasMany('App\Expedition');
    }

    public function default_vehicule(){
      return $this->hasOne('App\Vehicule')->where('isDefault')->orderBy('desc');
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
