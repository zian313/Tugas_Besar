<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            // Elektronik
            ['name' => 'iPhone 15 Pro Max', 'desc' => 'Smartphone flagship terbaru dengan chip A17 Bionic dan kamera 48MP yang jernih.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1696446701796-da61225697cc?w=500&q=80'],
            ['name' => 'MacBook Air M2', 'desc' => 'Laptop super tipis dan ringan dengan performa Apple Silicon M2 yang kencang.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca4?w=500&q=80'],
            ['name' => 'Sony WH-1000XM5', 'desc' => 'Headphone noise cancelling terbaik dengan kualitas suara premium dan baterai tahan lama.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?w=500&q=80'],
            ['name' => 'Samsung Galaxy S24 Ultra', 'desc' => 'HP Android tercanggih dengan fitur AI, S-Pen, dan kamera zoom 100x.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=500&q=80'],
            ['name' => 'Smart TV 43 Inch', 'desc' => 'Televisi pintar resolusi 4K dengan dukungan Netflix, YouTube, dan Disney+.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1593784991095-a20506948430?w=500&q=80'],
            ['name' => 'Speaker Bluetooth JBL', 'desc' => 'Speaker portable dengan suara bass mantap dan tahan percikan air.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=500&q=80'],
            ['name' => 'Mouse Wireless Logitech', 'desc' => 'Mouse tanpa kabel presisi tinggi, desain ergonomis dan baterai awet 1 tahun.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=500&q=80'],
            ['name' => 'Keyboard Mechanical RGB', 'desc' => 'Keyboard gaming dengan switch biru yang clicky dan lampu RGB yang keren.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1618384887929-16ec33fab9ef?w=500&q=80'],
            ['name' => 'Kamera Instax Mini', 'desc' => 'Kamera instan yang langsung cetak foto, cocok untuk mengabadikan momen spesial.', 'cat' => 'Elektronik', 'image' => 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=500&q=80'],

            // Pakaian Pria
            ['name' => 'Kemeja Flannel Uniqlo', 'desc' => 'Kemeja kasual bahan katun lembut, cocok untuk gaya santai maupun semi-formal.', 'cat' => 'Pakaian Pria', 'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500&q=80'],
            ['name' => 'Jaket Denim Vintage', 'desc' => 'Jaket jeans klasik dengan potongan regular fit yang timeless.', 'cat' => 'Pakaian Pria', 'image' => 'https://images.unsplash.com/photo-1576995853123-5a294629ce97?w=500&q=80'],
            ['name' => 'Kaos Polos Cotton Combed', 'desc' => 'Kaos bahan katun premium yang adem dan menyerap keringat.', 'cat' => 'Pakaian Pria', 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500&q=80'],
            
            // Pakaian Wanita
            ['name' => 'Dress Floral Summer', 'desc' => 'Dress motif bunga dengan bahan rayon yang jatuh dan nyaman dipakai.', 'cat' => 'Pakaian Wanita', 'image' => 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=500&q=80'],
            ['name' => 'Blouse Kerja Elegan', 'desc' => 'Atasan wanita formal dengan desain minimalis untuk ke kantor.', 'cat' => 'Pakaian Wanita', 'image' => 'https://images.unsplash.com/photo-1551163943-3f6a29e3965e?w=500&q=80'],
            ['name' => 'Rok Plisket Premium', 'desc' => 'Rok panjang dengan lipatan rapi dan pinggang karet yang elastis.', 'cat' => 'Pakaian Wanita', 'image' => 'https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?w=500&q=80'],

            // Sepatu/Fashion
            ['name' => 'Sepatu Nike Air Jordan', 'desc' => 'Sneakers ikonik dengan desain stylish dan kenyamanan maksimal.', 'cat' => 'Pakaian Pria', 'image' => 'https://images.unsplash.com/photo-1552346154-21d32810aba3?w=500&q=80'],
            ['name' => 'Jam Tangan G-Shock', 'desc' => 'Jam tangan tahan banting, anti air, dan desain sporty yang maskulin.', 'cat' => 'Pakaian Pria', 'image' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500&q=80'],
            ['name' => 'Tas Ransel Eiger', 'desc' => 'Tas punggung tangguh untuk petualangan, kapasitas luas dan bahan waterproof.', 'cat' => 'Pakaian Pria', 'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=500&q=80'],

            // Rumah Tangga
            ['name' => 'Meja Laptop Portable', 'desc' => 'Meja lipat multifungsi, kokoh, dan mudah dibawa kemana saja.', 'cat' => 'Rumah Tangga', 'image' => 'https://images.unsplash.com/photo-1587614382346-4ec70e388b28?w=500&q=80'],
            ['name' => 'Lampu Tidur LED Minimalis', 'desc' => 'Lampu hias dengan cahaya hangat, hemat energi dan desain estetik.', 'cat' => 'Rumah Tangga', 'image' => 'https://images.unsplash.com/photo-1540932296757-1545422b9386?w=500&q=80'],
            ['name' => 'Blender Portable Juice', 'desc' => 'Blender mini bertenaga baterai, praktis untuk membuat jus segar dimanapun.', 'cat' => 'Rumah Tangga', 'image' => 'https://images.unsplash.com/photo-1570222094114-28a9d886d053?w=500&q=80'],
            ['name' => 'Air Fryer Low Watt', 'desc' => 'Alat goreng tanpa minyak, sehat dan hemat listrik untuk masakan harian.', 'cat' => 'Rumah Tangga', 'image' => 'https://images.unsplash.com/photo-1626082927389-d31c6d17e638?w=500&q=80'],
            ['name' => 'Botol Minum Tumbler', 'desc' => 'Botol stainless steel tahan panas/dingin hingga 12 jam, desain elegan.', 'cat' => 'Rumah Tangga', 'image' => 'https://images.unsplash.com/photo-1602143407151-511153d0db69?w=500&q=80'],
            ['name' => 'Bantal Leher Memory Foam', 'desc' => 'Bantal travel lembut yang menyesuaikan bentuk leher, anti pegal saat perjalanan.', 'cat' => 'Rumah Tangga', 'image' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=500&q=80'],

            // Hobi & Koleksi
            ['name' => 'Gundam HG Barbatos', 'desc' => 'Action figure model kit detail tinggi dari seri Iron-Blooded Orphans.', 'cat' => 'Hobi & Koleksi', 'image' => 'https://images.unsplash.com/photo-1614680376593-902f74cf0d41?w=500&q=80'],
            ['name' => 'Novel Harry Potter', 'desc' => 'Buku novel fantasi best seller edisi cover baru.', 'cat' => 'Hobi & Koleksi', 'image' => 'https://images.unsplash.com/photo-1626618012641-bfbca5a31239?w=500&q=80'],

            // Kesehatan & Kecantikan
            ['name' => 'Serum Vitamin C', 'desc' => 'Serum wajah untuk mencerahkan kulit dan memudarkan noda hitam.', 'cat' => 'Kesehatan & Kecantikan', 'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=500&q=80'],
            ['name' => 'Sunscreen SPF 50', 'desc' => 'Tabir surya tekstur ringan yang melindungi kulit dari sinar UV.', 'cat' => 'Kesehatan & Kecantikan', 'image' => 'https://images.unsplash.com/photo-1529940340007-8ef64ab358e2?w=500&q=80'],
        ];

        $item = $this->faker->randomElement($products);
        
        // Cari category ID berdasarkan nama
        $category = Category::where('name', $item['cat'])->first();
        $categoryId = $category ? $category->id : Category::inRandomOrder()->first()->id;

        return [
            'name' => $item['name'],
            'description' => $item['desc'],
            'price' => $this->faker->numberBetween(50, 3000) * 1000, 
            'stock' => $this->faker->numberBetween(5, 50),
            'category_id' => $categoryId,
            'image' => $item['image'],
        ];
    }
}
