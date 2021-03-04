<div class="card text-center">
	<div class="card-body">
		<h3 class="card-title mt-4">Mes achats</h3>
		<h6 class="card-subtitle mb-2 text-muted">Historique</h6>
		<p class="card-text my-3">Si vous avez une question liée à une de vos commandes : <a href="../contact.php">contactez-nous</a>. Nous nous ferons un plaisir de vous répondre.</p>


		<?php if (isset($_SESSION['order_sub_msg'])): ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
			  <?= $_SESSION['order_sub_msg']; unset($_SESSION['order_sub_msg']); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION['update_customer_order_msg'])): ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
			  <?= $_SESSION['update_customer_order_msg']; unset($_SESSION['update_customer_order_msg']); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif ?>


		<table class="table table-bordered table-responsive-xl table-hover mt-5">
			<thead>
				<tr>
					<th scope="col">N°</th>
					<th scope="col">Montant dû</th>
					<th scope="col">Facture N°</th>
					<th scope="col">Quantité</th>
					<th scope="col">Option</th>
					<th scope="col">Date</th>
					<th scope="col">Satut</th>
					<th scope="col">Payer</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$customer_session = $_SESSION['customer_email'];
					$get_customer = $getFromU->view_customer_by_email($customer_session);

  				$customer_id = $get_customer->customer_id;

  				$get_orders = $getFromU->view_customer_orders_by_id($customer_id);
  				$i = 0;
  				foreach ($get_orders as $get_order) {
  					$order_id = $get_order->order_id;
  					$due_amount = $get_order->due_amount;
  					$invoice_no = $get_order->invoice_no;
  					$qty = $get_order->qty;
  					$size = $get_order->p_option;
  					$order_date = substr($get_order->order_date, 0,10);
  					$order_status = $get_order->order_status;
  					$i++;
  					if ($order_status === "pending") {
  						$order_status = "A payer";
  					}else {
  						$order_status = "Payé";
  					}
				?>

					<tr>
						<th>#<?= $i; ?></th>
						<td><?= $due_amount; ?> €</td>
						<td><?= $invoice_no; ?></td>
						<td><?= $qty; ?></td>
						<td><?= ucwords($size); ?></td>
						<td><?= $order_date; ?></td>
						<td><?= $order_status; ?></td>
						<?php if ($order_status == "Payé") : ?>
<td></td>
						<?php else : ?>
						<td><a href="confirm.php?order_id=<?= $order_id; ?>" class="btn btn-sm btn-info ">Payer</a></td>
						<?php endif ?>
					</tr>
				<?php	} ?>
			</tbody>
		</table>
	</div>
</div>