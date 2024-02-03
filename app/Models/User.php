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
        'password' => 'hashed',
    ];

    // Compare this snippet from job-site\app\Models\Role.php:
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Compare this snippet from job-site\app\Http\Middleware\VerifyCsrfToken.php:
    public function hasRole($role)
    {
        return $this->role->name === $role;
    }

    // Compare this snippet from job-site\app\Models\Job.php:
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    // Compare this snippet from job-site\app\Models\JobApplication.php:
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
    
    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

}
