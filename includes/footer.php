		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<h4>Pages</h4>
						<ul>
							<li><a href="cart.php">Panier</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="shop.php">Produits</a></li>
							<li><a href="customer/my_account.php">Mon compte</a></li>
						</ul>
						<hr>
						<h4>Espace client</h4>
						<ul>
							<?php if (!isset($_SESSION['customer_email'])): ?>
								<li><a href="checkout.php">Connexion</a></li>
							<?php else: ?>
								<li><a href="logout.php">Déconnexion</a></li>
							<?php endif ?>
							<li><a href="customer_register.php">Inscription</a></li>
						</ul>
						<hr class="hidden-md-down hidden-lg-down hidden-sm-down">
					</div>

					<div class="col-sm-6 col-md-3">
						<h4>Catégories</h4>
						<ul>
							<?php
								$product_cats = $getFromU->viewAllFromTable("product_categories");
								foreach ($product_cats as $product_cat) {
									$p_cat_id = $product_cat->p_cat_id;
									$p_cat_title = $product_cat->p_cat_title;
							?>
							<li><a href="shop.php?p_cat_id=<?php echo $p_cat_id; ?>"><?= $p_cat_title; ?></a></li>
						  <?php } ?>
						</ul>
						<hr class="hidden-md-down hidden-lg-down">
					</div>

					<div class="col-sm-6 col-md-3">
						<h4>Contact</h4>
						<address>
		          <strong>Store-Elec</strong><br>
		          18 Boulevard National<br>
		          13001 Marseille<br><br>
		          <i class="fas fa-phone-square"></i><span class="sr-only">Telephone:</span> <a href="tel:+033491981991">(+33) 491981991</a><br>
		          <i class="fas fa-envelope"></i><span class="sr-only">Mail:</span> <a href="mailto:store-elec.marseille@gmail.com">store-elec.marseille@gmail.com</a>
		        </address>
		        <a href="contact.php">Nous contacter directement</a>
						<hr class="hidden-md-down hidden-lg-down">
					</div>

					<div class="col-sm-6 col-md-3">
						<h4>Newsletters</h4>
						<p class="text-muted">Inscrivez vous pour recevoir nos nouveautées</p>
						<form method="post" action="#">
							<div class="input-group mb-2 mr-sm-2">
						    <input type="email" class="form-control" id="email" placeholder="E-mail">
						    <div class="input-group-prepend">
						      <input type="submit" name="submit" class="input-group-text btn btn-success" value="S'inscrire">
						    </div>
						  </div>
						</form>
						<hr class="hidden-md-down hidden-lg-down">
					</div>

				</div>
			</div>
		</div>


		


    <!-- jQuery first, Popper.js,  Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>