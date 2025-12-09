<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teknikal Tes</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body id="dashboard-layout">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2" id="sidebar">
				<div class="sidebar-menu">
					<h4>Surya Sarana Dinamika</h4>
					<a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
					<a href="#"><i class="fa fa-cubes fa-fw"></i> =============</a>
					<a href="#"><i class="fa fa-users fa-fw"></i> ============= </a>
					<a href="#"><i class="fa fa-bar-chart fa-fw"></i> =============</a>
				</div>
			</div>

			<div class="col-sm-10">

				<div id="mini-navbar">
					<button class="btn btn-warning visible-xs visible-sm" id="sidebar-toggle" style="margin-right: 15px;">
						<i class="fa fa-bars fa-lg"></i>
					</button>
					<h2>Dashboard</h2>
					<div class="pull-right">
						<div class="dropdown">

							<button class="btn btn-link dropdown-toggle profile-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<img src="" class="avatar-img" alt="Avatar">
								<span class="caret"></span>
							</button>

							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
								<li><a href="#"><i class="fa fa-user fa-fw"></i> Profile Settings</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<?= site_url('login') ?>" class="text-danger"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-custom">
					<div class="panel-heading">
						<h4 style="margin:0;">Product List</h4>
					</div>

					<div class="panel-body">

						<div class="clearfix" style="margin-bottom: 15px;">
							<button type="button" class="btn btn-sm btn-add-new pull-right" data-toggle="modal" data-target="#offcanvasForm">
								<i class="fa fa-plus"></i> Add New
							</button>
						</div>

						<div class="table-responsive">
							<table id="productTable" class="table table-striped table-bordered table-hover" style="width:100%">
								<thead>
									<tr>
										<th width="20" class="text-center">No.</th>
										<th width="300">Name</th>
										<th width="300">Description</th>
										<th width="200">Image</th>
										<th width="150" class="text-center align-items-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php if (!empty($equipment)) : ?>
										<?php foreach ($equipment as $p): ?>
											<tr class="product-row"
												data-item='<?= json_encode($p) ?>'>
												<td class="text-center"><?= $no++; ?></td>
												<td><?= html_escape($p->name) ?></td>
												<td><?= html_escape($p->specs) ?></td>

												<td class="text-center">
													<?php if ($p->image): ?>
														<img src="<?= base_url('uploads/images/' . $p->image) ?>" class="img-thumbnail-custom">
													<?php else: ?>
														<span class="text-muted">
															<i class="fa fa-picture-o"></i>
														</span>
													<?php endif; ?>
												</td>

												<td class="text-center">
													<a href="#" class="btn btn-sm btn-edit">
														<i class="fa fa-pencil"></i> Edit
													</a>
													<a href="<?= site_url('equipment/delete/' . $p->id) ?>"
														onclick="return confirm('Delete this item?')"
														class="btn btn-sm btn-delete">
														<i class="fa fa-trash"></i> Delete
													</a>
												</td>
											</tr>
										<?php endforeach; ?>

									<?php else: ?>
										<tr>
											<td colspan="4" class="text-center text-muted">
												No Data Available
											</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="modal right fade" id="offcanvasForm" tabindex="-1" role="dialog" aria-labelledby="offcanvasFormLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="offcanvasFormLabel"><i class="fa fa-plus-circle"></i> Add New Product</h4>
				</div>

				<div class="modal-body">
					<form action="<?= site_url('equipment/store') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="product_name">Nama Produk</label>
							<input type="text" class="form-control" id="product_name" name="name" value="tes" required>
						</div>
						<div class="form-group">
							<label for="product_category">Kategori</label>
							<input type="text" class="form-control" id="product_category" name="category" value="tes" required>
						</div>
						<div class="form-group">
							<label for="product_stok">Stok Barang</label>
							<input type="number" class="formcontrol" id="product_stok" name="stok" value="tes" required>
						</div>
						<div class="form-group">
							<label for="product_location">Lokasi</label>
							<input type="text" class="form-control" id="product_location" name="location" value="tes" required>
						</div>
						<div class="form-group">
							<label for="product_specs">Description / Specs</label>
							<textarea class="form-control" id="product_specs" name="specs" rows="3" required>value="tes"</textarea>
						</div>
						<div class="form-group">
							<label for="product_manual">Buku Panduan (PDF)</label>
							<div id="manualUploadZone" class="text-center upload-area">
								<i class="fa fa-file-pdf-o fa-3x text-muted"></i>
								<p class="text-muted" style="margin-top: 5px;">
									<span id="manual_file_display">Click here to choose PDF manual</span>
								</p>
								<p class="help-block text-muted" style="font-size: 80%;">Max 4MB, PDF only.</p>
							</div>
							<input type="file" id="product_manual" name="manual" style="display: none;">
						</div>
						<div class="form-group">
							<label for="product_image">Product Image</label>
							<div id="uploadZone" class="text-center upload-area">
								<i class="fa fa-cloud-upload fa-3x text-muted"></i>
								<p class="text-muted" style="margin-top: 5px;">
									<span id="file_name_display">Click here to choose file</span>
								</p>
								<p class="help-block text-muted" style="font-size: 80%;">Max 2MB, JPG/PNG only.</p>
							</div>

							<input type="file" id="product_image" name="image" style="display: none;">
						</div>
						<hr>
						<button type="submit" class="btn btn-warning"><i class="fa fa-check"></i> Save Product</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>

	</div>

	<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<form method="post" action="<?= site_url('equipment/update') ?>" enctype="multipart/form-data">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">
							<i class="fa fa-pencil"></i> Edit Product
						</h4>
					</div>

					<div class="modal-body">

						<input type="hidden" name="id" id="edit_id">

						<div class="form-group">
							<label>Nama Produk</label>
							<input type="text" class="form-control" name="name" id="edit_name" required>
						</div>

						<div class="form-group">
							<label>Kategori</label>
							<input type="text" class="form-control" name="category" id="edit_category" required>
						</div>

						<div class="form-group">
							<label>Stok Barang</label>
							<input type="number" class="form-control" name="stok" id="edit_stok" required>
						</div>

						<div class="form-group">
							<label>Lokasi</label>
							<input type="text" class="form-control" name="location" id="edit_location" required>
						</div>

						<div class="form-group">
							<label>Description / Specs</label>
							<textarea class="form-control" name="specs" id="edit_specs" rows="1" required></textarea>
						</div>

						<div class="form-group">
							<label>Preview Gambar Saat Ini</label>
							<br>
							<img id="edit_preview_image" src="" alt="Preview" class="img-thumbnail" style="max-width: 150px;">
						</div>

						<div class="form-group">
							<label>Upload Gambar Baru (Optional)</label>
							<input type="file" class="form-control" name="image">
						</div>

						<div class="form-group">
							<label>Manual PDF Saat Ini</label>
							<p id="edit_manual_link" class="text-primary"></p>
						</div>

						<div class="form-group">
							<label>Upload Manual Baru (PDF Optional)</label>
							<input type="file" class="form-control" name="manual">
						</div>

					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-warning">
							<i class="fa fa-check"></i> Update
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= base_url('assets/js/datatables.js') ?>"></script>
	<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</body>

</html>
