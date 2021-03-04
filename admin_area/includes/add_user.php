<?php require_once 'includes/header.php';

if (isset($_POST['add_user'])) {
	$admin_name = $getFromU->checkInput($_POST['admin_name']);
	$admin_email = $getFromU->checkInput($_POST['admin_email']);
	$admin_pass = $getFromU->checkInput($_POST['admin_pass']);
	$admin_contact = $getFromU->checkInput($_POST['admin_contact']);
	$admin_country = $getFromU->checkInput($_POST['admin_country']);
	$admin_job = $getFromU->checkInput($_POST['admin_job']);
	$admin_about = $getFromU->checkInput($_POST['admin_about']);


	$admin_image = $_FILES['admin_image']['name'];
	$temp_name = $_FILES['admin_image']['tmp_name'];

	$check_email = $getFromU->check_admin_by_email($admin_email);


	if ($check_email === false) {

		move_uploaded_file($temp_name, "admin_images/$admin_image");

		$insert_user = $getFromU->create("admins", array("admin_name" => $admin_name, "admin_email" => $admin_email, "admin_pass" => $admin_pass, "admin_contact" => $admin_contact, "admin_country" => $admin_country, "admin_job" => $admin_job, "admin_about" => $admin_about, "admin_image" => $admin_image));

		if ($insert_user) {
			$_SESSION['insert_user_msg'] = "Admin ajouté avec succès !";
			header('Location: index.php?view_users');
		} else {
			echo '<script>alert("Le profil n\'a pû être créé !")</script>';
		}
	} else {
		$_SESSION['insert_user_error_msg'] = "E-mail déjà utilisée !";
		header('Location: index.php?add_user');
	}
}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Admin</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Nouvel Admin</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_name">Nom</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="Nom" required>
							<div class="invalid-feedback">
								Rentrez un nom.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_email">E-mail</label>
						</div>
						<div class="col-md-9">
							<input type="email" name="admin_email" class="form-control" id="admin_email" placeholder="E-mail" required>
							<div class="invalid-feedback">
								Rentrez un E-mail.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_pass">Password</label>
						</div>
						<div class="col-md-9">
							<input type="password" name="admin_pass" class="form-control" id="admin_pass" placeholder="Password" required>
							<div class="invalid-feedback">
								Entrez votre mot de passe.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_country">Pays</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="admin_country" class="form-control" id="admin_country" placeholder="Pays" required>
							<div class="invalid-feedback">
								Entrez un pays.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_job">Job</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="admin_job" class="form-control" id="admin_job" placeholder="Job" required>
							<div class="invalid-feedback">
								Entrez votre job.
							</div>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_contact">Contact</label>
						</div>
						<div class="col-md-9">
							<input type="number" name="admin_contact" class="form-control" id="admin_contact" placeholder="Numéro" required>
							<div class="invalid-feedback">
								Entrez votre numéro de contact.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_about">A propos</label>
						</div>
						<div class="col-md-9">
							<textarea name="admin_about" class="form-control" id="admin_about" rows="5" placeholder="A propos de vous ?" required></textarea>
							<div class="invalid-feedback">
								Quelques mots sur vous ?
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_image">Image</label>
						</div>
						<div class="col-md-9">
							<input type="file" name="admin_image" id="admin_image" required>
							<div class="invalid-feedback">
								téléchargez une image.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 mt-4">
							<button class="btn btn-info form-control" name="add_user" type="submit"><i class="fas fa-plus-circle"></i> Valider</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<script>
			// Désactive l'envoi du form en cas d'informations éronnées
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					var forms = document.getElementsByClassName('needs-validation');
					// Eviter le renvoie du formulaire
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





<?php require_once 'includes/footer.php'; ?>