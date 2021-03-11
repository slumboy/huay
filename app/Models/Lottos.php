<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Lottos extends Model
{
    
    use Notifiable;
    use SoftDeletes;
    protected $table = 'lottos';
    protected $fillable  = [
        'lot_date',
        'lotto_number',
        'shop_id'
    ];
    
}
