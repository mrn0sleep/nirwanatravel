<?php
session_start();
$isLoggedIn = isset($_SESSION['name']) && isset($_SESSION['email']);
$avatarLetter = $isLoggedIn ? strtoupper(substr($_SESSION['name'], 0, 1)) : 'G';

// base URL tetap
$base_url = "http://localhost/nirwanatravel/";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nirwana Tour & Travel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="main.css">

  <style>
    /* ===== HERO CTA STRIP ===== */
    .hero-cta-strip {
      background: #f4f5f7;
      border-bottom: 1px solid #eef0f4;
      padding: 36px 0 32px;
      text-align: center;
    }
    .hero-cta-strip h2 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(1.3rem, 2.5vw, 1.75rem);
      font-weight: 700;
      color: #1a1a2e;
      margin-bottom: 10px;
    }
    .hero-cta-strip p {
      font-size: 0.98rem;
      color: #6b7280;
      max-width: 580px;
      margin: 0 auto 24px;
      line-height: 1.75;
    }
    .btn-whatsapp {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      background: #25D366;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 13px 30px;
      border-radius: 50px;
      text-decoration: none;
      transition: background 0.22s, transform 0.2s, box-shadow 0.22s;
      box-shadow: 0 5px 20px rgba(37,211,102,0.28);
    }
    .btn-whatsapp:hover {
      background: #1ebe5d;
      transform: translateY(-2px);
      box-shadow: 0 8px 28px rgba(37,211,102,0.38);
      color: #fff;
    }
    .btn-whatsapp i {
      font-size: 1.2rem;
    }

    /* ===== KEUNGGULAN SECTION ===== */
    .keunggulan-section {
      padding: 80px 0 90px;
      background: #f4f5f7;
    }
    .keunggulan-section .section-label {
      display: inline-block;
      background: #e8e9ec;
      color: #555;
      font-size: 0.78rem;
      font-weight: 600;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      padding: 6px 18px;
      border-radius: 50px;
      margin-bottom: 14px;
    }
    .keunggulan-section .section-title {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(1.5rem, 3vw, 2.1rem);
      font-weight: 700;
      color: #1a1a2e;
      margin-bottom: 10px;
    }
    .keunggulan-section .section-sub {
      color: #6b7280;
      font-size: 0.98rem;
      max-width: 540px;
      margin: 0 auto 52px;
      line-height: 1.7;
    }
    .keunggulan-card {
      background: #fff;
      border-radius: 18px;
      padding: 36px 28px 32px;
      text-align: center;
      border: 1px solid #e4e6ea;
      transition: transform 0.28s ease, box-shadow 0.28s ease;
      height: 100%;
    }
    .keunggulan-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 48px rgba(0,0,0,0.08);
    }
    .keunggulan-icon-wrap {
      width: 68px;
      height: 68px;
      border-radius: 18px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 1.75rem;
      margin-bottom: 20px;
    }
    .keunggulan-card h6 {
      font-family: 'Poppins', sans-serif;
      font-size: 0.97rem;
      font-weight: 700;
      color: #1a1a2e;
      margin-bottom: 10px;
      line-height: 1.4;
    }
    .keunggulan-card p {
      font-size: 0.875rem;
      color: #6b7280;
      line-height: 1.7;
      margin: 0;
    }

    /* icon color themes : netral, match logo hitam-biru-kuning */
    .icon-blue  { background: #e8f0fe; color: #2c5ebd; }
    .icon-gold  { background: #fef9e7; color: #c9a227; }
    .icon-slate { background: #eef0f4; color: #4a5568; }
    .icon-navy  { background: #e8edf8; color: #1a3a6e; }
    .icon-green { background: #e6f9f0; color: #198754; }
    .icon-warm  { background: #fdf3e7; color: #b07d2e; }

    /* ===== LAYANAN SECTION : diperbesar ===== */
    .page-canvas #layanan {
      padding: 100px 0 110px;
    }
    .page-canvas #layanan .section-title {
      font-size: clamp(1.7rem, 3.5vw, 2.4rem);
    }
    .page-canvas #layanan .section-sub {
      font-size: 1.05rem;
      margin-bottom: 48px;
    }
    .layanan-card {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.07);
      transition: transform 0.28s ease, box-shadow 0.28s ease;
    }
    .layanan-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 56px rgba(0,0,0,0.12);
    }
    .layanan-card .card-thumb {
      font-size: 3rem;
      padding: 32px 0 28px;
    }
    .layanan-card .card-title {
      font-size: 1.05rem;
      font-weight: 700;
    }
    .layanan-card .card-text {
      font-size: 0.9rem;
    }
    .layanan-card .btn-detail {
      padding: 9px 22px;
      font-size: 0.9rem;
      border-radius: 8px;
    }

    /* ===== JADWAL SECTION ===== */
    .jadwal-section {
      padding: 80px 0;
      background: #f8f9fa;
    }
    .jadwal-card {
      display: flex;
      align-items: center;
      gap: 20px;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 16px;
      padding: 18px 20px;
      margin-bottom: 16px;
      transition: 0.2s;
    }
    .jadwal-card:hover {
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      transform: translateY(-2px);
    }
    
    /* tanggal kiri */
    .jadwal-date-box {
      background: #e9f7ef;
      border-radius: 12px;
      padding: 10px;
      text-align: center;
      width: 70px;
    }

    .jadwal-date-box .day {
      font-size: 20px;
      font-weight: 700;
    }
    .jadwal-date-box .month {
      font-size: 12px;
      color: #6b7280;
    }

    /* isi */
    .jadwal-info {
      flex: 1;
    }
    .jadwal-info h6 {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .seat-badge {
      background: #ffe4b5;
      color: #c05621;
      font-size: 11px;
      padding: 3px 8px;
      border-radius: 6px;
      margin-left: 6px;
    }
    
    /* badges */
    .jadwal-badges {
      margin: 5px 0;
    }
    
    .badge-jadwal {
      background: #e0f2fe;
      color: #0369a1;
      font-size: 11px;
      padding: 3px 8px;
      border-radius: 6px;
      margin-right: 5px;
    }
    
    .badge-jadwal.transit {
      background: #fee2e2;
      color: #b91c1c;
    }

    /* hotel */
    .jadwal-hotel {
      font-size: 13px;
      color: #6b7280;
    }
    
    /* harga */
    .jadwal-price {
      text-align: right;
    }
    
    .jadwal-price .label {
    font-size: 12px;
    color: #6b7280;
    }

    .jadwal-price .harga {
    font-size: 18px;
    font-weight: 700;
    color: #198754;
    }

    /* tombol konsultasi */
    .btn-konsultasi { 
    background: #198754;
    color: #fff;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
  }
  
  .btn-konsultasi:hover {
    background: #157347;
  }
  
  /* tombol bawah */
  .btn-tanggal-lain {
    border: 1px solid #198754;
    padding: 8px 20px;
    border-radius: 8px;
    text-decoration: none;
    color: #198754;
  }

  .btn-tanggal-lain:hover {
    background: #198754;
    color: #fff;
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
            <li><a class="dropdown-item" href="#layanan">Keberangkatan Terdekat</a></li>
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
        <div class="profile-box" id="profilebox" style="display: none">
          <div class="profile-header">
            <div class="avatar-circle" id="avatarCircle">C</div>
            <span class="username-display" id="usernameDisplay">Username</span>
          </div>
          <div class="profile-dropdown">
            <a href="#">Pesanan saya</a>
            <a href="/nirwanatravel/login/logout.php">Logout</a>
          </div>
        </div>
        <form action="login/login.php" id="loginForm" style="display: none;">
          <button type="submit" class="login-btn-01">Login</button>
        </form>
      </div>
    </div>
  </div>
</nav>

<!-- ======== HERO ======== -->
<div class="header-wrap" id="beranda">
  <div class="hero-gambar">
    <img src="img/header.png" alt="Nirwana Tour & Travel">
  </div>
</div>

<!-- ======== HERO CTA STRIP ======== -->
<div class="hero-cta-strip">
  <div class="container">
    <h2>Wujudkan Perjalanan Impian Anda Bersama Kami</h2>
    <p>Nikmati layanan wisata profesional, aman, dan terpercaya — dari paket lokal hingga mancanegara, semua hadir untuk kenyamanan perjalanan Anda dan keluarga.</p>
    <a href="https://wa.me/6285640100555?text=Halo%2C%20saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20paket%20wisata%20Nirwana%20Tour%20%26%20Travel."
       target="_blank" class="btn-whatsapp">
      <i class="bi bi-whatsapp"></i>
      Hubungi Kami via WhatsApp
    </a>
  </div>
</div>

<!-- ======== KEUNGGULAN SECTION ======== -->
<section class="keunggulan-section" id="keunggulan">
  <div class="container">
    <div class="text-center">
      <span class="section-label">Mengapa Kami</span>
      <h2 class="section-title">Keunggulan Nirwana Tour & Travel</h2>
      <p class="section-sub">Lebih dari sekadar perjalanan — kami menghadirkan pengalaman yang aman, nyaman, dan penuh kenangan.</p>
    </div>

    <div class="row g-4">

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="keunggulan-card">
          <div class="keunggulan-icon-wrap icon-blue">
            <i class="bi bi-patch-check-fill"></i>
          </div>
          <h6>Berizin Resmi & Terpercaya</h6>
          <p>Terdaftar dan berizin resmi sehingga setiap perjalanan Anda terjamin secara hukum dan profesional.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="keunggulan-card">
          <div class="keunggulan-icon-wrap icon-green">
            <i class="bi bi-shield-fill-check"></i>
          </div>
          <h6>Jaminan Keberangkatan 100%</h6>
          <p>Setiap pemesanan dijamin berangkat sesuai jadwal yang telah disepakati, tanpa khawatir pembatalan sepihak.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="keunggulan-card">
          <div class="keunggulan-icon-wrap icon-gold">
            <i class="bi bi-star-fill"></i>
          </div>
          <h6>Berpengalaman Sejak 2005</h6>
          <p>Lebih dari dua dekade melayani ribuan wisatawan dengan dedikasi penuh dan rekam jejak yang solid.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="keunggulan-card">
          <div class="keunggulan-icon-wrap icon-navy">
            <i class="bi bi-people-fill"></i>
          </div>
          <h6>Pemandu Wisata Bersertifikat</h6>
          <p>Tim guide kami terlatih, berpengalaman, dan ramah — siap mendampingi setiap langkah perjalanan Anda.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="keunggulan-card">
          <div class="keunggulan-icon-wrap icon-warm">
            <i class="bi bi-wallet2"></i>
          </div>
          <h6>Harga Transparan & Kompetitif</h6>
          <p>Tidak ada biaya tersembunyi. Kami menawarkan harga terbaik dengan paket yang fleksibel sesuai kebutuhan.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="keunggulan-card">
          <div class="keunggulan-icon-wrap icon-slate">
            <i class="bi bi-headset"></i>
          </div>
          <h6>Layanan Pelanggan 24 Jam</h6>
          <p>Tim kami siap membantu kapan saja, sebelum, selama, maupun setelah perjalanan Anda berlangsung.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ======== KEBERANGKATAN TERDEKAT (BARU) ======== -->
<section class="jadwal-section">
  <div class="container">
    <div class="text-center mb-4">
      <span class="section-label">🕐 Jadwal</span>
      <h2 class="section-title">Keberangkatan Terdekat</h2>
      <p class="section-sub">Berpengalaman lebih dari 10 tahun di bidang travel, selalu memberikan layanan terbaik untuk kenyamanan perjalanan Anda dan Keluarga.</p>
    </div>

    <?php
    $jadwal = [
      ['tgl'=>'15', 'bln'=>'Sep 2026', 'nama'=>'Paket Wisata Eropa 10 Hari',    'badges'=>['Direct','Tour TH'], 'hotel_mad'=>'Grand Sahid',     'hotel_mak'=>'Pullman Zamzam', 'harga'=>'32,9', 'seat'=>true],
      ['tgl'=>'20', 'bln'=>'Jun 2026', 'nama'=>'Paket Wisata Jepang 9 Hari',     'badges'=>['Transit'],         'hotel_mad'=>'Dormy Inn',        'hotel_mak'=>'Mercure Tokyo',  'harga'=>'24,9', 'seat'=>true],
      ['tgl'=>'01', 'bln'=>'Sep 2026', 'nama'=>'Paket Bali Honeymoon 7 Hari',    'badges'=>['Direct','Tour TH'], 'hotel_mad'=>'Kempinski Nusa Dua','hotel_mak'=>'The Layar',    'harga'=>'31,8', 'seat'=>true],
      ['tgl'=>'01', 'bln'=>'Okt 2026', 'nama'=>'Paket Lombok Sumbawa 8 Hari',    'badges'=>['Direct','Tour TH'], 'hotel_mad'=>'Qunci Villas',     'hotel_mak'=>'Amanjiwo',       'harga'=>'31,8', 'seat'=>true],
      ['tgl'=>'18', 'bln'=>'Jun 2026', 'nama'=>'Paket Turki Murah 10 Hari',      'badges'=>['Direct','Tour TH'], 'hotel_mad'=>'Delphin Palace',   'hotel_mak'=>'CVK Park Bosphorus','harga'=>'28,9','seat'=>true],
      ['tgl'=>'04', 'bln'=>'Jul 2026', 'nama'=>'Paket Raja Ampat 6 Hari',        'badges'=>['Direct','Tour TH'], 'hotel_mad'=>'Papua Paradise',   'hotel_mak'=>'Misool Eco Resort','harga'=>'28,9','seat'=>true],
      ['tgl'=>'04', 'bln'=>'Sep 2026', 'nama'=>'Paket Korea Selatan 9 Hari',     'badges'=>['Direct','Tour TH'], 'hotel_mad'=>'Lotte City Hotel', 'hotel_mak'=>'Shilla Stay',    'harga'=>'28,9', 'seat'=>true],
      ['tgl'=>'18', 'bln'=>'Jun 2026', 'nama'=>'Paket Dubai Mewah 8 Hari',       'badges'=>['Transit','Tour TH'],'hotel_mad'=>'Address Downtown','hotel_mak'=>'Atlantis Palm',  'harga'=>'28,5', 'seat'=>true],
    ];
    foreach (array_slice($jadwal, 0, 3) as $j): ?>
      $isTrans = in_array('Transit', $j['badges']);
    ?>
    <div class="jadwal-card">
      <div class="jadwal-date-box">
        <div class="day"><?= $j['tgl'] ?></div>
        <div class="month"><?= $j['bln'] ?></div>
      </div>
      <div class="jadwal-info">
        <h6>
          <?= htmlspecialchars($j['nama']) ?>
          <?php if($j['seat']): ?><span class="seat-badge">Seat Terbatas</span><?php endif; ?>
        </h6>
        <div class="jadwal-badges">
          <?php foreach($j['badges'] as $b): ?>
            <span class="badge-jadwal <?= $b==='Transit'?'transit':'' ?>"><?= $b ?></span>
          <?php endforeach; ?>
        </div>
        <div class="jadwal-hotel">
          Hotel A: <span><?= htmlspecialchars($j['hotel_mad']) ?></span>
          &nbsp;|&nbsp;
          Hotel B: <span><?= htmlspecialchars($j['hotel_mak']) ?></span>
        </div>
      </div>
      <div class="jadwal-price">
        <div class="label">Harga Mulai</div>
        <div class="harga"><?= $j['harga'] ?> <small>Juta</small></div>
      </div>
      <a href="https://wa.me/6281234567890" target="_blank" class="btn-konsultasi">Konsultasi</a>
    </div>
    <?php endforeach; ?>

    <div class="text-center mt-2">
      <a href="#" class="btn-tanggal-lain">Tanggal Lainnya</a>
    </div>
  </div>
</section>

<!-- ======== KONTEN LAYANAN ======== -->
<div class="page-canvas">

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
              ['icon' => '🏝️', 'thumb' => 'thumb-1', 'judul' => 'Paket Wisata Lokal',        'desc' => 'Nikmati keindahan wisata nusantara dengan paket perjalanan terjangkau dan menyenangkan.', 'link' => $base_url . 'detail/detail_layanan.php?id=1'],
              ['icon' => '✈️', 'thumb' => 'thumb-2', 'judul' => 'Paket Wisata Mancanegara',   'desc' => 'Jelajahi berbagai destinasi luar negeri dengan layanan lengkap dan terpercaya.', 'link' => $base_url . 'detail/detail_layanan.php?id=2'],
              ['icon' => '🎫', 'thumb' => 'thumb-3', 'judul' => 'Tiket Pesawat',              'desc' => 'Pesan tiket pesawat domestik maupun internasional dengan harga kompetitif.', 'link' => $base_url . 'detail/detail_layanan.php?id=3'],
              ['icon' => '🚌', 'thumb' => 'thumb-4', 'judul' => 'Sewa Kendaraan',             'desc' => 'Armada kendaraan nyaman dan bersih siap menemani perjalanan wisata Anda.', 'link' => $base_url . 'detail/detail_layanan.php?id=4'],
              ['icon' => '🏨', 'thumb' => 'thumb-5', 'judul' => 'Hotel & Penginapan',         'desc' => 'Pilihan akomodasi terbaik dari budget hingga bintang lima di berbagai kota.', 'link' => $base_url . 'detail/detail_layanan.php?id=5'],
              ['icon' => '💑', 'thumb' => 'thumb-6', 'judul' => 'Paket Honeymoon',            'desc' => 'Rayakan momen spesial bersama pasangan dengan paket romantis pilihan kami.', 'link' => $base_url . 'detail/detail_layanan.php?id=6'],
              ['icon' => '🕌', 'thumb' => 'thumb-7', 'judul' => 'Wisata Religi',              'desc' => 'Perjalanan spiritual penuh makna ke destinasi religi dalam dan luar negeri.', 'link' => $base_url . 'detail/detail_layanan.php?id=7'],
              ['icon' => '👥', 'thumb' => 'thumb-8', 'judul' => 'Paket Grup & Rombongan',     'desc' => 'Layanan wisata khusus grup, instansi, maupun corporate dengan harga spesial.', 'link' => $base_url . 'detail/detail_layanan.php?id=8'],
            ];
            ?>

            <?php foreach ($layanan as $item): ?>
            <div class="layanan-card">
              <div class="card-thumb <?= $item['thumb'] ?>"><?= $item['icon'] ?></div>
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($item['judul']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($item['desc']) ?></p>
                <a href="<?= $item['link'] ?>" class="btn-detail">Lihat Detail</a>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
        <div class="carousel-dots" id="carouselDots"></div>
      </div>

    </div>
  </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.userData = {
        isLoggedIn: <?= json_encode($isLoggedIn) ?>,
        avatarLetter: "<?= $avatarLetter ?>",
        userName: "<?= $isLoggedIn ? $_SESSION['name'] : '' ?>"
    };
</script>
<script src="carousel.js"></script>
</body>
</html>