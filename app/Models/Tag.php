<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color'];
    
    public $timestamps = true;
    
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_tags');
    }
    
    public function dhcpOrders()
    {
        return $this->belongsToMany(DhcpOrder::class, 'dhcp_order_tags');
    }
}