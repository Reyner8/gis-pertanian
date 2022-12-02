<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-6">
               <div class="card">

                  <div class="card-body">

                     <h4 class="header-title">About Forms</h4>
                     <form action="<?= base_url('admin/about/updateAbout/' . $about->id) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="deskripsi" class="col-form-label">deskripsi</label>
                           <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $about->deskripsi ?></textarea>
                           <div class="error"><?= form_error('deskripsi') ?></div>
                        </div>

                        <div class="form-group">
                           <label for="longitude" class="col-form-label">longitude</label>
                           <input class="form-control" id="longitude" name="lng" value="<?= $about->lng ?>">
                           <div class="error"><?= form_error('lng') ?></div>
                        </div>
                        <div class="form-group">
                           <label for="latitude" class="col-form-label">latitude</label>
                           <input class="form-control" id="latitude" name="lat" value="<?= $about->lat ?>">
                           <div class="error"><?= form_error('lat') ?></div>
                        </div>
                        <div class="form-group">
                           <label for="judul" class="col-form-label">Gambar</label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="gambar" name="image">
                              <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                           </div>

                           <div class="image-preview" id="image-preview">
                              <img alt="image preview" class="image-preview-chosen">
                              <span class="image-preview-default">Image Preview</span>
                           </div>
                        </div>
                        <p>Kosongkan jika tidak mengupdate gambar</p>

                        <button type="submit" class="btn btn-primary">Add Data</button>
                     </form>
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
            <h5 class="modal-title" id="exampleModalLabel">Update Desa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="update-modal" method="POST" action="<?= base_url('admin/desa/updateDesa') ?>">
            <div class="modal-body">
               <div class="form-group">
                  <label for="desa" class="col-form-label">Desa: </label>
                  <input type="text" class="form-control" name="desa">
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