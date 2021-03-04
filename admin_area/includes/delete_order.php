<?php require_once ('../../core/init.php'); 

if (isset($_GET['order_id'])) {
	$order_id = $_GET['order_id'];

	$delete = $getFromU->Delete_order($order_id);
	if ($delete) {
		$_SESSION['delete_order_msg'] = "Vente annulée !";
		header('Location: ../index.php?view_orders');
	}
}
?>