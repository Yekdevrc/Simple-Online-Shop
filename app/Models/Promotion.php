<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at'
        ];
    protected $fillable = [
        'title',
        'image'
    ];

    public function setImageAttribute($value)
    {
        if (!empty($value) && !is_string($value)){
            $this->attributes['image']=$value->store('Promotions', 'public');
        }
    }

    public function getImageUrlAttribute(): string
    {
        return $this->attributes['image']
            ? Storage::disk('public')->url($this->attributes['image'])
            : 'image';
    }
}
