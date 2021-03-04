<?php
if (isset($_POST['login'])) {
	$customer_email = $getFromU->checkInput($_POST['c_email']);
	$customer_pass = $getFromU->checkInput($_POST['c_pass']);

	$login = $getFromU->login($customer_email, $customer_pass);
	if ($login === false) {
		$error = "Adresse e-mail ou mot de passe incorrect";
	} else {
		$_SESSION['login_success_msg'] = "Vous êtes connecté !";
	}
}


?>



<div class="col-md-9 mb-4">
	<div class="card">
		<div class="card-header text-center">
			<h5 class="mt-4">Connectez vous</h5>
		</div>
		<div class="card-body">

			<?php if (isset($error)) : ?>
				<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
					<?php echo $error; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>


			<form method="post" action="" class="needs-validation" novalidate>
				<div class="form-row">
					<div class="col-12 mb-3">
						<label for="email" class="font-weight-bold">Email</label>
						<input type="email" name="c_email" class="form-control" id="email" placeholder="E-mail" required>
						<div class="invalid-feedback">
							Veuillez entre votre e-mail.
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 mb-3">
						<label for="password" class="font-weight-bold">Mot de passe</label>
						<input type="password" name="c_pass" class="form-control" id="password" placeholder="Mot de passe" required>
						<div class="invalid-feedback">
							Entrez votre mot de passe.
						</div>
					</div>
				</div>



				<div class="row">
					<div class="col-lg-4 offset-lg-4">
						<button class="btn btn-info form-control" name="login" type="submit"><i class="fas fa-sign-in-alt"></i> Connexion</button>
					</div>
				</div>
			</form>
		</div>
		<a href="customer_register.php">Vous êtes nouveau ? Enregistrez vous ici</a>

		<script>
			// evite l'envoi de données éronnées
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					var forms = document.getElementsByClassName('needs-validation');
					// empeche le renvoie du form
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>
	</div>
</div>