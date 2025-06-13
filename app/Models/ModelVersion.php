<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id', 'hardware_version', 'voltage', 'amperage', 'latest_firmware'
    ];
    
    public $timestamps = true;
    
    public function model()
    {
        return $this->belongsTo(DeviceModel::class, 'model_id');
    }
    
    public function modems()
    {
        return $this->hasMany(Modem::class, 'model_version_id');
    }
}