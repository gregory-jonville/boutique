<?php require_once 'includes/header.php'; 

require_once 'includes/navbar.php'; ?>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
				    <li class="breadcrumb-item" aria-current="page">Contact</li>
				  </ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div> <!-- col-md-3 End -->


			<div class="col-md-9 mb-4">
				<div class="card">
				  <div class="card-header text-center">
						<h5 class="mt-4">Contact</h5>
						<p class="text-muted">Une question, une demande, un renseignement ? <a href="contact.php">Nous sommes là pour vous</a>. Notre service vous répondra dans les 2 jours ouvrés.</p>
				  </div>
				  <div class="card-body">
					<?php
						if (isset($_POST['submit'])) {

							// L'admin recevra l'e-mail suivant ce code :
							$sender_name = $_POST['name'];
							$sender_email = $_POST['email'];
							$sender_subject = $_POST['subject'];
							$sender_message = $_POST['message'];

							$receiver_email = "devzani.roy11@gmail.com";
							mail($receiver_email,$sender_name, $sender_subject, $sender_message, $sender_email);

							// Réponse auto de l'admin à l'envoyeur :
							$email = $_POST['email'];
							$subject = "Bienvenue sur notre site !";
							$msg = "Nous avons bien reçu votre message et nous mettrons tout en oeuvre pour répondre le plus rapidement possible.
							<br/>
							<br/>
							Bien à vous,
							<br/>
							<br/>
							L'équipe Store-elec de Marseille";
							$from = "store-elec.marseille@gmail.com";

							mail($email, $subject, $msg, $from);

							echo '<h5 class="text-success text-center">Votre message a bien été transmis</h5>';
						}
					?>

						<form method="post" class="needs-validation" novalidate>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="name">Nom</label>
						      <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
						      <div class="invalid-feedback">
						        Veuillez entrer un nom valide.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="email">E-mail</label>
						      <input type="email" name="email" class="form-control" id="email" placeholder="Votre e-mail" required>
						      <div class="invalid-feedback">
							  Veuillez entrer une adresse valide.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="subject">Sujet</label>
						      <input type="text" name="subject" class="form-control" id="subject" placeholder="Sujet" required>
						      <div class="invalid-feedback">
							  Veuillez entrer la raison de votre requête.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="message">Message</label>
						      <textarea name="message" name="message" class="form-control" rows="3" id="message"  placeholder="Votre message" required></textarea>
						      <div class="invalid-feedback">
							  Veuillez entrer votre message. (minimum 100 caractères)
						      </div>
						    </div>
						  </div>
				
						  <div class="row">
						  	<div class="col-lg-4 offset-lg-4">
						  		<button class="btn btn-info form-control" name="submit" type="submit"><i class="fas fa-comment"></i> Envoyer</button>
						  	</div>
						  </div>
						</form>

						<script>
							// permet de verifier la conformité des champs avant envoi
							(function() {
							  'use strict';
							  window.addEventListener('load', function() {
							    var forms = document.getElementsByClassName('needs-validation');
							    // permet de ne pas renvoyer le form
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
				</div>  <!-- Card End -->



			</div> <!-- col-md-9 End -->


		</div> <!-- Row End -->





	  </div> <!-- SINGLE PRODUCT ROW END -->

	</div>
</div>




<?php require_once 'includes/footer.php'; ?>