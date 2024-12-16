<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_hp',
        'email',                       
        'harga',        
        'mobil_id',
        'merek',
        'model',              
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

}
