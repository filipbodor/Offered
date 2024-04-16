<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'rating', 'category_id', 'subcategory_id', 'location_id', 'price', 'price_type'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function category()
    {
        return $this->belongsTo(Location::class, 'category_id');
    }

    public function favoriteAdvertisements()
    {
        return $this->hasMany(FavoriteAdvertisement::class);
    }
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorite_advertisements')->withTimestamps();
    }

    public function services()
    {
        return $this->hasMany(AdvertisementService::class);
    }


}
