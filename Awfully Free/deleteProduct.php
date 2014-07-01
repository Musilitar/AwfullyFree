<?php

include_once 'product.php';
include_once 'productDatabase.php';
$product = ProductDatabase::getById($_POST['id']);
if(!isset($_POST['id'])) {
    ?>
    <p>Removal failed. Product not found.</p>
    <a href="management.php">Management</a>
    <?php
}
else if($product == null) {
    ?>
    <p>Removal failed. Product not found.</p>
    <a href="management.php">Management</a>
    <?php
}
else {
    ProductDatabase::deleteById($_POST['id']);
    unlink($product->image);
    header("Location: http://iwtsl.ehb.be/~lode.lesage/management.php");
}

?>