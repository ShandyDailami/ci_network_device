<?php

namespace App\Models;

use CodeIgniter\Model;

class Device extends Model
{
    protected $table = 'devices';
    protected $allowedFields = [
        'device_name',
        'latitude',
        'longitude',
        'location',
    ];
}
