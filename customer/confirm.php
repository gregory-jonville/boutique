<?php require_once 'includes/header.php';

if (!isset($_SESSION['customer_email'])) {
	header('Location: ../checkout.php');
}

if (isset($_GET['order_id'])) {
	$order_id = $_GET['order_id'];

	$view_order = $getFromU->view_customer_order_by_order_id($order_id);

	$invoice_no = $view_order->invoice_no;
	$amount = $view_order->due_amount;
}



require_once '../includes/navbar.php';
?>




<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
						<li class="breadcrumb-item" aria-current="page">Mon compte</li>
					</ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div>

			<div class="col-md-9 mb-5">
				<div class="card">
					<div class="card-header text-center">
						<h5 class="mt-4">Confirmation de paiement</h5>
						<p class="text-muted">Si vous avez une question liée à une de vos commandes : <a href="../contact.php">contactez-nous</a>. Nous nous ferons un plaisir de vous répondre.</p>
					</div>
					<div class="card-body">
						<?php
						if (isset($_POST['confirm_payment'])) {
							$order_id = $_POST['order_id'];
							$invoice_no = $_POST['invoice_no'];
							$amount = $_POST['amount_sent'];
							$payment_mode = $_POST['payment_mode'];
							$ref_no = $_POST['ref_no'];
							$code = $_POST['code'];
							$payment_date = $_POST['date'];

							$complete = "Complete";

							$insert_payment = $getFromU->create("payments", array("invoice_no" => $invoice_no, "amount" => $amount, "payment_mode" => $payment_mode, "ref_no" => $ref_no, "code" => $code, "payment_date" => $payment_date));

							$update_customer_order = $getFromU->update_customer_order_status($complete, "customer_orders", $order_id);

							$update_pending_order = $getFromU->update_customer_order_status($complete, "pending_orders", $order_id);

							$_SESSION['update_customer_order_msg'] = "Votre paiement a bien été pris en compte. Vous recevrez la confirmation d'expédition sous 24h.";
							header('Location: my_account.php?my_orders');
						}
						?>

						<form method="post" action="confirm.php" class="needs-validation" novalidate>
							<div class="form-row">
								<div class="col-12 mb-3">
									<input type="hidden" name="order_id" value="<?= $order_id; ?>" class="form-control" id="order_id" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="invoice_no">Numéro de facture</label>
									<input type="text" name="invoice_no" value="<?= $invoice_no; ?>" class="form-control" id="invoice_no" required>
									<div class="invalid-feedback">
										Veuillez entrer votre numéro de facture.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="amount_sent">Montant dû</label>
									<input type="number" name="amount_sent" value="<?= $amount; ?>" class="form-control" id="amount_sent" required>
									<div class="invalid-feedback">
										Veuillez entrer le montant de votre facture.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="payment_mode">Moyen de paiement</label>
									<select class="custom-select mr-sm-2" name="payment_mode" id="payment_mode" required>
										<option selected>-- Choisir --</option>
										<option value="marster Card">Master Card</option>
										<option value="visa">Visa</option>
										<option value="autre">Autre</option>
									</select>
									<div class="invalid-feedback">
										Merci de choisir un moyent de paiement.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="ref_no">Numero de carte</label>
									<input type="number" name="ref_no" class="form-control" id="ref_no" required>
									<div class="invalid-feedback">
										Merci d'entrer votre référence de transaction.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="date_exp">date d'expiration</label>
									<input type="date" name="date_exp" class="form-control" id="date_exp" required>
									<div class="invalid-feedback">
										Merci d'entrer la date d'expiration.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="code">CVC</label>
									<input type="text" name="code" class="form-control" id="code" required>
									<div class="invalid-feedback">
										Please provide a Easy Paisa/Omni Code.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="date">Date de paiement</label>
									<input type="date" name="date" class="form-control" id="date" placeholder="Enter Your Subject" required>
									<div class="invalid-feedback">
										Veuillez rentrer la date de votre paiement.
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4 offset-lg-4">
									<button class="btn btn-info form-control" type="submit" name="confirm_payment"><i class="fas fa-check-circle"></i> Confirm Payment</button>
								</div>
							</div>
						</form>

						<script>
							// Evite l'envoi de mauvaises infos
							(function() {
								'use strict';
								window.addEventListener('load', function() {
									var forms = document.getElementsByClassName('needs-validation');
									// Evite le renvoi du form
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
				</div> <!-- Card End -->
			</div>



		</div>
	</div>
</div>

<?php require_once '../includes/footer.php'; ?>