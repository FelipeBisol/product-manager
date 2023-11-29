<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'attribute_id', 'value'];

    public function attribute(): HasMany
    {
        return $this->hasMany(Attribute::class, 'id', 'attribute_id');
    }

    public function attributes(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
