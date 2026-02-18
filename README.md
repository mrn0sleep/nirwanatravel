# Nirwana Travel - Git Workflow Guide

## 1. Setup Awal

### Install Git
```bash
# Ubuntu/Debian
sudo apt install git

# Fedora
sudo dnf install git-all
```

**Windows/macOS**: Download dari [git-scm.com](https://git-scm.com/downloads)

### Konfigurasi
```bash
git config --global user.name "Nama Anda"
git config --global user.email "email@anda.com"
```

### Clone Repository
```bash
git clone https://github.com/mrn0sleep/nirwanatravel.git
cd nirwanatravel
```

---

## 2. Aturan Branch (PENTING!)

**DILARANG** edit langsung di `main`!

### Pembagian Branch
- **Zhulva**: `branch-zhulva`
- **Ardan**: `branch-ardan`
- **Aditya**: `branch-aditya`

---

## 3. Workflow Harian

### A. Sebelum Mulai Coding (Update Branch)
```bash
git checkout main
git pull origin main
git checkout branch-aditya  # sesuaikan dengan branch Anda
git merge main
```

### B. Saat Coding
Edit file → Test di browser

### C. Simpan & Push
```bash
git add .
git commit -m "Deskripsi perubahan yang jelas"
git push origin branch-aditya
```

---

## 4. Merge ke Main

### Via Pull Request (Recommended)
1. Push branch: `git push origin branch-aditya`
2. Buka GitHub → Klik **"Compare & pull request"**
3. Isi deskripsi → **"Create pull request"**
4. Setelah review → **"Merge pull request"**
5. **Informasikan ke tim di grup chat**

### Update Setelah Merge
**Semua anggota tim** wajib update:
```bash
git checkout main
git pull origin main
git checkout branch-aditya
git merge main
```

---

## 5. Mengatasi Conflict

Jika terjadi conflict saat merge:
```bash
# 1. Buka file yang conflict
# 2. Cari dan edit bagian:
#    <<<<<<< HEAD
#    kode Anda
#    =======
#    kode dari main
#    >>>>>>> main
# 3. Pilih/gabungkan kode yang benar
# 4. Hapus tanda <<<<<<<, =======, >>>>>>>
# 5. Simpan file

git add .
git commit -m "Resolve merge conflict"
```

---

## 6. Command Cheat Sheet

### Navigasi
```bash
git branch              # Lihat branch aktif (ada tanda *)
git checkout [branch]   # Pindah branch
git status              # Cek status file
```

### Update & Sync
```bash
git pull origin main    # Download update terbaru
git merge [branch]      # Gabungkan branch
git stash               # Simpan sementara
git stash pop           # Kembalikan simpanan
```

### Simpan Perubahan
```bash
git add .               # Stage semua file
git commit -m "pesan"   # Commit dengan deskripsi
git push origin [branch] # Push ke GitHub
```

---

## 7. Troubleshooting

### Error: "Your local changes would be overwritten"
```bash
git stash
git pull origin main
git stash pop
```

### Lupa di Branch Mana
```bash
git branch  # Branch dengan * adalah branch aktif
```

### Salah Commit di Main
```bash
git reset HEAD~1                # Undo commit
git checkout branch-aditya      # Pindah ke branch benar
git add .
git commit -m "Commit ulang"
```

---

## 8. Tips Penting

✅ **DO:**
- Selalu `git pull` sebelum coding
- Commit sering dengan pesan jelas
- Test sebelum push
- Informasikan tim saat merge

❌ **DON'T:**
- Edit langsung di branch `main`
- Lupa `git add` sebelum commit
- Push tanpa test
- `git push --force` (kecuali tahu risikonya)

---

## Quick Reference

```bash
# Workflow lengkap
git checkout main && git pull origin main
git checkout branch-aditya && git merge main
# [Coding...]
git add . && git commit -m "pesan"
git push origin branch-aditya
```
