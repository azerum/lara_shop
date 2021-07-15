<?php

namespace App\Models;

use App\Exceptions\InvalidModelAttributesException;
use App\Services\ValidationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property string $title
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title'
    ];

    /**
     * @throws InvalidModelAttributesException
     */
    public function save(array $options = []): bool
    {
        $values = $this->getAttributes();

        $rules = [
            'title' => 'required|string|max:64'
        ];

        ValidationService::throwIfInvalid($values, $rules);

        return parent::save($options);
    }

    /**
     * @throws InvalidModelAttributesException
     */
    public function update(array $attributes = [], array $options = []): bool
    {
        $rules = [
            'title' => 'sometimes|required|string|max:64'
        ];

        ValidationService::throwIfInvalid($attributes, $rules);

        return parent::update($attributes, $options);
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }
}
