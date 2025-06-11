<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_box_id', 'label', 'user_id', 'total_modems', 'palet_id', 'type'
    ];
    
    protected $casts = [
        'type' => 'string' // enum
    ];
    
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function palet()
    {
        return $this->belongsTo(Palet::class);
    }
    
    public function modems()
    {
        return $this->hasMany(Modem::class);
    }
    
    public function activities()
    {
        return $this->hasMany(BoxActivity::class);
    }
    
    public function saleDevice()
    {
        return $this->hasOne(SaleDevice::class);
    }
}