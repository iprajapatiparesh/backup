<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pg extends Model
{
    use HasFactory;

    protected $fillable = [
        'PgName',
        'OwnerName',
        'UserId',
        'PgType',
        'State',
        'City',
        'PinCode',
        'RentRange',
        'Address',
        'MinSharing',
        'MaxSharing',
        'Status',
    ];
}
