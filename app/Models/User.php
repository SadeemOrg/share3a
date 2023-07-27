<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\Select;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles'
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
        // 'role' => 'roles',
    ];

    public function userrole()
    {
        return $this->roles;
    }

    public function usepermission()
    {
        return $this->permission;
    }


    public function addedby()
    {
        return $this->belongsTo('App\Models\user','added_by');
    }
    public function role()
    {
        return $this->belongsTo('App\Models\user','roles');
    }
    public function useradd()
    {
        return $this->hasMany('App\Models\user','added_by');
    }
    public function Forms()
    {
        return $this->hasMany('App\Models\Form','added_by');
    }
    public function leadingform()
    {

        $forms= FormUser::where(['user_id'=>Auth::id()])->Select('id')->pluck('id')->toArray();

        return $forms;
    }
}
