<?php 

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
    <a class="navbar-brand home" href="#">Store-€lec</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-uppercase">
            <li>
                <a href="../index.php">Accueil</a>
            </li>
            <li>
                <a href="../shop.php">Produits</a>
            </li>
            <?php if (!isset($_SESSION['customer_email'])) : ?>
                <li><a href="../checkout.php">Mon compte</a></li>
            <?php else : ?>
                <li><a href="my_account.php?my_orders">Mon compte</a></li>
            <?php endif ?>
            <li>
                <a href="../cart.php">Panier</a>
            </li>
            <li>
                <a href="../contact.php">Contact</a>
            </li>
        </ul>
        <a href="../cart.php" class="btn btn-info mr-2"><i class="fas fa-shopping-cart"></i><span> <?= $getFromU->count_product_by_ip($ip_add); ?> produit(s) dans le panier</span></a>

        <form method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="user_query" required="1">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search">&#128269;</button>
        </form>
    </div>
</nav>