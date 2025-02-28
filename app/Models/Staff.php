<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = "staff" ;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     //protected $guarded = [];

    protected $primaryKey = 'staff_id'; 
    protected $fillable = [ 
        'staff_id',
        'name',
        'phone',
        'address',
        'birthday',
        'acc_status',
        'register_date',
        'role',
        'email',
        'password',
        'start_date',
        'end_date',
        'department',
        'picture'
        //'email_verified'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}