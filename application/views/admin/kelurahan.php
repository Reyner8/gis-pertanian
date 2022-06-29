<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/kelurahan/addKelurahan') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="kelurahan" class="col-form-label">Kelurahan</label>
                           <input class="form-control" id="kelurahan" name="kelurahan">
                           <div class="error"><?= form_error('kelurahan') ?></div>
                        </div>

                        <div class="form-group">
                           <label for="kecamatan" class="col-form-label">Kecamatan</label>
                           <select class="custom-select" name="kecamatan">
                              <option selected="selected" value="">-- Pilih Kecamatan --</option>
                              <?php foreach ($dataKecamatan as $kecamatan) : ?>
                                 <option value="<?= $kecamatan->id ?>"><?= $kecamatan->nama ?></option>
                              <?php endforeach; ?>
                           </select>
                           <div class="error"><?= form_error('kecamatan') ?></div>
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
                     <h4 class="header-title">Data Kelurahan</h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Kelurahan</th>
                                 <th scope="col">Kecamatan</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataKelurahan as $kelurahan) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $kelurahan->namaKelurahan ?></td>
                                    <td><?= $kelurahan->namaKecamatan ?></td>
                                    <td>
                                       <a type="button" id="update-btn-kel" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="<?= $kelurahan->idKelurahan ?>" data-kelurahan="<?= $kelurahan->namaKelurahan ?>" data-kecamatan="<?= $kelurahan->idKecamatan ?>"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/kelurahan/deleteKelurahan/' . $kelurahan->idKelurahan) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Kelurahan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="update-modal" method="POST" action="<?= base_url('admin/kelurahan/updateKelurahan') ?>">
            <div class="modal-body">
               <div class="form-group">
                  <label for="kelurahan" class="col-form-label">Kelurahan: </label>
                  <input type="text" class="form-control" name="kelurahan">
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