<!-- START -->
<div class="page-heading">
    <h1 class="page-title">Catégories de produit</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Catégories de produit</li>
  </ol>
</nav>

<?php if (isset($_SESSION['insert_product_cat_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?= $_SESSION['insert_product_cat_msg']; unset($_SESSION['insert_product_cat_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['product_update_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?= $_SESSION['product_update_msg']; unset($_SESSION['product_update_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_p_cat_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?= $_SESSION['delete_p_cat_msg']; unset($_SESSION['delete_p_cat_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Liste de catégories de produit</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table2" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Produit Cat. ID</th>
                        <th>Produit Cat. Titre</th>
                        <th>Product Cat. Description</th>
                        <th>Total Produits</th>
                        
                        
                        <th>Edit</th>
                        <th>X</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $view_p_cats = $getFromU->viewAllFromTable('product_categories');
                        foreach ($view_p_cats as $view_p_cat) {
                            $p_cat_id = $view_p_cat->p_cat_id;
                            $p_cat_title = $view_p_cat->p_cat_title;
                            $p_cat_desc = $view_p_cat->p_cat_desc;

                            $product_sold = $getFromU->countFromTableByPCatID('products', $p_cat_id);
                    ?>

                    <tr>
                        <td><?= $p_cat_id; ?></td>
                        <td><?= $p_cat_title; ?></td>
                        <td><?= $p_cat_desc; ?></td>
                        <td><?= $product_sold; ?></td>
                        
                        <td>
                            <a class="text-info" href="index.php?edit_p_cat=<?= $p_cat_id; ?>"><i class="fas fa-edit"></i> Editer</a>
                        </td>
                        <td>
                            <a class="text-danger" onclick="DeletePCat('<?= $p_cat_id; ?>')"><i class="fas fa-trash-alt"></i> X</a>
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
        $('#example-table2').DataTable({
            pageLength: 10,
        });
    });


</script>
