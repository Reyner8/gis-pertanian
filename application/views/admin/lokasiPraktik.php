<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/jadwal/addJadwal') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="dokter" class="col-form-label">Dokter</label>
                           <select class="custom-select" name="dokter" id="dokter">
                              <option value="">Pilih Dokter</option>
                              <?php foreach ($dataDokter as $dokter) : ?>
                                 <option value="<?= $dokter->idDokter ?>"><?= $dokter->namaDokter ?></option>
                              <?php endforeach; ?>
                           </select>
                           <div class="error"><?= form_error('dokter') ?></div>
                        </div>
                        <div class="form-group">
                           <label for="lokasi" class="col-form-label">Lokasi</label>
                           <select class="custom-select" name="lokasi" id="lokasi">
                              <option value="">Lokasi</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="hari" class="col-form-label">Hari</label>
                           <select class="custom-select" name="hari" id="hari">
                              <option value="" selected>Pilih Hari</option>
                              <option value="senin">Senin</option>
                              <option value="selasa">Selasa</option>
                              <option value="rabu">Rabu</option>
                              <option value="kamis">Kamis</option>
                              <option value="jumat">Jumat</option>
                              <option value="sabtu">Sabtu</option>
                              <option value="minggu">Minggu</option>
                           </select>
                           <div class="error"><?= form_error('hari') ?></div>
                        </div>
                        <div class="form-group">
                           <label for="jamBuka" class="col-form-label">Jam Buka</label>
                           <input type="time" class="form-control" id="jamBuka" name="jamBuka" value="">
                           <div class="error"><?= form_error('jamBuka') ?></div>
                        </div>
                        <div class="form-group">
                           <label for="jamTutup" class="col-form-label">Jam Tutup</label>
                           <input type="time" class="form-control" id="jamTutup" name="jamTutup" value="">
                           <div class="error"><?= form_error('jamTutup') ?></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <!-- Data Berita -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Data Jadwal</h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Hari</th>
                                 <th scope="col">Dokter</th>
                                 <th scope="col">Lokasi</th>
                                 <th scope="col">waktu</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>

                              <?php $number = 1;
                              foreach ($dataJadwal as $jadwal) : ?>
                                 <tr>
                                    <?php if ($jadwal->hari != null) : ?>
                                       <th scope="row"><?= $number++ ?></th>
                                       <td><?= $jadwal->hari ?></td>
                                       <td><?= $jadwal->namaDokter ?></td>
                                       <td><?= $jadwal->nama_tempat ?></td>
                                       <td><?= $jadwal->jam_buka . ' - ' . $jadwal->jam_tutup ?></td>
                                       <td><a href="<?= base_url('admin/jadwal/deleteJadwal/' . $jadwal->idPraktik) ?>" class="btn btn-danger fa fa-trash"></a></td>
                                    <?php endif; ?>
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
   </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Praktik</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <form id="update-modal" method="POST" action="<?= base_url('admin/spesialis/updateSpesialis') ?>">
            <div class="modal-body">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nama: </label>
                  <input type="text" class="form-control input-name" name="nama">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Update</button>
            </div>
         </form>

      </div>
   </div>
</div>

<?php include(APPPATH . 'views/admin/inc/footer.php') ?>