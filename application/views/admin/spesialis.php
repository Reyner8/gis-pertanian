<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/spesialis/addSpesialis') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="nama" class="col-form-label">nama</label>
                           <input class="form-control" id="nama" name="nama">
                           <div class="error"><?= form_error('nama') ?></div>
                        </div>
                        <div class="form-group">
                           <label for="judul" class="col-form-label">Icon</label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="gambar" name="gambar">
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
            <div class="col-md-8">
               <!-- Data Berita -->
               <div class="card">
                  <div class="card-body">
                     <?= $this->session->flashdata('error') ?>
                     <h4 class="header-title">Data Spesialis</h4>
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
                              foreach ($dataSpesialis as $spesialis) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td>Dokter <?= $spesialis->nama ?></td>
                                    <td><img src="<?= base_url('assets/images/icon/icon-marker/' . $spesialis->icon)  ?>" alt=""></td>
                                    <td>
                                       <a href="<?= base_url('admin/spesialis/updateForm/' . $spesialis->id) ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/spesialis/deleteSpesialis/' . $spesialis->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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