<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="card mt-5">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-5">
                     <div class="row">


                     </div>
                  </div>
                  <div class="col-md-7">
                     <h4 class="font-weight-bold mb-3">Detail Kelompok Tani</h4>

                     <div class="table-responsive">
                        <table class="table">
                           <tr>
                              <th scope="row">Nama</th>
                              <td> : <?= $kelompokTani->nama ?></td>
                           </tr>

                           <tr>
                              <th scope="row">Kelurahan/Kecamatan</th>
                              <td> : <?= $kelompokTani->namaKelurahan . ' / ' . $kelompokTani->namaKecamatan ?></td>
                           </tr>

                           <tr>
                              <th scope="row">Alamat</th>
                              <td> : <?= $kelompokTani->alamat ?></td>
                           </tr>

                           <tr>
                              <th scope="row">Latitude / Longitude</th>
                              <td> : <?= $kelompokTani->lat . ' / ' . $kelompokTani->lng ?>
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