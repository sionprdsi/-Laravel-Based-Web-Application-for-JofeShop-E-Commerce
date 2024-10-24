<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'user_id',
        'cart_id',
        'status',
        'tanggal',
        'provinsi',
        'kota',
        'alamat',
        'kode_pos',
        'cek',
    ];

    // Relasi many-to-many dengan model Product
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty');
    }


}

