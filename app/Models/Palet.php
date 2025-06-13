<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palet extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_boxes', 'meta', 'truck_id', 'vendor_palet_id', 'label',
        'user_id', 'order_id', 'type', 'version', 'area_id'
    ];
    
    protected $casts = [
        'type' => 'string', // enum
        'meta' => 'array'
    ];
    
    public $timestamps = true;
    
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
    
    public function activities()
    {
        return $this->hasMany(PaletActivity::class);
    }
}