<?php require_once 'includes/header.php'; ?>

<?php

if (isset($_GET['edit_cat'])) {
	$cat_id = $_GET['edit_cat'];

	$view_category 	= $getFromU->view_All_By_cat_ID($cat_id);
	$cat_title = $view_category->cat_title;
	$cat_desc = $view_category->cat_desc;
}



if (isset($_POST['update_cat'])) {
	$cat_title = $_POST['cat_title'];
	$cat_desc = $_POST['cat_desc'];
	$cat_id = $_POST['cat_id'];

	$update_cat = $getFromU->update_cat("categories", $cat_id, array("cat_title" => $cat_title, "cat_desc" => $cat_desc));

	if ($update_cat) {
		$_SESSION['cat_update_msg'] = "Catégorie mise à jour avec succès !";
		header('Location: index.php?view_cats');
	} else {
		echo '<script>alert("Une erreur est survenue")</script>';
	}
}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Mise à jour Catégorie</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Mise à jour Catégorie</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-md-9">
							<input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>" required>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="cat_title">Titre</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="cat_title" class="form-control" id="cat_title" value="<?php echo $cat_title; ?>" placeholder="Titre" required>
							<div class="invalid-feedback">
								Entre un titre.
							</div>
						</div>
					</div>


					<div class="form-row mb-3">
						<div class="col-md-3 ">
							<label for="cat_desc">Description</label>
						</div>
						<div class="col-md-9">
							<textarea name="cat_desc" class="form-control" rows="6" id="cat_desc" placeholder="Description" required><?php echo $cat_desc; ?></textarea>
							<div class="invalid-feedback">
								Entrez une Description.
							</div>
						</div>
					</div>





					<div class="row">
						<div class="col-12 mt-4">
							<button class="btn btn-info form-control" name="update_cat" type="submit"><i class="fas fa-edit"></i> Update</button>
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
					// Empêche le renvoi du form
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