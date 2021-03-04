<?php
$admin_email = $_SESSION['admin_email'];

$get_admin = $getFromU->view_admin_by_email($admin_email);

$admin_id = $get_admin->admin_id;
$admin_name = $get_admin->admin_name;
$admin_image = $get_admin->admin_image;

$get_products = $getFromU->viewAllFromTable("products");
$count_products = count($get_products);

$get_customers = $getFromU->viewAllFromTable("customers");
$count_customers = count($get_customers);

$get_product_categories = $getFromU->viewAllFromTable("product_categories");
$count_product_categories = count($get_product_categories);

?>

<header class="header">
    <div class="page-brand">
        <a class="link" href="index.html">
            <span class="brand">Panel
                <span class="brand-tip pl-1">Admin</span>
            </span>
            <span class="brand-mini">P.A</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="fas fa-bars"></i></a>
            </li>
            <li>
                <form class="navbar-search" action="javascript:;">
                    <div class="rel">
                        <span class="search-icon"><i class="fas fa-search"></i></span>
                        <input class="form-control" placeholder="Rechercher">
                    </div>
                </form>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">


            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="./assets/img/users/<?= $admin_image; ?>" />
                    <span></span><?= $admin_name; ?><i class="fa fa-angle-down m-l-5"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="index.php?user_profile=<?= $admin_id; ?>"><i class="fa fa-user"></i>Profil</a>
                    <a class="dropdown-item" href="index.php?view_products"><i class="fa fa-cog"></i>Produits <span class="badge badge-info rounded"><?= $count_products; ?></span></a>
                    <a class="dropdown-item" href="index.php?view_customers"><i class="fas fa-users"></i>Clients <span class="badge badge-info rounded"><?= $count_customers; ?></span></a>
                    <a class="dropdown-item" href="index.php?view_cats"><i class="fas fa-ambulance"></i>Catégories de produit <span class="badge badge-info rounded"><?= $count_product_categories; ?></span></a>
                    <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i>Déconnexion</a>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>