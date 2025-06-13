<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'floor_id', 'max_nr_of_palets', 'comment'];
    
    public $timestamps = true;
    
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    
    public function palets()
    {
        return $this->hasMany(Palet::class);
    }
}