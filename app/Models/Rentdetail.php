<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'PgId',
        'Sharing',
        'AC',
        'Rent'
    ];
}
