# Sistem Informasi Sidang Tugas Akhir
Sistem ini membantu mahasiswa, dosen penguji, dan admin akademik dalam mengelola jadwal dan proses sidang tugas akhir.

## Clone Repository
```
git clone https://github.com/shelalaa20/PBF_KEL4_backend.git
cd sistem_sidangakhir
```

## Installasi
```
composer install 

```
```
cp env .env
```
## konfigurasi db
edit file .env menjadi seperti berikut
```php
database.default.hostname = localhost
database.default.database = sistem_sidangakhir
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQL
```
## Menjalankan Server CI4
```
php spark serve 
```

## Menggunakan API di Postman
```
http://localhost:8080/nama-endpoint
```
