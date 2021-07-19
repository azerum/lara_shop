<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property-read int $id
 * @property string $full_name
 * @property string $email
 * @property string $phone_number
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
