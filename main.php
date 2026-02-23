<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nirwana Tour & Travel</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- CSS Header -->
  <link rel="stylesheet" href="header.css">
</head>
<body>

<div class="header-section">

  <nav class="navbar navbar-expand-lg px-4 py-3">
    <div class="container-fluid">

      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
        <img src="assets/logo.png" alt="Logo Nirwana">
        <div class="brand-text">
          <span class="nama">Nirwana</span>
          <span class="sub">Tour & Travel</span>
        </div>
      </a>

      <!-- Toggle Mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menuUtama">

        <!-- Menu -->
        <ul class="navbar-nav mx-auto gap-2">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Layanan</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="layanan.php">Jenis2 Layanan</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontak.php">Hubungi Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tentang.php">Tentang Kami</a>
          </li>
        </ul>

        <!-- Tombol Login / Daftar -->
        <div class="d-flex gap-2">
          <?php if (!isset($_SESSION['email'])): ?>
            <a href="register.php" class="btn-daftar">Daftar</a>
            <a href="login.php" class="btn-login">Login</a>
          <?php else: ?>
            <a href="profile.php" class="btn-user">
              <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
              <?= htmlspecialchars($_SESSION['name']) ?>
            </a>
            <a href="logout.php" class="btn-login">Logout</a>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </nav>

  <!-- Judul Tengah -->
  <div class="hero-title">
    <span class="t1">Nirwana</span>
    <span class="t2">Tour & Travel</span>
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>