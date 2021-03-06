<?php require_once 'includes/header.php'; 

require_once 'includes/navbar.php'; 

if (isset($_POST['register'])) {
	$c_name = $getFromU->checkInput($_POST['c_name']);
	$c_email = $getFromU->checkInput($_POST['c_email']);
	$c_pass = $_POST['c_pass'];
  	$c_pass_conf = $_POST['c_pass_conf'];
	$c_country = $getFromU->checkInput($_POST['c_country']);
	$c_city = $getFromU->checkInput($_POST['c_city']);
	$c_contact = $getFromU->checkInput($_POST['c_mobile']);
	$c_address = $getFromU->checkInput($_POST['c_address']);
	$cp = $getFromU->checkInput($_POST['c_address_cp']);
	
	$c_ip = $getFromU->getRealUserIp();

	include_once 'check_picture.php';

	if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
		$error = "L'adresse email '$c_email' est considérée comme invalide.";
	  }

	$check_customer = $getFromU->check_customer_by_email($c_email);

	if ($check_customer === true) {
		$error = "Un compte est déjà existant avec cet e-mail";
	}

	// Password
	$pattern = "/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})(?=.*?[\W]{1,}).{8,20}$/";
	$password_required = (preg_match($pattern, $c_pass));
	if (!$password_required) {
		$error = "Le mot de passe doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre.";
	}

	if ($c_pass != $c_pass_conf) {
		$error = "Les mots de passe ne correspondent pas.";
	} 
	
	if (empty($error)) {
		
		$password_hashed = password_hash($c_pass, PASSWORD_BCRYPT, array('cost' => 10));
		$add_customer = $getFromU->create("customers", 
		array("customer_name" => $c_name, "customer_email" => $c_email, 
		"customer_pass" => $password_hashed, "customer_country" => $c_country, 
		"customer_city" => $c_city, "customer_contact" => $c_contact, 
		"customer_address" => $c_address, "customer_image" => $filename, "customer_cp" => $cp));
		move_uploaded_file($_FILES["c_image"]["tmp_name"], "customer/assets/customer_images/" . $_FILES["c_image"]["name"]);
		$add_msg = "Votre fichier a été téléchargé avec succès.";
		
		
	}		  
	
	if (!empty($add_customer)) {
			$check_cart = $getFromU->count_product_by_ip($c_ip);

			if ($check_cart > 0) {
				$_SESSION['customer_email'] = $c_email;
				
				echo '<script>alert("Vous êtes bien enregistré !")</script>';
				echo '<script>window.open("checkout.php", "_self")</script>';
			}else{
				echo '<script>alert("You have successfully Registered")</script>';
				echo '<script>window.open("index.php", "_self")</script>';
			}
		}
	}
?>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				    <li class="breadcrumb-item" aria-current="page">Inscription</li>
				  </ol>
				</nav>
			</div> <!-- col-md-9 End -->

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div> <!-- col-md-3 End -->


			<div class="col-md-9 mb-4">
				<div class="card">
				  <div class="card-header text-center">
						<h5 class="mt-4">Créer un compte</h5>
				  </div>
				  <div class="card-body">
					  	<?php if (isset($error)): ?>
							<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
							  <?php echo $error; ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
						<?php endif ?>

						<?php if (isset($add_msg)): ?>
							<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
							  <?php echo $add_msg; ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
						<?php endif ?>


						<form method="post" action="customer_register.php" enctype="multipart/form-data" class="needs-validation" novalidate>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_name">Nom</label>
						      <input type="text" name="c_name" class="form-control" id="c_name" placeholder="Entrez votre nom" required>
						      <div class="invalid-feedback">
						        Merci de rentrer un nom valide.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_email">E-mail</label>
						      <input type="email" name="c_email" class="form-control" id="c_email" placeholder="Entrez votre e-mail" required>
						      <div class="invalid-feedback">
							  Merci de rentrer un e-mail valide.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_password">Mot de passe</label>
						      <input type="password" name="c_pass" class="form-control" id="c_password" placeholder="Mot de passe" required>
						      <div class="invalid-feedback">
						        Merci de rentrer un mot de passe.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_password_conf">Confirmation de mot de passe</label>
						      <input type="password" name="c_pass_conf" class="form-control" id="c_password_conf" placeholder="Confirmation" required>
						      <div class="invalid-feedback">
						        Merci de confirmer votre mot de passe.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_country">Pays</label>
						      <input type="text" name="c_country" class="form-control" id="c_country" placeholder="Votre pays" required>
						      <div class="invalid-feedback">
							  Merci de rentrer votre pays de résidence.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_city">Ville</label>
						      <input type="text" name="c_city" class="form-control" id="c_city" placeholder="Votre ville" required>
						      <div class="invalid-feedback">
						        Merci de rentrer votre ville de résidence.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_address">Adresse</label>
						      <input type="text" name="c_address" class="form-control" id="c_address" placeholder="Votre adresse" required>
						      <div class="invalid-feedback">
						        Merci de rentrer votre adresse.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_address">Code postal</label>
						      <input type="text" name="c_address_cp" class="form-control" id="c_address_cp" placeholder="Code postal" required>
						      <div class="invalid-feedback">
						        Merci de rentrer votre code postal.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_mobile">Contact</label>
						      <input type="tel" name="c_mobile" class="form-control" id="c_mobile" placeholder="Votre numéro de téléphone" required>
						      <div class="invalid-feedback">
						        Merci de rentrer un numéro de téléphone.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_image">Avatar</label>
						      <input type="file" name="c_image" class="form-control image_file" id="c_image" placeholder="Choisissez votre avatar" required>
						      <div class="invalid-feedback">
						        Merci de choisir votre avatar.
						      </div>
						    </div>
						  </div>


						  <div class="form-group mt-3">
					    	<div class="custom-control custom-checkbox">
								  <input type="checkbox" name='newsletters' class="custom-control-input" id="invalidCheck">
								  <label class="custom-control-label" for="invalidCheck">Souscrire à la newsletter</label>
								</div>
						  </div>

						  <div class="form-group mt-3">
					    	<div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" id="invalidCheck1" required >
								  <label class="custom-control-label" for="invalidCheck1">J'accepte les termes &amp; les conditions générales de vente</label>
								</div>
						  </div>

						  <div class="row">
						  	<div class="col-lg-4 offset-lg-4">
						  		<button class="btn btn-info form-control" name="register" type="submit"><i class="fas fa-user-plus"></i> S'inscrire</button>
						  	</div>
						  </div>
						</form>

						<script>
							// Permet de ne pas envoyer de données éronnées
							(function() {
							  'use strict';
							  window.addEventListener('load', function() {
							    var forms = document.getElementsByClassName('needs-validation');
							    // Permet d'éviter le renvoi du form
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
				</div>
			</div> <!-- col-md-9 End -->
		</div> <!-- Row End -->
	  </div> <!-- SINGLE PRODUCT ROW END -->
	</div>
</div>

<?php require_once 'includes/footer.php'; ?>