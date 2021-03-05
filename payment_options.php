<?php
	$session_email = $_SESSION['customer_email'];

	$select_customer = $getFromU->view_customer_by_email($session_email);

	$customer_id = $select_customer->customer_id;

?>

<div class="card">
  <div class="card-body text-center">
    <h5 class="card-title">Options de paiement</h5>
    <p class="card-text mb-5"></p>
    <a href="order.php?c_id=<?= $customer_id; ?>" class="btn btn-info text-white"><i class="far fa-credit-card"></i> Carte bancaire</a>
    <a href="#" class="btn btn-info text-white"><i class="fab fa-paypal"></i> PayPal</a>
  </div>
</div>