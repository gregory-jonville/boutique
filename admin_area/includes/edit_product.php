<?php require_once 'includes/header.php';

if (isset($_GET['edit_product'])) {
	$product_id = $_GET['edit_product'];

	$view_product = $getFromU->view_Product_By_Product_ID($product_id);

	$product_title = $view_product->product_title;
	$p_cat_id = $view_product->p_cat_id;
	$cat_id = $view_product->cat_id;
	$product_price = $view_product->product_price;
	$product_desc = $view_product->product_desc;
	$product_keywords = $view_product->product_keywords;
	$product_img1 = $view_product->product_img1;
	$product_img2 = $view_product->product_img2;
	$product_img3 = $view_product->product_img3;

	$view_p_category = $getFromU->view_All_By_p_cat_ID($p_cat_id);
	$the_p_cat_title = $view_p_category->p_cat_title;

	$view_category = $getFromU->view_All_By_cat_ID($cat_id);
	$the_cat_title = $view_category->cat_title;
}


if (isset($_POST['update_product'])) {
	$product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	$cat_id = $_POST['cat'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords'];

	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];

	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];
    if ($getFromU->selectAllProductByname($product_title) == true) {
		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");
	
		$update_product = $getFromU->update_product("products", $product_id, array("p_cat_id" => $product_cat, "cat_id" => $cat_id, "add_date" => date("Y-m-d H:i:s"), "product_title" => $product_title, "product_img1" => $product_img1, "product_img2" => $product_img2, "product_img3" => $product_img3, "product_price" => $product_price, "product_desc" => $product_desc, "product_keywords" => $product_keywords));

		if ($update_product) {
			$_SESSION['product_update_msg'] = "Produit mis à jour avec succès !";
			header('Location: index.php?view_products');
		} else {
			echo '<script>alert("Une erreur s\'est produite !")</script>';
		}
	} else {
		echo '<script>alert("Le nom du produit est déjà existant en BDD")</script>';
	}
	
}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Mise à jour produit</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Mise à jour produit</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-md-9">
							<input type="hidden" name="product_id" value="<?= $product_id; ?>" required>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="product_title">Titre</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="product_title" class="form-control" id="product_title" value="<?= $product_title; ?>" placeholder="Titre" required>
							<div class="invalid-feedback">
								Entrez un titre.
							</div>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="product_cat">Categorie de produit</label>
						</div>
						<div class="col-md-9">
							<select name="product_cat" id="product_cat" class="form-control" required>
								<option value="<?= $p_cat_id; ?>"><?= $the_p_cat_title; ?></option>
								<?php
								$p_categories = $getFromU->viewAllFromTable("product_categories");
								foreach ($p_categories as $p_category) {
									$p_cat_id = $p_category->p_cat_id;
									$p_cat_title = $p_category->p_cat_title;
									if ($p_cat_title == $the_p_cat_title) {
										continue;
									}
								?>
									<option value="<?= $p_cat_id; ?>"><?= $p_cat_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Merci de sellectionner une catégorie de produit.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="cat">Catégorie</label>
						</div>
						<div class="col-md-9">
							<select name="cat" id="cat" class="form-control" required>
								<option value="<?= $cat_id; ?>"><?= $the_cat_title; ?></option>
								<?php
								$categories = $getFromU->viewAllFromTable("categories");
								foreach ($categories as $category) {
									$cat_id = $category->cat_id;
									$cat_title = $category->cat_title;
									if ($cat_title == $the_cat_title) {
										continue;
									}
								?>
									<option value="<?= $cat_id; ?>"><?= $cat_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Merci de selectionner une catégorie.
							</div>
						</div>
					</div>


					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="product_img1">Image 1</label>
						</div>
						<div class="col-md-9">
							<input type="file" name="product_img1" id="product_img1" value="<?= $product_img1; ?>" required>
							<img src="product_images/<?= $product_img1; ?>" width="30" height="30">
							<div class="invalid-feedback">
								Selectionnez une Image 1.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="product_img2">Image 2</label>
						</div>
						<div class="col-md-9">
							<input type="file" name="product_img2" id="product_img2" value="<?= $product_img2; ?>">
							<img src="product_images/<?= $product_img2; ?>" width="30" height="30">
							<div class="invalid-feedback">
								Selectionnez une image.
							</div>
						</div>
					</div>
						<div class="form-row mb-3">
							<div class="col-md-3">
								<label for="product_img3">Image 3</label>
							</div>
							<div class="col-md-9">
								<input type="file" name="product_img3" id="product_img3" value="<?= $product_img3; ?>">
								<img src="product_images/<?= $product_img3; ?>" width="30" height="30">
								<div class="invalid-feedback">
									Selectionnez une image.
								</div>
							</div>
						</div>

						<div class="form-row mb-3">
							<div class="col-md-3">
								<label for="product_price">Prix</label>
							</div>
							<div class="col-md-9">
								<input type="number" name="product_price" class="form-control" id="product_price" value="<?= $product_price; ?>" placeholder="Prix" required>
								<div class="invalid-feedback">
									Entrez un prix.
								</div>
							</div>
						</div>

						<div class="form-row mb-3">
							<div class="col-md-3 ">
								<label for="product_desc">Description</label>
							</div>
							<div class="col-md-9">
								<textarea name="product_desc" class="form-control" rows="6" id="product_desc" placeholder="Description" required><?= $product_desc; ?></textarea>
								<div class="invalid-feedback">
									Entrez une description.
								</div>
							</div>
						</div>

						<div class="form-row mb-3">
							<div class="col-3 ">
								<label for="product_keywords">Mot clef</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="product_keywords" class="form-control" value="<?= $product_keywords; ?>" id="product_keywords" placeholder="Mot clef" required>
								<div class="invalid-feedback">
									Entrez un mot clef.
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-12 mt-4">
								<button class="btn btn-info form-control" name="update_product" type="submit"><i class="fas fa-edit"></i> Update</button>
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

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: 'textarea'
	});
</script>