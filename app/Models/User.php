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
    ];

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }

    public function userAchievements()
    {
        return $this->hasMany(UserAchievement::class);
    }

    public function userBadges()
    {
        return $this->hasMany(UserBadge::class);
    }

    public function userStudyPosts()
    {
        return $this->hasMany(UserStudyPost::class);
    }

    public function userRelations()
    {
        return $this->hasMany(UserRelation::class);
    }

    public function userActivities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function userStudySessions()
    {
        return $this->hasMany(UserStudySession::class);
    }
}
