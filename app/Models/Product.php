<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'price',
    ];

    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    protected function price() : Attribute {
        return Attribute::make(
            get: fn (string $value) => number_format($value),
        );
    }
}
