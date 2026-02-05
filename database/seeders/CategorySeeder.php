<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik', 
                'description' => 'Gadget, Laptop, HP, dan aksesoris elektronik lainnya.',
                'image' => 'https://images.unsplash.com/photo-1550009158-9ebf69173e03?auto=format&fit=crop&w=800&q=80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pakaian Pria', 
                'description' => 'Kemeja, Kaos, Celana, dan outfit pria terkini.',
                'image' => 'https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?w=500&q=80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pakaian Wanita', 
                'description' => 'Dress, Blouse, Rok, dan fashion wanita trendy.',
                'image' => 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=500&q=80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Makanan & Minuman', 
                'description' => 'Snack, Minuman segar, dan kebutuhan dapur.',
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500&q=80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hobi & Koleksi', 
                'description' => 'Mainan, Action Figure, Buku, dan barang koleksi.',
                'image' => 'https://images.unsplash.com/photo-1512413914633-b5043f4041ea?w=500&q=80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kesehatan & Kecantikan', 
                'description' => 'Skincare, Makeup, Vitamin, dan produk kesehatan.',
                'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=800&q=80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Rumah Tangga', 
                'description' => 'Perabotan, Dekorasi, dan alat kebersihan rumah.',
                'image' => 'https://images.unsplash.com/photo-1556020685-ae41abfc9365?w=500&q=80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
