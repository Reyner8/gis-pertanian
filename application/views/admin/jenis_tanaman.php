<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Add Data</h4>
                     <form action="<?= base_url('admin/jenis_tanaman/addJenisTanaman') ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                           <label for="nama" class="col-form-label">Jenis Tanaman</label>
                           <input class="form-control" id="nama" name="nama">
                           <div class="error"><?= form_error('nama') ?></div>
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
                     <h4 class="header-title">Data Jenis Tanaman</h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $number = 1;
                              foreach ($dataJenisTanaman as $jenisTanaman) : ?>
                                 <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $jenisTanaman->nama ?></td>
                                    <td>
                                       <a type="button" id="update-btn-jenis" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="<?= $jenisTanaman->id ?>" data-nama="<?= $jenisTanaman->nama ?>"><i class="fa fa-pencil"></i></a>
                                       <a href="<?= base_url('admin/jenis_tanaman/deleteJenisTanaman/' . $jenisTanaman->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Update Jenis Tanaman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="update-modal" method="POST" action="<?= base_url('admin/jenis_tanaman/updateJenisTanaman') ?>">
            <div class="modal-body">
               <div class="form-group">
                  <label for="nama" class="col-form-label">Jenis Tanaman: </label>
                  <input type="text" class="form-control" name="nama">
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