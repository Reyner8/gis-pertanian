<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <?= $this->session->flashdata('error') ?>
         <div class="row mt-5">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/galeri/addgaleri') ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                           <label for="lokasi" class="col-form-label">Lokasi</label>
                           <select class="custom-select" name="lokasi">
                              <option value="" selected="selected">-- Select Lokasi --</option>
                              <?php foreach ($dataLokasi as $lokasi) : ?>
                                 <option value="<?= $lokasi->id ?>"><?= $lokasi->nama_tempat ?></option>
                              <?php endforeach; ?>
                           </select>
                           <div class="error"><?= form_error('lokasi') ?></div>
                        </div>

                        <div class="form-group">
                           <label for="judul" class="col-form-label">Gambar</label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="gambar" name="image[]" multiple>
                              <label class="custom-file-label" for="image">Pilih Gambar</label>
                           </div>
                           <div class="error"><?= form_error('gambar') ?></div>
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
                     <h4 class="header-title">Data Galeri</h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Lokasi</th>
                                 <th scope="col">Gambar</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataGaleri as $galeri) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $galeri->nama_tempat ?></td>
                                    <td><img src="<?= base_url('assets/images/galeri/' . $galeri->nama) ?>" alt="image" width="200"></td>

                                    <td>
                                       <a href="<?= base_url('admin/galeri/deleteGaleri/' . $galeri->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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