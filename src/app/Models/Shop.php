<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'area_id', 'genre_id', 'description', 'image_path'];


    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

     public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function scopeCategorySearchArea($query, $area_id)
    {
    if (!empty($area_id)) {
        $query->where('area_id', $area_id);
    }
    }

    public function scopeCategorySearchGenre($query, $genre_id)
    {
    if (!empty($genre_id)) {
        $query->where('genre_id', $genre_id);
    }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
    if (!empty($keyword)) {
        $query->where('name', 'like', '%' . $keyword . '%');
    }
    }

}
