<?php
$admin_email = $_SESSION['admin_email'];

$get_admin = $getFromU->view_admin_by_email($admin_email);

$admin_id = $get_admin->admin_id;
$admin_name = $get_admin->admin_name;
$admin_job = $get_admin->admin_job;
$admin_about = $get_admin->admin_about;
$admin_country = $get_admin->admin_country;
$admin_contact = $get_admin->admin_contact;
$admin_image = $get_admin->admin_image;





$get_products = $getFromU->viewAllFromTable("products");
$count_products = count($get_products);

$count_sell_products = $getFromU->count_product_by_status("Complete");


?>





<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">PROFILS</h1>
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profil</li>
    </ol>
</nav>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="ibox rounded">
                <div class="ibox-body text-center">
                    <div class="mt-2"><img class="img-fluid rounded" src="./assets/img/users/<?= $admin_image; ?>" /></div>
                    <h5 class="font-strong m-b-10 m-t-10"><?= $admin_name; ?></h5>
                    <div class="m-b-20 text-muted"><?= $admin_job; ?></div>
                    <div class="profile-social m-b-20">
                        <a href="javascript:;"><i class="fab fa-twitter"></i></a>
                        <a href="javascript:;"><i class="fab fa-facebook"></i></a>
                        <a href="javascript:;"><i class="fab fa-pinterest"></i></a>
                        <a href="javascript:;"><i class="fab fa-dribbble"></i></a>
                    </div>
                    <div class="text-left">
                        <p><i class="fas fa-envelope"></i> Email : <?= $admin_email; ?></p>
                        <p><i class="fas fa-globe"></i> Pays : <?= $admin_country; ?></p>
                        <p><i class="fas fa-phone-square"></i> N° : <?= $admin_contact; ?></p>
                    </div>
                </div>
            </div>
            <div class="ibox rounded">
                <div class="ibox-body">
                    <div class="row text-center m-b-20">
                        <div class="col-4">
                            <div class="font-24 profile-stat-count"><?= $count_products; ?></div>
                            <div class="text-muted">Produits</div>
                        </div>
                        <div class="col-4">
                            <div class="font-24 profile-stat-count"><?= $count_sell_products; ?></div>
                            <div class="text-muted">Ventes</div>
                        </div>
                        <div class="col-4">
                            <div class="font-24 profile-stat-count"><?= $count_products - $count_sell_products; ?></div>
                            <div class="text-muted">Stock</div>
                        </div>
                    </div>
                    <p class="text-justify"><?= $admin_about; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .profile-social a {
        font-size: 16px;
        margin: 0 10px;
        color: #999;
    }

    .profile-social a:hover {
        color: #485b6f;
    }

    .profile-stat-count {
        font-size: 22px
    }
</style>
</div>
<!-- END PAGE CONTENT-->