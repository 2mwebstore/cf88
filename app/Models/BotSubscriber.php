<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotSubscriber extends Model
{
    protected $fillable = [ 'bot_id', 'token', 'chat_id', 'username', 'first_name', 'active' ];

    protected $casts = [
        'active' => 'boolean',
    ];
}