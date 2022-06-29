<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="card mt-5">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-5">
                     <div class="row">
                        <div class="col-md-12">
                           <img src="<?= base_url('assets/images/dokter/' . $dokter->foto) ?>" alt="profile" class="img-fluid">
                        </div>
                        <div class="col-md-12">
                           <div class="row my-4">
                              <div class="col-md-12 d-flex justify-content-center">
                                 <h5 class="font-weight-bold">Jadwal</h5>
                              </div>
                              <div class="col-md-12">
                                 <!-- tab menu -->
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
                                             <a href="<?= base_url('admin/dokter/deletePraktik/' . $tabContent->id_lokasi . '/' . $dokter->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete Lokasi</a>
                                             <table class="table table-borderless">
                                                <?php foreach ($jadwal as $j) : if ($j->id_lokasi == $tabContent->id_lokasi) : ?>
                                                      <tr>
                                                         <td><?= $j->hari ?></td>
                                                         <td><?= $j->jam_buka . ' - ' . $j->jam_tutup ?></td>
                                                      </tr>
                                                <?php endif;
                                                endforeach; ?>
                                             </table>
                                          </div>
                                       <?php } else { ?>
                                          <div class="tab-pane fade active show my-3 mx-2" id="<?= 'tab' . $tc++ ?>" role="tabpanel" aria-labelledby="jadwal-tab">
                                             <a href="<?= base_url('admin/dokter/deletePraktik/' . $tabContent->id_lokasi . '/' . $dokter->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete Lokasi</a>

                                             <table class="table table-borderless">
                                                <?php foreach ($jadwal as $j) : if ($j->id_lokasi == $tabContent->id_lokasi) : ?>
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


                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-7">
                     <h4 class="font-weight-bold mb-3">Detail Dokter</h4>

                     <div class="table-responsive">
                        <table class="table">
                           <tr>
                              <th scope="row">Nama</th>
                              <td> : <?= $dokter->nama ?></td>
                           </tr>

                           <tr>
                              <th scope="row">Spesialis</th>
                              <td> : Dokter <?= $dokter->namaSpesialis ?></td>
                           </tr>

                           <tr>
                              <th scope="row">Telepon</th>
                              <td> : <?= $dokter->telepon ?></td>
                           </tr>

                           <tr>
                              <th scope="row">BPJS</th>
                              <td> : <?php if ($dokter->bpjs == 'Y') { ?>
                                    <i class="fa fa-check"></i> Tersedia
                                 <?php } else { ?>
                                    <i class="fa fa-times"></i> Tidak Tersedia
                                 <?php } ?></td>
                           </tr>
                           <tr>
                              <th scope="row">Lokasi</th>
                              <td>
                                 <ul>
                                    <?php foreach ($lokasi as $l) : ?>
                                       <li>- <?= $l->nama_tempat . ' - ' . $l->alamat ?></li>
                                    <?php endforeach; ?>
                                 </ul>
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">Apotik</th>
                              <td>
                                 <ul>
                                    <?php foreach ($lokasi as $l) : ?>
                                       <li>
                                          <?php if ($l->apotik == 'Y') { ?>
                                             <i class="fa fa-check"></i> <?= $l->nama_tempat ?>
                                          <?php } else { ?>
                                             <i class="fa fa-times"></i> <?= $l->nama_tempat ?>
                                          <?php } ?>
                                       </li>
                                    <?php endforeach; ?>
                                 </ul>
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">Wifi</th>
                              <td>
                                 <ul>
                                    <?php foreach ($lokasi as $l) : ?>
                                       <li>
                                          <?php if ($l->wifi == 'Y') { ?>
                                             <i class="fa fa-check"></i> <?= $l->nama_tempat ?>
                                          <?php } else { ?>
                                             <i class="fa fa-times"></i> <?= $l->nama_tempat ?>
                                          <?php } ?>
                                       </li>
                                    <?php endforeach; ?>
                                 </ul>
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">AC</th>
                              <td>
                                 <ul>
                                    <?php foreach ($lokasi as $l) : ?>
                                       <li>
                                          <?php if ($l->ac == 'Y') { ?>
                                             <i class="fa fa-check"></i> <?= $l->nama_tempat ?>
                                          <?php } else { ?>
                                             <i class="fa fa-times"></i> <?= $l->nama_tempat ?>
                                          <?php } ?>
                                       </li>
                                    <?php endforeach; ?>
                                 </ul>
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">Ruang Asi</th>
                              <td>
                                 <ul>
                                    <?php foreach ($lokasi as $l) : ?>
                                       <li>
                                          <?php if ($l->ruang_asi == 'Y') { ?>
                                             <i class="fa fa-check"></i> <?= $l->nama_tempat ?>
                                          <?php } else { ?>
                                             <i class="fa fa-times"></i> <?= $l->nama_tempat ?>
                                          <?php } ?>
                                       </li>
                                    <?php endforeach; ?>
                                 </ul>
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">Ruang Tunggu</th>
                              <td>
                                 <ul>
                                    <?php foreach ($lokasi as $l) : ?>
                                       <li>
                                          <?php if ($l->ruang_tunggu == 'Y') { ?>
                                             <i class="fa fa-check"></i> <?= $l->nama_tempat ?>
                                          <?php } else { ?>
                                             <i class="fa fa-times"></i> <?= $l->nama_tempat ?>
                                          <?php } ?>
                                       </li>
                                    <?php endforeach; ?>
                                 </ul>
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">Nebulizer</th>
                              <td>
                                 <ul>
                                    <?php foreach ($lokasi as $l) : ?>
                                       <li>
                                          <?php if ($l->nebulizer == 'Y') { ?>
                                             <i class="fa fa-check"></i> <?= $l->nama_tempat ?>
                                          <?php } else { ?>
                                             <i class="fa fa-times"></i> <?= $l->nama_tempat ?>
                                          <?php } ?>
                                       </li>
                                    <?php endforeach; ?>
                                 </ul>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="mb-3">

                                    <button type="button" id="update-btn-praktik" data-toggle="modal" data-target="#exampleModal" data-id="<?= $dokter->id ?>" class="btn btn-outline-primary btn-xs"><i class="fa fa-plus"></i> Lokasi</button>
                                    <a href="<?= base_url('admin/dokter/deleteDokter/' . $dokter->id) ?>" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash"></i> Delete Dokter</a>
                                    <a href="<?= base_url('admin/dokter/editDokter/' . $dokter->id) ?>" class="btn btn-outline-warning btn-xs"><i class="fa fa-pencil"></i> Edit Dokter</a>
                                 </div>
                              </td>
                           </tr>

                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Lokasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="update-modal" method="POST" action="<?= base_url('admin/dokter/addPraktik/' . $dokter->id) ?>">
            <div class="modal-body">
               <div class="form-group">
                  <label for="lokasi" class="col-form-label">Lokasi: </label>
                  <select name="lokasi" id="lokasi" class="custom-select">
                     <?php foreach ($dropdown as $lokasi) : ?>
                        <option value="<?= $lokasi->id ?>"><?= $lokasi->nama_tempat . ' (' . $lokasi->alamat . ')' ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
            </div>
         </form>


      </div>
   </div>
</div>

<?php include(APPPATH . 'views/admin/inc/footer.php') ?>