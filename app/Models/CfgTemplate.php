<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CfgTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'model_id', 'docsis', 'mta'
    ];
    
    public $timestamps = true;
    
    public function model()
    {
        return $this->belongsTo(DeviceModel::class);
    }
    
    public function dhcpOrders()
    {
        return $this->hasMany(DhcpOrder::class, 'cfg_template_id');
    }
}