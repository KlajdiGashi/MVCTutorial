<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['key_id', 'language_id', 'value'];
    
    // No timestamps as they're not in the schema
    public $timestamps = false;
    
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    
    public function key()
    {
        return $this->belongsTo(LanguageKey::class, 'key_id', 'key');
    }
}