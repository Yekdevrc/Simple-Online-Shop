<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class OfficeSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at'
        ];
    protected $fillable = [
        'title' 	,
        'email' ,
        'logo' 	,
        'background_image' ,
        'google_map' ,
        'phone' ,
        'website' ,
        'facebook_link' ,
        'introduction'
    ];

    public function setLogoAttribute($value)
    {
        if (!empty($value) && !is_string($value)){
            $this->attributes['logo']=$value->store('OfficeSetting', 'public');
        }
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->attributes['logo']
            ? Storage::disk('public')->url($this->attributes['logo'])
            : '';
    }

    public function setBackgroundImageAttribute($value)
    {
        if (!empty($value) && !is_string($value)){
            $this->attributes['background_image']=$value->store('OfficeSetting', 'public');
        }
    }

    public function getBackgroundImageUrlAttribute(): string
    {
        return $this->attributes['background_image']
            ? Storage::disk('public')->url($this->attributes['background_image'])
            : '';
    }
}
