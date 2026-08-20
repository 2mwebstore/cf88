<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;
    protected $table = 'highlight';
    protected $fillable = ['id','date','view','title','video','photo','detail','create_by'];
    public function create_name()
    {
        return $this->belongsTo(Create_by::class, 'create_by');
    }
}
