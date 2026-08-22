<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoR2Upload extends Model
{
    protected $table = 'video_r2_uploads';

    protected $fillable = [
        'url',
    ];
}