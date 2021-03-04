<?php require_once 'includes/header.php';

if (!isset($_SESSION['customer_email'])) {
	header('Location: ../checkout.php');
}

require_once 'includes/navbar.php';
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

			<div class="col-md-9">
				<?php if (isset($_SESSION['login_success_msg'])) : ?>
					<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
						<?php echo $_SESSION['login_success_msg'];
						unset($_SESSION['login_success_msg']); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>

				<?php
				if (isset($_GET['my_orders'])) {
					require_once 'includes/my_orders.php';
				}
				if (isset($_GET['pay_offline'])) {
					require_once 'includes/pay_offline.php';
				}
				if (isset($_GET['edit_account'])) {
					require_once 'includes/edit_account.php';
				}
				if (isset($_GET['change_pass'])) {
					require_once 'includes/change_pass.php';
				}
				if (isset($_GET['delete_account'])) {
					require_once 'includes/delete_account.php';
				}
				?>
			</div>



		</div>
	</div>
</div>

<?php require_once '../includes/footer.php'; ?>