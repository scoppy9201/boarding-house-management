<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'status',
        'chutro_id',
        'category_id',
        'main_img',
        'list_img',
        'video_link',
        'price',
        'electric',
        'water',
        'area',
        'unit',
        'describe_room',
        'quantity',
        'add_ons',
        'latlng',
        'ward_id'
    ];
    public function CommentRoom()
    {
        return $this->hasMany(CommentRoom::class, 'rooms_id', 'id');
    }
    public function getBooking()
    {
        return $this->hasMany(BookingInformation::class, 'rooms_id', 'id');
    }
    public function CategoryRoom()
    {
        return $this->belongsTo(CategoryRoom::class, 'category_id', 'id');
    }
    public function getWard()
    {
        return $this->belongsTo(wards::class, 'ward_id', 'code');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'chutro_id', 'id');
    }
    public function scopeName($query, $request)
    {
        if (isset($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
            return $query;
        }
    }
    public function scopeCategory($query, $request)
    {
        if (isset($request->category_id)) {
            if ($request->category_id == "Tất cả" || $request->category_id == null) {
                return $query;
            }
            $query->where('category_id', $request->category_id);
        }
        return $query;
    }
    public function scopeDistrict($query, $request)
    {
        if (isset($request->district_input)) {
            if ($request->district_input== "Tất cả" || $request->district_input == null) {
                return $query;
            }
            $huyenName = $request->district_input;
            return $query->whereHas('getWard.getDistrict', function ($query) use ($huyenName) {
                $query->where('full_name', $huyenName);
            });
        }
        return $query;
    }
    public function scopeWard($query, $request)
    {
        if (isset($request->ward_id)) {
            if ($request->ward_id == "Tất cả" || $request->ward_id == null) {
                return $query;
            }
            $query->where('ward_id', $request->ward_id);
        }
        return $query;
    }
    public function ScopePrice($query, $request)
    {
        if (isset($request->price)) {
            $range = $request->price;
            if (!$range[0] && !$range[1])
                return $query;
            if ($range[0] && !$range[1]) {
                return $query
                    ->where('price', '>=', $range[0]);
            }
            if (!$range[0] && $range[1]) {
                return $query
                    ->where('price', '<=', $range[1]);
            }
            return $query
                ->whereBetween('price', $range);
        }
    }

    public function ScopeArea($query, $request)
    {
        if (isset($request->area)) {
            $range = $request->area;
            if (!$range[0] && !$range[1])
                return $query;
            if ($range[0] && !$range[1]) {
                return $query
                    ->where('area', '>=', $range[0]);
            }
            if (!$range[0] && $range[1]) {
                return $query
                    ->where('area', '<=', $range[1]);
            }
            return $query
                ->whereBetween('area', $range);
        }
    }
    public function ScopeAddons($query, $request)
    {
        if (isset($request->add_ons)) {
            $add_ons = $request->add_ons;
            foreach ($add_ons as $key => $value) {
                $query->where('add_ons', 'LIKE', '%' . $value . '%');
            }
            return $query;
        }
    }
}