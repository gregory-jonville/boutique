<?php require_once './core/init.php'; 

$ip_add = $getFromU->getRealUserIp();
$total = 0;
$records = $getFromU->select_products_by_ip($ip_add);
foreach ($records as $record) {
	$product_id = $record->p_id;
	$product_qty = $record->qty;
	$get_prices = $getFromU->viewProductByProductID($product_id);
	foreach ($get_prices as $get_price) {
		$product_price = $get_price->product_price;
		$sub_total = $product_price * $product_qty;
		$total += $sub_total;
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- Font CSS -->
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<!-- Main CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<title>Store-€lec</title>
</head>

<body>

	<div id="top">
		<!-- Top Starts -->
		<div class="container">
			<!-- Container Starts -->
			<div class="row">
				<!-- row Starts -->
				<div class="col-md-6">
					<!-- col-md-6 offer Starts -->
					<a href="customer/my_account.php" id="btnh" class="btn btn-sm">
						<?php
						if (!isset($_SESSION['customer_email'])) {
							echo "Bienvenue : <strong class='text-uppercase'>Invité</strong>";
						} else {
							$customer = $getFromU->view_customer_by_email($_SESSION['customer_email']);
							$customer_name = $customer->customer_name;
							echo "Bienvenue : <strong class='text-uppercase'>$customer_name</strong>";
						}
						?>
					</a>
					<?php if (isset($_SESSION['customer_email'])) : ?>
						<a href="cart.php">Il y a <?php echo $getFromU->count_product_by_ip($ip_add); ?> article(s) dans votre panier. Prix total : <?php echo $total; ?> €</a>
					<?php else : ?>
						<a href="cart.php">Connectez vous pour faire vos achats !</a>
					<?php endif ?>

				</div> <!-- col-md-6 offer Ends -->

				<div class="col-md-6">
					<!-- col-md-6 Starts -->
					<ul class="menu">
						<!-- menu starts -->
						<?php if (!isset($_SESSION['customer_email'])) : ?>
							<li><a href="customer_register.php">Inscription</a></li>
						<?php endif ?>

						<?php if (!isset($_SESSION['customer_email'])) : ?>
							<li><a href="checkout.php">Mon compte</a></li>
						<?php else : ?>
							<li><a href="customer/my_account.php?my_orders">Mon compte</a></li>
						<?php endif ?>

						<li><a href="cart.php">Panier</a></li>
						<li>
							<?php if (isset($_SESSION['customer_email'])) : ?>
								<a href="./logout.php">Déconnexion</a>
							<?php else : ?>

							<?php endif ?>

						</li>
					</ul> <!-- menu ends -->
				</div> <!-- col-md-6 Ends -->
			</div><!-- row ends -->


		</div> <!-- Container Ends -->
	</div> <!-- Top Ends -->