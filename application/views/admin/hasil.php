<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-4">
            <div class="col-md-6">
               <a class="btn btn-primary" href="<?= base_url('admin/kelurahan') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
         </div>
         <!-- Hasil Panen -->
         <div class="row mt-2">
            <div class="col-md-12">
               <?= $this->session->flashdata('err-hasil') ?>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <?php if (!$isEditHasil) : ?>
                        <h4 class="header-title">Add Hasil Panen</h4>
                        <form action="<?= base_url('admin/hasil_panen/addHasil/' . $kelurahan->idKelurahan) ?>" method="POST" enctype="multipart/form-data">

                           <div class="form-group">
                              <label for="nama" class="col-form-label">Nama Tanaman</label>
                              <input class="form-control" id="nama" name="nama">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="nama_tanaman" class="col-form-label">Jenis Tanaman</label>
                              <select name="jenis_tanaman" id="nama_tanaman" class="custom-select">
                                 <option selected="selected" value="">Nama Tanaman</option>
                                 <?php foreach ($jenisTanaman as $tanaman) : ?>
                                    <option value="<?= $tanaman->id ?>"><?= $tanaman->nama ?></option>
                                 <?php endforeach; ?>
                              </select>
                           </div>

                           <div class="form-group">
                              <label for="hasil_jual" class="col-form-label">Hasil Panen</label>
                              <input type="number" class="form-control" id="hasil" name="hasil">
                              <div class="error"><?= form_error('hasil') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="tahun" class="col-form-label">Tahun</label>
                              <input type="number" class="form-control" id="tahun" name="tahun">
                              <div class="error"><?= form_error('tahun') ?></div>
                           </div>

                           <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                     <?php else : ?>
                        <h4 class="header-title">Edit Hasil</h4>
                        <form action="<?= base_url('admin/hasil_panen/updateHasil/' . $editHasil->id) ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="nama" class="col-form-label">Nama Tanaman</label>
                              <input class="form-control" id="nama" name="nama" value="<?= $editHasil->nama ?>">
                              <div class="error"><?= form_error('nama') ?></div>
                           </div>

                           <div class="form-group">
                              <label for="jenis_tanaman" class="col-form-label">Jenis Tanaman</label>
                              <select name="jenis_tanaman" id="jenis_tanaman" class="custom-select">
                                 <option selected="selected" value="">Jenis Tanaman</option>
                                 <?php foreach ($jenisTanaman as $tanaman) : ?>
                                    <?php if ($tanaman->id == $editHasil->id_jenis) : ?>
                                       <option value="<?= $tanaman->id ?>" selected><?= $tanaman->nama ?></option>
                                    <?php else : ?>
                                       <option value="<?= $tanaman->id ?>"><?= $tanaman->nama ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </select>
                           </div>


                           <div class="form-group">
                              <label for="hasil_jual" class="col-form-label">Hasil Panen</label>
                              <input class="form-control" type="number" id="hasil" name="hasil" value="<?= $editHasil->hasil ?>">
                              <div class="error"><?= form_error('hasil') ?></div>
                           </div>
                           <div class="form-group">
                              <label for="tahun" class="col-form-label">Tahun</label>
                              <input class="form-control" type="number" id="tahun" name="tahun" value="<?= $editHasil->tahun ?>">
                              <div class="error"><?= form_error('tahun') ?></div>
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
                     <h4 class="header-title">Hasil Panen <?= ($isEditHasil) ? $editHasil->namaKelurahan : $kelurahan->namaKelurahan ?></h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable-dua">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama Tanaman</th>
                                 <th scope="col">Jenis Tanaman</th>
                                 <th scope="col">Hasil Panen</th>
                                 <th scope="col">Tahun</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($hasilPanen as $hasil) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $hasil->nama ?></td>
                                    <td><?= $hasil->jenisTanaman ?></td>
                                    <td><?= $hasil->hasil ?> / Ton</td>
                                    <td><?= $hasil->tahun ?></td>
                                    <td>
                                       <a class="btn btn-warning" href="<?= base_url('admin/hasil_panen/editHasil/' . $hasil->id) ?>">
                                          <i class="fa fa-pencil"></i>
                                       </a>
                                       <a class="btn btn-danger" href="<?= base_url('admin/hasil_panen/deleteHasil/' . $hasil->id) ?>">
                                          <i class="fa fa-trash"></i>
                                       </a>
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