<?php include(APPPATH . 'views/admin/inc/header.php') ?>

<div class="main-content">
	<div class="main-content-inner">
		<div class="container">
			<div class="row">
				<div class="col-12 mt-5">
					<div class="card">
						<div class="card-body">
							<ul class="nav nav-pills pull-right" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-dataBerita-tab" data-toggle="pill" href="#pills-dataBerita" role="tab" aria-controls="pills-dataBerita" aria-selected="true"><i class="fa fa-newspaper-o"></i> Data</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-addBerita-tab" data-toggle="pill" href="#pills-addBerita" role="tab" aria-controls="pills-addBerita" aria-selected="false"><i class="fa fa-plus"></i> Add</a>
								</li>
							</ul>
						</div>
					</div>
					<?= $this->session->flashdata('err-berita') ?>
				</div>
				<div class="col-12 mt-3 tab-content" id="pills-tabContent">
					<!-- Data Berita -->
					<div class="tab-pane fade show active" id="pills-dataBerita" role="tabpanel" aria-labelledby="pills-dataBerita-tab">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Data Berita</h4>
								<div class="datatable datatable-primary">
									<table class="table text-center" id="datatable">
										<thead class="text-capitalize">
											<tr>
												<th scope="col">No.</th>
												<th scope="col">ID</th>
												<th scope="col">Judul Berita</th>
												<th scope="col">Isi</th>
												<th scope="col">Gambar</th>
												<th scope="col">waktu</th>
												<th scope="col">aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $number = 1;
											foreach ($dataBerita as $berita) : ?>
												<tr>
													<th scope="row"><?= $number++ ?></th>
													<th><?= $berita->id ?></th>
													<td><?= $berita->judul ?></td>
													<td>
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" data-value="<?= $berita->isi ?>"><i class="fa fa-info"></i></button>
													</td>
													<td><img src="<?= base_url('assets/images/berita/' . $berita->gambar) ?>" alt="image" width="200"></td>
													<td><?= $berita->waktu ?></td>
													<td>
														<a href="<?= base_url('admin/berita/updateForm/' . $berita->id) ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

														<a href="<?= base_url('admin/berita/deleteBerita/' . $berita->id) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- tab add data -->
					<div class="tab-pane fade" id="pills-addBerita" role="tabpanel" aria-labelledby="pills-addBerita-tab">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Add Data</h4>
								<form action="<?= base_url('admin/berita/addBerita') ?>" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="judul" class="col-form-label">Judul</label>
												<textarea class="form-control" aria-label="With textarea" id="judul" name="judul"></textarea>
												<div class="error"><?= form_error('judul'); ?></div>
											</div>
											<div class="form-group">
												<label for="kategori" class="col-form-label">Kategori</label>
												<select name="kategori" id="kategori" class="custom-select">
													<option selected="selected" value="">Kategori</option>
													<option value="berita">Berita</option>
													<option value="tips">Tips</option>
												</select>
											</div>
											<div class="form-group">
												<label for="judul" class="col-form-label">Gambar</label>
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="gambar" name="gambar">
													<label class="custom-file-label" for="Gambar">Pilih Gambar</label>
												</div>
											</div>
											<div class="image-preview" id="image-preview">
												<img alt="image preview" class="image-preview-chosen">
												<span class="image-preview-default">Image Preview</span>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label for="judul" class="col-form-label">Deskripsi</label>
												<textarea class="form-control ckeditor" aria-label="With textarea" id="ckeditor" name="isi"></textarea>
												<div class="error"><?= form_error('isi'); ?></div>
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
</div>

<!-- modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Isi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>

</div>

<?php include(APPPATH . 'views/admin/inc/footer.php') ?>