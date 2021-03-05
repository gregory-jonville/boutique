<?php require_once 'includes/header.php'; 

require_once 'includes/navbar.php'; ?>

<div id="content">
	<div class="container">
		<div class="row">

		<?php
			if (isset($_GET['product_id'])) {
				$the_product_id = $getFromU->checkInput($_GET['product_id']);

				$get_products = $getFromU->viewProductByProductID($the_product_id);
				

				foreach ($get_products as $get_product) {
					$p_cat_id = $get_product->p_cat_id;
					$product_title = $get_product->product_title;
					$product_price = $get_product->product_price;
					$product_desc = $get_product->product_desc;
					$product_img1 = $get_product->product_img1;
					$product_img2 = $get_product->product_img2;
					$product_img3 = $get_product->product_img3;

					$get_p_cats = $getFromU->viewAllByCatID($p_cat_id);
					foreach ($get_p_cats as $get_p_cat) {
						$p_cat_title = $get_p_cat->p_cat_title;
						$p_cat_id = $get_p_cat->p_cat_id;

		?>

			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				    <li class="breadcrumb-item"><a href="shop.php?p_cat_id=<?= $p_cat_id; ?>"><?= $p_cat_title; ?></a></li>
				    <li class="breadcrumb-item" aria-current="page"><?= $product_title; ?></li>
				  </ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div>

			<div class="col-md-9">
				<div class="row" id="productMain">
					<div class="col-sm-6">
						<div id="mainImage">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							  <ol class="carousel-indicators">
							    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							  </ol>
							  <div class="carousel-inner">
							    <div class="carousel-item active">
							      <img class="d-block w-100 img-fluid " src="admin_area/product_images/<?= $product_img1; ?>" alt="First slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100 img-fluid " src="admin_area/product_images/<?= $product_img2; ?>" alt="Second slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100 img-fluid" src="admin_area/product_images/<?= $product_img3; ?>" alt="Third slide">
							    </div>
							  </div>
							  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="card text-center mb-3">
						  <div class="card-body">
						    <h4 class="card-title mb-4"><?= $product_title; ?></h4>
						    <?php

						    	if (isset($_POST['add_to_cart'])) {
									if (!isset($_SESSION['customer_email'])) {
										echo '<script>alert("Veuillez vous connecter pour pouvoir faire vos achats.")</script>';
						    			header('Location: customer/my_account.php');
									}
						    		$p_id = $_POST['product_id'];
						    		$id_cust = $getFromU->getRealUserIp();
									
						    		$product_qty = $_POST['product_qty'];
						    		$product_size = $_POST['product_size'];

						    		$check_product_by_ip_id = $getFromU->check_product_by_ip_id($id_cust, $p_id);
						    		if ($check_product_by_ip_id === true) {
						    			echo '<script>alert("Ce produit est déjà dans votre panier !")</script>';
						    			echo "<script>window.open('details.php?product_id=$p_id', '_self')</script>";
						    		}else{
						    			$insert_cart = $getFromU->create("cart", array("p_id" => $p_id, "id_cust" => $id_cust, "qty" =>$product_qty, "p_option" =>$product_size));
						    			
										echo '<script>alert("Produit ajouté à votre panier !")</script>';
						    			header('Location: shop.php');

						    		}

						    	}


						    ?>
								<form method="post">
									<div class="form-group row">
								    <label for="product_qty" class="col-sm-5 col-form-label-sm text-xl-right">Quantité</label>
								    <div class="col-sm-7">
								      <select name="product_qty" id="product_qty" class="form-control">
								      	<option value="1">1</option>
								      	<option value="2">2</option>
								      	<option value="3">3</option>
								      	<option value="4">4</option>
								      	<option value="5">5</option>
								      	<option value="6">6</option>
								      </select>
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="product_size" class="col-sm-5 col-form-label-sm text-xl-right">Couleurs</label>
								    <div class="col-sm-7">
								      <select name="product_size" id="product_size" class="form-control" required>
								      	<option value="">--- Couleur ---</option>
								      	<option value="bleue">Bleue</option>
								      	<option value="rouge">Rouge</option>
								      	<option value="gris">Gris</option>
								      	<option value="noir">Noir</option>
										<option value="autre">Autres</option>
								      </select>
								    </div>
								  </div>

								  <div class="form-group row">
								    <div class="col-sm-7">
								      <input type="hidden" name="product_id" value="<?= $the_product_id; ?>">
								    </div>
								  </div>

								  <h5 class="card-text mt-4">Prix total : <?= $product_price; ?> €</h5>
								  <button type="submit" name="add_to_cart" class="card-link btn btn-outline-info mt-3 px-4"><i class="fas fa-shopping-cart"></i>Ajouter</button>

								</form>


						  </div>
						</div>


						<div class="row" id="thumbs">
							<div class="col-4">
								<a href="#" class="thumb"><img class="img-fluid img-thumbnail" src="admin_area/product_images/<?= $product_img1; ?>"></a>
							</div>
							<div class="col-4">
								<a href="#" class="thumb"><img class="img-fluid img-thumbnail" src="admin_area/product_images/<?= $product_img2; ?>"></a>
							</div>
							<div class="col-4">
								<a href="#" class="thumb"><img class="img-fluid img-thumbnail" src="admin_area/product_images/<?= $product_img3; ?>"></a>
							</div>
						</div>

					</div>

				</div>

				<div class="row my-4">
					<div class="col-12">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Détails</h5>
						    <p class="card-text"><?= $product_desc; ?></p>
						    
						   
						  </div>
						</div>
				 	</div>
			  </div>


			</div> <!-- col-md-9 END --3 -->
		<?php } } } ?>
		</div> <!-- Row end -->

		<div class="row suggestion_heading">
			<div class="col-md-12 ">
				<div class="text-center">
					<h2 class="">Vous aimerez aussi</h2>
				</div>
			</div>
		</div>

	  <div class="row">
	  	<?php
	  		//var_dump($p_cat_id);
	  		$view_products = $getFromU->viewProductByProductID($the_product_id);
	  		//var_dump($products);
	  		foreach ($view_products as $view_product) {
	  			$p_cat_id = $view_product->p_cat_id;
	  			//var_dump($p_cat_id);
	  			$products = $getFromU->viewProductByCatID($p_cat_id);
	  			foreach ($products as $product) {
		  			$product_id = $product->product_id;
		  			$product_title = $product->product_title;
		  			$product_price = $product->product_price;
		  			$product_img1 = $product->product_img1;
		  			//var_dump($product_id);
		  			if ($product_id == $the_product_id) {
		  				continue;
		  			}
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
									<a href="details.php?product_id=<?= $product_id; ?>" class="btn btn-outline-info form-control">Détails</a>
								</div>
								<div class="col-md-6  pr-lg-3 pr-1">
									<a href="details.php?product_id=<?= $product_id; ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> +</a>
								</div>
							</div>
					  </div>
					</div>
				</div>
			</div> <!-- SINGLE PRODUCT END -->

			<?php  } } ?>
	  </div> <!-- SINGLE PRODUCT ROW END -->


	</div>
</div>


<?php require_once 'includes/footer.php'; ?>