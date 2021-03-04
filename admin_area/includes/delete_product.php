<?php require_once ('../../core/init.php'); 

if (isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];

	$delete = $getFromU->delete_product($product_id);
	if ($delete) {
		$_SESSION['delete_product_msg'] = "Produit supprimé avec succès !";
		header('Location: ../index.php?view_products');
	}
}
?>

