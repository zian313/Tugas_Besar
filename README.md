# 🛒 Tugas Besar - E-Commerce Laravel

Aplikasi E-Commerce berbasis web yang dibangun menggunakan **Laravel 12** dengan fitur manajemen produk, kategori, keranjang belanja, dan sistem pemesanan.

---

## 📋 Deskripsi Project

Aplikasi ini adalah sistem e-commerce lengkap yang memungkinkan:
- **Admin** untuk mengelola produk, kategori, dan pesanan
- **Pembeli** untuk browsing produk, menambahkan ke keranjang, dan melakukan checkout

---

## ✨ Fitur Utama

### 🔐 Autentikasi & Otorisasi
- Register & Login
- Role-based access (Admin & Pembeli)
- Session management

### 👨‍💼 Admin Dashboard
- Kelola Kategori (Create, Read, Update, Delete)
- Kelola Produk (CRUD dengan upload gambar)
- Kelola Pesanan (Update status pesanan)
- Dashboard statistik

### 🛍️ Fitur Pembeli
- Browse produk dengan filter kategori
- Detail produk
- Keranjang belanja
- Checkout & pemesanan
- Riwayat pesanan

### 📦 Manajemen Produk
- Upload gambar produk
- Stok management
- Kategori produk
- Harga & deskripsi

### 📊 Manajemen Pesanan
- Status tracking (Pending, Paid, Shipped, Completed, Cancelled)
- Detail pesanan & alamat pengiriman
- Update status pesanan oleh admin

---

## 🛠️ Tech Stack

- **Framework:** Laravel 12.x
- **PHP:** ^8.2
- **Database:** MySQL
- **Frontend:** Blade Templates, CSS (Inline styling)
- **Icons:** Feather Icons

---

## 📦 Instalasi

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/zian313/Tugas_Besar.git
   cd Tugas_Besar
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database**
   
   Edit file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rizzler
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Migrasi database**
   ```bash
   php artisan migrate
   ```

6. **Seed data (opsional)**
   ```bash
   php artisan db:seed
   ```

7. **Run development server**
   ```bash
   php artisan serve
   ```

   Aplikasi akan berjalan di: `http://127.0.0.1:8000`

---

## 🗄️ Database Schema

### Tables
- **users** - Data pengguna (admin & pembeli)
- **categories** - Kategori produk
- **products** - Data produk
- **carts** - Keranjang belanja
- **cart_items** - Item di keranjang
- **orders** - Data pesanan
- **order_items** - Detail item pesanan

---

## 👤 Default Users

Setelah seeding, gunakan kredensial berikut:

**Admin:**
- Email: `admin@example.com`
- Password: `password`

**Pembeli:**
- Email: `user@example.com`
- Password: `password`

---

## 📁 Struktur Project

```
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php
│   │   ├── ProductController.php
│   │   ├── CategoryController.php
│   │   ├── CartController.php
│   │   └── OrderController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Category.php
│   │   ├── Cart.php
│   │   └── Order.php
│   └── Middleware/
│       └── CheckRole.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── auth/
│       ├── products/
│       ├── categories/
│       ├── cart/
│       └── admin/
└── routes/
    └── web.php
```

---

## 🚀 Cara Penggunaan

### Sebagai Admin
1. Login menggunakan akun admin
2. Akses menu "Kelola Kategori" untuk menambah kategori produk
3. Akses menu "Kelola Produk" untuk menambah/edit produk
4. Kelola pesanan di "Kelola Pesanan"

### Sebagai Pembeli
1. Register atau login dengan akun pembeli
2. Browse produk di halaman utama
3. Klik produk untuk melihat detail
4. Tambahkan ke keranjang
5. Checkout dan isi alamat pengiriman

---

## 📸 Screenshots

_Coming soon..._

---

## 🤝 Kontributor

- **Zildzian Muhammad** - [zian313](https://github.com/zian313)

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 📧 Kontak

Untuk pertanyaan atau feedback:
- Email: zianmuhammad54@gmail.com
- GitHub: [@zian313](https://github.com/zian313)
