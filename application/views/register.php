<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register - Buat Akun Baru</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="login-page-body">
	<div class="container">
		<div class="card-box">
			<h3 class="title">Buat Akun Baru</h3>
			<p class="text-center text-muted" style="margin-bottom: 25px;">Daftar untuk mengakses Dashboard Anda.</p>

			<form action="<?= site_url('register/submit') ?>" method="POST">

				<div class="form-group">
					<label for="username">Username</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<input type="text" id="username" class="form-control" required name="username" placeholder="Masukkan username unik">
					</div>
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
						<input type="email" id="email" class="form-control" required name="email" placeholder="Masukkan alamat email aktif">
					</div>
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
						<input type="password" id="password" class="form-control" required name="password" placeholder="Buat password (minimal 8 karakter)">
					</div>
				</div>

				<button type="submit" class="btn btn-accent btn-block btn-lg" style="margin-top: 25px;">
					<i class="fa fa-user-plus"></i> Daftar Sekarang
				</button>

			</form>

			<hr>

			<p class="text-center highlight">
				Sudah punya akun? <a href="<?= site_url('home') ?>">Masuk (Login)</a>
			</p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

</body>

</html>