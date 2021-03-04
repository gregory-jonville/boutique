<?php require_once 'includes/header.php';

if (isset($_GET['edit_user'])) {
	$admin_id = $getFromU->checkInput($_GET['edit_user']);

	$view_admin = $getFromU->view_admin_by_admin_id($admin_id);

	$admin_name = $view_admin->admin_name;
	$admin_email = $view_admin->admin_email;
	$admin_pass = $view_admin->admin_pass;
	$admin_contact = $view_admin->admin_contact;
	$admin_country = $view_admin->admin_country;
	$admin_job = $view_admin->admin_job;
	$admin_about = $view_admin->admin_about;
	$admin_image = $view_admin->admin_image;
}

if (isset($_POST['update_user'])) {
	$admin_name = $getFromU->checkInput($_POST['admin_name']);
	$admin_email = $getFromU->checkInput($_POST['admin_email']);
	$admin_pass = $_POST['admin_pass'];
	$admin_contact = $getFromU->checkInput($_POST['admin_contact']);
	$admin_country = $getFromU->checkInput($_POST['admin_country']);
	$admin_job = $getFromU->checkInput($_POST['admin_job']);
	$admin_about = $getFromU->checkInput($_POST['admin_about']);


	$admin_image = $_FILES['admin_image']['name'];
	$temp_name = $_FILES['admin_image']['tmp_name'];

	$check_email = $getFromU->check_admin_by_email($admin_email);

	move_uploaded_file($temp_name, "admin_images/$admin_image");
	$admin_pass_hash = password_hash($admin_pass, PASSWORD_BCRYPT);
	$update_user = $getFromU->update_user("admins", $admin_id, array("admin_name" => $admin_name, "admin_email" => $admin_email, "admin_pass" => $admin_pass_hash, "admin_contact" => $admin_contact, "admin_country" => $admin_country, "admin_job" => $admin_job, "admin_about" => $admin_about, "admin_image" => $admin_image));

	if ($update_user) {
		$_SESSION['update_user_msg'] = "Utilisateur mise à jour !";
		header('Location: index.php?view_users');
	} else {
		echo '<script>alert("Une erreur est survenue !")</script>';
	}
}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Mise à jour</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Mise à jour utilisateur</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-md-9">
							<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" required>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_name">Nom</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="admin_name" class="form-control" id="admin_name" value="<?php echo $admin_name; ?>" placeholder="Nom" required>
							<div class="invalid-feedback">
								Entrez un nom.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_email">E-mail</label>
						</div>
						<div class="col-md-9">
							<input type="email" name="admin_email" class="form-control" id="admin_email" value="<?php echo $admin_email; ?>" placeholder="E-mail" required>
							<div class="invalid-feedback">
								Entrez un e-mail
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_pass">Password</label>
						</div>
						<div class="col-md-9">
							<input type="password" name="admin_pass" class="form-control" id="admin_pass" value="<?php echo $admin_pass; ?>" placeholder="Password" required>
							<div class="invalid-feedback">
								Entrez un password.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_country">Pays</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="admin_country" class="form-control" id="admin_country" value="<?php echo $admin_country; ?>" placeholder="Pays" required>
							<div class="invalid-feedback">
								Entrez votre pays.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_job">Job</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="admin_job" class="form-control" id="admin_job" value="<?php echo $admin_job; ?>" placeholder="Job" required>
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
							<input type="number" name="admin_contact" class="form-control" value="<?php echo $admin_contact; ?>" id="admin_contact" placeholder="Numéro" required>
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
							<textarea name="admin_about" class="form-control" id="admin_about" rows="5" placeholder="A propos de vous ?" required><?php echo $admin_about; ?></textarea>
							<div class="invalid-feedback">
								Entrez une description qui vous correspond.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="admin_image">Avatar</label>
						</div>
						<div class="col-md-9">
							<input type="file" name="admin_image" id="admin_image" required>
							<img src="admin_images/<?php echo $admin_image; ?>" height="40" width="40" class="rounded">
							<div class="invalid-feedback">
								Chargez votre avatar.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 mt-4">
							<button class="btn btn-info form-control" name="update_user" type="submit"><i class="fas fa-edit"></i> Update</button>
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