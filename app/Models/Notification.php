<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'status',
        'link',
        'updated_at'
    ];
   
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
