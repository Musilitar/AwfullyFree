<?php

include_once 'product.php';
include_once 'productDatabase.php';

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
    else {
        if (!file_exists("./img/" . $_FILES["file"]["name"])) {
            resize(500, 500);
        }
    }
    $product = new Product($_POST['name'], $_POST['price_without_taxes'], "./img/". $_FILES["file"]["name"]);
    $result = ProductDatabase::insert($product);
    if ($result != null) {
        header("Location: http://iwtsl.ehb.be/~lode.lesage/management.php");
    }
    else {
        ?>
        <p>Insert failed. Please try again.</p>
        <a href="management.php">Management</a>
        <?php
    }
}
else {
    echo "Invalid file. Only JPG's, GIF's and PNG's are accepted." . "<br>";
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
}

/* Function from http://www.w3bees.com/2013/03/resize-image-while-upload-using-php.html */
function resize($width, $height){
    /* Get original image x y*/
    list($w, $h) = getimagesize($_FILES['file']['tmp_name']);
    /* calculate new image size with ratio */
    $ratio = max($width/$w, $height/$h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);
    /* new file name */
    $path = "./img/" . $_FILES["file"]["name"];
    /* read binary data from image file */
    $imgString = file_get_contents($_FILES['file']['tmp_name']);
    /* create image from string */
    $image = imagecreatefromstring($imgString);
    $tmp = imagecreatetruecolor($width, $height);
    imagecopyresampled($tmp, $image,
        0, 0,
        $x, 0,
        $width, $height,
        $w, $h);
    /* Save image */
    switch ($_FILES['file']['type']) {
        case 'image/jpeg':
            imagejpeg($tmp, $path, 100);
            break;
        case 'image/png':
            imagepng($tmp, $path, 0);
            break;
        case 'image/gif':
            imagegif($tmp, $path);
            break;
        default:
            exit;
            break;
    }
    return $path;
    /* cleanup memory */
    imagedestroy($image);
    imagedestroy($tmp);
}

?>