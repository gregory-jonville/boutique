<?php require_once 'includes/header.php'; 

if (isset($_POST['add_cat'])) {
	$cat_title = $getFromU->checkInput($_POST['cat_title']);
	$cat_desc = $getFromU->checkInput($_POST['cat_desc']);




	$insert_cat = $getFromU->create("categories", array("cat_title" => $cat_title, "cat_desc" => $cat_desc));

	if ($insert_cat) {
		$_SESSION['insert_cat_msg'] = "Category has been added Sucessfully";
		header('Location: index.php?view_cats');
	} else {
		echo '<script>alert("Category has not added")</script>';
	}
}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Catégorie</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Nouvelle catégorie</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="cat_title">Titre</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="cat_title" class="form-control" id="cat_title" placeholder="Titre" required>
							<div class="invalid-feedback">
								Entrez un titre.
							</div>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-md-3 ">
							<label for="cat_desc">Description</label>
						</div>
						<div class="col-md-9">
							<textarea name="cat_desc" class="form-control" rows="6" id="cat_desc" placeholder="Description" required></textarea>
							<div class="invalid-feedback">
								Entrez une description.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mt-4">
							<button class="btn btn-info form-control" name="add_cat" type="submit"><i class="fas fa-plus-circle"></i> Valider</button>
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