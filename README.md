<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
Frontend & Backend

<a><img src="{{ asset('public/ssfoto/2.jpg') }}" alt="public"></a>
<a><img src="{{ asset('public/ssfoto/3.jpg') }}" alt="public"></a>
<a><img src="{{ asset('public/ssfoto/4.jpg') }}" alt="public"></a>
<a><img src="{{ asset('public/ssfoto/5.jpg') }}" alt="public"></a>
<a><img src="{{ asset('public/ssfoto/6.jpg') }}" alt="public"></a>

About Laravel & Sistem Inventory + Sales

<p class="text-center">Berikut penjelasan singkat alur dan hubungan antar tabel di skrip database. Sistem ini adalah **inventory + sales sederhana**:</p>
Alur & Relasi:
product_categories → mengelompokkan produk.
products → data produk utama (SKU, nama, harga).
product_images → menyimpan gambar produk.
stocks → menyimpan jumlah stok per produk (products.id → stocks.product_id).
purchases → menyimpan transaksi pembelian/penjualan (products.id → purchases.product_id).
Flow sistem inventory + sales:
Produk dibuat → masuk ke products.
Stok diinisialisasi → masuk ke stocks.
Saat ada pembelian (purchases):
Tambah record transaksi.
Kurangi stok sesuai qty.
Jika transaksi dibatalkan (status = cancelled), stok dikembalikan.
