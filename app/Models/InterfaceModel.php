<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterfaceModel extends Model
{
    use HasFactory;

    protected $table = 'interfaces'; // Since 'Interface' is a reserved word
    
    protected $fillable = [
        'modem_id', 'name', 'index', 'description', 'type', 'speed',
        'physical_address', 'admin_status', 'operation_status'
    ];
    
    public $timestamps = true;
    
    public function modem()
    {
        return $this->belongsTo(Modem::class);
    }
}