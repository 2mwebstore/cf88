<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $fillable = ['id','date','title','create_by','view','photo','photo1','photo2','photo3','photo4','photo5','photo6','photo7','photo8'
    ,'photo9','photo10','photo11','photo12','photo13',
    'detail','detail1','detail2','detail3','detail4','detail5','detail6','detail7','detail8','detail9','detail10','detail11','detail12','detail13'];
    public function create_name()
    {
        return $this->belongsTo(Create_by::class, 'create_by');
    }
}
