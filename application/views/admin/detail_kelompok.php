<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <!-- Galeri -->
         <div class="row mt-5">
            <div class="col-md-12">
               <?= $this->session->flashdata('error') ?>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/detail_kelompok/addgaleri/' . $kelompokTani->id) ?>" method="POST" enctype="multipart/form-data">
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
                     <h4 class="header-title">Galeri <?= $kelompokTani->nama ?></h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Gambar</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataGaleri as $galeri) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><img src="<?= base_url('assets/images/galeri/' . $galeri->nama) ?>" alt="image" width="100"></td>

                                    <td>
                                       <a href="<?= base_url('admin/detail_kelompok/deleteGaleri/' . $galeri->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
         <!-- Anggota -->
         <div class="row mt-5">
            <div class="col-md-12">
               <?= $this->session->flashdata('err-anggota') ?>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <?php if (!$isEditAnggota) : ?>
                        <h4 class="header-title">Add Anggota</h4>
                        <form action="<?= base_url('admin/detail_kelompok/addAnggota/' . $kelompokTani->id) ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="nama" class="col-form-label">nama</label>
                              <input class="form-control" id="nama" name="nama">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                              <input class="form-control" id="tempat_lahir" name="tempat_lahir">
                              <div class="error"><?= form_error('tempat_lahir') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                              <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir">
                              <div class="error"><?= form_error('tanggal_lahir') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="alamat" class="col-form-label">Jabatan</label>
                              <select class="custom-select" name="jabatan">
                                 <option value="ketua">Ketua</option>
                                 <option value="anggota">Anggota</option>
                              </select>
                              <div class="error"><?= form_error('jabatan') ?></div>
                           </div>

                           <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                     <?php else : ?>
                        <h4 class="header-title">Edit Anggota</h4>
                        <form action="<?= base_url('admin/detail_kelompok/updateAnggota/' . $editAnggota->id) ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="nama" class="col-form-label">nama</label>
                              <input class="form-control" id="nama" name="nama" value="<?= $editAnggota->nama ?>">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                              <input class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $editAnggota->tempat_lahir ?>">
                              <div class="error"><?= form_error('tempat_lahir') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                              <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $editAnggota->tanggal_lahir ?>">
                              <div class="error"><?= form_error('tanggal_lahir') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="alamat" class="col-form-label">Jabatan</label>
                              <select class="custom-select" name="jabatan">
                                 <?php if ($editAnggota->jabatan == 'ketua') : ?>
                                    <option selected value="ketua">Ketua</option>
                                    <option value="anggota">Anggota</option>
                                 <?php else : ?>
                                    <option value="ketua">Ketua</option>
                                    <option selected value="anggota">Anggota</option>
                                 <?php endif; ?>
                              </select>
                              <div class="error"><?= form_error('jabatan') ?></div>
                           </div>

                           <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <!-- Data Berita -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Anggota <?= $kelompokTani->nama ?></h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable-dua">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">TTL</th>
                                 <th scope="col">Jabatan</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataAnggota as $anggota) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $anggota->nama ?></td>
                                    <td><?= $anggota->tempat_lahir . ', ' . $anggota->tanggal_lahir ?></td>
                                    <td><?= $anggota->jabatan ?></td>
                                    <td>
                                       <a href="<?= base_url('admin/detail_kelompok/editAnggota/' . $anggota->id) ?>" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/detail_kelompok/deleteAnggota/' . $anggota->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
         <!-- Hasil Panen -->
         <div class="row mt-5">
            <div class="col-md-12">
               <?= $this->session->flashdata('err-hasil') ?>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <?php if (!$isEditHasil) : ?>
                        <h4 class="header-title">Add Hasil Panen</h4>
                        <form action="<?= base_url('admin/detail_kelompok/addHasil/' . $kelompokTani->id) ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="nama" class="col-form-label">Nama Tanaman</label>
                              <input class="form-control" id="nama" name="nama">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="tanam" class="col-form-label">Tanam</label>
                              <input type="number" class="form-control" id="tanam" name="tanam">
                              <div class="error"><?= form_error('tanam') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="panen" class="col-form-label">Panen</label>
                              <input type="number" class="form-control" type="date" id="panen" name="panen">
                              <div class="error"><?= form_error('panen') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="modal_awal" class="col-form-label">Modal Awal</label>
                              <input type="number" class="form-control" type="date" id="modal_awal" name="modal_awal">
                              <div class="error"><?= form_error('modal_awal') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="hasil_jual" class="col-form-label">Hasil Jual</label>
                              <input type="number" class="form-control" type="date" id="hasil_jual" name="hasil_jual">
                              <div class="error"><?= form_error('hasil_jual') ?></div>
                           </div>

                           <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                     <?php else : ?>
                        <h4 class="header-title">Edit Hasil</h4>
                        <form action="<?= base_url('admin/detail_kelompok/updateHasil/' . $editHasil->id) ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="nama" class="col-form-label">Nama Tanaman</label>
                              <input class="form-control" id="nama" name="nama" value="<?= $editHasil->nama ?>">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="tanam" class="col-form-label">Tanam</label>
                              <input type="number" class="form-control" id="tanam" name="tanam" value="<?= $editHasil->ditanam ?>">
                              <div class="error"><?= form_error('tanam') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="panen" class="col-form-label">Panen</label>
                              <input type="number" class="form-control" id="panen" name="panen" value="<?= $editHasil->panen ?>">
                              <div class="error"><?= form_error('panen') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="modal_awal" class="col-form-label">Modal Awal</label>
                              <input type="number" class="form-control" id="modal_awal" name="modal_awal" value="<?= $editHasil->modal_awal ?>">
                              <div class="error"><?= form_error('modal_awal') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="hasil_jual" class="col-form-label">Hasil Jual</label>
                              <input class="form-control" type="number" id="hasil_jual" name="hasil_jual" value="<?= $editHasil->hasil_jual ?>">
                              <div class="error"><?= form_error('hasil_jual') ?></div>
                           </div>

                           <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <!-- Data Berita -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Hasil Panen <?= $kelompokTani->nama ?></h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable-dua">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama Tanaman</th>
                                 <th scope="col">Di Tanam</th>
                                 <th scope="col">Panen</th>
                                 <th scope="col">Modal Awal</th>
                                 <th scope="col">Hasil Jual</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataHasil as $hasil) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $hasil->nama ?></td>
                                    <td><?= $hasil->ditanam ?></td>
                                    <td><?= $hasil->panen ?></td>
                                    <td><?= $hasil->modal_awal ?></td>
                                    <td><?= $hasil->hasil_jual ?></td>
                                    <td>
                                       <a href="<?= base_url('admin/detail_kelompok/editHasil/' . $hasil->id) ?>" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/detail_kelompok/deleteHasil/' . $hasil->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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