<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModemActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'modem_id', 'action', 'user_id', 'remark', 'meta', 'updated_count'
    ];
    
    protected $casts = [
        'meta' => 'array'
    ];
    
    public $timestamps = true;
    
    public function modem()
    {
        return $this->belongsTo(Modem::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}