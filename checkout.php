<?php require_once 'includes/header.php'; 

require_once 'includes/navbar.php'; ?>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				    <li class="breadcrumb-item" aria-current="page">Mon compte</li>
				  </ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div> <!-- col-md-3 End -->

			<div class="col-md-9">
				<?php
					if (!isset($_SESSION['customer_email'])) {
						require_once 'customer/customer_login.php';
					}else {
						require_once 'payment_options.php';
					}


				?>
			</div> <!-- col-md-9 End -->



		</div> <!-- Row End -->





	  </div> <!-- SINGLE PRODUCT ROW END -->

	</div>
</div>




<?php require_once 'includes/footer.php'; ?>