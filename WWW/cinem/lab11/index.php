<!DOCTYPE html>
<?php 
    session_start();
    if($_SESSION["lang"]=="")
        $_SESSION["lang"] = 'pt';
    
    foreach ($_GET as $key => $val) {
        $_SESSION[$key] = $val;
    }
?>
<?php include("header.php");?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microgreens Porto</title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>

<?php printHeaderMenu();?>

    <div class="home-container">
        <div class='company-logo'>
            <h2>Microgreens Porto</h2>
            <p><?php print translate('microgreens slogan');?></p>
        </div>
        <div class="home-info">
            <div><p><span><?php print translate('microgreens presentation');?></span></p></div>
            <div class="button"><a href='products.php'><?php print translate('see products');?></a></div>
        </div>
    </div>



<?php



?>

    <footer>
        <p>&copy; Microgreens Porto <?php echo date("Y");?>. <?php print translate(all_rights);?></p>
    </footer>
</body>
</html>
