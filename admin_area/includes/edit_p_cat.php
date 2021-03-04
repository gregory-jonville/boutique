<?php require_once 'includes/header.php';


if (isset($_GET['edit_p_cat'])) {
	$p_cat_id = $getFromU->checkInput($_GET['edit_p_cat']);

	$view_p_category = $getFromU->view_All_By_p_cat_ID($p_cat_id);
	$p_cat_title = $view_p_category->p_cat_title;
	$p_cat_desc = $view_p_category->p_cat_desc;
}

if (isset($_POST['update_p_cat'])) {
	$p_cat_title = $getFromU->checkInput($_POST['p_cat_title']);
	$p_cat_desc	= $getFromU->checkInput($_POST['p_cat_desc']);
	$p_cat_id = $_POST['p_cat_id'];

	$update_p_cat = $getFromU->update_p_cat("product_categories", $p_cat_id, array("p_cat_title" => $p_cat_title, "p_cat_desc" => $p_cat_desc));

	if ($update_p_cat) {
		$_SESSION['product_update_msg'] = "Catégorie de produit mise à jour avec succès !";
		header('Location: index.php?view_p_cats');
	} else {
		echo '<script>alert("Un problème est survenu !")</script>';
	}
}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Mise à jour catégorie de produit</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Mise à jour catégorie de produit</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-md-9">
							<input type="hidden" name="p_cat_id" value="<?= $p_cat_id; ?>" required>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="p_cat_title">Titre</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="p_cat_title" class="form-control" id="p_cat_title" value="<?= $p_cat_title; ?>" placeholder="Titre" required>
							<div class="invalid-feedback">
								Entrez un titre.
							</div>
						</div>
					</div>


					<div class="form-row mb-3">
						<div class="col-md-3 ">
							<label for="p_cat_desc">Description</label>
						</div>
						<div class="col-md-9">
							<textarea name="p_cat_desc" class="form-control" rows="6" id="p_cat_desc" placeholder="Description" required><?= $p_cat_desc; ?></textarea>
							<div class="invalid-feedback">
								Entrez une Description.
							</div>
						</div>
					</div>





					<div class="row">
						<div class="col-12 mt-4">
							<button class="btn btn-info form-control" name="update_p_cat" type="submit"><i class="fas fa-edit"></i> Update</button>
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