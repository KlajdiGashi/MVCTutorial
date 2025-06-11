<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'license_plate', 'user_id', 'type', 'cmr', 'invoice_no',
        'invoice_company_id', 'supplier_company_id', 'country_of_arrival',
        'departure_date', 'arrival_date', 'dud_no', 'transport_cost',
        'company_phone_no', 'driver_name', 'driver_phone_no', 'destination',
        'duration_of_arrival', 'regime'
    ];
    
    protected $casts = [
        'type' => 'string',
        'departure_date' => 'date',
        'arrival_date' => 'date'
    ];
    
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function invoiceCompany()
    {
        return $this->belongsTo(Client::class, 'invoice_company_id');
    }
    
    public function supplierCompany()
    {
        return $this->belongsTo(Client::class, 'supplier_company_id');
    }
    
    public function palets()
    {
        return $this->hasMany(Palet::class);
    }
    
    public function truckPalets()
    {
        return $this->belongsToMany(Palet::class, 'truck_palets');
    }
    
    public function models()
    {
        return $this->belongsToMany(DeviceModel::class, 'truck_models')
            ->withPivot(['quantity', 'weight', 'import_price', 'editable']);
    }
    
    public function devices()
    {
        return $this->belongsToMany(ModelVersion::class, 'truck_devices')
            ->withPivot('quantity');
    }
    
    public function destinationPrices()
    {
        return $this->hasMany(TruckDestinationPrice::class);
    }
    
    public function sales()
    {
        return $this->hasMany(TruckSale::class);
    }
    
    public function modems()
    {
        return $this->hasMany(Modem::class);
    }
}