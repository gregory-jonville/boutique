<?php
	if (isset($_GET['cat_id'])) {
		$cat_id = $getFromU->checkInput($_GET['cat_id']);
		

		$row_cats = $getFromU->getAllByCatID("categories", $cat_id);
		foreach ($row_cats as $row_cat) {
			$cat_title = $row_cat->cat_title;
			$cat_desc = $row_cat->cat_desc;
		?>

		<div class="card mb-3">
		  <div class="card-body">
		    <h5 class="card-title"><?= $cat_title ?></h5>
		    <p class="card-text"><?= $cat_desc ?></p>
		  </div>
		</div>

		<?php 	} ?>




<div class="row">
	<?php
		$get_products_by_cat_id = $getFromU->selectAllProductBy_cat_ID($cat_id);
		$count_product = count($get_products_by_cat_id);
		if ($count_product == 0) {
		?>
		<div class="card mb-3 w-100 text-center">
		  <div class="card-body">
		    <h5 class="card-title text-danger">Aucun résultat</h5>
		    <p class="card-text text-warning">Auncun produit n'est présent dans cette catégorie...</p>
		  </div>
		</div>


		<?php
		} else {
		foreach ($get_products_by_cat_id as $get_product_by_cat_id) {
			$product_id = $get_product_by_cat_id->product_id;
			$product_title = $get_product_by_cat_id->product_title;
			$product_price = $get_product_by_cat_id->product_price;
			$product_img1 = $get_product_by_cat_id->product_img1;
	?>
	<div class="col-sm-6 col-md-4 justify-content-center single"> <!-- START -->
		<div class="product mb-4">
			<div class="card">
			  <a href="details.php?product_id=<?= $product_id ?>"><img class="card-img-top img-fluid p-3" src="admin_area/product_images/<?= $product_img1 ?>" alt="Card image cap"></a>
			  <div class="card-body text-center">
			    <h6 class="card-title"><a href="details.php?product_id=<?= $product_id; ?>"><?= $product_title ?></a></h6>
			    <h5 class="card-text">PriX : <?= $product_price ?> €</h5>
			    <div class="row">
						<div class="col-md-6  pr-1 pb-2">
							<a href="details.php?product_id=<?= $product_id ?>" class="btn btn-outline-info form-control">Détails</a>
						</div>
						<div class="col-md-6 pr-lg-3 pr-1">
							<a href="details.php?product_id=<?= $product_id ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> +</a>
						</div>
					</div>
			  </div>
			</div>
		</div>
	</div> <!-- END -->
	<?php } ?>  <!-- selectAllProductBy_cat_ID end -->

</div> <!-- ROW END -->
<?php } } ?>