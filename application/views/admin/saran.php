<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
   <div class="main-content-inner">
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-12">
               <!-- Data Berita -->
               <div class="card">
                  <div class="card-body">
                     <h4 class="header-title">Data Saran</h4>
                     <div class="datatable datatable-primary">
                        <table class="table text-center" id="datatable">
                           <thead class="text-capitalize">
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Isi</th>
                                 <th scope="col">Tanggal</th>                              
                                 <th scope="col">Action</th>                              
                              </tr>
                           </thead>
                           <tbody>

                              <?php $number = 1;
                              foreach ($dataSaran as $saran) : ?>
                                    <tr>
                                       <th scope="row"><?= $number++ ?></th>
                                       <td><?= $saran->nama ?></td>
                                       <td><?= $saran->isi ?></td>
                                       <td><?= $saran->tanggal ?></td>
                                       <td><a href="<?= base_url('admin/saran/deleteSaran/' . $saran->id) ?>" class="btn btn-danger fa fa-trash"></a></td>
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