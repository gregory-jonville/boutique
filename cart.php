<?php require_once 'includes/header.php'; 

require_once 'includes/navbar.php'; ?>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				    <li class="breadcrumb-item" aria-current="page">Panier</li>
				  </ol>
				</nav>
			</div>


			<div class="col-md-12">
				<div class="card mb-3">
				  <div class="card-body">
				    <h5 class="card-title">Panier</h5>
				    <p class="card-text text-muted">Vous avez <?= $getFromU->count_product_by_ip($ip_add); ?> produit(s) dans votre panier.</p>
				    <form method="post" action="cart.php" enctype="multipart/form-data">
							<div class="table-responsive mb-3">
							  <table class="table table-bordered table-hover text-center">
								  <thead>
								    <tr>
								      <th colspan="2" scope="col">Produit</th>
								      <th scope="col">Quantité</th>
								      <th scope="col">Prix</th>
								      <th scope="col">Option</th>
								      <th scope="col">Delete</th>
								      <th scope="col">Sous-total</th>
								    </tr>
								  </thead>
								  <tbody>

									<?php
										$ip_add = $getFromU->getRealUserIp();
										$total = 0;
										$records = $getFromU->select_products_by_ip($ip_add);
										foreach ($records as $record) {
											$product_id = $record->p_id;
											$product_qty = $record->qty;
											$product_size = $record->p_option;
											$get_prices = $getFromU->viewProductByProductID($product_id);
											foreach ($get_prices as $get_price) {
												$product_price = $get_price->product_price;
												$product_img1 = $get_price->product_img1;
												$product_title = $get_price->product_title;
												$sub_total = $product_price * $product_qty;
												$total += $sub_total;
									?>

								    <tr>
								      <td><a href="details.php?product_id=<?= $product_id ?>"><img class="img-fluid cart_image" src="admin_area/product_images/<?= $product_img1; ?>"></a></td>
								      <td><a href="details.php?product_id=<?= $product_id ?>"><?= $product_title ?></a></td>
								      <td><?= $product_qty ?></td>
								      <td><?= $product_price ?> €</td>
								      <td><?= ucwords($product_size) ?></td>
								      <td>
								      	<div class="custom-control custom-checkbox">
									        <input type="checkbox" name="remove[]" value="<?= $product_id ?>" class="custom-control-input" id="checkbox['<?= $product_id; ?>']">
									        <label class="custom-control-label" for="checkbox['<?= $product_id ?>']"></label>
									      </div>
								      </td>
								      <td class="text-right"><?= number_format($sub_total, 2) ?> €</td>
								    </tr>
									<?php } } ?>

								    <tr>
								    	<th class="text-right" colspan="6"> Total </th>
								    	<th class="text-right" colspan="1"><?= number_format($total, 2) ?> €</th>
								    </tr>


								  </tbody>
								</table>
							</div> <!-- Table Responsive End -->


							<div class="card-footer">
								<div class="row">
									<div class="col-lg-4 pr-1 pb-2">
										<a href="index.php" class="btn btn-outline-primary form-control"><i class="fas fa-chevron-left"></i> &nbspContinuez</a>
									</div>
									
									<div class="col-lg-4 pr-lg-3 pr-1 pb-2">
										<button class="btn btn-outline-info float-sm-right form-control" type="submit" name="update" value="Update Cart">
											<i class="fas fa-sync-alt"></i> &nbspMise à jour
										</button>
									</div>
									<div class="col-lg-4  pr-lg-3 pr-1 ">
										<a href="checkout.php" class="btn btn-outline-success form-control">Payer &nbsp<i class="fas fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
				    </form> <!-- Form End -->

				    <?php
					if (isset($_POST['remove']) && !empty($_POST['remove'])) {
						$product_ids = $_POST['remove'];
						foreach ($product_ids as $product_id) {
							$delete_id = $getFromU->delete_from_cart_by_id($product_id);
						}
						if ($delete_id) {
							
							echo '<script>alert("Votre panier a été mise à jour !")</script>';
							echo '<script>window.open("cart.php", "_self")</script>';
						}
					}
						?>
				  </div>
				</div>
			</div> <!-- col-md-9 End -->

			<!-- <div class="col-md-3">
				<div class="card">
				  <h5 class="card-header text-center">Frais additionnels</h5>
				  <div class="card-body">
				    <p class="card-text text-muted text-justify">Hors promotions. Pour plus de renseignements, se référer aux <strong><a href="#">conditions générales</a></strong> de vente.</p>
				    <table class="table table-hover text-center">
						  <thead>
						    <tr>
						      <th scope="col">Description</th>
						      <th scope="col">Tarifs</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <td>Prix</td>
						      <td class="text-right"><?= number_format($total, 2); ?> €</td>
						    </tr>
						    <tr>
						      <td>Livraison</td>
						      <td class="text-right">$ <?= number_format($shipping = ($total * 5) / 100, 2); ?></td>
						    </tr>
						    <tr>
						      <th>Total</th>
						      <th class="text-right"><?= number_format($total + $shipping, 2); ?> €</th>
						    </tr>
						  </tbody>
						</table>
				  </div>
				</div>
			</div> -->

		</div> <!-- Row End -->


		<div class="row suggestion_heading">
			<div class="col-md-12 ">
				<div class="text-center">
					<h2 class="">Vous pouvez aussi aimer</h2>
				</div>
			</div>
		</div>

	  <div class="row">
	  	<?php
	  		$random_products = $getFromU->select_random_products();
	  		foreach ($random_products as $random_product) {
	  			$product_title = $random_product->product_title;
	  			$product_id = $random_product->product_id;
	  			$product_img1 = $random_product->product_img1;
	  			$product_price = $random_product->product_price;
	  	?>
	  	<div class="col-sm-6 col-md-3 justify-content-center single">
				<div class="product mb-4">
					<div class="card">
					  <a href="details.php?product_id=<?= $product_id; ?>"><img class="card-img-top img-fluid p-3" src="admin_area/product_images/<?= $product_img1; ?>" alt="Card image cap"></a>
					  <div class="card-body text-center">
					    <h6 class="card-title"><a href="details.php?product_id=<?= $product_id; ?>"><?= $product_title; ?></a></h6>
					    <h5 class="card-text">Prix : <?= $product_price; ?> €</h5>
					    <div class="row">
								<div class="col-md-6  pr-1 pb-2">
									<a href="details.php?product_id=<?= $product_id; ?>" class="btn btn-outline-primary form-control">Détails</a>
								</div>
								<div class="col-md-6  pr-lg-3 pr-1">
									<a href="details.php?product_id=<?= $product_id; ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> &nbsp+</a>
								</div>
							</div>
					  </div>
					</div>
				</div>
			</div> <!-- SINGLE PRODUCT END -->

		<?php } ?>

	  </div> <!-- SINGLE PRODUCT ROW END -->

	</div>
</div>




<?php require_once 'includes/footer.php'; ?>