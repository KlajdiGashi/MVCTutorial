<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modem extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number', 'cm_mac', 'mta_mac', 'gw_mac', 'identifier', 'current_state',
        'wlan1mac', 'wlan2mac', 'model_version_id', 'imported_model_version_id',
        'first_firmware', 'last_firmware', 'ssid24', 'pass24', 'ssid50', 'pass50',
        'first_int_name', 'last_int_name', 'allow_print', 'printed', 'status', 'meta',
        'truck_id', 'box_id'
    ];
    
    protected $casts = [
        'current_state' => 'string', // enum
        'allow_print' => 'boolean',
        'printed' => 'boolean',
        'meta' => 'array'
    ];
    
    public $timestamps = true;
    
    public function modelVersion()
    {
        return $this->belongsTo(ModelVersion::class, 'model_version_id');
    }
    
    public function importedModelVersion()
    {
        return $this->belongsTo(ModelVersion::class, 'imported_model_version_id');
    }
    
    public function box()
    {
        return $this->belongsTo(Box::class);
    }
    
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
    
    public function extraInfo()
    {
        return $this->hasOne(DeviceExtraInformation::class, 'device_id');
    }
    
    public function activities()
    {
        return $this->hasMany(ModemActivity::class);
    }
    
    public function issues()
    {
        return $this->hasMany(ModemIssue::class);
    }
    
    public function logs()
    {
        return $this->hasMany(ModemLog::class);
    }
    
    public function signals()
    {
        return $this->hasMany(Signal::class);
    }
    
    public function downstreams()
    {
        return $this->hasMany(Downstream::class);
    }
    
    public function upstreams()
    {
        return $this->hasMany(Upstream::class);
    }
    
    public function interfaces()
    {
        return $this->hasMany(InterfaceModel::class);
    }
    
    public function wifiInterfaces()
    {
        return $this->hasMany(WifiInterface::class);
    }
}