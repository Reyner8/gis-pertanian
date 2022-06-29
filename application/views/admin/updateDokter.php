<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="card mt-5">
            <div class="card-body">
               <h4 class="header-title">Add Data</h4>
               <form action="<?= base_url('admin/dokter/updateDokter/' . $dataDokter->idDokter) ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="row">

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="name" class="col-form-label">Nama</label>
                                 <input type="input" class="form-control" id="name" placeholder="Input nama anda..." name="name" value="<?= $dataDokter->namaDokter ?>">
                              </div>
                              <div class="form-group">
                                 <label for="spesialis" class="col-form-label">Spesialis</label>
                                 <select id="spesialis" name="spesialis" class="custom-select">
                                    <option value="" selected>-- Pilih spesialis --</option>
                                    <?php foreach ($dataSpesialis as $s) : ?>
                                       <?php if ($s->id == $dataDokter->id_spesialis) { ?>
                                          <option selected value="<?= $s->id ?>">Dokter <?= $s->nama ?></option>
                                       <?php } else { ?>
                                          <option value="<?= $s->id ?>">Dokter <?= $s->nama ?></option>
                                       <?php } ?>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="bpjs" class="col-form-label">Bpjs</label>
                                 <select id="bpjs" name="bpjs" class="custom-select">
                                    <option value="" selected>-- Pilih --</option>
                                    <?php if ($dataDokter->bpjs == 'Y') { ?>
                                       <option selected value="Y">Tersedia</option>
                                    <?php } else { ?>
                                       <option value="N">Tidak Tersedia</option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="name" class="col-form-label">Telepon</label>
                                 <input type="input" class="form-control" id="name" placeholder="Input nomor telepon anda..." name="telepon" value="<?= $dataDokter->telepon ?>">
                              </div>
                              <div class="form-group">
                                 <label for="judul" class="col-form-label">Gambar</label>
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="image">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="image-preview" id="image-preview">
                           <img src="<?= base_url('assets/images/dokter/' . $dataDokter->foto) ?>" alt="image preview" class="image-preview-chosen">
                           <span class="image-preview-default">Image Preview</span>
                        </div>
                     </div>
                     <div class="col-md-8 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Add Data</button>
                     </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include(APPPATH . 'views/admin/inc/footer.php') ?>