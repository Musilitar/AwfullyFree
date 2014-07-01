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
<div id="wrapper">
    <div id="header">
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a class="current" href="management.php">Management</a>
        </nav>
    </div>
    <div id="content">
        <div id="productList">
            <?php
            include_once 'productDatabase.php';
            $products = ProductDatabase::getAll();
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                <?php
                for($i = 0; $i < count($products); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $products[$i]->ID?></td>
                        <td><?php echo $products[$i]->name?></td>
                        <td>
                            <form action="deleteProduct.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $products[$i]->ID?>" />
                                <button id="deleteButton" type="submit" class="pure-button pure-button-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div id="addProduct">
            <button id="addButton" class="pure-button pure-button-primary">Add product</button>
        </div>
    </div>
</div>
</body>
</html>