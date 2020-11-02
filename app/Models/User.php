<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_id');
    }

    public function checkLevelRef()
    {
        $ref = \Cache::remember('user_' . $this->referred_id, 3600, function () {
            return User::find($this->referred_id);
        });

        for ($x=0; $x++<4;) {
            if ($ref->id == auth()->user()->id) {
                break;
            } else {
                $ref = \Cache::remember('user_' . $ref->referred_id, 3600, function () use ($ref) {
                    return User::find($ref->referred_id);
                });
            }

            if ($ref->id == auth()->user()->id && $x == 4) {
                return false;
            }
        }

        return true;
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
