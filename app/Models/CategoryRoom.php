<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRoom extends Model
{
    use HasFactory;
    protected $table = 'category_rooms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name'
    ];
    public function getRoom()
    {
        return $this->hasMany(Room::class,'category_id','id');
    }
   
}
