# 🖼️ InstaApp - Laravel 12 x Tailwind 4

## 🚀 Fitur
- Laravel 12
- Login & Logout
- Tambah postingan (dengan gambar dan caption)
- Komentar per postingan
- API endpoint untuk posting & komentar
- TailwindCSS untuk styling
- Database menggunakan PostgreSQL
- Upload gambar ke storage publik

## ⚙️ Instalasi & Setup

### 1. Clone project & install dependency
```bash
git clone https://github.com/mrizkinm/insta-app.git
cd insta-app
composer install
npm install
```

### 2. Setup .env
```bash
cp .env.example .env
```

### 3. Setting database
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=insta-app
DB_USERNAME=your_username
DB_PASSWORD=your_password
DB_SCHEMA=public
```

### 4. Migrasi &
```bash
php artisan migrate
```

## 🔨 Build Frontend

### Saat Dev
```bash
npm run dev
```

### Untuk Production
```bash
npm run build
```

## 🧪 Menjalankan Aplikasi
```bash
# tambahan
php artisan storage:link

php artisan serve
```