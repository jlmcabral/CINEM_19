<!DOCTYPE html>
<?php 
    session_start();
    foreach ($_GET as $key => $val) {
        $_SESSION[$key] = $val;
    }
?>
<?php include("header.php");?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microgreens Porto - Produto <?php echo $_SESSION["sku"]; ?></title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>
<?php printHeaderMenu();?>
<?php
    $sku = $_SESSION["sku"];
    print "<h1>".translate('Product')." $sku</h1>\n";
    
    getProductDetails();

    print "</br>";
    print "<a href='cart.php?buy=$sku'>[" .translate(Cart) . "]</a>";
    print "</br>";
    
    previousPage();
?>
    <footer>
        <p>&copy; Microgreens Porto <?php echo date("Y");?>. <?php print translate(all_rights);?></p>
    </footer>
</body>
</html>
