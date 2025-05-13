<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
        use HasFactory;
        protected $table = 'products';

        public static function generateSku(): string
    {
        $prefix = 'PROD'; // Awalan SKU (bisa dikonfigurasi)
        $randomNumber = random_int(100000, 999999); // Angka acak
        $sku = $prefix . '-' . $randomNumber;

        // Pastikan SKU unik
        while (Products::where('sku', $sku)->exists()) {
            $randomNumber = random_int(100000, 999999);
            $sku = $prefix . '-' . $randomNumber;
        }

        return $sku;
    }
}
