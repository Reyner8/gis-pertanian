<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section>
      <div class="container mb-5">
         <div class="row">
            <div class="col-md-8">
               <p><b> Note:</b>
                  <?php foreach ($dataSpesialis as $data) : ?>
                     <?= $data->nama ?><img src="<?= base_url('assets/images/icon/icon-marker/' . $data->icon)  ?>" width="20">,
                  <?php endforeach; ?>
               </p>
               <div class="card">
                  <div class="maps" id="maps" style="height: 500px; width: 100%;"></div>
               </div>
            </div>

            <div class="col-md-4">
               <div class="row">
                  <div id="spesialis" class="col-md-12">
                     <div class="form-group">
                        <select id="kategori" name="kategori" class="custom-select">
                           <option value="0" selected>-- Spesialis --</option>
                           <?php foreach ($dataSpesialis as $spesialis) : ?>
                              <option value="<?= $spesialis->id ?>"><img src="<?= $spesialis->icon ?>" width="50px"> Dokter <?= $spesialis->nama ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <div id="kelurahan" class="col-md-12">
                     <div class="form-group">
                        <select id="kategori" name="kategori" class="custom-select">
                           <option value="0" selected>-- Kelurahan --</option>
                           <?php foreach ($dataKelurahan as $kelurahan) : ?>
                              <option value="<?= $kelurahan->id ?>"><?= $kelurahan->nama ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 mb-3 d-flex justify-content-center">
                     <button id="search" class="btn btn-mod">Search</button>
                  </div>
                  <div class="col-md-12">
                     <div class="search-box py-4 px-3">
                        <div class="form-group">
                           <input type="text" id="start" class="form-control" placeholder="Alamat anda....">
                        </div>
                        <div class="select-box">
                           <div class="form-group">
                              <select name="end" id='end' class="custom-select">
                                 <option disabled selected>Dokter Tujuan Anda</option>
                                 <?php $i = 0;
                                 foreach ($lokasiDokter as $dokter) : ?>
                                    <option value="<?= $dokter->latitude . ',' . $dokter->longitude ?>"><?= $dokter->namaDokter . ' (' . $dokter->nama_tempat . ')' ?></option>
                                 <?php endforeach; ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>



                  <div class="col-md-12 py-4">
                     <div id="direction-box" class="direction-box">

                     </div>
                  </div>

               </div>
            </div>

         </div>

      </div>
   </section>
</main>
<?php include(APPPATH . 'views/user/inc/footer.php') ?>