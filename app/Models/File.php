<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $original_name
 * @property string $path
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name',
        'path'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
