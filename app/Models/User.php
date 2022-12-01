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
        'name',
        'email',
        'password',
        'username',
        'phone'
    ];

    protected static function booted()
    {
        // static::observe(CartObserver::class);

        static::creating(function(User $user){
            $user->type = 'user';

        });



    }

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

    public function profile(){
        return $this->hasOne(Profile::class,'user_id','id')->withDefault();
    }

    public function subMetUser()
    {
        return $this->hasMany(Review::class);
    }

    public function favouritesProducts()
    {
        return $this->belongsToMany(Product::class,'favourites');
    }

    public function hasAbility($ability)
    {
        foreach ($this->roles as $role) {
            if (in_array($ability, $role->abilities)) {
                return true;
            }
        }

        return false;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
