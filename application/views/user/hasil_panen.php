<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="title text-center">Hasil Panen</h1>
               <p class="title text-center mb-5">Pilih berdasarkan Kecamatan</p>
            </div>
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body">
                     <form action="<?= base_url('hasil_pertanian/cari') ?>" method="POST">
                        <div class="form-group">
                           <label class="mr-sm-2" for="inlineFormCustomSelect">Kecamatan</label>
                           <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="idKecamatan">
                              <option selected value="0">Choose...</option>
                              <?php foreach ($kecamatan as $k) : ?>
                                 <option value="<?= $k->id ?>"><?= $k->nama ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                        <button class="btn btn-primary">Cari</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-9">
               <div class="card">
                  <div class="card-body">
                     <div class="biodata mb-5">
                        <table id="datatable" class="table table-bordered">
                           <thead>
                              <tr>
                                 <th scope="col">Desa</th>
                                 <?php foreach ($jenisTanaman as $jt) : ?>
                                    <th scope="col"><?= $jt->nama ?></th>
                                 <?php endforeach; ?>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($hasilSum as $hasilSum) : ?>
                                 <tr>
                                    <?php foreach ($hasilSum as $key => $subHasil) : ?>
                                       <?php if ($key == 0) : ?>
                                          <td><?= $subHasil ?></td>
                                       <?php else : ?>
                                          <td><?= $subHasil ?> /Ton</td>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                    <td>
                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDetail<?= str_replace(' ', '_', $hasilSum[0])  ?>">
                                          Detail
                                       </button>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>


                     </div>


                  </div>
               </div>

            </div>
         </div>
      </div>
   </section>
</main>

<!-- Modal -->
<?php foreach ($desa as $kel) : ?>
   <div class="modal fade bd-example-modal-lg" id="ModalDetail<?= str_replace(' ', '_', $kel->nama)  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Hasil Panen Desa <?= $kel->nama ?></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <table id="datatable" class="table table-bordered">
                  <thead>
                     <tr>
                        <th scope="col">Nama Tanaman</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Hasil</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($hasil as $h) : ?>

                        <?php if ($h->idDesa == $kel->id) : ?>
                           <tr>
                              <td><?= $h->nama ?></td>
                              <td><?= $h->namaJenis ?></td>
                              <td><?= $h->tahun ?></td>
                              <td><?= $h->hasil ?> /Ton</td>
                           </tr>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
<?php endforeach; ?>




<?php include(APPPATH . 'views/user/inc/footer.php') ?>