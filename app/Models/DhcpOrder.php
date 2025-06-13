<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DhcpOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'active', 'label', 'cfg_template_id', 'firmware_update'
    ];
    
    protected $casts = [
        'active' => 'boolean'
    ];
    
    public $timestamps = true;
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    public function cfgTemplate()
    {
        return $this->belongsTo(CfgTemplate::class);
    }
    
    public function conditions()
    {
        return $this->hasMany(DhcpOrderCondition::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'dhcp_order_tags');
    }
}