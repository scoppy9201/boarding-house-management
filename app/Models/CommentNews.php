<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentNews extends Model
{
    use HasFactory;
    protected $table = 'comment_news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'news_id',
        'author_id',
        'content'
    ];
    public function getNews()
    {
        return $this->belongsTo(news::class, 'news_id', 'id');
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
