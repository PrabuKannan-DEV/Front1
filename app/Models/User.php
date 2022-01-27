<?php

namespace App\Models;

use App\Models\Enrollment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
    ];
    public function deposit($scheme_id)
    {   
        $scheme = Scheme::find($scheme_id);
        $enrollment =$this->enrollments()->create(
            ['scheme_id'=>$scheme_id,
             'deposit_date'=>Carbon::now(),
            'maturity_date'=>Carbon::now()->addMonths($scheme->duration),
    ]);
        return $enrollment;
    }
    public function  withdraw($scheme_id)
    {   
        return $this->enrollments()->where('scheme_id', $scheme_id)->update(['status'=>'inactive']);
    }
    
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
