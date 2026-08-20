<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    use HasFactory;

    protected $table = 'fights';

    protected $fillable = [
        'no',
        'red_fighter',
        'red_image',
        'red_score',
        'blue_fighter',
        'blue_image',
        'blue_score',
        'status',
        'category_id',
        'created_at',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}