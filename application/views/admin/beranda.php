<?php include(APPPATH . 'views/admin/inc/header.php') ?>
<!-- content -->
<div class="main-content">
    <div class="main-content-inner">
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="fa fa-users"></i> Kelompok Tani</div>
                                        <h2><?= $dataTotalKelompokTani ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="fa fa-home"></i> Total Kelurahan</div>
                                        <h2><?= $dataTotalKelurahan ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include(APPPATH . 'views/admin/inc/footer.php') ?>