<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_palets', 'meta', 'pack', 'priority', 'voip', 'model_id',
        'model_version_id', 'tags', 'deadline_date', 'user_id', 'client_id',
        'client_address', 'firmware', 'quantity', 'freight', 'height_palet',
        'type_of_glue', 'lan_cable', 'power_supply', 'hdmi', 'remote_control',
        'logo_removal', 'comment', 'status', 'type', 'lan_cost', 'psu_cost',
        'refurbishment_cost', 'transport_customer_cost', 'transport_outgoing_cost'
    ];
    
    protected $casts = [
        'pack' => 'string',
        'priority' => 'string',
        'voip' => 'string',
        'hdmi' => 'boolean',
        'remote_control' => 'boolean',
        'logo_removal' => 'boolean',
        'type' => 'string',
        'meta' => 'array'
    ];
    
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    public function model()
    {
        return $this->belongsTo(DeviceModel::class, 'model_id');
    }
    
    public function modelVersion()
    {
        return $this->belongsTo(ModelVersion::class, 'model_version_id');
    }
    
    public function palets()
    {
        return $this->hasMany(Palet::class);
    }
    
    public function devices()
    {
        return $this->belongsToMany(ModelVersion::class, 'order_devices')
            ->withPivot('quantity');
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'order_tags');
    }
}