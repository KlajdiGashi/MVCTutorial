<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'phone_number', 'email'
    ];
    
    public $timestamps = true;
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function dhcpOrders()
    {
        return $this->hasMany(DhcpOrder::class);
    }
    
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    
    public function invoiceTrucks()
    {
        return $this->hasMany(Truck::class, 'invoice_company_id');
    }
    
    public function supplierTrucks()
    {
        return $this->hasMany(Truck::class, 'supplier_company_id');
    }
    
    public function fromDestinationPrices()
    {
        return $this->hasMany(TruckDestinationPrice::class, 'from_client_id');
    }
    
    public function toDestinationPrices()
    {
        return $this->hasMany(TruckDestinationPrice::class, 'to_client_id');
    }
}