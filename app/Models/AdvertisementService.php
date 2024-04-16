<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementService extends Model
{
    use HasFactory;

    protected $fillable = ['advertisement_id', 'service_name', 'price'];

    /**
     * Get the advertisement that owns the service.
     */
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
