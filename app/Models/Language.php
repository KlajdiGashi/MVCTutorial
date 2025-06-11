<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];
    
    // No timestamps as they're not in the schema
    public $timestamps = false;
    
    public function translations()
    {
        return $this->hasMany(LanguageTranslation::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}