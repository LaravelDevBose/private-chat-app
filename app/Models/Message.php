<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table= 'messages';

    protected $primaryKey='message_id';
    protected $fillable = [
        'session_id',
        'content'
    ];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'message_id', 'message_id');
    }
}
