<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'stocks';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'product_id',
        'quantity',
    ];

    // Casting kolom ke tipe data
    protected $casts = [
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke produk
     */
    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}


    /**
     * Tambah stok
     */
    public function addQuantity(int $amount): void
    {
        $this->quantity += $amount;
        $this->save();
    }

    /**
     * Kurangi stok
     */
    public function reduceQuantity(int $amount): bool
    {
        if ($this->quantity < $amount) {
            return false; // stok tidak cukup
        }
        $this->quantity -= $amount;
        $this->save();
        return true;
    }

    /**
     * Mengecek apakah stok tersedia
     */
    public function isAvailable(int $amount = 1): bool
    {
        return $this->quantity >= $amount;
    }
}