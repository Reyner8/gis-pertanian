<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row">
            <div class="col-md-4 mt-5">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/kelompok_tani/addKelompokTani') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="nama" class="col-form-label">nama</label>
                           <input class="form-control" id="nama" name="nama">
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
                  </div>
               </div>
            </div>
            <?= $this->session->flashdata('err-kelompok-tani') ?>

            <div class="col-md-8 mt-5">
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
                                    <td><img src="<?= base_url('assets/images/icon/icon-marker/' . $kelompokTani->icon)  ?>" alt="<?= $kelompokTani->icon  ?>"></td>
                                    <td>
                                       <a href="<?= base_url('admin/kelompok_tani/detail/' . $kelompokTani->id) ?>" class="btn btn-secondary"><i class="fa fa-info"></i></a>
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