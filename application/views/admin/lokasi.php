<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/lokasi/addLokasi') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="lat" class="col-form-label">Latitude</label>
                                 <input class="form-control" id="lat" name="lat">
                                 <div class="error"><?= form_error('lat') ?></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="lng" class="col-form-label">Longitude</label>
                                 <input class="form-control" id="lng" name="lng">
                                 <div class="error"><?= form_error('lng') ?></div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="apotik" class="col-form-label">Apotik</label>
                                 <select class="custom-select" name="apotik">
                                    <option value="" selected="selected">Open this select menu</option>
                                    <option value="Y">Tersedia</option>
                                    <option value="N">Tidak Tersedia</option>
                                 </select>
                                 <div class="error"><?= form_error('apotik') ?></div>
                              </div>
                              <div class="form-group">
                                 <label for="wifi" class="col-form-label">Wifi</label>
                                 <select class="custom-select" name="wifi">
                                    <option value="" selected="selected">Open this select menu</option>
                                    <option value="Y">Tersedia</option>
                                    <option value="N">Tidak Tersedia</option>
                                 </select>
                                 <div class="error"><?= form_error('wifi') ?></div>
                              </div>
                              <div class="form-group">
                                 <label for="ac" class="col-form-label">AC</label>
                                 <select class="custom-select" name="ac">
                                    <option value="" selected="selected">Open this select menu</option>
                                    <option value="Y">Tersedia</option>
                                    <option value="N">Tidak Tersedia</option>
                                 </select>
                                 <div class="error"><?= form_error('ac') ?></div>
                              </div>
                              <div class="form-group">
                                 <label for="ruang_asi" class="col-form-label">Ruang Asi</label>
                                 <select class="custom-select" name="ruang_asi">
                                    <option value="" selected="selected">Open this select menu</option>
                                    <option value="Y">Tersedia</option>
                                    <option value="N">Tidak Tersedia</option>
                                 </select>
                                 <div class="error"><?= form_error('ruang_asi') ?></div>
                              </div>
                              <div class="form-group">
                                 <label for="ruang_tunggu" class="col-form-label">Ruang Tunggu</label>
                                 <select class="custom-select" name="ruang_tunggu">
                                    <option value="" selected="selected">Open this select menu</option>
                                    <option value="Y">Tersedia</option>
                                    <option value="N">Tidak Tersedia</option>
                                 </select>
                                 <div class="error"><?= form_error('ruang_tunggu') ?></div>
                              </div>
                              <div class="form-group">
                                 <label for="nebulizer" class="col-form-label">Nebulizer</label>
                                 <select class="custom-select" name="nebulizer">
                                    <option value="" selected="selected">Open this select menu</option>
                                    <option value="Y">Tersedia</option>
                                    <option value="N">Tidak Tersedia</option>
                                 </select>
                                 <div class="error"><?= form_error('nebulizer') ?></div>
                              </div>
                              <div class="form-group">
                                 <label for="namaLokasi" class="col-form-label">Nama Lokasi</label>
                                 <input class="form-control" id="namaLokasi" name="namaLokasi">
                                 <div class="error"><?= form_error('lat') ?></div>
                              </div>
                              <div class="form-group">
                                 <label for="alamat" class="col-form-label">Alamat</label>
                                 <input class="form-control" id="alamat" name="alamat">
                                 <div class="error"><?= form_error('alamat') ?></div>
                              </div>

                              <div class="form-group">
                                 <label for="alamat" class="col-form-label">Kelurahan</label>
                                 <select class="custom-select" name="kelurahan">
                                    <option value="" selected="selected">Select Kelurahan</option>
                                    <?php foreach ($dataKelurahan as $kelurahan) : ?>
                                       <option value="<?= $kelurahan->idKelurahan ?>"><?= $kelurahan->namaKelurahan ?></option>
                                    <?php endforeach; ?>
                                 </select>
                                 <div class="error"><?= form_error('kelurahan') ?></div>
                              </div>
                           </div>
                        </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Add Data</button>
                  </form>
               </div>
            </div>
            <div class="col-md-8">
               <!-- Data Berita -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Data Lokasi</h4>
                     <div class="datatable datatable-primary table-responsive">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Latitude,Longitude</th>
                                 <th scope="col">Nama Lokasi</th>
                                 <th scope="col">Alamat</th>
                                 <th scope="col">Kelurahan</th>
                                 <th scope="col">Apotik</th>
                                 <th scope="col">Wifi</th>
                                 <th scope="col">AC</th>
                                 <th scope="col">Ruang Asi</th>
                                 <th scope="col">Ruang Tunggu</th>
                                 <th scope="col">Nebulizer</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataLokasi as $lokasi) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $lokasi->latitude ?> , <?= $lokasi->longitude ?></td>
                                    <td><?= $lokasi->nama_tempat ?></td>
                                    <td><?= $lokasi->alamat ?></td>
                                    <td><?= $lokasi->nama ?></td>
                                    <td><?= ($lokasi->apotik == 'Y') ? 'Ya' : 'Tidak' ?></td>
                                    <td><?= ($lokasi->wifi == 'Y') ? 'Ya' : 'Tidak' ?></td>
                                    <td><?= ($lokasi->ac == 'Y') ? 'Ya' : 'Tidak' ?></td>
                                    <td><?= ($lokasi->ruang_asi == 'Y') ? 'Ya' : 'Tidak' ?></td>
                                    <td><?= ($lokasi->ruang_tunggu == 'Y') ? 'Ya' : 'Tidak' ?></td>
                                    <td><?= ($lokasi->nebulizer == 'Y') ? 'Ya' : 'Tidak' ?></td>
                                    <td>
                                       <a type="button" id="update-btn-loc" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="<?= $lokasi->id ?>" data-lat="<?= $lokasi->latitude ?>" data-lng="<?= $lokasi->longitude ?>" data-namalokasi="<?= $lokasi->nama_tempat ?>" data-alamat="<?= $lokasi->alamat ?>" data-apotik="<?= $lokasi->apotik ?>" data-wifi="<?= $lokasi->wifi ?>" data-ac="<?= $lokasi->ac ?>" data-ruangasi="<?= $lokasi->ruang_asi ?>" data-ruangtunggu="<?= $lokasi->ruang_tunggu ?>" data-nebulizer="<?= $lokasi->nebulizer ?>" data-kelurahan="<?= $lokasi->id_kelurahan ?>"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/lokasi/deleteLokasi/' . $lokasi->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Lokasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="update-modal" method="POST" action="<?= base_url('admin/lokasi/updateLokasi') ?>">
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="lat" class="col-form-label">Latitude</label>
                        <input class="form-control" id="lat" name="lat">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="lng" class="col-form-label">Longitude</label>
                        <input class="form-control" id="lng" name="lng">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="apotik" class="col-form-label">Apotik</label>
                        <select class="custom-select" name="apotik">
                           <option selected="selected">Open this select menu</option>
                           <option value="Y">Tersedia</option>
                           <option value="N">Tidak Tersedia</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="wifi" class="col-form-label">Wifi</label>
                        <select class="custom-select" name="wifi">
                           <option value="" selected="selected">Open this select menu</option>
                           <option value="Y">Tersedia</option>
                           <option value="N">Tidak Tersedia</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="ac" class="col-form-label">AC</label>
                        <select class="custom-select" name="ac">
                           <option value="" selected="selected">Open this select menu</option>
                           <option value="Y">Tersedia</option>
                           <option value="N">Tidak Tersedia</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="ruang_asi" class="col-form-label">Ruang Asi</label>
                        <select class="custom-select" name="ruang_asi">
                           <option value="" selected="selected">Open this select menu</option>
                           <option value="Y">Tersedia</option>
                           <option value="N">Tidak Tersedia</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="ruang_tunggu" class="col-form-label">Ruang Tunggu</label>
                        <select class="custom-select" name="ruang_tunggu">
                           <option value="" selected="selected">Open this select menu</option>
                           <option value="Y">Tersedia</option>
                           <option value="N">Tidak Tersedia</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="nebulizer" class="col-form-label">Nebulizer</label>
                        <select class="custom-select" name="nebulizer">
                           <option value="" selected="selected">Open this select menu</option>
                           <option value="Y">Tersedia</option>
                           <option value="N">Tidak Tersedia</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="namaLokasi" class="col-form-label">Nama Lokasi</label>
                        <input class="form-control" id="namaLokasi" name="namaLokasi">
                     </div>
                     <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat">
                     </div>

                     <div class="form-group">
                        <label for="alamat" class="col-form-label">Kelurahan</label>
                        <select class="custom-select" name="kelurahan">
                           <option selected="selected">Select Kelurahan</option>
                           <?php foreach ($dataKelurahan as $kelurahan) : ?>
                              <option value="<?= $kelurahan->idKelurahan ?>"><?= $kelurahan->namaKelurahan ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
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