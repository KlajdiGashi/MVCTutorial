<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageKey extends Model
{
    use HasFactory;

    // Since the primary key is a string (key column)
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['key', 'value'];
    
    // No timestamps as they're not in the schema
    public $timestamps = false;
    
    public function translations()
    {
        return $this->hasMany(LanguageTranslation::class, 'key_id', 'key');
    }
}