<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>

   <!-- jumbotron -->
   <section class="hero">
      <div class="jumbotron bg-transparent">
         <div class="container mt-2">
            <div class="row align-items-center">
               <div class="col-md">
                  <h1 class="display-4">Sistem Informasi Geografis</h1>
                  <p class="lead">Penarapan Sistem Informasi Geografis Tempat Dokter Praktik Di Kota Kupang Berbasis Web</p>
               </div>
               <div class="col-md">
                  <img src="<?= base_url('assets/user/illustration/jumbotron.svg') ?>" class="img-fluid" alt="jumbotron">
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end jumbotron -->

   <!-- feature -->
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md text-center mb-3">
               <h2 class="title">Fitur-Fitur</h2>
               <p>Website ini menawarkan fitur yang mengenai Dokter</p>
            </div>
         </div>
         <div class="col-md">
            <div class="row">
               <div class="col-md d-flex justify-content-around mb-2">
                  <div class="card text-center border-0" style="width: 18rem;">
                     <div class="card-body">
                        <img src="<?= base_url('assets/user/illustration/news.png') ?>" class="icon" alt="news">
                        <h5 class="card-title">Berita & Tips</h5>
                        <p class="card-text">Segala informasi seputar kesehatan dapat anda temukan di website ini.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md d-flex justify-content-around mb-2">
                  <div class="card text-center border-0" style="width: 18rem;">
                     <div class="card-body">
                        <img src="<?= base_url('assets/user/illustration/location.png') ?>" class="icon" alt="news">
                        <h5 class="card-title">Lokasi</h5>
                        <p class="card-text">Anda dapat mencari lokasi berbagai jenis dokter di website ini dengan
                           mudah.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end feature -->

   <!-- dokter -->
   <section>
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6">
               <img src="<?= base_url('assets/user/illustration/newspaper.svg') ?>" class="img-fluid" alt="doctor">
            </div>
            <div class="col-md-6 px-5">
               <h2 class="title mb-3">Berita & Tips</h2>
               <p>Lihat berita dan tips terbaru mengenai kesehatan disini dengan mengklik di bawah</p>
               <a href="#" class="button btn-mod">Lainnya</a>
            </div>
         </div>
      </div>
   </section>
   <!-- end dokter -->

   <!-- dokter -->
   <section>
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6 px-5">
               <h2 class="title mb-3">Dokter</h2>
               <p>Tersedia berbagai jenis dokter yang ada di <strong>Kota Kupang</strong> sesuai keinginan anda.</p>
               <a href="#" class="button btn-mod">Lainnya</a>
            </div>
            <div class="col-md-6">
               <img src="<?= base_url('assets/user/illustration/doctor.svg') ?>" class="img-fluid" alt="doctor">
            </div>
         </div>
      </div>
   </section>
   <!-- end dokter -->
</main>
<?php include(APPPATH . 'views/user/inc/footer.php') ?>