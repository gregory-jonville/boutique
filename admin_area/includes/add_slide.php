<?php require_once 'includes/header.php';

if (isset($_POST['add_slide'])) {
	$slide_name = $getFromU->checkInput($_POST['slide_name']);
	$slide_title = $getFromU->checkInput($_POST['slide_title']);
	$slide_text = $getFromU->checkInput($_POST['slide_text']);

	$slide_image = $_FILES['slide_image']['name'];
	$temp_name = $_FILES['slide_image']['tmp_name'];

	$view_slides = $getFromU->viewAllFromTable('slider');

	$count_slides = count($view_slides);

	if ($count_slides < 5) {

		move_uploaded_file($temp_name, "slides_images/$slide_image");

		$insert_slide = $getFromU->create("slider", array("slide_name" => $slide_name, "slide_title" => $slide_title, "slide_text" => $slide_text, "slide_image" => $slide_image));

		if ($insert_slide) {
			$_SESSION['insert_slide_msg'] = "Slide ajouté avec succés !";
			header('Location: index.php?view_slides');
		} else {
			echo '<script>alert("Erreur, slide non enregistré !")</script>';
		}
	} else {
		$_SESSION['insert_slide_error_msg'] = "Vous avez déjà 4 slides !";
		header('Location: index.php?view_slides');
	}
}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Slides</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Nouveau slide</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="slide_name">Nom</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="slide_name" class="form-control" id="slide_name" placeholder="Nom" required>
							<div class="invalid-feedback">
								Entrez un nom.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="slide_title">Titre</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="slide_title" class="form-control" id="slide_title" placeholder="Titre" required>
							<div class="invalid-feedback">
								Entrez un titre.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="slide_text">Texte</label>
						</div>
						<div class="col-md-9">
							<textarea name="slide_text" class="form-control" id="slide_text" rows="5" placeholder="Description" required></textarea>
							<div class="invalid-feedback">
								Entrez une description.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="slide_image">Image</label>
						</div>
						<div class="col-md-9">
							<input type="file" name="slide_image" id="slide_image" placeholder="Image" required>
							<div class="invalid-feedback">
								Sellectionnez une image.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 mt-4">
							<button class="btn btn-info form-control" name="add_slide" type="submit"><i class="fas fa-plus-circle"></i> Insert Slide</button>
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