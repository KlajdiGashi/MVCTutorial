<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'modem_id', 'box_id', 'old_box_id', 'action', 'user_id', 'remark'
    ];
    
    public $timestamps = true;
    
    public function modem()
    {
        return $this->belongsTo(Modem::class);
    }
    
    public function box()
    {
        return $this->belongsTo(Box::class);
    }
    
    public function oldBox()
    {
        return $this->belongsTo(Box::class, 'old_box_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}