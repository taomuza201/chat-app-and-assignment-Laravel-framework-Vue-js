<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = ['id'];

    protected $table = 'chats';
    protected $primaryKey = 'id';

    /**
     * Get the user that owns the chat.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
