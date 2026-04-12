<?php
session_start();
$isLoggedIn = isset($_SESSION['name']) && isset($_SESSION['email']);
$avatarLetter = $isLoggedIn ? strtoupper(substr($_SESSION['name'], 0, 1)) : 'G';
$base_url = "http://localhost/nirwanatravel/";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami – Nirwana Tour & Travel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    /* MAIN.CSS — salin ke main.css di project kamu*/

    .navbar-nirwana .nav-link.active {
  color: #c9a227 !important;
}
    body {
      font-family: 'Poppins', sans-serif;
      color: #374151;
    }

    /* ===== NAVBAR ===== */
    .navbar-nirwana {
      background: #ffffff;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07);
      padding: 10px 0;
      position: sticky;
      top: 0;
      z-index: 1030;
    }
    .navbar-nirwana .logo-img {
      height: 44px;
      width: auto;
    }
    .navbar-nirwana .nav-link {
      font-size: 0.9rem;
      font-weight: 500;
      color: #374151;
      padding: 6px 4px;
      transition: color 0.2s;
    }
    .navbar-nirwana .nav-link:hover,
    .navbar-nirwana .nav-link.active {
      color: #c9a227;
    }
    .navbar-nirwana .dropdown-menu {
      border: none;
      box-shadow: 0 8px 24px rgba(0,0,0,0.10);
      border-radius: 12px;
      padding: 8px;
    }
    .navbar-nirwana .dropdown-item {
      font-size: 0.875rem;
      border-radius: 8px;
      padding: 8px 14px;
    }
    .navbar-nirwana .dropdown-item:hover { background: #f8f9fa; }

    /* Profile box */
    .profile-box {
      position: relative;
    }
    .profile-header {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      padding: 6px 12px;
      border-radius: 50px;
      border: 1px solid #e4e6ea;
      transition: background 0.2s;
    }
    .profile-header:hover { background: #f8f9fa; }
    .avatar-circle {
      width: 32px; height: 32px;
      border-radius: 50%;
      background: #1a1a2e;
      color: #c9a227;
      font-weight: 700;
      font-size: 0.85rem;
      display: flex; align-items: center; justify-content: center;
    }
    .username-display { font-size: 0.875rem; font-weight: 600; color: #1a1a2e; }
    .profile-dropdown {
      display: none;
      position: absolute;
      right: 0; top: calc(100% + 8px);
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.12);
      padding: 8px;
      min-width: 160px;
      z-index: 999;
    }
    .profile-box:hover .profile-dropdown { display: block; }
    .profile-dropdown a {
      display: block;
      padding: 8px 14px;
      font-size: 0.875rem;
      color: #374151;
      text-decoration: none;
      border-radius: 8px;
    }
    .profile-dropdown a:hover { background: #f8f9fa; }
    .login-btn-01 {
      background: #1a1a2e;
      color: #fff;
      border: none;
      padding: 8px 22px;
      border-radius: 50px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.875rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }
    .login-btn-01:hover { background: #2c3e6b; }

    /* ===== SECTION HELPERS ===== */
    .section-label {
      display: inline-block;
      background: #e8e9ec;
      color: #555;
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      padding: 5px 16px;
      border-radius: 50px;
      margin-bottom: 12px;
    }
    .section-title {
      font-size: clamp(1.45rem, 3vw, 2rem);
      font-weight: 700;
      color: #1a1a2e;
      margin-bottom: 10px;
    }
    .section-sub {
      color: #6b7280;
      font-size: 0.96rem;
      line-height: 1.75;
    }

    /* ===== TENTANG: HERO ===== */
    .tentang-hero {
      background: linear-gradient(135deg, #1a1a2e 0%, #2c3e6b 60%, #1e3a5f 100%);
      padding: 80px 0 72px;
      color: #fff;
      position: relative;
      overflow: hidden;
    }
    .tentang-hero::before {
      content: '';
      position: absolute;
      top: -80px; right: -80px;
      width: 380px; height: 380px;
      border-radius: 50%;
      background: rgba(201,162,39,0.09);
      pointer-events: none;
    }
    .tentang-hero .badge-label {
      display: inline-block;
      background: rgba(201,162,39,0.18);
      color: #c9a227;
      border: 1px solid rgba(201,162,39,0.35);
      font-size: 0.74rem;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 4px 16px;
      border-radius: 50px;
      margin-bottom: 16px;
    }
    .tentang-hero h1 {
      font-size: clamp(1.85rem, 4vw, 2.75rem);
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 16px;
    }
    .tentang-hero h1 span { color: #c9a227; }
    .tentang-hero .lead-text {
      font-size: 1rem;
      color: rgba(255,255,255,0.72);
      line-height: 1.8;
    }
    .hero-stats { display: flex; gap: 32px; margin-top: 32px; flex-wrap: wrap; }
    .hero-stat .num { font-size: 1.9rem; font-weight: 800; color: #c9a227; line-height: 1; }
    .hero-stat .lbl { font-size: 0.76rem; color: rgba(255,255,255,0.55); margin-top: 4px; }
    .hero-img-box {
      border-radius: 18px;
      overflow: hidden;
      position: relative;
    }
    .hero-img-box img {
      width: 100%;
      height: 320px;
      object-fit: cover;
      display: block;
    }
    .izin-float {
      position: absolute;
      bottom: -16px; left: 16px;
      background: #fff;
      border-radius: 12px;
      padding: 10px 16px;
      display: flex;
      align-items: center;
      gap: 10px;
      box-shadow: 0 8px 28px rgba(0,0,0,0.18);
    }
    .izin-float .ic { font-size: 1.4rem; color: #c9a227; }
    .izin-float .tb { font-size: 0.68rem; color: #6b7280; }
    .izin-float .tv { font-size: 0.84rem; font-weight: 700; color: #1a1a2e; }

    /* ===== VISI MISI ===== */
    .vm-section { padding: 88px 0; background: #fff; }
    .visi-card {
      background: #1a1a2e;
      border-radius: 18px;
      padding: 36px 28px;
      height: 100%;
    }
    .visi-card .ic-wrap {
      width: 52px; height: 52px;
      background: rgba(201,162,39,0.18);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem;
      color: #c9a227;
      margin-bottom: 18px;
    }
    .visi-card h4 { font-size: 1rem; font-weight: 700; color: #c9a227; margin-bottom: 12px; }
    .visi-card p { font-size: 0.9rem; color: rgba(255,255,255,0.78); line-height: 1.8; margin: 0; }
    .misi-card {
      background: #f8f9fa;
      border-radius: 18px;
      padding: 36px 28px;
      height: 100%;
      border: 1px solid #e4e6ea;
    }
    .misi-card h4 { font-size: 1rem; font-weight: 700; color: #1a1a2e; margin-bottom: 18px; }
    .misi-list { list-style: none; padding: 0; margin: 0; }
    .misi-list li {
      display: flex; gap: 12px; align-items: flex-start;
      margin-bottom: 13px;
      font-size: 0.875rem; color: #374151; line-height: 1.65;
    }
    .misi-list li:last-child { margin-bottom: 0; }
    .misi-num {
      flex-shrink: 0;
      width: 24px; height: 24px;
      background: #c9a227;
      color: #fff;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.7rem; font-weight: 700;
      margin-top: 1px;
    }

    /* ===== SEJARAH / TIMELINE ===== */
    .sejarah-section { padding: 88px 0; background: #f8f9fa; }
    .timeline {
      position: relative;
      padding-left: 32px;
      max-width: 680px;
      margin: 0 auto;
    }
    .timeline::before {
      content: '';
      position: absolute;
      left: 12px; top: 0; bottom: 0;
      width: 2px;
      background: linear-gradient(to bottom, #c9a227, #1a1a2e);
      border-radius: 2px;
    }
    .tl-item { position: relative; margin-bottom: 28px; }
    .tl-item:last-child { margin-bottom: 0; }
    .tl-dot {
      position: absolute;
      left: -27px; top: 7px;
      width: 14px; height: 14px;
      background: #c9a227;
      border-radius: 50%;
      border: 3px solid #f8f9fa;
      box-shadow: 0 0 0 3px #c9a227;
    }
    .tl-card {
      background: #fff;
      border-radius: 14px;
      padding: 20px 24px;
      border: 1px solid #e4e6ea;
      transition: box-shadow 0.25s, transform 0.25s;
    }
    .tl-card:hover {
      box-shadow: 0 10px 32px rgba(0,0,0,0.08);
      transform: translateX(4px);
    }
    .tl-year {
      font-size: 0.74rem; font-weight: 700; color: #c9a227;
      text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;
    }
    .tl-card h6 { font-size: 0.93rem; font-weight: 700; color: #1a1a2e; margin-bottom: 5px; }
    .tl-card p { font-size: 0.845rem; color: #6b7280; line-height: 1.7; margin: 0; }

    /* ===== TIM ===== */
    .tim-section { padding: 88px 0; background: #fff; }
    .tim-card {
      background: #f8f9fa;
      border-radius: 18px;
      padding: 32px 22px;
      text-align: center;
      border: 1px solid #e4e6ea;
      height: 100%;
      transition: transform 0.25s, box-shadow 0.25s;
    }
    .tim-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 18px 50px rgba(0,0,0,0.09);
    }
    .tim-ava {
      width: 80px; height: 80px;
      border-radius: 50%;
      background: linear-gradient(135deg, #1a1a2e, #2c3e6b);
      display: inline-flex; align-items: center; justify-content: center;
      font-size: 2rem;
      margin-bottom: 16px;
      border: 4px solid #f5e6b3;
    }
    .tim-jabatan {
      display: inline-block;
      background: #f5e6b3; color: #a07c14;
      font-size: 0.7rem; font-weight: 700;
      letter-spacing: 0.6px; text-transform: uppercase;
      padding: 3px 12px; border-radius: 50px;
      margin-bottom: 10px;
    }
    .tim-card h6 { font-size: 0.95rem; font-weight: 700; color: #1a1a2e; margin-bottom: 7px; }
    .tim-card p { font-size: 0.845rem; color: #6b7280; line-height: 1.7; margin: 0; }

    /* ===== REVIEW ===== */
    .review-section { padding: 88px 0; background: #f8f9fa; }
    .score-card {
      background: #1a1a2e;
      border-radius: 18px;
      padding: 36px 24px;
      text-align: center;
      color: #fff;
      height: 100%;
      display: flex; flex-direction: column; justify-content: center;
    }
    .score-card .big-score {
      font-size: 3.2rem; font-weight: 800; color: #c9a227; line-height: 1;
    }
    .score-card .stars { color: #c9a227; font-size: 1.1rem; margin: 8px 0; }
    .score-card p { font-size: 0.84rem; color: rgba(255,255,255,0.65); margin: 0; }
    .score-card hr { border-color: rgba(255,255,255,0.12); margin: 14px 0; }
    .rev-card {
      background: #fff;
      border-radius: 18px;
      padding: 28px 22px;
      border: 1px solid #e4e6ea;
      height: 100%;
      transition: transform 0.25s, box-shadow 0.25s;
    }
    .rev-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 42px rgba(0,0,0,0.08);
    }
    .rev-stars { color: #c9a227; font-size: 0.9rem; margin-bottom: 12px; }
    .rev-text {
      font-size: 0.875rem; color: #374151; line-height: 1.75;
      font-style: italic; margin-bottom: 18px;
    }
    .rev-author { display: flex; align-items: center; gap: 10px; }
    .rev-ava {
      width: 40px; height: 40px; border-radius: 50%;
      background: linear-gradient(135deg, #1a1a2e, #2c3e6b);
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; color: #c9a227; font-size: 0.95rem; flex-shrink: 0;
    }
    .rev-name { font-weight: 700; font-size: 0.875rem; color: #1a1a2e; }
    .rev-loc { font-size: 0.76rem; color: #6b7280; }

    /* ===== LEGALITAS ===== */
    .legalitas-section { padding: 64px 0; background: #fff; }
    .leg-badge {
      background: #f8f9fa;
      border: 1px solid #e4e6ea;
      border-radius: 14px;
      padding: 18px 20px;
      display: flex; align-items: center; gap: 14px;
    }
    .leg-badge .ic { font-size: 1.6rem; color: #c9a227; flex-shrink: 0; }
    .leg-badge .lt { font-size: 0.875rem; font-weight: 700; color: #1a1a2e; }
    .leg-badge .lv { font-size: 0.78rem; color: #6b7280; }

    /* ===== LOKASI ===== */
    .lokasi-section { padding: 88px 0; background: #f8f9fa; }
    .map-wrap {
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 8px 36px rgba(0,0,0,0.11);
      height: 360px;
    }
    .map-wrap iframe { width: 100%; height: 100%; border: none; display: block; }
    .kontak-card {
      background: #1a1a2e;
      border-radius: 18px;
      padding: 32px 28px;
      height: 100%;
    }
    .kontak-card h5 {
      font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 22px;
    }
    .krow { display: flex; gap: 12px; align-items: flex-start; margin-bottom: 18px; }
    .krow:last-child { margin-bottom: 0; }
    .krow .ic {
      width: 38px; height: 38px;
      background: rgba(201,162,39,0.15);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      color: #c9a227; font-size: 1rem; flex-shrink: 0;
    }
    .krow .kl { font-size: 0.72rem; color: rgba(255,255,255,0.5); margin-bottom: 1px; }
    .krow .kv { font-size: 0.875rem; color: #fff; font-weight: 500; line-height: 1.5; }

    /* ===== CTA STRIP ===== */
    .cta-strip {
      background: linear-gradient(135deg, #a07c14, #c9a227);
      padding: 60px 0;
      text-align: center;
    }
    .cta-strip h2 {
      font-size: clamp(1.3rem, 3vw, 1.75rem);
      font-weight: 700; color: #1a1a2e; margin-bottom: 10px;
    }
    .cta-strip p { font-size: 0.95rem; color: rgba(26,26,46,0.70); margin-bottom: 26px; }
    .btn-cta-wa {
      display: inline-flex; align-items: center; gap: 9px;
      background: #1a1a2e; color: #fff;
      font-family: 'Poppins', sans-serif;
      font-weight: 600; font-size: 0.9rem;
      padding: 12px 30px; border-radius: 50px;
      text-decoration: none;
      transition: background 0.22s, transform 0.2s, box-shadow 0.22s;
      box-shadow: 0 6px 22px rgba(26,26,46,0.24);
    }
    .btn-cta-wa:hover {
      background: #0f0f1e;
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(26,26,46,0.35);
      color: #fff;
    }

    /* ===== FOOTER ===== */
    .footer-main {
      background: #111827;
      padding: 64px 0 28px;
    }
    .footer-brand-name {
      font-weight: 700; font-size: 1.1rem; color: #fff; margin-bottom: 2px;
    }
    .footer-tagline { font-size: 0.78rem; color: #c9a227; margin-bottom: 12px; }
    .footer-desc { font-size: 0.845rem; color: rgba(255,255,255,0.50); line-height: 1.75; max-width: 290px; }
    .footer-social-links { display: flex; gap: 8px; margin-top: 16px; }
    .footer-social-links a {
      width: 34px; height: 34px; border-radius: 50%;
      background: rgba(255,255,255,0.10);
      color: rgba(255,255,255,0.65);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.95rem; text-decoration: none;
      transition: background 0.2s, color 0.2s;
    }
    .footer-social-links a:hover { background: #c9a227; color: #fff; }
    .footer-heading {
      font-size: 0.78rem; font-weight: 700; color: #fff;
      text-transform: uppercase; letter-spacing: 1px; margin-bottom: 16px;
    }
    .footer-nav-links { list-style: none; padding: 0; margin: 0; }
    .footer-nav-links li { margin-bottom: 9px; }
    .footer-nav-links a {
      color: rgba(255,255,255,0.50); font-size: 0.845rem; text-decoration: none;
      transition: color 0.2s;
    }
    .footer-nav-links a:hover { color: #c9a227; }
    .footer-kontak-item {
      display: flex; gap: 10px; align-items: flex-start;
      margin-bottom: 12px; font-size: 0.845rem; color: rgba(255,255,255,0.50);
    }
    .footer-kontak-item i { color: #c9a227; font-size: 0.95rem; margin-top: 2px; flex-shrink: 0; }
    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,0.08);
      padding-top: 22px; margin-top: 48px;
      text-align: center; font-size: 0.8rem; color: rgba(255,255,255,0.30);
    }

    /* ===== FADE-UP ANIMASI ===== */
    .fade-up {
      opacity: 0;
      transform: translateY(26px);
      transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .fade-up.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body>

<!-- ======================================================
     NAVBAR 
     ====================================================== -->
<nav class="navbar navbar-expand-lg navbar-nirwana">
  <div class="container-fluid px-4">

    <!-- LOGO -->
    <a class="navbar-brand" href="index.php">
      <!-- Ganti src="img/logo.PNG" sesuai path logo asli -->
      <span style="font-family:'Poppins',sans-serif;font-size:1.15rem;font-weight:800;color:#1a1a2e;letter-spacing:-0.3px;">
        Nirwana <span style="color:#c9a227;font-weight:600;">Tour & Travel</span>
      </span>
    </a>

    <!-- TOGGLER MOBILE -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">

      <!-- MENU TENGAH -->
      <ul class="navbar-nav mx-auto gap-3">
        <li class="nav-item">
          <a class="nav-link" href="index.php#beranda">Beranda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Layanan</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php#layanan">Keberangkatan Terdekat</a></li>
            <li><a class="dropdown-item" href="index.php#layanan">Jenis-jenis Layanan</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontak.php">Hubungi Kami</a>
        </li>
        <li class="nav-item">
          <!-- Link aktif di halaman ini -->
          <a class="nav-link active" href="tentang_kami.php">Tentang Kami</a>
        </li>
      </ul>

      <!-- KANAN: LOGIN / PROFILE -->
      <div class="d-flex gap-2 align-items-center">

        <!-- Jika sudah login: tampilkan profile box -->
        <div class="profile-box" id="profilebox" style="display:none;">
          <div class="profile-header">
            <div class="avatar-circle" id="avatarCircle">C</div>
            <span class="username-display" id="usernameDisplay">Username</span>
          </div>
          <div class="profile-dropdown">
            <a href="#">Pesanan saya</a>
            <a href="/nirwanatravel/login/logout.php">Logout</a>
          </div>
        </div>

        <!-- Jika belum login: tampilkan tombol login -->
        <form action="login/login.php" id="loginForm" style="display:none;">
          <button type="submit" class="login-btn-01">Login</button>
        </form>

      </div>
    </div>
  </div>
</nav>
<!-- ======================================================
     AKHIR NAVBAR
     ====================================================== -->


<!-- ======================================================
     HERO TENTANG KAMI
     ====================================================== -->
<section class="tentang-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="badge-label">Tentang Kami</span>
        <h1>Perjalanan Terbaik <span>Dimulai dari Sini.</span></h1>
        <p class="lead-text">Nirwana Tour & Travel hadir sejak 2005 dengan misi sederhana: memberikan pengalaman wisata yang aman, nyaman, dan tak terlupakan bagi setiap pelanggan kami di seluruh Indonesia.</p>
        <div class="hero-stats">
          <div class="hero-stat">
            <div class="num">20+</div>
            <div class="lbl">Tahun Berpengalaman</div>
          </div>
          <div class="hero-stat">
            <div class="num">15K+</div>
            <div class="lbl">Wisatawan Dilayani</div>
          </div>
          <div class="hero-stat">
            <div class="num">100+</div>
            <div class="lbl">Destinasi Tersedia</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="hero-img-box">
          <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=700&q=80" alt="Wisata Nirwana Travel">
          <div class="izin-float">
            <i class="bi bi-patch-check-fill ic"></i>
            <div>
              <div class="tb">Izin Resmi Terdaftar</div>
              <div class="tv">SK Kempar No. 021/TA/2005</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ======================================================
     VISI & MISI
     ====================================================== -->
<section class="vm-section">
  <div class="container">
    <div class="text-center mb-5 fade-up">
      <span class="section-label">Nilai Kami</span>
      <h2 class="section-title">Visi & Misi</h2>
      <p class="section-sub" style="max-width:500px;margin:0 auto;">Landasan yang menggerakkan setiap langkah kami dalam melayani wisatawan Indonesia.</p>
    </div>
    <div class="row g-4 fade-up">
      <div class="col-lg-5">
        <div class="visi-card">
          <div class="ic-wrap"><i class="bi bi-eye-fill"></i></div>
          <h4>Visi Kami</h4>
          <p>Menjadi biro perjalanan wisata terpercaya dan terkemuka di Indonesia yang mengutamakan kepuasan pelanggan, profesionalisme, dan inovasi layanan dalam setiap perjalanan.</p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="misi-card">
          <h4>Misi Kami</h4>
          <ul class="misi-list">
            <li><span class="misi-num">01</span><span>Menyediakan paket wisata berkualitas dengan harga transparan, kompetitif, dan sesuai kebutuhan pelanggan.</span></li>
            <li><span class="misi-num">02</span><span>Menghadirkan pemandu wisata bersertifikat yang ramah, profesional, dan berpengetahuan luas di setiap destinasi.</span></li>
            <li><span class="misi-num">03</span><span>Memastikan keamanan dan kenyamanan perjalanan mulai dari keberangkatan hingga kepulangan ke tanah air.</span></li>
            <li><span class="misi-num">04</span><span>Memberikan layanan pelanggan responsif 24 jam yang siap membantu sebelum, selama, dan sesudah perjalanan.</span></li>
            <li><span class="misi-num">05</span><span>Terus berinovasi dalam layanan digital untuk kemudahan pemesanan dan komunikasi pelanggan.</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ======================================================
     SEJARAH / TIMELINE
     ====================================================== -->
<section class="sejarah-section">
  <div class="container">
    <div class="text-center mb-5 fade-up">
      <span class="section-label">Perjalanan Kami</span>
      <h2 class="section-title">Sejarah Nirwana Travel</h2>
      <p class="section-sub" style="max-width:480px;margin:0 auto;">Dari sebuah kantor kecil di Batu hingga melayani ribuan wisatawan setiap tahunnya.</p>
    </div>
    <div class="timeline fade-up">

      <div class="tl-item">
        <div class="tl-dot"></div>
        <div class="tl-card">
          <div class="tl-year">2005 — Berdiri</div>
          <h6>Nirwana Tour & Travel Resmi Didirikan</h6>
          <p>Berawal dari passion perjalanan, Nirwana Travel dibuka di Batu, Jawa Timur, dengan layanan wisata lokal untuk keluarga dan grup.</p>
        </div>
      </div>

      <div class="tl-item">
        <div class="tl-dot"></div>
        <div class="tl-card">
          <div class="tl-year">2008 — Berkembang</div>
          <h6>Ekspansi ke Wisata Mancanegara</h6>
          <p>Memperluas layanan ke destinasi internasional pertama: Singapura, Malaysia, dan Thailand dengan 500+ wisatawan di tahun pertama.</p>
        </div>
      </div>

      <div class="tl-item">
        <div class="tl-dot"></div>
        <div class="tl-card">
          <div class="tl-year">2013 — Legalitas</div>
          <h6>Sertifikasi ASITA & Izin Resmi Kempar</h6>
          <p>Terdaftar sebagai anggota ASITA dan mendapatkan izin operasional resmi dari Kementerian Pariwisata RI.</p>
        </div>
      </div>

      <div class="tl-item">
        <div class="tl-dot"></div>
        <div class="tl-card">
          <div class="tl-year">2019 — Digital</div>
          <h6>Transformasi Digital & Platform Online</h6>
          <p>Meluncurkan website dan sistem pemesanan online sehingga pelanggan dapat konsultasi dan booking dari mana saja.</p>
        </div>
      </div>

      <div class="tl-item">
        <div class="tl-dot"></div>
        <div class="tl-card">
          <div class="tl-year">2025 — Kini</div>
          <h6>15.000+ Wisatawan & 100+ Destinasi</h6>
          <p>Telah melayani lebih dari 15.000 wisatawan dengan 100+ pilihan destinasi domestik dan internasional setiap tahunnya.</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ======================================================
     REVIEW PELANGGAN
     ====================================================== -->
<section class="review-section">
  <div class="container">
    <div class="text-center mb-5 fade-up">
      <span class="section-label">Testimoni</span>
      <h2 class="section-title">Apa Kata Pelanggan Kami?</h2>
      <p class="section-sub" style="max-width:480px;margin:0 auto;">Ribuan wisatawan puas menjadi bukti nyata komitmen layanan kami.</p>
    </div>
    <div class="row g-4 fade-up">
      <div class="col-lg-3">
        <div class="score-card">
          <div class="big-score">4.9</div>
          <div class="stars">★★★★★</div>
          <p>Rating dari 1.200+ ulasan pelanggan</p>
          <hr>
          <p style="font-size:0.78rem;">📍 Google Maps &nbsp;·&nbsp; Tripadvisor</p>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="rev-card">
          <div class="rev-stars">★★★★★</div>
          <p class="rev-text">"Paket Eropa yang kami pilih luar biasa! Semua sudah terurus dengan baik, mulai visa sampai hotel. Guide-nya ramah dan informatif sekali."</p>
          <div class="rev-author">
            <div class="rev-ava">A</div>
            <div>
              <div class="rev-name">Ahmad Fauzi</div>
              <div class="rev-loc">Jakarta Selatan</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="rev-card">
          <div class="rev-stars">★★★★★</div>
          <p class="rev-text">"Honeymoon ke Bali bersama Nirwana Travel benar-benar berkesan. Romantis, nyaman, dan tidak ada kendala sama sekali!"</p>
          <div class="rev-author">
            <div class="rev-ava">R</div>
            <div>
              <div class="rev-name">Rini & Andi</div>
              <div class="rev-loc">Surabaya</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="rev-card">
          <div class="rev-stars">★★★★☆</div>
          <p class="rev-text">"Wisata religi ke Turki sangat berkesan. Penginapannya bersih, makanan halal semua, dan jadwalnya tertib banget."</p>
          <div class="rev-author">
            <div class="rev-ava">S</div>
            <div>
              <div class="rev-name">Siti Mardiyah</div>
              <div class="rev-loc">Malang</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ======================================================
     LEGALITAS
     ====================================================== -->
<section class="legalitas-section">
  <div class="container">
    <div class="text-center mb-4 fade-up">
      <span class="section-label">Legalitas</span>
      <h2 class="section-title">Terdaftar & Berizin Resmi</h2>
      <p class="section-sub" style="max-width:480px;margin:0 auto;">Operasional kami didukung izin dan keanggotaan resmi dari lembaga berwenang.</p>
    </div>
    <div class="row g-3 fade-up">
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="leg-badge">
          <i class="bi bi-building-check ic"></i>
          <div><div class="lt">SK Kempar RI</div><div class="lv">No. 021/TA/2005</div></div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="leg-badge">
          <i class="bi bi-award-fill ic"></i>
          <div><div class="lt">Anggota ASITA</div><div class="lv">Asosiasi Travel Indonesia</div></div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="leg-badge">
          <i class="bi bi-airplane-fill ic"></i>
          <div><div class="lt">IATA Certified</div><div class="lv">International Air Transport</div></div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="leg-badge">
          <i class="bi bi-shield-fill-check ic"></i>
          <div><div class="lt">PT Nirwana Wisata</div><div class="lv">Akte Notaris No. 07/2005</div></div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ======================================================
     PETA LOKASI & KONTAK
     ====================================================== -->
<section class="lokasi-section">
  <div class="container">
    <div class="text-center mb-5 fade-up">
      <span class="section-label">Kantor Kami</span>
      <h2 class="section-title">Temukan Kami di Sini</h2>
      <p class="section-sub" style="max-width:480px;margin:0 auto;">Kunjungi kantor kami atau hubungi tim kami kapan saja untuk konsultasi perjalanan Anda.</p>
    </div>
    <div class="row g-4 fade-up">
      <div class="col-lg-8">
        <div class="map-wrap">
          <!--
            GANTI src di bawah dengan embed Google Maps kantor asli kamu.
            Caranya: buka Google Maps → cari lokasi → Share → Embed a map → Copy HTML
          -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.552!2d122.5231!3d-7.8686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629b!2sBatu%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="kontak-card">
          <h5><i class="bi bi-geo-alt-fill me-2" style="color:#c9a227;"></i>Informasi Kontak</h5>
          <div class="krow">
            <div class="ic"><i class="bi bi-geo-alt-fill"></i></div>
            <div>
              <div class="kl">Alamat Kantor</div>
              <div class="kv">Jl. Diponegoro No. 45,<br>Kota Batu, Jawa Timur 65314</div>
            </div>
          </div>
          <div class="krow">
            <div class="ic"><i class="bi bi-whatsapp"></i></div>
            <div>
              <div class="kl">WhatsApp</div>
              <div class="kv">+62 856-4010-0555</div>
            </div>
          </div>
          <div class="krow">
            <div class="ic"><i class="bi bi-telephone-fill"></i></div>
            <div>
              <div class="kl">Telepon Kantor</div>
              <div class="kv">(0341) 592-1234</div>
            </div>
          </div>
          <div class="krow">
            <div class="ic"><i class="bi bi-envelope-fill"></i></div>
            <div>
              <div class="kl">Email</div>
              <div class="kv">info@nirwanatravel.co.id</div>
            </div>
          </div>
          <div class="krow">
            <div class="ic"><i class="bi bi-clock-fill"></i></div>
            <div>
              <div class="kl">Jam Operasional</div>
              <div class="kv">Senin – Sabtu: 08.00–17.00 WIB</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ======================================================
     CTA STRIP
     ====================================================== -->
<section class="cta-strip">
  <div class="container">
    <h2>Siap Merencanakan Perjalanan Impian Anda?</h2>
    <p>Konsultasi gratis dengan tim kami. Kami bantu pilihkan paket terbaik sesuai kebutuhan dan budget Anda.</p>
    <a href="https://wa.me/6285640100555?text=Halo%2C%20saya%20ingin%20konsultasi%20tentang%20Nirwana%20Tour%20%26%20Travel."
       target="_blank" class="btn-cta-wa">
      <i class="bi bi-whatsapp" style="font-size:1.05rem;"></i>
      Chat via WhatsApp Sekarang
    </a>
  </div>
</section>


<!-- ======================================================
     FOOTER
     ====================================================== -->
<footer class="footer-main">
  <div class="container">
    <div class="row g-5">

      <!-- Kolom 1: Brand -->
      <div class="col-lg-4">
        <div class="footer-brand-name">Nirwana Tour & Travel</div>
        <div class="footer-tagline">Perjalanan Terbaik, Dimulai dari Sini</div>
        <p class="footer-desc">Biro perjalanan wisata terpercaya sejak 2005. Melayani ribuan wisatawan ke ratusan destinasi domestik dan internasional.</p>
        <div class="footer-social-links">
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-tiktok"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

      <!-- Kolom 2: Menu -->
      <div class="col-6 col-lg-2">
        <p class="footer-heading">Menu</p>
        <ul class="footer-nav-links">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="tentang.php">Tentang Kami</a></li>
          <li><a href="index.php#layanan">Layanan</a></li>
          <li><a href="index.php#keunggulan">Keunggulan</a></li>
          <li><a href="kontak.php">Hubungi Kami</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Layanan -->
      <div class="col-6 col-lg-2">
        <p class="footer-heading">Layanan</p>
        <ul class="footer-nav-links">
          <li><a href="#">Wisata Lokal</a></li>
          <li><a href="#">Wisata Luar Negeri</a></li>
          <li><a href="#">Paket Honeymoon</a></li>
          <li><a href="#">Wisata Religi</a></li>
          <li><a href="#">Paket Grup</a></li>
          <li><a href="#">Sewa Kendaraan</a></li>
        </ul>
      </div>

      <!-- Kolom 4: Kontak -->
      <div class="col-lg-4">
        <p class="footer-heading">Hubungi Kami</p>
        <div class="footer-kontak-item"><i class="bi bi-geo-alt-fill"></i><span>Jl. Diponegoro No. 45, Kota Batu, Jawa Timur 65314</span></div>
        <div class="footer-kontak-item"><i class="bi bi-whatsapp"></i><span>+62 856-4010-0555</span></div>
        <div class="footer-kontak-item"><i class="bi bi-telephone-fill"></i><span>(0341) 592-1234</span></div>
        <div class="footer-kontak-item"><i class="bi bi-envelope-fill"></i><span>info@nirwanatravel.co.id</span></div>
        <div class="footer-kontak-item"><i class="bi bi-clock-fill"></i><span>Senin – Sabtu, 08.00–17.00 WIB</span></div>
      </div>

    </div>
    <div class="footer-bottom">
      &copy; 2026 Nirwana Tour & Travel. Hak Cipta Dilindungi.
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ===== FADE-UP ON SCROLL =====
  const fadeEls = document.querySelectorAll('.fade-up');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 80);
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  fadeEls.forEach(el => obs.observe(el));

  // ===== NAVBAR: tampilkan login / profile sesuai session =====
  // Di file PHP asli, gunakan PHP untuk set window.userData
  // Contoh di index.php:
  //   window.userData = { isLoggedIn: <?= json_encode($isLoggedIn) ?>, avatarLetter: "<?= $avatarLetter ?>", userName: "<?= $isLoggedIn ? $_SESSION['name'] : '' ?>" };
  // Lalu jalankan logika di bawah ini (sudah ada di carousel.js / main JS-mu):
  window.userData = { isLoggedIn: <?= json_encode($isLoggedIn) ?>, avatarLetter: "<?= $avatarLetter ?>", userName: "<?= $isLoggedIn ? htmlspecialchars($_SESSION["name"]) : "" ?>" };

  (function() {
    const d = window.userData;
    if (d.isLoggedIn) {
      document.getElementById('profilebox').style.display = 'block';
      document.getElementById('avatarCircle').textContent = d.avatarLetter;
      document.getElementById('usernameDisplay').textContent = d.userName;
    } else {
      document.getElementById('loginForm').style.display = 'block';
    }
  })();
</script>
</body>
</html>