<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'title',
        'price',
        'image',
        'discount_id',
        'brand_id',
        'category_id'
    ];


    public function setImageAttribute($value)
    {
        if (!empty($value) && !is_string($value)){
            $this->attributes['image']=$value->store('Product/Item', 'public');
        }
    }

    public function getImageUrlAttribute(): string
    {
        return $this->attributes['image']
            ? Storage::disk('public')->url($this->attributes['image'])
            : '';
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
