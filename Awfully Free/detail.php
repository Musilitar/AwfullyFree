<?php
include_once 'productDatabase.php';
if(!isset($_GET['id'])) {
    header("Location: http://iwtsl.ehb.be/~lode.lesage/index.php");
}
$product = ProductDatabase::getById($_GET['id']);
if($product == null) {
    header("Location: http://iwtsl.ehb.be/~lode.lesage/index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/main.css" media="screen"/>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="./js/main.js"></script>
    <title>Awfully Free</title>
</head>
<body>
<div id="header">
    <nav>
        <a class="current" href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="management.php">Management</a>
    </nav>
</div>

<table>
    <tr>
        <th>Image</th>
    </tr>
    <tr>
        <td><img src="<?php echo $product->image?>" alt="<?php echo $product->name?>"/></td>
    </tr>
    <tr>
        <th>ID</th>
    </tr>
    <tr>
        <td><?php echo $product->ID?></td>
    </tr>
    <tr>
        <th>Name</th>
    </tr>
    <tr>
        <td><?php echo $product->name?></td>
    </tr>
    <tr>
        <th>Price without taxes</th>
    </tr>
    <tr>
        <td><?php echo $product->price_without_taxes?></td>
    </tr>
    <tr>
        <th>Price with taxes</th>
    </tr>
    <tr>
        <td><?php echo $product->calculateTax($product->price_without_taxes)?></td>
    </tr>
</table>
</body>
</html>