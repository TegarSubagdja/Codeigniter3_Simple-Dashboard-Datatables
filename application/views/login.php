<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - MyApp</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="login-page-body">
	<div class="container">
		<div class="card-box">
			<h3 class="title">Selamat Datang</h3>
			<p class="text-center text-muted" style="margin-bottom: 25px;">Masuk untuk melanjutkan ke Dashboard Anda.</p>

			<form method="POST" action="<?= site_url('auth/do_login') ?>">
				<div class="form-group">
					<label for="username">Email atau Username</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<input type="text" id="username" name="username" class="form-control" placeholder="Masukkan email atau username" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
						<input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
					</div>
				</div>

				<div class="clearfix" >
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
				Baru di sini? <a href="<?= site_url('register') ?>">Buat akun baru</a>
			</p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

</body>

</html>
