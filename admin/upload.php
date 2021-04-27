<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Le fichier est une image - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image. ";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Ce fichier existe déjà. ";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Types de fichier autorisés: JPG, JPEG, PNG & GIF. ";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Votre fichier n'a pas été envoyé. ";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a été envoyé. ";
    } else {
        echo "Il y a eu une erreur lors de l'envoi de votre fichier.";
    }
}
?>
<meta http-equiv="refresh": content="5;URL=index.php?page=ajouter_oeuvre.php">