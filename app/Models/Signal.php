<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    use HasFactory;

    protected $fillable = [
        'modem_id', 'status', 'uptime', 'us_description', 'us_frequency',
        'us_speed', 'us_power', 'us_signal_noise', 'us_modulation_type',
        'us_ranging_status', 'us_uncorr', 'us_corr', 'us_noerror',
        'pds_index', 'ds_description', 'ds_frequency', 'ds_speed',
        'ds_snr', 'ds_annex', 'ds_power', 'tx_wavelength', 'errors_received',
        'errors_sent', 'led_low_signal', 'signal_lvl_dbm', 'rx_power',
        'tx_power', 'temperature', 'laser_wave_length', 'cat_TV',
        'ont_distance', 'cat_tv_power', 'interface_id', 'tx_optical_signal',
        'rx_optical_signal', 'rx_wavelength'
    ];
    
    protected $casts = [
        'status' => 'string'
    ];
    
    public $timestamps = true;
    
    public function modem()
    {
        return $this->belongsTo(Modem::class);
    }
}