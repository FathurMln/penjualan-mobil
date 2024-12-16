<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = ['merek', 'model', 'tahun_pembelian', 'harga', 'ketersediaan', 'kelengkapan', 'foto'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
