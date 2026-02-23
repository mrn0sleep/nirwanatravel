<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nirwana Tour & Travel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="header-wrap">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container-fluid px-4">

      <!-- LOGO -->
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.PNG" alt="Logo Nirwana" class="logo-img">
      </a>

      <!-- Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">

        <!-- MENU TENGAH -->
        <ul class="navbar-nav mx-auto gap-3">
          <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="layanan.php">Jenis2 Layanan</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="kontak.php">Hubungi Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Kami</a></li>
        </ul>

        <!-- BUTTON KANAN -->
        <div class="d-flex gap-2 align-items-center">

          <?php if (!isset($_SESSION['email'])): ?>

            <a href="register.php" class="btn-daftar">Daftar</a>
            <a href="login.php" class="btn-masuk">Login</a>

          <?php else: ?>

            <a href="profile.php" class="btn-user">
              <img src="img/user.png" width="16" alt="">
              <?= htmlspecialchars($_SESSION['name']) ?>
            </a>

          <?php endif; ?>

        </div>

      </div>
    </div>
  </nav>

  <!-- HERO LOGO -->
  <div class="hero-gambar">
    <img src="img/header.png" alt="Nirwana Tour & Travel">
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>