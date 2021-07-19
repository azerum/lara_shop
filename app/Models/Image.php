<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

/**
 * @property-read int $id
 * @property string $title
 * @property int $file_id
 * @property File $file
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'file_id',
        'album_id'
    ];

    protected $hidden = [
        'file_id',
        'album_id',
        'file'
    ];

    protected $appends = [
        'src'
    ];

    public function getSrcAttribute(): string
    {
        return Storage::url($this->file->path);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function file(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'file_id');
    }
}
