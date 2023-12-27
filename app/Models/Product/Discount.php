<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at'
        ];
    protected $fillable = [
        'title',
        'rate'
    ];
}
