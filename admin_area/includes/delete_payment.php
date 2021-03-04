<?php require_once ('../../core/init.php'); 

if (isset($_GET['payment_id'])) {
	$payment_id = $_GET['payment_id'];

	$delete = $getFromU->delete_payment($payment_id);
	
	if ($delete) {
		$_SESSION['delete_payment_msg'] = "Paiement supprimé avec succès !";
		header('Location: ../index.php?view_payments');
	}
}
?>