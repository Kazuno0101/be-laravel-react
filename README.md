# Backend README

## Deskripsi

Backend untuk aplikasi ini menggunakan Laravel untuk mengelola data barang, jenis barang, dan transaksi. API yang disediakan memungkinkan aplikasi lain untuk mengambil data secara terprogram dan terstruktur, serta melakukan operasi CRUD pada data.

## Instalasi Backend

### Prerequisites

- PHP >= 7.4
- Composer
- MySQL atau database lain

### Langkah-langkah Instalasi

1. **Clone Repository**

   ```bash
   git clone https://github.com/username/backend-repository.git
   cd backend-repository
   ```

2. **Install Dependencies**

   ```bash
   composer install
   ```

3. **Set Up Environment**

   Salin file `.env.example` ke `.env` dan konfigurasi database serta pengaturan lainnya sesuai kebutuhan.

   ```bash
   cp .env.example .env
   ```

   Edit file `.env` untuk mengatur koneksi database:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

4. **Generate Key**

   ```bash
   php artisan key:generate
   ```

5. **Migrate Database**

   ```bash
   php artisan migrate
   ```

6. **Run the Server**

   ```bash
   php artisan serve
   ```

   API akan tersedia di `http://localhost:8000`.

## Daftar API

### Barang

- **Get All Barang**: `GET /api/barang`
- **Get Single Barang**: `GET /api/barang/{id}`
- **Create Barang**: `POST /api/barang`
- **Update Barang**: `PUT /api/barang/{id}`
- **Delete Barang**: `DELETE /api/barang/{id}`

### Jenis Barang

- **Get All Jenis Barang**: `GET /api/jenis-barang`
- **Get Single Jenis Barang**: `GET /api/jenis-barang/{id}`
- **Create Jenis Barang**: `POST /api/jenis-barang`
- **Update Jenis Barang**: `PUT /api/jenis-barang/{id}`
- **Delete Jenis Barang**: `DELETE /api/jenis-barang/{id}`

### Transaksi

- **Get All Transaksi**: `GET /api/transaksi`
- **Get Single Transaksi**: `GET /api/transaksi/{id}`
- **Create Transaksi**: `POST /api/transaksi`
- **Update Transaksi**: `PUT /api/transaksi/{id}`
- **Delete Transaksi**: `DELETE /api/transaksi/{id}`
- **Compare Transaksi**: `GET /api/transaksi/compare`

  **Parameters:**
  
  - `sort_by` (optional): `terbanyak` atau `terendah`
  - `start_date` (optional): Format `YYYY-MM-DD`
  - `end_date` (optional): Format `YYYY-MM-DD`

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repository ini, buat cabang (`branch`) baru, dan buat pull request. Pastikan untuk menyertakan deskripsi yang jelas tentang perubahan yang Anda buat.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
