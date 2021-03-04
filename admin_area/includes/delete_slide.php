<?php require_once ('../../core/init.php'); 

if (isset($_GET['slide_id'])) {
    $slide_id = $_GET['slide_id'];

    $view_slide = $getFromU->selectSlideBySlideID($slide_id);

    $slide_image = $view_slide->slide_image;

    $delete_slide = $getFromU->delete_slide($slide_id);
    if ($delete_slide) {
        unlink(realpath($_SERVER["DOCUMENT_ROOT"]) . "/boutique/admin_area/slides_images/$slide_image");
        $_SESSION['delete_slide_msg'] = "Slide supprimé avec succès !";
        header('Location: ../index.php?view_slides');
    }
}
?>