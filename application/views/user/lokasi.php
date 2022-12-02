<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section>
      <div class="container mb-5">
         <div class="row">
            <div class="col-md-8">
               <p><b> Note:</b>
                  <?php foreach ($dataDesa as $data) : ?>
                     <?= $data->nama ?><img src="<?= base_url('assets/images/icon/icon-marker/' . $data->icon)  ?>" width="20">,
                  <?php endforeach; ?>
               </p>
               <div class="card">
                  <div class="maps" id="maps" style="height: 500px; width: 100%;"></div>
               </div>
            </div>

            <div class="col-md-4">
               <div class="row">

                  <div class="col-md-12">
                     <div class="search-box py-4 px-3">
                        <div class="col-md-12 text-center">
                           <h5>Cari Desa</h5>
                        </div>
                        <div id="desa" class="col-md-12">
                           <div class="form-group">
                              <select id="kategori" name="kategori" class="custom-select">
                                 <option value="0" selected>-- Desa --</option>
                                 <?php foreach ($dataDesa as $desa) : ?>
                                    <option value="<?= $desa->id ?>"><?= $desa->nama ?></option>
                                 <?php endforeach; ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12 mb-3 d-flex justify-content-center">
                           <button id="search" class="btn btn-search">Search</button>
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