# Nirwana Travel - Git Workflow Guide

## 1. Instalasi Git

Sebelum memulai, pastikan Git sudah terinstal di komputer Anda.

### Linux

```bash
# Fedora
sudo dnf install git-all

# Ubuntu / Debian
sudo apt install git

# Arch Linux
sudo pacman -S git
```

### Windows & macOS

1. Download Git dari situs resmi: [https://git-scm.com/downloads](https://git-scm.com/downloads)
2. Verifikasi instalasi dengan menjalankan perintah berikut di terminal:

```bash
git --version
```

3. Konfigurasi Git dengan informasi Anda:

```bash
git config --global user.name "Nama Anda"
git config --global user.email "email@anda.com"
```

---

## 2. Clone Repository

Untuk memulai bekerja dengan repository ini, clone terlebih dahulu ke komputer lokal Anda:

```bash
git clone https://github.com/mrn0sleep/nirwanatravel.git
cd nirwanatravel
```

---

## 3. Aturan Main Branch (SOP Tim)

**PENTING:** Dilarang keras mengedit langsung di branch `main`. Setiap anggota tim memiliki branch masing-masing untuk pengembangan.

### Pembagian Branch

- **Zhulva**: `branch-zhulva`
- **Ardan**: `branch-ardan`
- **Aditya**: `branch-aditya`

### Tutorial Branch: Cara Kerja dengan Branch

#### A. Pindah ke Branch Pribadi Anda

Setelah clone repository, pindah ke branch pribadi Anda:

```bash
# Cek branch apa saja yang ada
git branch -a

# Pindah ke branch pribadi Anda (contoh: Aditya)
git checkout branch-aditya
```

**Catatan:** Jika branch belum ada di lokal, Git akan otomatis membuat dan mengikuti branch dari remote.

#### B. Cek Branch yang Sedang Aktif

Untuk memastikan Anda berada di branch yang benar:

```bash
# Lihat semua branch, yang ada tanda * adalah branch aktif
git branch

# Atau lihat status lengkap
git status
```

Output akan menunjukkan:
```
On branch branch-aditya
Your branch is up to date with 'origin/branch-aditya'.
```

#### C. Update Branch Pribadi Ketika Ada Merge ke Main

Setiap kali ada anggota tim yang melakukan merge ke `main`, Anda perlu mengupdate branch pribadi Anda agar tidak ketinggalan perubahan terbaru.

**Langkah-langkahnya:**

1. **Simpan pekerjaan sementara** (jika ada yang belum selesai):

```bash
git stash
```

2. **Pindah ke branch main**:

```bash
git checkout main
```

3. **Tarik perubahan terbaru dari GitHub**:

```bash
git pull origin main
```

4. **Kembali ke branch pribadi Anda**:

```bash
git checkout branch-aditya
```

5. **Gabungkan perubahan dari main ke branch Anda**:

```bash
git merge main
```

Sekarang branch Anda sudah ter-update dengan perubahan terbaru dari `main`.

6. **Kembalikan pekerjaan yang di-stash tadi** (jika ada):

```bash
git stash pop
```

#### D. Mengatasi Conflict Saat Merge

Jika terjadi conflict saat merge, Git akan memberitahu file mana yang conflict. Anda perlu mengedit file tersebut secara manual:

1. Buka file yang conflict
2. Cari tanda conflict seperti ini:
   ```
   <<<<<<< HEAD
   kode dari branch Anda
   =======
   kode dari main
   >>>>>>> main
   ```
3. Pilih kode yang benar atau gabungkan keduanya
4. Hapus tanda `<<<<<<<`, `=======`, dan `>>>>>>>`
5. Simpan file, lalu:
   ```bash
   git add .
   git commit -m "Resolve merge conflict"
   ```

---

## 4. Siklus Kerja (Ngoding - Update - Push)

Ikuti urutan ini setiap kali Anda ingin mulai coding atau setelah ada anggota tim yang melakukan merge ke `main`.

### A. Sebelum Mulai Coding (Sinkronisasi)

Sebelum memulai coding, **selalu pastikan branch Anda ter-update**:

```bash
# 1. Pindah ke main
git checkout main

# 2. Pull update terbaru
git pull origin main

# 3. Kembali ke branch pribadi
git checkout branch-aditya

# 4. Merge perubahan dari main
git merge main
```

### B. Saat Coding

Setelah berpindah ke branch Anda, lakukan perubahan pada file yang diperlukan dan test secara lokal dengan membuka file `index.html` di browser.

### C. Simpan & Kirim Pekerjaan

Setelah selesai mengerjakan satu fitur atau bagian tertentu:

```bash
# 1. Stage semua perubahan
git add .

# 2. Commit dengan pesan yang jelas
git commit -m "Deskripsi fitur yang Anda kerjakan"

# 3. Push ke branch pribadi Anda di GitHub
git push origin branch-aditya
```

Ganti `branch-aditya` dengan nama branch Anda masing-masing.

---

## 5. Prosedur Merge ke Main

### A. Cara Merge via Pull Request (Recommended)

Ini adalah cara yang **lebih aman** karena memungkinkan tim untuk mereview kode terlebih dahulu:

1. Push branch Anda ke GitHub:
   ```bash
   git push origin branch-aditya
   ```

2. Buka repository di GitHub: https://github.com/mrn0sleep/nirwanatravel

3. Klik tombol **"Compare & pull request"** yang muncul

4. Isi deskripsi Pull Request:
   - Jelaskan fitur/perubahan yang dibuat
   - Mention anggota tim jika perlu review

5. Klik **"Create pull request"**

6. Tunggu review dari tim, lalu klik **"Merge pull request"**

7. **Informasikan ke tim** bahwa sudah ada merge baru ke `main`

### B. Cara Merge via Terminal (Alternatif)

Jika sudah yakin dan tidak perlu review:

```bash
# 1. Pindah ke branch main
git checkout main

# 2. Tarik kode terbaru dari GitHub
git pull origin main

# 3. Gabungkan branch fitur Anda ke main
git merge branch-aditya

# 4. Push hasil gabungan ke GitHub
git push origin main

# 5. Informasikan ke tim di grup chat
```

### C. Update Branch Setelah Merge

Setelah merge selesai, **semua anggota tim** harus mengupdate branch mereka:

```bash
# 1. Pindah ke main
git checkout main

# 2. Pull update terbaru
git pull origin main

# 3. Kembali ke branch pribadi
git checkout branch-zhulva  # sesuaikan dengan branch Anda

# 4. Merge perubahan dari main
git merge main

# 5. Lanjut coding!
```

---

## 6. Command Cheat Sheet

### Navigasi Branch

```bash
# Lihat semua branch
git branch -a

# Pindah ke branch tertentu
git checkout nama-branch

# Buat branch baru dan pindah ke sana
git checkout -b nama-branch-baru

# Cek branch yang sedang aktif
git branch
```

### Update & Sync

```bash
# Pull update dari remote
git pull origin main

# Merge branch lain ke branch aktif
git merge nama-branch

# Stash pekerjaan sementara
git stash

# Kembalikan stash
git stash pop
```

### Commit & Push

```bash
# Stage perubahan
git add .
# atau stage file tertentu
git add nama-file.html

# Commit
git commit -m "Pesan commit"

# Push ke remote
git push origin nama-branch
```

### Info & Status

```bash
# Cek status file
git status

# Lihat history commit
git log

# Lihat perubahan yang belum di-commit
git diff
```

---

## 7. Workflow Harian Tim

### Skenario 1: Aditya Mulai Coding di Pagi Hari

```bash
# 1. Buka terminal, masuk ke folder project
cd ~/Documents/Webprog/nirwanatravel

# 2. Update main (cek apakah ada perubahan semalam)
git checkout main
git pull origin main

# 3. Pindah ke branch pribadi dan update
git checkout branch-aditya
git merge main

# 4. Mulai coding...
# Edit file, test di browser

# 5. Selesai coding, commit & push
git add .
git commit -m "Add fitur booking form"
git push origin branch-aditya
```

### Skenario 2: Zhulva Merge ke Main, Tim Lain Harus Update

**Zhulva:**
```bash
# Setelah fitur selesai, buat Pull Request di GitHub
git push origin branch-zhulva
# Lalu buat PR di website GitHub
```

**Aditya & Ardan (setelah Zhulva merge):**
```bash
# 1. Update main
git checkout main
git pull origin main

# 2. Update branch pribadi
git checkout branch-aditya  # atau branch-ardan
git merge main

# 3. Lanjut coding
```

### Skenario 3: Conflict Saat Merge

```bash
# Saat merge muncul conflict
git checkout main
git pull origin main
git checkout branch-aditya
git merge main

# Output: CONFLICT (content): Merge conflict in index.html

# 1. Buka file yang conflict (index.html)
# 2. Edit manual, pilih kode yang benar
# 3. Hapus tanda <<<<<<, =======, >>>>>>>
# 4. Simpan file

# 5. Commit hasil resolve
git add .
git commit -m "Resolve conflict in index.html"
```

---

## 8. Ringkasan Workflow

1. **Clone repository** (hanya sekali di awal)
2. **Pindah ke branch pribadi** Anda
3. **Update branch dari main** sebelum mulai coding
4. **Coding & test** fitur Anda
5. **Commit & push** ke branch pribadi Anda di GitHub
6. **Buat Pull Request** untuk merge ke `main`
7. **Informasikan tim** setelah merge selesai
8. **Tim lain update branch** mereka dari `main`
9. **Ulangi** dari langkah 3

---

## 9. Tips & Best Practices

- **Komunikasi:** Selalu informasikan di grup chat ketika akan/sudah merge ke `main`
- **Commit Sering:** Jangan tunggu sampai selesai semua, commit per fitur kecil
- **Pesan Commit Jelas:** Tulis deskripsi yang menjelaskan apa yang diubah
- **Test Sebelum Push:** Selalu test di browser lokal dulu sebelum push
- **Update Rutin:** Biasakan update dari `main` setiap mulai coding
- **Conflict:** Jika ragu saat resolve conflict, tanya tim dulu
- **Backup:** Git sudah otomatis backup, tapi lebih aman jika code penting di-copy dulu

---

## 10. Troubleshooting

### Error: "Your local changes would be overwritten by merge"

```bash
# Solusi: Stash perubahan dulu
git stash
git pull origin main
git stash pop
```

### Error: "fatal: refusing to merge unrelated histories"

```bash
# Solusi: Force merge (hati-hati!)
git merge main --allow-unrelated-histories
```

### Lupa di Branch Mana

```bash
# Cek branch aktif
git branch
# Branch yang ada tanda * adalah branch aktif
```

### Salah Commit di Branch Main

```bash
# JANGAN PANIC! Bisa di-undo
git reset HEAD~1  # undo commit terakhir
git checkout branch-aditya  # pindah ke branch yang benar
git add .
git commit -m "Commit ulang di branch yang benar"
```

---

**Selamat berkolaborasi! Happy coding! 🚀**
