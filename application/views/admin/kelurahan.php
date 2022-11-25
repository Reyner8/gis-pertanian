<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <?php if ($isEdit == false) : ?>
                        <h4 class="header-title">Add Data</h4>
                        <form action="<?= base_url('admin/kelurahan/addKelurahan') ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="kelurahan" class="col-form-label">Kelurahan</label>
                              <input class="form-control" id="kelurahan" name="kelurahan">
                              <div class="error"><?= form_error('kelurahan') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="kecamatan" class="col-form-label">Kecamatan</label>
                              <select class="custom-select" name="kecamatan">
                                 <option selected="selected" value="">-- Pilih Kecamatan --</option>
                                 <?php foreach ($dataKecamatan as $kecamatan) : ?>
                                    <option value="<?= $kecamatan->id ?>"><?= $kecamatan->nama ?></option>
                                 <?php endforeach; ?>
                              </select>
                              <div class="error"><?= form_error('kecamatan') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="longitude" class="col-form-label">longitude</label>
                              <input class="form-control" id="longitude" name="lng">
                              <div class="error"><?= form_error('lng') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="latitude" class="col-form-label">latitude</label>
                              <input class="form-control" id="latitude" name="lat">
                              <div class="error"><?= form_error('lat') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="judul" class="col-form-label">Icon</label>
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="gambar" name="image">
                                 <label class="custom-file-label" for="gambar">Pilih Icon</label>
                              </div>
                              <div class="error"><?= form_error('imagecheck') ?></div>

                              <div class="image-preview" id="image-preview">
                                 <img alt="image preview" class="image-preview-chosen">
                                 <span class="image-preview-default">Image Preview</span>
                              </div>
                           </div>

                           <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                     <?php else : ?>
                        <form action="<?= base_url('admin/kelurahan/updateKelurahan/' . $editData->idKelurahan) ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="kelurahan" class="col-form-label">Kelurahan</label>
                              <input class="form-control" id="kelurahan" name="kelurahan" value="<?= $editData->namaKelurahan ?>">
                              <div class="error"><?= form_error('kelurahan') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="kecamatan" class="col-form-label">Kecamatan</label>
                              <select class="custom-select" name="kecamatan">
                                 <option selected="selected" value="">-- Pilih Kecamatan --</option>
                                 <?php foreach ($dataKecamatan as $kecamatan) : ?>
                                    <?php if ($editData->idKecamatan == $kecamatan->id) : ?>
                                       <option selected value="<?= $kecamatan->id ?>"><?= $kecamatan->nama ?></option>
                                    <?php else : ?>
                                       <option value="<?= $kecamatan->id ?>"><?= $kecamatan->nama ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </select>
                              <div class="error"><?= form_error('kecamatan') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="longitude" class="col-form-label">longitude</label>
                              <input class="form-control" id="longitude" name="lng" value="<?= $editData->lng ?>">
                              <div class="error"><?= form_error('lng') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="latitude" class="col-form-label">latitude</label>
                              <input class="form-control" id="latitude" name="lat" value="<?= $editData->lat ?>">
                              <div class="error"><?= form_error('lat') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="judul" class="col-form-label">Icon</label>
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="gambar" name="image">
                                 <label class="custom-file-label" for="gambar">Pilih Icon</label>
                              </div>

                              <div class="image-preview" id="image-preview">
                                 <img alt="image preview" class="image-preview-chosen">
                                 <span class="image-preview-default">Image Preview</span>
                              </div>
                           </div>
                           <p>Kosongkan jika tidak mengupdate gambar</p>

                           <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>

                     <?php endif; ?>
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <!-- Data Berita -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Data Desa</h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">ID</th>
                                 <th scope="col">Desa</th>
                                 <th scope="col">Kecamatan</th>
                                 <th scope="col">Longitude/Lattitude</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataKelurahan as $kelurahan) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $kelurahan->idKelurahan ?></td>
                                    <td><?= $kelurahan->namaKelurahan ?></td>
                                    <td><?= $kelurahan->namaKecamatan ?></td>
                                    <td><?= $kelurahan->lng . '/' . $kelurahan->lat ?></td>
                                    <td>

                                       <a type="button" id="edit" class="btn btn-info" href="<?= base_url('admin/hasil_panen/data/' . $kelurahan->idKelurahan) ?>"><i class="fa fa-pencil"></i> Hasil Panen</a>
                                       <a type="button" id="edit" class="btn btn-warning" href="<?= base_url('admin/kelurahan/editKelurahan/' . $kelurahan->idKelurahan) ?>"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/kelurahan/deleteKelurahan/' . $kelurahan->idKelurahan) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
   </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Kelurahan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="update-modal" method="POST" action="<?= base_url('admin/kelurahan/updateKelurahan') ?>">
            <div class="modal-body">
               <div class="form-group">
                  <label for="kelurahan" class="col-form-label">Kelurahan: </label>
                  <input type="text" class="form-control" name="kelurahan">
               </div>
               <div class="form-group">
                  <label for="kecamatan" class="col-form-label">Kecamatan: </label>
                  <select name="kecamatan" id="kecamatan" class="custom-select">
                     <?php foreach ($dataKecamatan as $kecamatan) : ?>
                        <option value="<?= $kecamatan->id ?>"><?= $kecamatan->nama ?></option>
                     <?php endforeach; ?>
                  </select>
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