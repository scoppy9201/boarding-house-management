<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wards extends Model
{
    use HasFactory;
    protected $table = 'wards';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'code',
        'name',
        'full_name',
        'district_code'
    ];
    public function getDistrict()
    {
        return $this->belongsTo(districts::class, 'district_code', 'code');
    }
    public function getRoom()
    {
        return $this->hasMany(wards::class, 'ward_id', 'code');
    }
}
