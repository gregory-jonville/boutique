<?php require_once ('../../core/init.php'); 

if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

    $sql = "SELECT * FROM customers WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":customer_id", $customer_id);
    $stmt->execute();
    $view_customer = $stmt->fetch();
    $customer_image = $view_customer->customer_image;
    $image_path = realpath($_SERVER["DOCUMENT_ROOT"]) . "/boutique/customer/assets/customer_images/$customer_image";

    $sql = "DELETE FROM customers WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":customer_id", $customer_id);
    if ($stmt->execute()) {
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $_SESSION['customer_delete_msg'] = "Client supprimé";
        header('Location: ../index.php?view_customers');
    }
}
?>