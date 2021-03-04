<?php
$customer_session = $_SESSION['customer_email'];
$get_customer = $getFromU->view_customer_by_email($customer_session);

$c_id = $get_customer->customer_id;
$customer_name = $get_customer->customer_name;
$customer_email = $get_customer->customer_email;
$customer_country = $get_customer->customer_country;
$customer_city = $get_customer->customer_city;
$customer_contact = $get_customer->customer_contact;
$customer_address = $get_customer->customer_address;
$customer_image = $get_customer->customer_image;
$customer_cp = $get_customer->customer_cp;



if (isset($_POST['update'])) {
	$customer_id = $c_id;
	$customer_name_u = $_POST['c_name'];
	$customer_email_u = $_POST['c_email'];
	$customer_pass = $_POST['c_password'];
	$customer_country_u = $_POST['c_country'];
	$customer_city_u = $_POST['c_city'];
	$customer_contact_u = $_POST['c_mobile'];
	$customer_address_u = $_POST['c_address'];
	$customer_cp_u = $_POST['cp'];

	$customer_image_u = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];

	if (password_verify($customer_pass, $get_customer->customer_pass)) {
		if (isset($customer_name_u) && !empty($customer_name_u) && $customer_name != $customer_name_u) {
			$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_name" => $customer_name_u));
		}

		if (isset($customer_email_u) && !empty($customer_email_u) && $customer_email_u != $customer_email) {
			if (empty($getFromU->view_customer_by_email($customer_email_u))) {
				$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_email" => $customer_email_u));
			} else {
				$error = "Cet e-mail est déjà enregistrée.";
			}
		}

		if (isset($customer_country_u) && !empty($customer_country_u) && $customer_country_u != $customer_country) {
			$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_country" => $customer_country_u));
		}

		if (isset($customer_city_u) && !empty($customer_city_u) && $customer_city_u != $customer_city) {
			$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_city" => $customer_city_u));
		}

		if (isset($customer_contact_u) && !empty($customer_contact_u) && $customer_contact_u != $customer_contact) {
			$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_contact" => $customer_contact_u));
		}

		if (isset($customer_address_u) && !empty($customer_address_u) && $customer_address_u != $customer_address) {
			$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_address" => $customer_address_u));
		}

		if (isset($customer_cp_u) && !empty($customer_cp_u) && $customer_cp_u != $customer_cp) {
			$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_cp" => $customer_cp_u));
		}

		if (isset($customer_image_u) && !empty($customer_image_u) && $customer_image_u != $customer_image) {
			$update_customer = $getFromU->update_customer($customer_id, "customers", array("customer_image" => $customer_cp_u));
			move_uploaded_file($c_image_tmp, "assets/customer_images/$customer_image");
		}

		header('refresh:2');
	} else {
		$error = "Mot de passe incorrect !";
	}
}

?>

<div class="card">
	<div class="card-header text-center">
		<h5 class="mt-4">Mettre à jour mon compte</h5>
	</div>
	<div class="card-body">

		<?php if (isset($add_msg)) : ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
				<?php echo $add_msg; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		<?php endif ?>

		<?php if (isset($error)) : ?>
			<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
				<?php echo $error; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif ?>


		<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Nom</label>
					<input type="text" name="c_name" value="<?= $customer_name; ?>" class="form-control" id="validationCustom03" placeholder="Votre nom complet">
					<div class="invalid-feedback">
						Veuillez entrer votre nom.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">E-mail</label>
					<input type="email" name="c_email" value="<?= $customer_email; ?>" class="form-control" id="validationCustom03" placeholder="E-mail">
					<div class="invalid-feedback">
						Veuillez entrer votre e-mail.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Mot de passe actuel</label>
					<input type="password" name="c_password" class="form-control" id="validationCustom03" placeholder="Mot de passe" required>
					<div class="invalid-feedback">
						Entrez votre mot de passe.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Pays</label>
					<input type="text" name="c_country" value="<?= $customer_country; ?>" class="form-control" id="validationCustom03" placeholder="Pays">
					<div class="invalid-feedback">
						Veuillez entrer votre pays de résidence.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Ville</label>
					<input type="text" name="c_city" value="<?= $customer_city; ?>" class="form-control" id="validationCustom03" placeholder="Ville">
					<div class="invalid-feedback">
						Veuillez entrer votre ville de résidence.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Contact</label>
					<input type="tel" name="c_mobile" value="<?= $customer_contact; ?>" class="form-control" id="validationCustom03" placeholder="Téléphone">
					<div class="invalid-feedback">
						Veuillez entrer un numéro sur lequel nous pouvons vous contacter.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Adresse</label>
					<input type="text" name="c_address" value="<?= $customer_address; ?>" class="form-control" id="validationCustom03" placeholder="Adresse">
					<div class="invalid-feedback">
						Veuillez entrer votre adresse.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Code postal</label>
					<input type="number" name="cp" value="<?= $customer_cp; ?>" class="form-control" id="validationCustom03" placeholder="CP">
					<div class="invalid-feedback">
						Veuillez entrer votre adresse.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="c_image">Avatar</label>
					<input type="file" name="c_image" value="<?= $customer_image; ?>" class="form-control image_file" id="c_image">
					<img src="assets/customer_images/<?= $customer_image; ?>" class="img-fluid img-thumbnail mt-2" width="100" height="100">
					<div class="invalid-feedback">
						Veuillez choisir un avatar.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 offset-lg-4">
					<button class="btn btn-info form-control" type="submit" name="update"><i class="fas fa-user-edit"></i> Mettre à jour</button>
				</div>
			</div>
		</form>
		<script>
			// contre l'envoi de mauvaises données
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					var forms = document.getElementsByClassName('needs-validation');
					// Evite le renvoi
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