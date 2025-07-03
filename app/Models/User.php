<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'user_status',
        'surname',
        'first_name',
        'other_name',
        'address',
        'mobile_no',
        'gender',
        'dob',
        'mobile_no1',
        'interest',
        'interest_fashion',
        'current_stage',
        'instagram',
        'facebook',
        'snapchat',
        'twitter',
        'occupation',
        'qst1',
        'qst2',
        'qst3',
        'if_yes_qst2',
        'image',
        'reg_date',
        'email_verified_at',
        'user_type',
        'login_attempts',
        'email_verified_status',
        'remember_token',
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
}
