<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <div class="row">
            <div class="col-md-5">

               <h6>Gallery</h6>
               <hr>
               <div class="row">
                  <?php foreach ($galeri as $g) : ?>
                     <div class="col-md-6 mb-2">
                        <img width="200" src="<?= base_url('assets/images/galeri/' . $g->nama) ?>" alt="Gambar">
                     </div>

                  <?php endforeach; ?>
               </div>

            </div>
            <div class="col-md-7">
               <div class="biodata mb-5">
                  <h3><?= ucwords($kelompokTani->nama) ?></h3>
                  <p class="mb-2"><i class="fa fa-map-marker"></i> Alamat : <?= $kelompokTani->alamat ?></p>
                  <p class="mb-2"><i class="fa fa-map"></i> latitude / Longitude : <?= $kelompokTani->lat . ' / ' .  $kelompokTani->lng ?></p>
                  <h6>Hasil Panen :</h6>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th scope="col">Nama Tanaman</th>
                           <th scope="col">Jumlah Ditanam</th>
                           <th scope="col">Jumlah Panen</th>
                           <th scope="col">Modal Awal</th>
                           <th scope="col">Hasil Jual</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($hasil as $h) : ?>
                           <tr>
                              <td><?= $h->nama ?></td>
                              <td><?= $h->ditanam ?></td>
                              <td><?= $h->panen ?></td>
                              <td>Rp. <?= $h->modal_awal ?></td>
                              <td>Rp. <?= $h->hasil_jual ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>


               </div>


            </div>
         </div>
      </div>
   </section>
</main>




<?php include(APPPATH . 'views/user/inc/footer.php') ?>