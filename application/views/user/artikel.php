<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <h1 class="title text-center mb-5">Berita & Tips</h1>
         <div class="row">
            <!-- card -->
            <div class="col-md-8">
               <div class="row tab-content" id="pills-tabContent">
                  <?php foreach ($dataBerita as $berita) :
                     if ($berita->kategori == 'berita') { ?>

                        <div class="col-md-12 tab-pane fade show active" id="pills-berita" role="tabpanel" aria-labelledby="pills-berita-tab">
                           <div class="card border-0">
                              <img class="card-img-top" src="<?= base_url('assets/images/berita/' . $berita->gambar) ?>">
                              <div class="card-body mt-4">
                                 <a href="<?= base_url('artikel/detail/' . $berita->id) ?>" class="link">
                                    <h3><?= $berita->judul ?></h3>
                                 </a>
                                 <p class="card-text mt-3"><?= implode(' ', array_slice(explode(' ', $berita->isi), 0, 25)) . "\n"; ?>....</p>
                                 <p class="time mt-4"><i class="fa fa-calendar"></i> <?= $berita->waktu ?></p>
                              </div>
                           </div>
                        </div>
                     <?php } else { ?>
                        <div class="col-md-12 tab-pane fade show active" id="pills-tips" role="tabpanel" aria-labelledby="pills-tips-tab">
                           <div class="card border-0">
                              <img class="card-img-top" src="<?= base_url('assets/images/berita/' . $berita->gambar) ?>">
                              <div class="card-body mt-4">
                                 <a href="<?= base_url('artikel/detail/' . $berita->id) ?>" class="link">
                                    <h3><?= $berita->judul ?></h3>
                                 </a>
                                 <p class="card-text mt-3"><?= implode(' ', array_slice(explode(' ', $berita->isi), 0, 25)) . "\n"; ?>....</p>
                                 <p class="time mt-4"><i class="fa fa-calendar"></i> <?= $berita->waktu ?></p>
                              </div>
                           </div>
                        </div>
                  <?php }
                  endforeach; ?>

               </div>
            </div>
            <!-- end card -->

            <!-- other -->
            <div class="col-md-4">
               <div class="category">
                  <h4>Kategori</h4>
                  <hr>
                  <ul class="list-group mt-4" id="pills-tab" role="tablist">
                     <li class="list"><a href="#semua" id="semua" class="link">Semua</a></li>
                     <li class="list"><a href="#pills-berita" id="pills-berita-tab" data-toggle="pill" class="link" aria-controls="pills-berita" aria-selected="true">Berita</a></li>
                     <li class="list"><a href="#pills-tips" id="pills-tips-tab" data-toggle="pill" class="link" aria-controls="pills-tips" aria-selected="true">Tips</a></li>
                  </ul>
               </div>
            </div>
            <!-- end other -->
         </div>
      </div>
   </section>
</main>

<?php include(APPPATH . 'views/user/inc/footer.php') ?>