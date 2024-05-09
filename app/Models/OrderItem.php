<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['digital_asset_id', 'order_id'];

    // orderItems belongTo order()
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // orderItem belongsTo digitalAsset
    public function digitalAsset()
    {
        return $this->belongsTo(DigitalAsset::class);
    }
}
