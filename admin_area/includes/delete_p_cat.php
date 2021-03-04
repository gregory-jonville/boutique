<?php require_once ('../../core/init.php'); 

if (isset($_GET['p_cat_id'])) {
	$p_cat_id = $_GET['p_cat_id'];

	$delete = $getFromU->delete_p_cat($p_cat_id);
	if ($delete) {
		$_SESSION['delete_p_cat_msg'] = "Catégorie de produit supprimé avec succès !";
		header('Location: ../index.php?view_p_cats');
	}
}
?>