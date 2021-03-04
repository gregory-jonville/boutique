<?php
$customer_email = $_SESSION['customer_email'];

if (isset($_POST['yes'])) {
	$delete_customer = $getFromU->delete_customer($customer_email);
	if ($delete_customer === true) {
		session_destroy();
		echo '<script>alert("Votre compte a été supprimé !")</script>';
		echo '<script>window.open("../index.php", "_self")</script>';
	}
} elseif (isset($_POST['no'])) {
	header('Location: my_account.php?my_orders');
}
?>

<div class="card text-center">
	<div class="card-body">
		<center>
			<div class="card-title my-4">
				<h3>Voulez-vous vraiment supprimer votre compte ?</h3><span>Cette action est <strong>irréversible</strong> et entraînera la suppresion <strong><u>définitive</u></strong> de votre compte.</span>
			</div>
			<form method="post">
				<input type="submit" name="yes" class="btn btn-danger" value="Oui, je confirme">
				<input type="submit" name="no" class="btn btn-primary" value="Non">
			</form>
		</center>
	</div>
</div>