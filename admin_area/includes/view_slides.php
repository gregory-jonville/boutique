<!-- START -->
<div class="page-heading">
    <h1 class="page-title">Slides</h1>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Slides</li>
    </ol>
</nav>

<?php if (isset($_SESSION['insert_slide_msg'])) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
                <?= $_SESSION['insert_slide_msg'];
                unset($_SESSION['insert_slide_msg']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['slide_update_msg'])) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
                <?= $_SESSION['slide_update_msg'];
                unset($_SESSION['slide_update_msg']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_slide_msg'])) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
                <?= $_SESSION['delete_slide_msg'];
                unset($_SESSION['delete_slide_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Slides</div>
        </div>
        <div class="ibox-body">
            <div class="card-deck">

                <?php
                $view_slides = $getFromU->viewAllFromTable('slider');
                foreach ($view_slides as $view_slide) {
                    $slide_name = $view_slide->slide_name;
                    $slide_image = $view_slide->slide_image;
                    $slide_title = $view_slide->slide_title;
                    $slide_text = $view_slide->slide_text;
                    $slide_id = $view_slide->slide_id;
                ?>

                    <div class="card">
                        <div class="card-header bg-light font-weight-bold text-center"><?= $slide_name; ?></div>
                        <img class="card-img-top" src="slides_images/<?= $slide_image; ?>" height="220px" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?= $slide_title; ?></h4>
                            <p class="card-text text-justify"><?= $slide_text; ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a class="text-danger" onclick="DeleteSlide('<?= $slide_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
                                </div>
                                <div class="col-6">
                                    <a class="text-info float-right" href="index.php?edit_slide=<?= $slide_id; ?>"><i class="fas fa-edit"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
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