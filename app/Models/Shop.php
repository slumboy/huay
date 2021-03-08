<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable  = [
        'shop_number',
        'shop_name',
        'shop_address'
    ];
}
