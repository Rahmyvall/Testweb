<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'products';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'sku',
        'name',
        'price',
    ];

    // Casting kolom price ke decimal
    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Jika tabel tidak memiliki created_at & updated_at
    // public $timestamps = false;

    /**
     * Relasi ke kategori produk
     */

    /**
     * Relasi ke stok produk
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'product_id');
    }

    /**
     * Ambil total stok jika stok lebih dari 0
     */
    public function availableStock()
    {
        return $this->stock ? $this->stock->quantity : 0;
    }
}