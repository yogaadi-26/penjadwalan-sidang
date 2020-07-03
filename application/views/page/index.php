<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css ">

  <!-- Custom fonts for this template -->

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/css/one-page-wonder.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#" style="font-size: 24px; letter-spacing: 5px; padding-top: 10 px;">SIPASI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link btn btn-danger" href="<?php echo base_url('page/user'); ?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">Sistem Penjadwalan Sidang</h1>
        <h5 class="masthead-subheading mb-0">SMK Negeri 1 Cimahi</h5>
        <a href="#" class="btn btn-primary btn-xl rounded-pill mt-5">Get Started</a>
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section style="height: 530px;">
    <div class="container" style="margin-top: 120px;">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2" >
          <div class="p-5">
            <img class="img-fluid" src="<?php echo base_url()?>assets/img/laptop.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5" >
            <h2 class="display-4">Apa itu SIPASI ? </h2>
            <p class="text-justify">SIPASI adalah kepanjangan dari <b>"Sistem Penjadwalan Sidang"</b> yaitu aplikasi berbasis web yang dibuat dengan PHP Framework Codeigniter 3 dan Bootstrap 4 dengan fungsi melakukan penjadwalan sidang sesuai dengan syarat & ketentuan yang berlaku di
            SMK Negeri 1 Cimahi pada Jurusan SIJA. </p>
            <p class="text-justify">Ada 2 Tipe akun, yaitu <b> Siswa </b> dan <b> Kepala Bengkel </b></p>   
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="background-color: #dfe6e9; height: 700px;" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 pt-5 d-flex justify-content-center">
        <h2 class="display-4 text-center"> Tipe Akun ?</h2>
        </div>
      </div>
      <div class="row justify-content-lg-center">
          <div class="card-deck" style="margin-top: 50px;">
            <div class="card align-items-center">
              <img src="<?php echo base_url()?>assets/img/admin.png" class="card-img-top " alt="..." style="width: 50%; height: 50%;" >
              <div class="card-body">
                <h5 class="card-title text-center">Kepala Bengkel</h5>
                <ul class="text-left">
                  <li>Berperan sebagai administrator</li>
                  <li>Mencatat, mengedit daftar pembimbing tiap siswa</li>
                  <li>Melakukan penjadwalan secara otomatis atau manual</li>
                </ul>
              </div>
            </div>
            <div class="card align-items-center">
              <img src="<?php echo base_url()?>assets/img/user1.png" class="card-img-top" alt="..." style="width: 45%; height: 50%; padding-top: 10px;"> 
              <div class="card-body">
                <h5 class="card-title text-center">Siswa</h5>
                <ul class="text-left">
                  <li>Melihat Jadwal Sidang Untuk Dirinya, seperti : </li>
                  <ul style="margin-left: -20px;">
                    <li>Tanggal</li>
                    <li>Penguji</li>
                    <li>Pembimbing</li>
                  </ul>
                </ul>
              </div>
            </div>
           </div>
          </div> 
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="py-5 bg-black" >
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; SMK Negeri 1 Cimahi <?= date('Y'); ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
