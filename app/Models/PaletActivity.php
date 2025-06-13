<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaletActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'palet_id', 'area_id', 'action', 'user_id', 'remark'
    ];
    
    public $timestamps = true;
    
    public function palet()
    {
        return $this->belongsTo(Palet::class);
    }
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}