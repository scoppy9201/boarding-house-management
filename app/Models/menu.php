<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'location',
        'parent_id'
    ];
    public function Childs()
    {
        return $this->hasMany(menu::class,'parent_id','id');
    }
}
