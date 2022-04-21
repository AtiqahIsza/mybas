<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiclePosition extends Model
{
    use HasFactory;
    protected $table = 'vehicle_position';
    public $timestamps = false;

    protected $fillable = [
        'vehicle_reg_no',
        'type',
        'imei',
        'latitude',
        'longitude',
        'altitude',
        'date_time',
        'speed',
        'bearing',
        'odometer',
        'satellite_count',
        'hdop',
        'd2d3',
        'rssi',
        'lac',
        'cell_id',
        'mcc',
        'msg_id',
        'activity_id',
        'addon_json',
        'bus_id',
        'driver_id'
    ];

    function Bus() {
        return $this->belongsTo(Bus::class, 'bus_id', 'id');
    }
    function Driver() {
        return $this->belongsTo(BusDriver::class, 'driver_id', 'id');
    }
}
