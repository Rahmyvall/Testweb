<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    // Field yang bisa diisi massal
    protected $fillable = [
        'product_id',
        'qty',
        'total_price',
        'buyer_name',
        'status',
        'note',
        'cancelled_at',
    ];

    // Tipe data khusus
    protected $casts = [
        'total_price' => 'decimal:2',
        'cancelled_at' => 'datetime',
    ];

    /**
     * Relasi ke produk
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scope untuk hanya data aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope untuk hanya data dibatalkan
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }
}