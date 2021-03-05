<?php
	if (!isset($_GET['p_cat_id'])) {
		if (!isset($_GET['cat_id'])) {
			
?>

  <div class="card-body">
    <h5 class="card-title d-flex justify-content-center">Tous les produits</h5>
  </div>


<div class="row">
	<?php
		$get_products = $getFromU->selectAllProducts();
		foreach ($get_products as $get_product) {
			$product_id = $get_product->product_id;
			$product_title = $get_product->product_title;
			$product_price = $get_product->product_price;
			$product_img1 = $get_product->product_img1;
	?>
	<div class="col-sm-6 col-md-4 justify-content-center single">
		<div class="product mb-4">
			<div class="card">
			  <a href="details.php?product_id=<?= $product_id; ?>"><img class="card-img-top img-fluid p-3" src="admin_area/product_images/<?= $product_img1; ?>" alt="Card image cap"></a>
			  <div class="card-body text-center">
			    <h6 class="card-title"><a href="details.php?product_id=<?= $product_id; ?>"><?= $product_title; ?></a></h6>
			    <h5 class="card-text">Prix : <?= $product_price; ?> €</h5>
			    <div class="row">
						<div class="col-md-6  pr-1 pb-2">
							<a href="details.php?product_id=<?= $product_id; ?>" class="btn btn-outline-info form-control">Détails</a>
						</div>
						<div class="col-md-6 pr-lg-3 pr-1">
							<a href="details.php?product_id=<?= $product_id; ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> +</a>
						</div>
					</div>
			  </div>
			</div>
		</div>
	</div> <!-- SINGLE PRODUCT END -->
	<?php } ?>  <!-- selectAllProducts end -->

</div> <!-- ROW END -->




<?php  } } ?>