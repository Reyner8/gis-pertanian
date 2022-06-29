<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row">
            <div class="col-12 mt-5">
               <div class="card">
                  <div class="card-body">
                     <ul class="nav pull-left d-flex justify-content-center">
                        <li class="nav-item">Home</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-12 mt-3 tab-content" id="pills-tabContent">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Update Data</h4>
                     <form action="<?= base_url('admin/berita/updateBerita') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-4">
                              <!-- hidden -->
                              <input type="hidden" name="id" value="<?= $formData[0]->id ?>">
                              <!-- ==hidden== -->
                              <div class="form-group">
                                 <label for="judul" class="col-form-label">Judul</label>
                                 <textarea class="form-control" aria-label="With textarea" id="judul" name="judul"><?= $formData[0]->judul ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="kategori" class="col-form-label">Kategori</label>
                                 <select name="kategori" id="kategori" class="custom-select">
                                    <?php foreach ($formData as $fd) :
                                       if ($fd->kategori == 'berita') { ?>
                                          <option value="berita" selected>Berita</option>
                                       <?php } ?>
                                       <option value="tips">Tips</option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="judul" class="col-form-label">Gambar</label>
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar" value="<?= $formData[0]->gambar ?>">
                                    <label class="custom-file-label" for="Gambar">Pilih Gambar</label>
                                 </div>
                              </div>
                              <div class="image-preview" id="image-preview">
                                 <img src="<?= base_url('assets/images/berita/' . $formData[0]->gambar) ?>" alt="image preview" id="updateBerita" class="image-preview-chosen">
                                 <span class="image-preview-default">Image Preview</span>
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label for="judul" class="col-form-label">Deskripsi</label>
                                 <textarea class="form-control ckeditor" aria-label="With textarea" id="ckeditor" name="isi"><?= $formData[0]->isi ?></textarea>
                              </div>
                           </div>
                           <div class="col-md-12 d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">Add Data</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include(APPPATH . 'views/admin/inc/footer.php') ?>