<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'login',
        'email',
        'telephone',
        'department',
        'cpf',
        'date_of_birth',
        'password',
        'group_id',
        'deleted_at'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];

 
 
    function Group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    function Called() {
        return $this->hasMany('App\Models\Admin\Calleds\Called', 'user_id');
    }

    function ResponsibleForTheProduct() {
        return $this->hasMany('App\Models\Admin\Calleds\ResponsibleForTheProduct', 'user_id');
    }

    function Client() {
        return $this->hasMany('App\Models\Admin\Calleds\Client', 'user_id');
    }
}