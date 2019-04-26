<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'no_ktp';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_ktp','username', 'fullname', 'email', 'password', 'telepon'
    ];

    /**
     * List id role user
     */
    const ROLE_SUPERADMIN = 0;
    const ROLE_KEPALA_DESA = 1;
    const ROLE_VALIDATOR = 2;
    const ROLE_STAFF = 3;
    const ROLE_LAPANGAN = 4;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Menjadikan user menjadi super admin
     */
    public function makeSuperAdmin(){
        $this->role = User::ROLE_SUPERADMIN;
        parent::save();
    }

    /**
     * Menjadikan user menjadi kepala desa
     */
    public function makeKepalaDesa(){
        $this->role = User::ROLE_KEPALA_DESA;
        parent::save();
    }

    /**
     * Menjadikan user menjadi validator
     */
    public function makeValidator(){
        $this->role = User::ROLE_VALIDATOR;
        parent::save();
    }

    /**
     * Menjadi user menjadi staff
     */
    public function makeStaff(){
        $this->role = User::ROLE_STAFF;
        parent::save();
    }

    /**
     * Menjadi user menjadi staff
     */
    public function makeLapangan(){
        $this->role = User::ROLE_LAPANGAN;
        parent::save();
    }

    /**
     * Apakah merupakan super admin
     * @return bool
     */
    public function isSuperAdmin(){
        return $this->role == User::ROLE_SUPERADMIN;
    }

    public function isKepalaDesa(){
        return $this->role == User::ROLE_KEPALA_DESA;
    }

    public function isValidator(){
        return $this->role == User::ROLE_VALIDATOR;
    }

    public function isStaff(){
        return $this->role == User::ROLE_STAFF;
    }

    public function isLapangan(){
        return $this->role == User::ROLE_LAPANGAN;
    }

    public function setActive(){
        $this->active=true;
        parent::save();
    }

    public function setInactive()
    {
        $this->active=false;
        parent::save();
    }

    public function log()
    {
        return $this->hasMany('App\Log');
    }
}
