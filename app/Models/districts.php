<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $primaryKey = 'code';
    protected $fillable = [
        'name',
        'full_name',
        'code_name',
        'province_code'
    ];
    public function getwards()
    {
        return $this->hasMany(wards::class, 'district_code', 'code');
    }
}
