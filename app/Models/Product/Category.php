<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at'
        ];
    protected $fillable = [
        'title',
        'logo'
    ];

    public function setLogoAttribute($value)
    {
        if (!empty($value) && !is_string($value)){
            $this->attributes['logo']=$value->store('Product/Category', 'public');
        }
    }

    public function getLogoUrlAttribute(): string
    {
        return !empty($this->attributes['logo'])
            ? Storage::disk('public')->url($this->attributes['logo'])
            : '';
    }
}
