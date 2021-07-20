<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property-read int $id
 * @property string $slug
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'slug'
    ];
}
