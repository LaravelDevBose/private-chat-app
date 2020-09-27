<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $primaryKey = 'session_id';

    protected $fillable = [
        'user1_id',
        'user2_id',
        'status'
    ];


    public function chats()
    {
        return $this->hasManyThrough(
            Chat::class,
            Message::class,
            'session_id', // Frn Key og Messages table
            'message_id',  // frn key of chat table,
            'session_id', // local key of sessions table,
            'message_id' // local key of messages table
        );
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'session_id', 'session_id');
    }
}
