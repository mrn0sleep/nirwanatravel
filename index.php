<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nirwana Tour & Travel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="main.css">
</head>
<body>

<!-- ======== NAVBAR ======== -->
<nav class="navbar navbar-expand-lg navbar-nirwana">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.PNG" alt="Logo Nirwana" class="logo-img">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav mx-auto gap-3">
        <li class="nav-item">
          <a class="nav-link active" href="#beranda">Beranda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Layanan</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#layanan">Jenis-jenis Layanan</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontak.php">Hubungi Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tentang.php">Tentang Kami</a>
        </li>
      </ul>
      <div class="d-flex gap-2 align-items-center">
        <div class="profile-box" style="display: none">
          <div class="avatar-circle">C</div>
          <div class="profile-dropdown">
            <a href="#">Akun saya</a>
            <a href="#">Logout</a>
          </div>
        </div>
          <form action="login/login.php">
             <button type="submit" class="login-btn-01">Login</button>
          </form>
      </div>
    </div>
  </div>
</nav>

<!-- ======== HERO (BERANDA) — persis desain awal ======== -->
<div class="header-wrap" id="beranda">
  <div class="hero-gambar">
    <img src="img/header.png" alt="Nirwana Tour & Travel">
  </div>
</div>

<!-- ======== KONTEN (page-canvas) ======== -->
<div class="page-canvas">

  <!-- SECTION LAYANAN -->
  <section id="layanan">
    <div class="container">
      <div class="text-center">
        <span class="section-label">Layanan Kami</span>
        <h2 class="section-title">Jenis-jenis Layanan</h2>
        <p class="section-sub">Berbagai pilihan perjalanan terbaik, dirancang untuk kenyamanan Anda</p>
      </div>

      <div class="carousel-outer px-4">
        <button class="carousel-btn prev" id="btnPrev">&#8249;</button>
        <button class="carousel-btn next" id="btnNext">&#8250;</button>

        <div class="carousel-track-wrapper">
          <div class="carousel-track" id="carouselTrack">

            <?php
            $layanan = [
              ['icon' => '🏝️', 'thumb' => 'thumb-1', 'judul' => 'Paket Wisata Lokal',        'desc' => 'Nikmati keindahan wisata nusantara dengan paket perjalanan terjangkau dan menyenangkan.', 'link' => '#'],
              ['icon' => '✈️', 'thumb' => 'thumb-2', 'judul' => 'Paket Wisata Mancanegara',   'desc' => 'Jelajahi berbagai destinasi luar negeri dengan layanan lengkap dan terpercaya.', 'link' => '#'],
              ['icon' => '🎫', 'thumb' => 'thumb-3', 'judul' => 'Tiket Pesawat',              'desc' => 'Pesan tiket pesawat domestik maupun internasional dengan harga kompetitif.', 'link' => '#'],
              ['icon' => '🚌', 'thumb' => 'thumb-4', 'judul' => 'Sewa Kendaraan',             'desc' => 'Armada kendaraan nyaman dan bersih siap menemani perjalanan wisata Anda.', 'link' => '#'],
              ['icon' => '🏨', 'thumb' => 'thumb-5', 'judul' => 'Hotel & Penginapan',         'desc' => 'Pilihan akomodasi terbaik dari budget hingga bintang lima di berbagai kota.', 'link' => '#'],
              ['icon' => '💑', 'thumb' => 'thumb-6', 'judul' => 'Paket Honeymoon',            'desc' => 'Rayakan momen spesial bersama pasangan dengan paket romantis pilihan kami.', 'link' => '#'],
              ['icon' => '🕌', 'thumb' => 'thumb-7', 'judul' => 'Wisata Religi',              'desc' => 'Perjalanan spiritual penuh makna ke destinasi religi dalam dan luar negeri.', 'link' => '#'],
              ['icon' => '👥', 'thumb' => 'thumb-8', 'judul' => 'Paket Grup & Rombongan',     'desc' => 'Layanan wisata khusus grup, instansi, maupun corporate dengan harga spesial.', 'link' => '#'],
            ];
            ?>

            <?php foreach ($layanan as $item): ?>
            <div class="layanan-card">
              <div class="card-thumb <?= $item['thumb'] ?>"><?= $item['icon'] ?></div>
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($item['judul']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($item['desc']) ?></p>
                <a href="<?= htmlspecialchars($item['link']) ?>" class="btn-detail">Lihat Detail</a>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
        <div class="carousel-dots" id="carouselDots"></div>
      </div>

    </div>
  </section>

</div><!-- /page-canvas -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="carousel.js" defer></script>
</body>
</html>