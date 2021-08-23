<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function getUserAvatarAttribute() 
    {
        // dd($this->avatar);
        return File::exists($this->avatar) ? asset($this->avatar): asset('/images/lary-avatar.svg');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_author','author_id','user_id');
    }
    public function follow()
    {
        return $this->belongsToMany(User::class,'user_author','user_id','author_id');
    }
    public function bookmarks()
    {
        return $this->belongsToMany(Post::class,'user_post','user_id','post_id');
    }

}
