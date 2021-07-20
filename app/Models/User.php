<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property-read int $id
 * @property string $full_name
 * @property string $email
 * @property string $phone_number
 * @property string $password_hash
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    use HasApiTokens;

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'password_hash',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
