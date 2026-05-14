<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title',
        'slug',
        'category_id',
        'author_id',
        'content',
        'short_content',
        'thumbnail',
        'key_words',
        'view',
        'status'
    ];
    public function getComment()
    {
        return $this->hasMany(CommentNews::class,'news_id','id');
    }
    public function CategoryNews()
    {
        return $this->belongsTo(CategoryNews::class, 'category_id', 'id');
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
    public function scopeTitle($query, $request)
    {
        if (isset($request->title)) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
            return $query;
        }
    }
    public function scopeCategory($query, $request)
    {
        if (isset($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }
        return $query;
    }
}
