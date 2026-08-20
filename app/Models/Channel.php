<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    protected $table = 'channel';
    protected $fillable = ['id','date','view','title','category','video','photo','detail','create_by'];
    public function category_name()
    {
        return $this->belongsTo(Category::class, 'category');
    }
    public function create_name()
    {
        return $this->belongsTo(Create_by::class, 'create_by');
    }
}
