<?php require_once ('../../core/init.php'); 

if (isset($_GET['admin_id'])) {
	$admin_id = $_GET['admin_id'];

	$delete_admin = $getFromU->delete_admin($admin_id);
	if ($delete_admin) {
		$_SESSION['delete_user_msg'] = "Utilisateur supprimé !";
		header('Location: ../index.php?view_users');
	}
}
?>