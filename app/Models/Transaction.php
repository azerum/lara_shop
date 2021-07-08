<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transaction extends Model
{
    use HasFactory;

    public const STATUS_COMPLETED = 0;
    public const STATUS_CANCELED = 1;
    public const STATUS_ARCHIVED = 2;

    public const PAYMENT_TYPE_CASH = 0;
    public const PAYMENT_TYPE_BANK_CARD = 1;

    protected $fillable = [
        'status',
        'payment_type',
        'executed_at',
        'order_id'
    ];

    protected $casts = [
        'executed_at' => 'datetime'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
