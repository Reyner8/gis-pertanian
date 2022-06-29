<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <h1 class="title text-center mb-5">Dokter</h1>
         <div class="row">
            <div class="col-md-12">
               <form action="<?= base_url('dokter/searchData') ?>" method="post">
                  <div class="form-group">
                     <input type="text" class="form-control" name="search" placeholder="Search Here...">
                  </div>
                  <div class="form-group">
                     <button class="btn btn-primary">Search</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="row" id="content">
            <!-- card -->
            <?php foreach ($dataDokter as $dokter) : ?>
               <div class="col-md-4 my-3">
                  <div class="card profile-card">
                     <div class="card-img-container">
                        <img class="card-img-top" src="<?= base_url('assets/images/dokter/' . $dokter->foto) ?>" alt="Card image cap">
                     </div>
                     <div class="card-body pt-0">
                        <h5 class="card-title mb-1"><?= $dokter->namaDokter ?></h5>
                        <p class="card-text">Dokter <?= $dokter->namaSpesialis ?></p>
                        <a href="<?= base_url('dokter/detailDokter/' . $dokter->idDokter) ?>" class="btn btn-mod">Detail</a>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
            <!-- end card -->
         </div>
      </div>
   </section>
</main>

<?php include(APPPATH . 'views/user/inc/footer.php') ?>