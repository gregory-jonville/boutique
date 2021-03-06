<?php

    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["c_image"]) && $_FILES["c_image"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["c_image"]["name"];
        $filetype = $_FILES["c_image"]["type"];
        $filesize = $_FILES["c_image"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) {
            $error = "Veuillez sélectionner un format de fichier valide.";
        } 

        // Vérifie la taille du fichier - 10Mo maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) {
            $error = "La taille du fichier est supérieure à la limite autorisée. (10Mo)";
        } 

        // Vérifie le type MIME du fichier
        if(!in_array($filetype, $allowed)){
            $error = "Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
        } 

        // Vérifie si le fichier existe avant de le télécharger.
        if(file_exists("customer/assets/customer_images/" . $_FILES["c_image"]["name"])){
            $error = $_FILES["c_image"]["name"] . " existe déjà.";
        } 

    } else{
        $error = "Error : " . $_FILES["c_image"]["error"];
    }

?>