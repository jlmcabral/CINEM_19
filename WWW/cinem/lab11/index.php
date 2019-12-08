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
    <title>Microgreens Porto</title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>

<?php printHeaderMenu();?>
<?php
print "    <p>".translate(Lang).": ";
print "      <a href='?lang=pt'>[Portugu&ecirc;s]</a>";
print "      <a href='?lang=en'>[English]</a>";
print "    </p>";
?>
    <div class="center-piece">
        <img src="img/home-plant-med-no-prev.png" alt="Home microgreen">



        <!-- <picture>
            <source media="(min-width: 650px)" srcset="img_pink_flowers.jpg">
            <source media="(min-width: 465px)" srcset="img_white_flower.jpg">
            <img src="img_orange_flowers.jpg" alt="Flowers" style="width:auto;">
        </picture> -->
    </div>

<?php



?>

    <footer>
        <p>&copy; Microgreens Porto <?php echo date("Y");?>. <?php print translate(all_rights);?></p>
    </footer>
</body>
</html>