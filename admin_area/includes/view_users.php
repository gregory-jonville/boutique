<!-- START -->
<div class="page-heading">
    <h1 class="page-title">Admins</h1>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admins</li>
    </ol>
</nav>

<?php if (isset($_SESSION['insert_user_msg'])) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <?= $_SESSION['insert_user_msg'];
                unset($_SESSION['insert_user_msg']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['update_user_msg'])) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <?= $_SESSION['update_user_msg'];
                unset($_SESSION['update_user_msg']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_user_msg'])) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <?= $_SESSION['delete_user_msg'];
                unset($_SESSION['delete_user_msg']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>




<div class="page-content fade-in-up">
    <div class="ibox rounded">
        <div class="ibox-head bg-light">
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Admins</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Contact</th>
                        <th>Pays</th>
                        <th>Job</th>
                        <th>A propos</th>
                        <th>Editer</th>
                        <th>X</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr></tr>
                </tfoot>
                <tbody>
                    <?php
                    $i = 0;
                    $view_admins = $getFromU->viewAllFromTable('admins');
                    foreach ($view_admins as $view_admin) {
                        $admin_id = $view_admin->admin_id;
                        $admin_name = $view_admin->admin_name;
                        $admin_email = $view_admin->admin_email;
                        $admin_image = $view_admin->admin_image;
                        $admin_contact = $view_admin->admin_contact;
                        $admin_country = $view_admin->admin_country;
                        $admin_job = $view_admin->admin_job;
                        $admin_about = $view_admin->admin_about;
                        $i++;

                        if (strlen($admin_about) >= 90) {
                            $admin_about = substr($admin_about, 0, 100) . " ... " . substr($admin_about, -5);
                        } else {
                            $admin_about = $admin_about;
                        }

                    ?>

                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $admin_name; ?></td>
                            <td><?= $admin_email; ?></td>
                            <td class="text-center"><img class="rounded" src="admin_images/<?= $admin_image; ?>" height="40px" width="60px"></td>
                            <td class="text-right"><?= $admin_contact; ?></td>
                            <td><?= $admin_country; ?></td>
                            <td><?= $admin_job; ?></td>
                            <td class="text-justify"><?= $admin_about; ?></td>

                            <td>
                                <a class="text-info" href="index.php?edit_user=<?= $admin_id; ?>"><i class="fas fa-edit"></i> Editer</a>
                            </td>
                            <td>
                                <a class="text-danger" onclick="DeleteUser('<?= $admin_id; ?>')"><i class="fas fa-trash-alt"></i> X</a>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- CORE PLUGINS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- SCRIPTS-->
<script>
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
        });
    });
</script>