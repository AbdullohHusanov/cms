<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
//    use HasRoles;

    protected $fillable = [
        'cname',
        'sname',
        'location',
        'state',
        'country',
        'address',
        'email',
        'organisation',
        'org_unit',
        'description',
        'job',
        'accounter',
        'status',
        'login',
        'inn',
        'pinfl',
        'passport_number',
        'phone',
        'localCode',
        'smsuid',
        'fix',
        'password',
        'comment',
        'operator_id',
        'branch_user_id',
        'iabsID',
        'fido_user_id',
        'fido_user_type_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
