
<!DOCTYPE html>
<html>
  <head>
  <title><?= $title;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="shortcut icon" href="<?php echo base_url('vendor/frontend/kpm/logo/') ?>Untitled-001.png">

  <link href="<?php echo base_url('assets/frontend/') ?>https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url('vendor/frontend/kpm/logo/'); ?>Untitled-001.png">
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|Roboto+Mono&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/jquery.fancybox.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/fonts/ionicons/css/ionicons.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/fonts/fontawesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/fonts/flaticon/font/flaticon.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/aos.css'); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  
  <!-- Theme Style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('auth/index'); ?>">SpyderBIT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
          aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample05">
          <ul class="navbar-nav pl-md-5 ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('auth/index'); ?>">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/profile'); ?>">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/gallery'); ?>">Talent</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(uri_string() == 'auth/activity') echo "active" ?> " href="<?= base_url('auth/activity'); ?>">Kegiatan Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('auth/news'); ?>">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/contact'); ?>">Kontak</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
  <!-- END HEADER -->

  <div class="slider-item overlay" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center">
        <div class="col-lg-12 text-center col-sm-12">
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">Kami membuat hal yang luar biasa.</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="section portfolio-section">
    <div class="container">
      <div class="row mb-5 justify-content-center" data-aos="fade-up">
        <div class="col-md-8 text-center">
          <h2 class="mb-4 section-title">Gallery Kegiatan Komunitas Programmer Millenial</h2>
          <p> kumpulan atau koleksi foto dan video yang menampilkan kegiatan atau acara yang telah dilakukan oleh komunitas spyderbit.</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row mb-5 no-gutters">
          <?php 
              //sorting data berdasarkan tanggal terbaru
              usort($kegiatan, function($a, $b) {
                  return strtotime($b->tanggal_kegiatan) - strtotime($a->tanggal_kegiatan);
              });
              $latest_kegiatan = array_slice($kegiatan, 0, 2); //ambil 2 data terbaru
              foreach ($latest_kegiatan as $k) { 
          ?>
          <div class="col-sm-6 col-md-6 col-lg-6" data-aos="fade" data-aos-delay="100">
              <div class="work-thumb">
                  <div class="work-text">
                      <h2><?= $k->nama_kegiatan; ?></h2>
                      <p><?= $k->lokasi_kegiatan; ?></p>
                  </div>
                  <img src="<?php echo base_url('img/') . $k->logo_kegiatan ?>" alt="Image" class="img-fluid">
              </div>
          </div>
          <?php } ?>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <p><a href="<?php echo base_url('auth/activity ')?>" class="btn btn-outline-dark px-4 py-3">Lihat Lainnya</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 ml-auto mb-5 order-2">
        <span class="d-block text-uppercase text-secondary" data-aos="fade-up">Siapa Kita</span>
          <h2 class="mb-4 section-title animated slideInLeft">Lakukan Hal-Hal yang Penting. Rencana. Membuat. Tumbuh.</h2>
        <p data-aos="fade-up">Komunitas Programmer merupakan sebuah komunitas koding di daerah Banyumas. Yang menyediakan forum untuk web developer dan programmer lainnya. Disamping itu komunitas programmer juga untuk diskusi seputar web development, programming, design, ataupun seputar IT lainnya.</p>
        <p><a href="<?php echo base_url("auth/profile") ?>" class="btn btn-outline-black" data-aos="fade-right">Kenali Lebih Lanjut</a></p>
        </div>
        <div class="col-lg-6 order-1">
          <figure class="img-dotted-bg">
          <img src="<?php echo base_url('assets/frontend/') ?>images/profile_1.jpg" alt="Image" class="img-fluid" data-aos="fade-left">
          </figure>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-secondary py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <h3 class="mb-2 font-weight-normal text-white" data-aos="fade-right" data-aos-delay="">Mari berbuat lebih banyak bersama-sama kami</h3>
          <p class="mb-0" data-aos="fade-right" data-aos-delay="200"><a href="<?= "https://docs.google.com/forms/d/e/1FAIpQLSfrZ97ljfbYUvSkzB78k4kWKKRyNwFRei4JhcD4Ubfy1PzxjA/viewform?usp=pp_url" ?>" class="btn btn-outline-light px-4 py-3 ">Gabung Sekarang</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->

  <footer class="bg-secondary text-white" role="contentinfo">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 mb-5">
          <h3 class="mb-4 text-white">Tentang Kami</h3>
          <p class="mb-5">SpyderBIT merupakan sebuah komunitas koding di daerah Banyumas. Yang menyediakan forum untuk web developer dan programmer lainnya. Disamping itu komunitas programmer juga untuk diskusi seputar web development, programming, design, ataupun seputar IT lainnya.</p>
          <ul class="list-unstyled footer-link d-flex footer-social">
            <li><a href="https://www.instagram.com/programmerkomunitas/" class="p-2"><span class="fa fa-instagram"></span></a></li>
          </ul>
        </div>
        <div class="col-md-6 mb-5 pl-md-5">
          <div class="mb-5">
            <h3 class="mb-4 text-white">Info Kontak</h3>
            <ul class="list-unstyled footer-link quick-contact">
              <li class="d-block">
                <span class="d-block caption text-white">Alamat:</span>
                <span class="caption-text text-white">Jl. Karen Indah I, Dusun III Karangdur, Karangduren, Kec. Sokaraja, Kabupaten Banyumas, Jawa Tengah 53181</span>
              </li>
              <li class="d-block">
                <span class="d-block caption text-white">Telepon:</span><span class="caption-text text-white">+62 882 3391 8738 (Azzah) </span>
              </li>
              <li class="d-block">
                <span class="d-block caption text-white">Email:</span><span class="caption-text text-white">programmerkomunitas@gmail.com</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-1 mb-5 ml-auto fixed-bottom py-5">
        <a href="https://wa.me/088233918738" class="rounded-circle btn btn-success p-2 position-absolute bottom-50 end-50 fixed_bottom" target="_blank"><span class="fa fa-whatsapp fa-4x"></a>
      </div>
      <div class="row">
        <div class="col-12 text-md-center text-left">
          <p class="copyright"><small>&copy;
            <script>document.write(new Date().getFullYear());</script> Komunitas Programmer Millenial - Spyderbit. All Rights Reserved.</small>
          </p>
      </div>
    </div>
  </footer>
  <!-- END FOOTER -->

  <div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ffc107" />
    </svg>
  </div>
  <!-- END LOADER -->
  <script src="<?php echo base_url('assets/frontend/') ?>js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/popper.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/jquery.fancybox.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/aos.js"></script>
  <script src="<?php echo base_url('assets/frontend/') ?>js/main.js"></script>
</body>

</html>