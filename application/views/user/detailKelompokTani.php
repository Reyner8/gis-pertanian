<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <div class="row">

            <div class="col-md-7">
               <a href="<?= base_url('lokasi') ?>" class="btn btn-primary btn-outline btn-sm">Kembali</a>
            </div>
            <div class="col-md-7">
               <div class="biodata mb-5">
                  <h3>Kelurahan <?= ucwords($kelurahan->nama) ?></h3>
                  <p class="mb-2"><i class="fa fa-map-marker"></i> Kecamatan : <?= $kelurahan->namaKecamatan ?></p>
                  <p class="mb-2"><i class="fa fa-map"></i> latitude / Longitude : <?= $kelurahan->lat . ' / ' .  $kelurahan->lng ?></p>
                  <h6>Kelompok Tani :</h6>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th scope="col">Nama Kelompok</th>
                           <th scope="col">Alamat</th>
                           <th scope="col">#</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($kelompokTani as $kt) : ?>
                           <tr>
                              <td><?= $kt->nama ?></td>
                              <td><?= $kt->alamat ?></td>
                              <td> <a href="<?= base_url('lokasi/hasilPanen/' . $kt->id) ?>" class="btn btn-info btn-outline btn-sm">Hasil Panen</a> </td>
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