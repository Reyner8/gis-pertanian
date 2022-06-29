<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <h1 class="title text-center mb-5">Berita & Tips</h1>
         <div class="row">
            <!-- card -->
            <div class="col-md-8">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card border-0">
                        <img class="card-img-top" src="<?= base_url('assets/images/berita/' . $dataBerita[0]->gambar) ?>">
                        <div class="card-body px-0 mt-4">
                           <h3><?= $dataBerita[0]->judul ?></h3>
                           <p class="time mt-3 mb-4"><i class="fa fa-calendar"></i> <?= $dataBerita[0]->waktu ?> | <?= $dataBerita[0]->kategori ?></p>
                           <p class="card-text mt-3"><?= $dataBerita[0]->isi ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end card -->

            <!-- other -->
            <div class="col-md-4">
               <div class="row">
                  <!-- category -->
                  <div class="col-md-12">
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
                  <!-- end category -->
               </div>
            </div>
            <!-- end other -->
         </div>
   </section>
</main>
<?php include(APPPATH . 'views/user/inc/footer.php') ?>