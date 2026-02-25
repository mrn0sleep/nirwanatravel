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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="main.css">
  <style>
    html { scroll-behavior: smooth; }

    /* ================================================
       SECTION LAYANAN
    ================================================ */
    #layanan {
      padding: 70px 0 60px;
      background: #f4f6fb;
    }
    .section-label {
      display: inline-block;
      background: #eef3ff;
      color: #2c4a9e;
      font-size: 12px;
      font-weight: 600;
      padding: 4px 14px;
      border-radius: 20px;
      margin-bottom: 10px;
      letter-spacing: 0.4px;
    }
    .section-title {
      font-size: 26px;
      font-weight: 700;
      color: #1a3c8f;
      margin-bottom: 8px;
    }
    .section-sub {
      font-size: 14px;
      color: #6b7c9e;
      margin-bottom: 40px;
    }

    /* ================================================
       CARD
    ================================================ */
    .layanan-card {
      width: 252px;
      border: 1px solid #d6e4ff;
      border-radius: 12px;
      overflow: hidden;
      background: #fff;
      box-shadow: 0 2px 10px rgba(26,60,143,0.06);
      transition: transform 0.2s, box-shadow 0.2s;
      flex-shrink: 0;
    }
    .layanan-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 24px rgba(26,60,143,0.13);
    }
    .card-thumb {
      width: 100%;
      height: 155px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 50px;
    }
    .layanan-card .card-body { padding: 16px 18px 20px; }
    .layanan-card .card-title {
      font-size: 14px;
      font-weight: 600;
      color: #1a3c8f;
      margin-bottom: 7px;
    }
    .layanan-card .card-text {
      font-size: 12px;
      color: #6b7c9e;
      line-height: 1.65;
      margin-bottom: 14px;
    }
    .btn-detail {
      display: inline-block;
      padding: 6px 18px;
      border-radius: 8px;
      background: #2c4a9e;
      color: #fff;
      font-size: 12px;
      font-weight: 500;
      text-decoration: none;
      transition: background 0.18s;
    }
    .btn-detail:hover { background: #1a3c8f; }

    /* Warna thumb per card */
    .thumb-1 { background: #e8f4ff; }
    .thumb-2 { background: #e8f0ff; }
    .thumb-3 { background: #fff3e8; }
    .thumb-4 { background: #e8fff3; }
    .thumb-5 { background: #fff8e8; }
    .thumb-6 { background: #ffe8f0; }
    .thumb-7 { background: #f0e8ff; }
    .thumb-8 { background: #e8fffd; }

    /* ================================================
       CAROUSEL
    ================================================ */
    .carousel-outer { position: relative; }
    .carousel-track-wrapper { overflow: hidden; width: 100%; }
    .carousel-track {
      display: flex;
      gap: 18px;
      transition: transform 0.35s cubic-bezier(.4,0,.2,1);
      padding: 8px 4px 14px;
    }
    .carousel-btn {
      position: absolute;
      top: 42%;
      transform: translateY(-50%);
      width: 38px; height: 38px;
      border-radius: 50%;
      border: 1.5px solid #d6e4ff;
      background: #fff;
      color: #2c4a9e;
      font-size: 20px;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(26,60,143,0.1);
      z-index: 10;
      transition: background 0.18s, color 0.18s;
      user-select: none;
    }
    .carousel-btn:hover { background: #2c4a9e; color: #fff; }
    .carousel-btn.prev { left: -20px; }
    .carousel-btn.next { right: -20px; }
    .carousel-dots {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 24px;
    }
    .carousel-dots .dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: #c6d5f0;
      cursor: pointer;
      transition: background 0.2s, width 0.2s;
    }
    .carousel-dots .dot.active {
      background: #2c4a9e;
      width: 22px;
      border-radius: 4px;
    }
  </style>
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
<script>
  /* Active nav saat scroll */
  window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section[id], div[id]');
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 100) current = s.id;
    });
    document.querySelectorAll('.navbar-nirwana .nav-link').forEach(a => {
      a.classList.remove('active');
      if (a.getAttribute('href') === '#' + current) a.classList.add('active');
    });
  });

  /* Carousel */
  (() => {
    const track    = document.getElementById('carouselTrack');
    const btnPrev  = document.getElementById('btnPrev');
    const btnNext  = document.getElementById('btnNext');
    const dotsWrap = document.getElementById('carouselDots');
    const cards    = Array.from(track.querySelectorAll('.layanan-card'));
    let current = 0;

    function visibleCount() {
      return Math.max(1, Math.floor(track.parentElement.clientWidth / (cards[0].offsetWidth + 18)));
    }
    function maxIndex() { return Math.max(0, cards.length - visibleCount()); }

    function buildDots() {
      dotsWrap.innerHTML = '';
      for (let i = 0; i <= maxIndex(); i++) {
        const d = document.createElement('span');
        d.className = 'dot' + (i === current ? ' active' : '');
        d.addEventListener('click', () => goTo(i));
        dotsWrap.appendChild(d);
      }
    }
    function updateDots() {
      dotsWrap.querySelectorAll('.dot').forEach((d, i) => d.classList.toggle('active', i === current));
    }
    function goTo(idx) {
      current = Math.max(0, Math.min(idx, maxIndex()));
      track.style.transform = `translateX(-${current * (cards[0].offsetWidth + 18)}px)`;
      updateDots();
    }

    btnPrev.addEventListener('click', () => goTo(current - 1));
    btnNext.addEventListener('click', () => goTo(current + 1));
    buildDots();

    let rt;
    window.addEventListener('resize', () => {
      clearTimeout(rt);
      rt = setTimeout(() => { current = Math.min(current, maxIndex()); buildDots(); goTo(current); }, 150);
    });
  })();
</script>
</body>
</html>