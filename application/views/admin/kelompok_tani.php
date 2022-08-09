<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row">
            <div class="col-md-12 mt-5">
               <div class="card">
                  <div class="card-body">
                     <?php if (!$isEdit) : ?>
                        <h4 class="header-title">Add Data</h4>
                        <form action="<?= base_url('admin/kelompok_tani/addKelompokTani') ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="nama" class="col-form-label">nama</label>
                              <input class="form-control" id="nama" name="nama">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="nama" class="col-form-label">Alamat</label>
                              <textarea class="form-control" id="alamat" name="alamat"> </textarea>
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="alamat" class="col-form-label">Kelurahan</label>
                              <select class="custom-select" name="id_kelurahan">
                                 <option value="" selected="selected">Select Kelurahan</option>
                                 <?php foreach ($dataKelurahan as $kelurahan) : ?>
                                    <option value="<?= $kelurahan->idKelurahan ?>"><?= $kelurahan->namaKelurahan ?></option>
                                 <?php endforeach; ?>
                              </select>
                              <div class="error"><?= form_error('id_kelurahan') ?></div>
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

                              <div class="image-preview" id="image-preview">
                                 <img alt="image preview" class="image-preview-chosen">
                                 <span class="image-preview-default">Image Preview</span>
                              </div>
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary">Add Data</button>
                           </div>
                        </form>
                     <?php else : ?>
                        <h4 class="header-title">Edit Data</h4>
                        <form action="<?= base_url('admin/kelompok_tani/updateKelompokTani/' . $editData->id) ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="nama" class="col-form-label">nama</label>
                              <input class="form-control" id="nama" name="nama" value="<?= $editData->nama ?>">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="nama" class="col-form-label">Alamat</label>
                              <textarea class="form-control" id="alamat" name="alamat"><?= $editData->alamat ?> </textarea>
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="alamat" class="col-form-label">Kelurahan</label>
                              <select class="custom-select" name="id_kelurahan">
                                 <?php foreach ($dataKelurahan as $kelurahan) : ?>
                                    <?php if ($kelurahan->idKelurahan == $editData->id_kelurahan) : ?>
                                       <option selected value="<?= $kelurahan->idKelurahan ?>"><?= $kelurahan->namaKelurahan ?></option>
                                    <?php else : ?>
                                       <option value="<?= $kelurahan->idKelurahan ?>"><?= $kelurahan->namaKelurahan ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </select>
                              <div class="error"><?= form_error('id_kelurahan') ?></div>
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
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit Data</button>
                           </div>
                        </form>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
            <?= $this->session->flashdata('err-kelompok-tani') ?>

            <div class="col-md-12 mt-5">
               <div class="card">
                  <div class="card-body">
                     <?= $this->session->flashdata('error') ?>
                     <h4 class="header-title">Data Kelompok Tani</h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Kelurahan/Kecamatan</th>
                                 <th scope="col">Alamat</th>
                                 <th scope="col">Lat/Lng</th>
                                 <th scope="col">Icon</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataKelompokTani as $kelompokTani) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $kelompokTani->nama ?></td>
                                    <td><?= $kelompokTani->namaKelurahan . '/' . $kelompokTani->namaKecamatan ?></td>
                                    <td><?= $kelompokTani->alamat ?></td>
                                    <td><?= $kelompokTani->lat . '/' . $kelompokTani->lng ?></td>
                                    <td><img width="50" src="<?= base_url('assets/images/icon/icon-marker/' . $kelompokTani->icon)  ?>" alt="<?= $kelompokTani->icon  ?>"></td>
                                    <td>
                                       <a href="<?= base_url('admin/detail_kelompok/galeri/' . $kelompokTani->id) ?>" class="btn btn-secondary"><i class="fa fa-info"></i></a>
                                       <a href="<?= base_url('admin/kelompok_tani/editKelompokTani/' . $kelompokTani->id) ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/kelompok_tani/deleteKelompokTani/' . $kelompokTani->id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


<?php include(APPPATH . 'views/admin/inc/footer.php') ?>