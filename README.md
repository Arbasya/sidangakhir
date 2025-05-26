# SidangAkhir — Sistem Informasi Sidang Akhir

Repositori ini merupakan proyek web pengelolaan proses Sidang Akhir mahasiswa, dibangun menggunakan Laravel (sebagai frontend) dan CodeIgniter (sebagai backend), dikemas menggunakan **Docker** agar mudah dijalankan di berbagai platform tanpa setup manual.

---

## 🐳 Apa itu Docker?

**Docker** adalah platform untuk menjalankan aplikasi dalam **container**, yaitu lingkungan ringan dan terisolasi. Docker memastikan aplikasi berjalan konsisten di mana saja, tanpa tergantung konfigurasi lokal pengguna.

**Manfaat menggunakan Docker:**
- Tidak perlu install PHP, MySQL, Composer, dll.
- Setup proyek sangat cepat.
- Lingkungan dev = production (minim error saat deploy).

---

## 📦 Teknologi yang Digunakan

- **Frontend:** Laravel
- **Backend:** CodeIgniter
- **Database:** MySQL
- **Web Server:** Nginx
- **Manajemen layanan:** Docker Compose

---

## 🚀 Cara Menjalankan Proyek

### 1. Clone Repositori

```bash
git clone https://github.com/Arbasya/sidangakhir.git
cd sidangakhir
```

---

### 2. Pastikan Docker Terinstal

Download Docker Desktop:  
👉 [https://www.docker.com/products/docker-desktop/](https://www.docker.com/products/docker-desktop/)

Cek versi untuk memastikan:

```bash
docker --version
docker compose version
```

---

### 3. Jalankan Proyek

```bash
docker compose up --build
```

✅ Proyek akan langsung:
- Build semua container
- Generate Laravel app key (otomatis)
- Menjalankan Laravel, CodeIgniter, Nginx, dan MySQL

---

### 4. Akses Aplikasi

- Laravel (Frontend): [http://localhost:8082](http://localhost:8082)
- CodeIgniter (Backend API): [http://localhost:8080](http://localhost:8080)
- phpMyAdmin (database): [http://localhost:8081](http://localhost:8081)

---

## 📁 Struktur Folder

```
sidangakhir/
│
├── frontend/           # Laravel
├── backend/            # CodeIgniter
├── docker/             # Dockerfile & Nginx config
├── docker-compose.yml  # Konfigurasi container
└── README.md
```

---

## 🔧 Troubleshooting

- ❗ **Port bentrok**:
  - Tutup aplikasi lain yang memakai port `8082`, `8080`, atau `3306`.

- ❗ **Ingin reset container dan volume**:
  ```bash
  docker compose down -v --remove-orphans
  ```

---

## 🙌 Kontribusi

Ingin bantu pengembangan?  
Fork repo ini, buat branch baru, dan kirimkan pull request.

---

## 📄 Lisensi

Proyek ini menggunakan lisensi MIT.
