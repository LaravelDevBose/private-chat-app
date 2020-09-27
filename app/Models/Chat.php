<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    Const Type = [
        'Sender'=>0,
        'Receiver'=>1
    ];

    protected $table='chats';
    protected $primaryKey='chat_id';

    protected $fillable = [
        'session_id',
        'message_id',
        'user_id',
        'user_type',
        'chat_status',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id', 'message_id');
    }
}
