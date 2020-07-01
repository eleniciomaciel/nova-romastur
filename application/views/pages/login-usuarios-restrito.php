<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link  type="image/x-icon" rel="apple-touch-icon" sizes="57x57" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-57x57.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="60x60" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-60x60.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="72x72" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-72x72.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-76x76.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="114x114" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-114x114.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="120x120" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-120x120.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="144x144" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-144x144.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="152x152" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-152x152.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/home/images/favicon/apple-icon-180x180.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="192x192" href="<?= base_url(); ?>assets/home/images/favicon/android-icon-192x192.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/home/images/favicon/favicon-32x32.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="96x96" href="<?= base_url(); ?>assets/home/images/favicon/favicon-96x96.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/home/images/favicon/favicon-16x16.png">
    <link  type="image/x-icon" rel="manifest" href="<?= base_url(); ?>assets/home/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>assets/home/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url(); ?>assets/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

				<form id="form_usuarios" autocomplete="off" class="login100-form validate-form">
				<?php
					$csrf = array(
						'name' => $this->security->get_csrf_token_name(),
						'hash' => $this->security->get_csrf_hash()
					);
				?>
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
				<span class="login100-form-title p-b-49">
					Login
					<br>
					<img src="<?=base_url();?>assets/home/images/logo3.png" alt="Romastur" style="height: 6.9rem;">
				</span>

				<div class="wrap-input100 validate-input m-b-23" data-validate="O login é obrigatório">
					<span class="label-input100">Login</span>
					<input class="input100" type="email" name="acesso_login" placeholder="Seu login">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="A senha é obrigatório">
					<span class="label-input100">Senha</span>
					<input class="input100" type="password" name="acesso_senha" placeholder="Sua senha....">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>

				<div class="text-right p-t-8 p-b-31">
					<a href="#">
						Esqueceu a senha?
					</a>
				</div>

				<div class="container-login100-form-btn" id="login">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit" class="login100-form-btn">
							<span id="logText"></span>
						</button>
					</div>
				</div>

				</form>
				<br>
				<div id="responseDiv" class="alert text-center" style="display:none;">
					<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
					<span id="message"></span>
				</div>

			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/js/main.js"></script>
	<!-- ===================   login  ============================= -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#logText').html('<i class="fa fa-sign-out"></i> Login');
			$('#form_usuarios').submit(function(e) {
				e.preventDefault();
				$('#logText').html('<div class="load"> <i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Verificando usuário...<span class="sr-only">Loading...</span> </div>');
				var user = $('#form_usuarios').serialize();

				var login = function() {
					$.ajax({
						type: 'POST',
						url: "<?=site_url('valida-acesso-do-usuario')?>",
						dataType: 'json',
						data: user,
						success: function(response) {
							$('#message').html(response.message);
							$('#logText').html('<i class="fa fa-sign-out"></i> Login');
							if (response.error) {
								$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
							} else {
								$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
								$('#form_usuarios')[0].reset();
								$('#login').hide();

								setTimeout(function() {
									location.reload();
								}, 3000);
							}
						}
					});
				};
				setTimeout(login, 3000);
			});

			$(document).on('click', '#clearMsg', function() {
				$('#responseDiv').hide();
			});
		});
	</script>
</body>

</html>