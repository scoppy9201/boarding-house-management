<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentRoom extends Model
{
    use HasFactory;
    protected $table = 'comment_rooms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'rooms_id',
        'author_id',
        'content'
    ];
    public function getRoom()
    {
        return $this->belongsTo(Room::class, 'rooms_id', 'id');
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
