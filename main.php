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

  <style>
    /* ===== HEADER ===== */
    .header-section {
      position: relative;
      width: 100%;
      height: 100vh;
      min-height: 480px;
      /* GANTI URL INI DENGAN PATH FOTO ASLI */
      background-image: url('assets/header-bg.jpg');
      background-size: cover;
      background-position: center top;
      overflow: hidden;
    }

    /* ===== NAVBAR ===== */
    .navbar {
      background: transparent !important;
    }

    .navbar-brand img {
      width: 51px;
      height: 50px;
      border-radius: 50%;
      object-fit: contain;
    }

    .brand-text .nama {
      display: block;
      font-family: 'Dancing Script', cursive;
      font-size: 20px;
      color: #1a3c8f;
      line-height: 1;
    }

    .brand-text .sub {
      display: block;
      font-family: 'Dancing Script', cursive;
      font-size: 13px;
      color: #d4a017;
      line-height: 1.2;
    }

    .nav-link {
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      font-weight: 500;
      color: #1a1a1a !important;
    }

    .nav-link:hover,
    .nav-link.active {
      color: #0095ff !important;
    }

    .nav-link.active {
      color: #1a3c8f !important;
      font-weight: 600;
      border-bottom: 2px solid #1a3c8f;
    }

    .btn-daftar {
      border-radius: 50px;
      border: 1.5px solid #bbb;
      background: #fff;
      color: #222;
      font-size: 14px;
      font-weight: 500;
      font-family: 'Poppins', sans-serif;
      padding: 7px 20px;
      text-decoration: none;
    }

    .btn-daftar:hover {
      border-color: #0095ff;
      color: #0095ff;
    }

    .btn-login {
      border-radius: 50px;
      background: #0095ff;
      color: #fff;
      font-size: 14px;
      font-weight: 500;
      font-family: 'Poppins', sans-serif;
      padding: 7px 22px;
      text-decoration: none;
      border: none;
    }

    .btn-login:hover {
      background: #007acc;
      color: #fff;
    }

    .btn-user {
      border-radius: 50px;
      background: #0095ff;
      color: #fff;
      font-size: 14px;
      font-weight: 500;
      font-family: 'Poppins', sans-serif;
      padding: 7px 18px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .btn-user svg {
      width: 16px;
      height: 16px;
      fill: #fff;
    }

    /* ===== JUDUL TENGAH ===== */
    .hero-title {
      position: absolute;
      top: 45%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      white-space: nowrap;
      z-index: 10;
    }

    .hero-title .t1 {
      display: block;
      font-family: 'Dancing Script', cursive;
      font-size: 96px;
      font-weight: 700;
      color: #1a3c8f;
      line-height: 1;
      -webkit-text-stroke: 3px #fff;
      text-shadow: 0 0 20px rgba(255,255,255,0.7);
    }

    .hero-title .t2 {
      display: block;
      font-family: 'Dancing Script', cursive;
      font-size: 62px;
      font-weight: 700;
      color: #f5c518;
      line-height: 1;
      margin-top: -10px;
      -webkit-text-stroke: 2px #1a3c8f;
      text-shadow: 2px 2px 0 #1a3c8f;
    }

    @media (max-width: 768px) {
      .hero-title .t1 { font-size: 52px; }
      .hero-title .t2 { font-size: 36px; }
    }
  </style>
</head>
<body>

<div class="header-section">

  <!-- NAVBAR BOOTSTRAP -->
  <nav class="navbar navbar-expand-lg px-4 py-3">
    <div class="container-fluid">

      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <img src="assets/logo.png" alt="Logo Nirwana">
        <div class="brand-text">
          <span class="nama">Nirwana</span>
          <span class="sub">Tour & Travel</span>
        </div>
      </a>

      <!-- Toggle mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="menuUtama">
        <ul class="navbar-nav mx-auto gap-2">

          <li class="nav-item">
            <a class="nav-link active" href="#">Beranda</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Layanan</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Jenis2 Layanan</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Hubungi Kami</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Tentang Kami</a>
          </li>

        </ul>

        <!-- Tombol kanan — ganti kondisi dengan PHP session -->
        <div class="d-flex gap-2">
          <!-- Belum login -->
          <a href="#" class="btn-daftar">Daftar Isi</a>
          <a href="#" class="btn-login">Login</a>

          <!-- Sudah login — hapus dua baris atas, uncomment ini
          <a href="#" class="btn-user">
            <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
            Username
          </a>
          <a href="#" class="btn-login">Logout</a>
          -->
        </div>

      </div>
    </div>
  </nav>

  <!-- Judul besar di tengah -->
  <div class="hero-title">
    <span class="t1">Nirwana</span>
    <span class="t2">Tour & Travel</span>
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>