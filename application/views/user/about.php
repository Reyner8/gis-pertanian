<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section>
      <div class="container mb-5">
         <div class="row">
            <div class="col-md-12 mt-5">
               <div class="row">
                  <div class="col-md-6">
                     <img class="img-fluid" src="<?= base_url('assets/images/' . $about->gambar) ?>" alt="about-img">
                  </div>
                  <div class="col-md-6 mt-3">
                     <h3>Tentang Kami</h3>
                     <p class="mt-3"><?= $about->deskripsi ?></p>
                  </div>
                  <div class="col-md-12 mt-5">
                     <div class="row">
                        <div class="col-md-12 text-center">
                           <h3>Lokasi Kami</h3>
                        </div>
                        <div class="col-md-12">
                           <iframe width="100%" height="500" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&q=DINAS+PERTANIAN+TTU"></iframe>
                           <!-- &center=<?= $about->lat . ',' . $about->lng ?>& -->
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mt-5">
                     <div class="row">
                        <div class="col-md-12 text-center">
                           <h3>Struktur Organisasi</h3>
                        </div>
                        <div class="col-md-12">
                           <img width="100%" src="<?= base_url('assets/struktur.jpeg') ?>" alt="Struktur Organisasi">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<?php include(APPPATH . 'views/user/inc/footer.php') ?>