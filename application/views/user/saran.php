<?php include(APPPATH . 'views/user/inc/header.php') ?>
<main>
   <section class="news">
      <div class="container">
         <h1 class="title text-center mb-5">Saran</h1>
         <div class="row">
            <div class="col-md-6">
               <div class="card border-0">
                  <div class="card-body">
                     <h3><?= count($saran) ?> Komentar</h3>
                     <div class="border-mod pt-3">
                        <div class="row">
                           <div id="scroll">
                              <?php foreach ($saran as $data) : ?>
                                 <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <img src="<?= base_url('assets/user/comments-img.png') ?>" class="img-fluid" alt="img">
                                       </div>
                                       <div class="col-md-9">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <h6><?= $data->nama ?></h6>
                                             </div>
                                             <div class="col-md-12">
                                                <p><?= $data->isi ?></p>
                                                <p>
                                                   <i class="fa fa-calendar-o"></i> <?= date_format(date_create($data->tanggal), 'd-m-Y'); ?>
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card border-0">
                  <div class="card-body">
                     <form action="<?= base_url('saran/insert') ?>" method="POST">
                        <div class="form-group">
                           <label for="nama">Nama</label>
                           <input type="text" class="form-control" name="nama" placeholder="Nama anda. . . .">
                        </div>
                        <div class="form-group">
                           <label for="isi">Isi</label>
                           <textarea type="text" class="form-control" name="isi" placeholder="Masukan saran anda. . . ."></textarea>
                        </div>
                        <button class="btn btn-mod">Kirim</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>

<?php include(APPPATH . 'views/user/inc/footer.php') ?>