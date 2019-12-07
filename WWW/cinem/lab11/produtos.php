<!DOCTYPE html>
<html lang="en">
<?php include("header.php");?> 
<?php include("functions.php");?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microgreens Porto - Produtos</title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>

<?php printHeaderMenu();?>

<?php
    print "<h1>Lista de Produtos</h1>\n";
    // $conn = ligaDB();
    listProdutos(ligaDB());
    

?>

   <footer>
      <p>&copy; Microgreens Porto <?php echo date("Y");?>. Todos os direitos reservados.</p>
      <!-- <p><a href="mailto:contact@microgreensporto.com">contact@microgreensporto.com</a></p> -->
   </footer>
</body>
</html>