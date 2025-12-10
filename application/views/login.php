<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teknikal Tes</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="login-page-body">
	<div class="container">
		<div class="card-box">
			<h3 class="title">Selamat Datang</h3>
			<p class="text-center text-muted" style="margin-bottom: 25px;">Masuk untuk melanjutkan ke halaman Datatable.</p>
			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger" id="autoAlert">
					<?= $this->session->flashdata('error'); ?>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" id="autoAlert">
					<?= $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
			<form method="POST" action="<?= site_url('auth/login') ?>">
				<div class="form-group">
					<label for="Email">Email</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
						<input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
					</div>
				</div>

				<div class="clearfix">
					<div class="checkbox pull-left" style="margin-top: 0;">
						<label><input type="checkbox"> Ingat saya</label>
					</div>
					<a href="#" class="pull-right">Lupa Password?</a>
				</div>

				<button type="submit" class="btn btn-accent btn-block btn-lg">
					<i class="fa fa-sign-in"></i> Login
				</button>
			</form>
			<hr>
			<p class="text-center highlight">
				Belum punya akun? <a href="<?= site_url('register') ?>">Buat akun baru</a>
			</p>
		</div>
	</div>

	<div class="modal fade" id="loginInfoModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-custom">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Informasi Login</h2>
				</div>

				<div class="modal-body">
					<p>Gunakan akun berikut untuk testing. Ini adalah data yang sudah tersedia di database:</p>

					<ul>
						<li><strong>Email:</strong> admin@gmail.com</li>
						<li><strong>Password:</strong> admin123</li>
					</ul>

					<p class="mt-2">
						Jika tidak ingin menggunakan akun default di atas,
						silakan buat akun baru melalui menu <strong>Buat akun baru</strong>.
					</p>
				</div>

				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/js/scripts.js') ?>"></script>

</body>

</html>
