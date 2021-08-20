<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'product_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
