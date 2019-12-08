<!DOCTYPE html>
<?php 
    // session_start();
    foreach ($_GET as $key => $val) {
        $_SESSION[$key] = $val;
    }
?>
<?php include("header.php");?> 
<?php //$product_sku = $_GET['sku']; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microgreens Porto - Produto <?php echo $product_sku; ?></title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>
<?php printHeaderMenu();?>
<?php

    print $_SESSION[$sku];
    print $_SESSION[$lang];



    print "<h1>Produto".$_SESSION[$sku]."</h1>\n";
    
    getProductDetails( $_SESSION[$sku] );

    previousPage("Voltar &agrave; lista");
?>
    <footer>
        <p>&copy; Microgreens Porto <?php echo date("Y");?>. <?php print translate(all_rights);?></p>
    </footer>
</body>
</html>