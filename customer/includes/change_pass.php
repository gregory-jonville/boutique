<?php
$customer_email = $_SESSION['customer_email'];

$get_customer = $getFromU->view_customer_by_email($customer_email);

$customer_id = $get_customer->customer_id;
$customer_pass = $get_customer->customer_pass;

if (isset($_POST['update_pass'])) {
	$old_password = $_POST['c_password'];
	$new_password1 = $_POST['cn_password1'];
	$new_password2 = $_POST['cn_password2'];


	if (password_verify($old_password, $customer_pass)) {
		if ($new_password1 !== $new_password2) {
			$error = "Le nouveau MDP et la confirmation ne correspondent pas.";
		} else {
			$update_customer_pass = $getFromU->update_customer_password($customer_id, $new_password1);
			if ($update_customer_pass === true) {
				$update_pass_msg = "Votre mot de passe a été mis à jour";
			} else {
				$error = "Votre mot de passe n'a pu être mis à jour";
			}
		}
	} else {
		$error = "Mot de passe actuel erroné.";
	}
}

?>

<div class="card">
	<div class="card-header text-center">
		<h5 class="mt-4">Mettre à jour votre mot de passe</h5>
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

		<?php if (isset($update_pass_msg)) : ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
				<?php echo $update_pass_msg; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif ?>


		<form method="post" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="c_password">Mot de passe actuel</label>
					<input type="password" name="c_password" class="form-control" id="c_password" placeholder="Mot de passe actuel" required>
					<div class="invalid-feedback">
						Entrez votre mot de passe actuel.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="cn_password1">Nouveau mot de passe</label>
					<input type="password" name="cn_password1" class="form-control" id="cn_password1" placeholder="Nouveau mot de passe" required>
					<div class="invalid-feedback">
						Entrez votre nouveau mot de passe.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="cn_password2">Confirmation du nouveau mot de passe</label>
					<input type="password" name="cn_password2" class="form-control" id="cn_password2" placeholder="Confirmation du nouveau mot de passe" required>
					<div class="invalid-feedback">
						Entrez la confirmation de votre nouveau mot de passe.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 offset-lg-4">
					<button class="btn btn-info form-control" type="submit" name="update_pass"><i class="fas fa-user-edit"></i> Mettre à jour</button>
				</div>
			</div>
		</form>
		<script>
			// Eviter de transmettre de mauvaises infos
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					// Bootstrap
					var forms = document.getElementsByClassName('needs-validation');
					// Permet de ne pas réenvoyer le form
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