<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'depot_id'];
    
    public $timestamps = true;
    
    public function depot()
    {
        return $this->belongsTo(Depot::class);
    }
    
    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}