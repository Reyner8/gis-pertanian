<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">

         <div class="row d-flex justify-content-center">
            <div class="col-md-6">
               <div class="row">
                  <?php if ($galeri == null) { ?>

                     <h2>Data Galeri Kosong</h2>
                  <?php } else { ?>

                     <div class="col-md-12 d-flex justify-content-center">
                        <h2><?= $galeri[0]->nama_tempat ?></h2>
                     </div>
                     <div class="col-md-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner">
                              <?php $i = 0;
                              foreach ($galeri as $key => $value) : ?>
                                 <?php if ($key == '0') { ?>
                                    <div class="carousel-item active">
                                       <img class="d-block w-100" src="<?= base_url('assets/images/galeri/' . $value->nama)  ?>" alt="<?= $i++; ?>">
                                    </div>
                                 <?php } else { ?>
                                    <div class="carousel-item">
                                       <img class="d-block w-100" src="<?= base_url('assets/images/galeri/' . $value->nama)  ?>" alt="<?= $i++; ?>">
                                    </div>
                                 <?php } ?>

                              <?php endforeach; ?>
                           </div>
                           <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                           </a>
                           <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                           </a>
                        </div>
                     </div>
                  <?php } ?>

               </div>

            </div>
         </div>
      </div>
      </div>
   </section>
</main>
<?php include(APPPATH . 'views/user/inc/footer.php') ?>