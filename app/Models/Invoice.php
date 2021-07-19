<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property Carbon $raised_at
 * @property int $total_amount
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Invoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'raised_at',
        'total_amount'
    ];

    protected $casts = [
        'raised_at' => 'datetime'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
