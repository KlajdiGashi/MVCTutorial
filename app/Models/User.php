<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'first_name', 'last_name', 'password', 'role',
        'model_id', 'email', 'phone_number', 'rfid', 'status',
        'language_id', 'image_url'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'string',
        ];
    }
    
    public $timestamps = true;
    
    public function model()
    {
        return $this->belongsTo(DeviceModel::class, 'model_id');
    }
    
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
    
    public function palets()
    {
        return $this->hasMany(Palet::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }
    
    public function shifts()
    {
        return $this->hasMany(UmShift::class);
    }
}