<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    use HasFactory;

    protected $table = 'models'; // Since 'Model' is a reserved word
    
    protected $fillable = [
        'name', 'vendor_id', 'device_type', 'serial_number_length', 'docsis_version',
        'scqam_downstream_compatibility', 'scqam_upstream_compatibility',
        'ofdm_downstream_compatibility', 'ofdm_upstream_compatibility',
        'wifi2g', 'wifi5g', 'telephony', 'download_min_speed', 'upload_min_speed',
        'lan1', 'lan2', 'lan3', 'lan4', 'image_url', 'show_on_user_management',
        'tariff_number', 'cat_tv_compatibility', 'cat_tv_power_min', 'cat_tv_power_max'
    ];
    
    public $timestamps = true;
    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    
    public function versions()
    {
        return $this->hasMany(ModelVersion::class, 'model_id');
    }
    
    public function cfgTemplates()
    {
        return $this->hasMany(CfgTemplate::class, 'model_id');
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}