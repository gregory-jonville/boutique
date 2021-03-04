<?php
$admin_email = $_SESSION['admin_email'];

$get_admin = $getFromU->view_admin_by_email($admin_email);

$admin_id = $get_admin->admin_id;
$admin_name = $get_admin->admin_name;
$admin_image = $get_admin->admin_image;

$dashboard = (isset($_GET['dashboard'])) ? 'active' : '';

$products = (isset($_GET['add_product']) || isset($_GET['view_products'])) ? 'active' : '';
$add_product = (isset($_GET['add_product'])) ? 'active' : '';
$view_products = (isset($_GET['view_products'])) ? 'active' : '';

$p_cats = (isset($_GET['add_p_cat']) || isset($_GET['view_p_cats']) || isset($_GET['edit_p_cat'])) ? 'active' : '';
$add_p_cat = (isset($_GET['add_p_cat'])) ? 'active' : '';
$view_p_cats = (isset($_GET['view_p_cats'])) ? 'active' : '';

$cats = (isset($_GET['add_cat']) || isset($_GET['view_cats']) || isset($_GET['edit_cat'])) ? 'active' : '';
$add_cat = (isset($_GET['add_cat'])) ? 'active' : '';
$view_cats = (isset($_GET['view_cats'])) ? 'active' : '';

$slides = (isset($_GET['add_slide']) || isset($_GET['view_slides']) || isset($_GET['edit_slide'])) ? 'active' : '';
$add_slide = (isset($_GET['add_slide'])) ? 'active' : '';
$view_slides = (isset($_GET['view_slides'])) ? 'active' : '';

$view_customers = (isset($_GET['view_customers'])) ? 'active' : '';

$view_orders = (isset($_GET['view_orders'])) ? 'active' : '';

$view_payments = (isset($_GET['view_payments'])) ? 'active' : '';

$users = (isset($_GET['add_user']) || isset($_GET['view_users']) || isset($_GET['edit_user'])) ? 'active' : '';
$add_user = (isset($_GET['add_user'])) ? 'active' : '';
$view_users = (isset($_GET['view_users'])) ? 'active' : '';


?>



<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/users/<?= $admin_image; ?>" class="img-fluid img-circle" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"><?= $admin_name; ?></div><small>Admin</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="<?= $dashboard; ?>" href="index.php?dashboard"><i class="sidebar-item-icon fas fa-tachometer-alt"></i>
                    <span class="nav-label">Tableau de bord</span>
                </a>
            </li>

            <li class="heading">Gestion</li>
            <li class="<?= $products; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fab fa-product-hunt"></i>
                    <span class="nav-label">Produits</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?= $add_product; ?>" href="index.php?add_product"><i class="fas fa-plus-circle"></i> Nouveau produit</a>
                    </li>
                    <li>
                        <a class="<?= $view_products; ?>" href="index.php?view_products"><i class="fas fa-eye"></i> Produits</a>
                    </li>

                </ul>
            </li>
            <li class="<?= $p_cats; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Catégories de produit</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?= $add_p_cat; ?>" href="index.php?add_p_cat"><i class="fas fa-plus-circle"></i> Nouvelle catégories de produit</a>
                    </li>
                    <li>
                        <a class="<?= $view_p_cats; ?>" href="index.php?view_p_cats"><i class="fas fa-eye"></i> Catégories de produit</a>
                    </li>
                </ul>
            </li>
            <li class="<?= $cats; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Catégories</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?= $add_cat; ?>" href="index.php?add_cat"><i class="fas fa-plus-circle"></i> Nouvelles catégorie</a>
                    </li>
                    <li>
                        <a class="<?= $view_cats; ?>" href="index.php?view_cats"><i class="fas fa-eye"></i> Catégories</a>
                    </li>
                </ul>
            </li>
            <li class="<?= $slides; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fas fa-sliders-h"></i>
                    <span class="nav-label">Slides</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?= $add_slide; ?>" href="index.php?add_slide"><i class="fas fa-plus-circle"></i> Nouveau Slide</a>
                    </li>
                    <li>
                        <a class="<?= $view_slides; ?>" href="index.php?view_slides"><i class="fas fa-eye"></i> Slides</a>
                    </li>
                </ul>
            </li>
            <li class="<?= $view_customers; ?>">
                <a href="index.php?view_customers"><i class="sidebar-item-icon fas fa-users"></i>
                    <span class="nav-label">Clients</span>
                </a>
            </li>
            
            <li class="<?= $view_payments; ?>">
                <a href="index.php?view_payments"><i class="sidebar-item-icon fas fa-money-bill-alt"></i>
                    <span class="nav-label">Paiements</span>
                </a>
            </li>
            <li class="<?= $users; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Administrateurs</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?= $add_user; ?>" href="index.php?add_user"><i class="fas fa-plus-circle"></i> Nouvel Admin</a>
                    </li>
                    <li>
                        <a class="<?= $view_users; ?>" href="index.php?view_users"><i class="fas fa-eye"></i> Admins</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="logout.php"><i class="sidebar-item-icon fas fa-power-off"></i>
                    <span class="nav-label">Déconnexion</span>
                </a>
            </li>



        </ul>
    </div>
</nav>