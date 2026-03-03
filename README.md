# School Equipment Management System

Sistem manajemen peminjaman alat sekolah berbasis web untuk mengelola inventaris dan peminjaman peralatan kelas.

---

## Fitur Utama

### Admin
- Dashboard dengan statistik real-time
- Manajemen inventaris alat (CRUD)
- Approval/rejection peminjaman
- Export laporan ke PDF
- Tracking kondisi alat

### Guru
- Dashboard pribadi
- Pengajuan peminjaman alat
- Riwayat peminjaman
- Tracking status request

---

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite/MySQL

---

## Instalasi

```bash
# Clone repository
git clone <repository-url>
cd management-sekolah

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate --seed

# Build assets
npm run build

# Jalankan server
php artisan serve
```

Akses: `http://localhost:8000`

---

## Default Login

| Role  | Email            | Password |
|-------|------------------|----------|
| Admin | admin@example.com | password |
| Guru  | guru@example.com  | password |

---

## Tech Stack

- **Backend:** Laravel 11
- **Frontend:** Blade + Tailwind CSS 4
- **Database:** SQLite/MySQL
- **PDF Export:** DomPDF

---

## Struktur Database

- `users` - Data pengguna (admin & guru)
- `tools` - Inventaris alat
- `borrowings` - Transaksi peminjaman

---

## Commands

```bash
# Development
npm run dev          # Start Vite dev server
php artisan serve    # Start Laravel server

# Production
npm run build        # Build assets

# Database
php artisan migrate        # Run migrations
php artisan migrate:fresh --seed  # Reset & seed database

# Cache
php artisan optimize:clear  # Clear all cache
php artisan optimize        # Create optimized cache
```

---

## License

MIT License
