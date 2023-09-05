<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeviceModel extends Model
{
    use HasFactory;

    protected $table = 'user_device';
    protected $fillable = [
        'user_id',
        'type',
        'platform',
        'device_id_type',
        'device_id_number',
        'is_primary',
        'status',
        'os_version',
        'model',
        'firebase_token'
    ];
}
