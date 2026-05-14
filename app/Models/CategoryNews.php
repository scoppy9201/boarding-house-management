<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    use HasFactory;
    protected $table = 'category_news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'description',
        'slug'
    ];
    
    public function getNews()
    {
        return $this->hasMany(News::class,'category_id','id');
    }
}
