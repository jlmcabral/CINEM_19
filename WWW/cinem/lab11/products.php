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
    <title>Microgreens Porto - <?php print translate(Products);?></title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>

<?php printHeaderMenu();?>

<?php
    print "<h1>".translate("List of").translate("Products")."</h1>\n";
    // $conn = ligaDB();
    listProducts();  
?>

    <footer>
        <p>&copy; Microgreens Porto <?php echo date("Y");?>. <?php print translate(all_rights);?></p>
   </footer>
</body>
</html>