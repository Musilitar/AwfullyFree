<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
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
<div id="content">
    <?php
    include_once 'productDatabase.php';
    $products = ProductDatabase::getAll();
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price without taxes</th>
            <th>Price with taxes</th>
            <th>Action</th>
        </tr>
        <?php
        for($i = 0; $i < count($products); $i++) {
            ?>
            <tr>
                <td><?php echo $products[$i]->ID?></td>
                <td><?php echo $products[$i]->name?></td>
                <td><?php echo $products[$i]->price_without_taxes?></td>
                <td><?php echo $products[$i]->calculateTax($products[$i]->price_without_taxes)?></td>
                <td><button class="pure-button pure-button-primary index" value="detail.php?id=<?php echo $products[$i]->ID?>">Detail</button></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
</body>
</html>