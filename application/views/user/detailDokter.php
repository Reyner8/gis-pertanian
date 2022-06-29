<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <img class="img-fluid mb-3" src="<?= base_url('assets/images/dokter/' . $detailDokter[0]->foto) ?>" alt="Profile">
               <hr>
               <h6>Gallery Lokasi</h6>
               <?php foreach ($lokasi as $l) : ?>
                  <ul class="list-group">
                     <li class="list-group-item">
                        <a href="<?= base_url('dokter/detailLokasi/' . $l->id_lokasi) ?>" target="_blank" class="text-custom mb-3"><?= $l->nama_tempat ?></a>
                     </li>
                  </ul>
               <?php endforeach; ?>
               <hr>
               <!-- tab menu -->
               <h6>Jadwal</h6>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <?php $t = 0;
                  foreach ($lokasi as $key => $tab) : if ($key == 0) { ?>
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#<?= 'tab' . $t++ ?>" role="tab" aria-controls="jadwal" aria-selected="true" disabled><?= $tab->nama_tempat ?></a>
                        </li>
                     <?php } else { ?>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#<?= 'tab' . $t++ ?>" role="tab" aria-controls="jadwal" aria-selected="true" disabled><?= $tab->nama_tempat ?></a>
                        </li>
                  <?php }
                  endforeach; ?>
               </ul>
               <!-- End: tab menu -->
               <!-- tab content -->

               <div class="tab-content" id="myTabContent">
                  <?php $tc = 0;
                  foreach ($lokasi as $key => $tabContent) : ?>
                     <?php if ($key == 0) { ?>
                        <div class="tab-pane fade active show my-3 mx-2" id="<?= 'tab' . $tc++ ?>" role="tabpanel" aria-labelledby="jadwal-tab">


                           <table class="table table-borderless">
                              <?php foreach ($jadwal as $j) : if ($j->nama_tempat == $tabContent->nama_tempat) : ?>
                                    <tr>
                                       <td><?= $j->hari ?></td>
                                       <td><?= $j->jam_buka . ' - ' . $j->jam_tutup ?></td>
                                    </tr>
                              <?php endif;
                              endforeach; ?>
                           </table>
                        </div>
                     <?php } else { ?>
                        <div class="tab-pane fade show my-3 mx-2" id="<?= 'tab' . $tc++ ?>" role="tabpanel" aria-labelledby="jadwal-tab">
                           <table class="table table-borderless">
                              <?php foreach ($jadwal as $j) : if ($j->nama_tempat == $tabContent->nama_tempat) : ?>
                                    <tr>
                                       <td><?= $j->hari ?></td>
                                       <td><?= $j->jam_buka . ' - ' . $j->jam_tutup ?></td>
                                    </tr>
                              <?php endif;
                              endforeach; ?>
                           </table>
                        </div>
                     <?php } ?>

                  <?php endforeach; ?>
               </div>

               <!-- End: tab content -->
            </div>
            <div class="col-md-7">
               <div class="biodata mb-5">
                  <h3><?= ucwords($detailDokter[0]->namaDokter) ?></h3>
                  <p class="text-custom mb-3">Dokter <?= $detailDokter[0]->namaSpesialis ?></p>
                  <p class="mb-2"><i class="fa fa-phone"></i> <?= $detailDokter[0]->telepon ?></p>
                  <p class="mb-2"><i class="fa fa-map-marker"></i> Alamat :
                     <ul class="list-group">
                        <?php foreach ($alamat as $a) : ?>
                           <li class="list-group-item borderless">
                              <p><?= $a->nama_tempat . ' - ' . $a->alamat ?></p>
                           </li>
                        <?php endforeach; ?>
                     </ul>
                  </p>
                  <h6>Fasilitas Umum :</h6>
                  <div class="row">

                     <div class="col-md-6">
                        <p class="mb-2">
                           <p class="text-custom">Wifi :</p>
                           <ul class="list-group">
                              <?php foreach ($alamat as $al) :
                                 if ($al->wifi == 'Y') { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-check"></i>
                                       </p>
                                    </li>
                                 <?php } else { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-times"></i>
                                       </p>
                                    </li>
                                 <?php } ?>
                              <?php endforeach; ?>
                           </ul>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <p class="mb-2">
                           <p class="text-custom">AC :</p>
                           <ul class="list-group">
                              <?php foreach ($alamat as $al) :
                                 if ($al->ac == 'Y') { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-check"></i>
                                       </p>
                                    </li>
                                 <?php } else { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-times"></i>
                                       </p>
                                    </li>
                                 <?php } ?>
                              <?php endforeach; ?>
                           </ul>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <p class="mb-2">
                           <p class="text-custom">Ruang Asi :</p>
                           <ul class="list-group">
                              <?php foreach ($alamat as $al) :
                                 if ($al->ruang_asi == 'Y') { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-check"></i>
                                       </p>
                                    </li>
                                 <?php } else { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-times"></i>
                                       </p>
                                    </li>
                                 <?php } ?>
                              <?php endforeach; ?>
                           </ul>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <p class="mb-2">
                           <p class="text-custom">Ruang Tunggu :</p>
                           <ul class="list-group">
                              <?php foreach ($alamat as $al) :
                                 if ($al->ruang_tunggu == 'Y') { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-check"></i>
                                       </p>
                                    </li>
                                 <?php } else { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-times"></i>
                                       </p>
                                    </li>
                                 <?php } ?>
                              <?php endforeach; ?>
                           </ul>
                        </p>
                     </div>
                  </div>
                  <h6>Fasilitas Medis :</h6>
                  <div class="row">
                     <div class="col-md-6">
                        <p class="mb-2">
                           <p class="text-custom">Apotik :</p>
                           <ul class="list-group">
                              <?php foreach ($alamat as $al) :
                                 if ($al->apotik == 'Y') { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-check"></i>
                                       </p>
                                    </li>
                                 <?php } else { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-times"></i>
                                       </p>
                                    </li>
                                 <?php } ?>
                              <?php endforeach; ?>
                           </ul>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <p class="mb-2">
                           <p class="text-custom">Nebulizer :</p>
                           <ul class="list-group">
                              <?php foreach ($alamat as $al) :
                                 if ($al->nebulizer == 'Y') { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-check"></i>
                                       </p>
                                    </li>
                                 <?php } else { ?>
                                    <li class="list-group-item borderless">
                                       <p>
                                          <?= $al->nama_tempat ?> - <i class="fa fa-times"></i>
                                       </p>
                                    </li>
                                 <?php } ?>
                              <?php endforeach; ?>
                           </ul>
                        </p>
                     </div>
                  </div>
                  <p class="mb-2">
                     <p class="text-custom">Layanan Lainnya :</p>
                  </p>
                  <p class="mb-2">Bpjs <?php if ($detailDokter[0]->bpjs) { ?>
                        <i class="fa fa-check"></i>
                     <?php } else { ?>
                        <i class="fa fa-times"></i>
                     <?php } ?>
                  </p>
               </div>


            </div>
         </div>
      </div>
   </section>
</main>




<?php include(APPPATH . 'views/user/inc/footer.php') ?>