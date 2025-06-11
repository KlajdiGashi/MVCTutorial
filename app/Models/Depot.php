<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public $timestamps = true;
    
    public function floors()
    {
        return $this->hasMany(Floor::class);
    }
}