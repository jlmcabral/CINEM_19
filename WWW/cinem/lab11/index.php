<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microgreens Porto</title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>
<?php

    include("functions.php");

    print "<h1>Lista de Produtos</h1>\n";
    
    $conn = ligaDB();
    listProdutos($conn);


?>
</body>
</html>