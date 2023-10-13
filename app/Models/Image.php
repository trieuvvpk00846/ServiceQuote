<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ["name", "extension", "product_id"];

    protected $visible = ["product_images"];

    protected $touches = ['product'];

    /**
     * Get the product that owns the phone.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function productImages(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => "/products/images/".$attributes['name'],
        );
    }
}
