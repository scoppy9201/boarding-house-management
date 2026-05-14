<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingField extends Model
{
    use HasFactory;
    protected $table = 'setting_fields';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'content',
       
    ];
}
