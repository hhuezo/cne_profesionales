<?php

namespace App\Models;

use App\Models\catalogo\Perfil;
use App\Models\catalogo\Profesion;
use App\Models\catalogo\Sector;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    public $timestamps = true;

    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'active',
        'remember_token',
        'VerificationToken',
        'sector',
        'otro_sector',
        'ocupacion',
        'otra_ocupacion'
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

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'Usuario');
    }

    public function profesion()
    {
        return $this->hasOne(Profesion::class, 'ocupacion');
    }

    public function sector()
    {
        return $this->hasOne(Sector::class, 'sector');
    }

    public function user_has_role()
    {
        return $this->belongsToMany(Role::class,'model_has_roles','model_id');
    }
}
