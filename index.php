<?php require_once 'includes/header.php';

require_once 'includes/navbar.php'; ?>

<div class="container-fluid px-0" id="slider">
	<div class="row">
		<div class="col-md-12">
			<!-- carousel -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> <!-- La classe .active doit être ajoutée à l'une des diapositives sinon, le carrousel ne sera pas visible. -->
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<?php
					$slides = $getFromU->selectSlide1();
					foreach ($slides as $slide) {
						$slide_image = $slide->slide_image;
						$slide_name  = $slide->slide_name;
						$slide_title  = $slide->slide_title;
						$slide_text  = $slide->slide_text;
					?>
						<div class="carousel-item active">
							<img class="d-block w-100 img-fluid" src="admin_area/slides_images/<?= $slide_image; ?>" alt="<?= $slide_name; ?>">
							<div class="carousel-caption d-none d-md-block" style="opacity: 0.5; background-color:black;">
								<h5 s><?= $slide_title; ?></h5>
								<p><?= $slide_text; ?></p>
							</div>
						</div>

					<?php } ?>

					<?php
					$slides = $getFromU->selectSlideAll();
					foreach ($slides as $slide) {
						$slide_image = $slide->slide_image;
						$slide_name  = $slide->slide_name;
						$slide_title  = $slide->slide_title;
						$slide_text  = $slide->slide_text;
					?>
						<div class="carousel-item">
							<img class="d-block w-100 img-fluid" src="admin_area/slides_images/<?= $slide_image; ?>" alt="<?= $slide_name; ?>">
							<div class="carousel-caption d-none d-md-block" style="opacity: 0.5; background-color:black;">
								<h5><?= $slide_title; ?></h5>
								<p><?= $slide_text; ?></p>
							</div>
						</div>
					<?php } ?>

				</div>

				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div> <!-- carousel slide ends -->
		</div>
	</div>
</div>

	<div class="container-fluid mt-4 px-0">
		<div class="row">
			<div class="col-12">
				<h2 class="p-4 bg-light text-center text-uppercase">Dernières nouveautées</h2>
			</div>
		</div>
	</div>


<div class="container" id="content">
	<div class="row">

	<?php 
	if (isset($_GET['search']) && !empty($_GET['user_query'])) {
		$query = $getFromU->checkInput($_GET['user_query']);
		$getProducts = $getFromU->search($query);
		
		if (empty($getProducts)) {
			$error =  'il n\'y a pas de résultat pour :' .$query;
		}
		
	} else {
		$getProducts = $getFromU->selectLatestProduct();
	}
	
	
	
	if (isset($error)) : ?>
				<div class="d-flex justify-content-center alert alert-warning text-center alert-dismissible fade show" role="alert">
					<?= $error; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>

		<?php
			
		foreach ($getProducts as $getProduct) {
			$product_id = $getProduct->product_id;
			$product_title = $getProduct->product_title;
			$product_price = $getProduct->product_price;
			$product_img1 = $getProduct->product_img1;
		?>

			<div class="col-sm-10 col-md-4 col-lg-3">
				<div class="product mb-2">
					<div class="card">
						<a href="details.php?product_id=<?= $product_id ?>"><img class="card-img-top img-fluid p-4" src="admin_area/product_images/<?= $product_img1; ?>" alt="Card image cap"></a>
						<div class="card-body text-center">
							<h6 class="card-title"><a href="details.php?product_id=<?= $product_id ?>"><?= $product_title ?></a></h6>
							<h5 class="card-text">Prix : <?= $product_price ?> €</h5>
							<div class="row">
								<div class="col-md-6  pr-1 pb-2">
									<a href="details.php?product_id=<?= $product_id ?>" class="btn btn-outline-info form-control">Détails</a>
								</div>
								<div class="col-md-6  pr-3">
									<a href="details.php?product_id=<?= $product_id ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> +</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- END -->

		<?php } ?>
	</div>
</div>


<?php require_once 'includes/footer.php'; ?>