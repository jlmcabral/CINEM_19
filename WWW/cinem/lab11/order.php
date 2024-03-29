<!DOCTYPE html>
<?php 
    session_start();
    // if (isset($_GET['email'])) {
    //     $_SESSION['email'] = $_GET['email'];
    //     header("Location: order.php");
    // }
    // if (isset($_GET['name'])) {
    //     $_SESSION['name'] = $_GET['name'];
    //     header("Location: order.php");
    // }
    // if (isset($_GET['address'])) {
    //     $_SESSION['address'] = $_GET['address'];
    //     header("Location: order.php");
    // }
    // if (isset($_GET['phone'])) {
    //     $_SESSION['phone'] = $_GET['phone'];
    //     header("Location: order.php");
    // }
    
    
    
    // foreach ($_GET as $key => $val) {
    //         $_SESSION[$key] = $val;
    //     header("Location: order.php");
    // }
    // var_dump($_SESSION);

?>
<?php include("header.php");?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microgreens Porto - <?php print translate(Order);?></title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>

<?php printHeaderMenu();?>
    
<?php
    print "<h1>".translate(Order)."</h1>\n";

    $conn = ligaDB();

    // Gravar Cliente
    $data = "'". $_GET['email'].   "', " . 
            "'". $_GET['name'].    "', " . 
            "'". $_GET['address']. "', " . 
            "'". $_GET['phone'].   "' " ;
    
    $query = "REPLACE INTO Clients VALUE ($data)";
    
    $result = $conn->query($query); 
    
    $data = "Now(), '".$_GET['email'] . "'";
    $query = "INSERT INTO Orders(Date, ClientID, State) VALUE ($data, 'Pending')";
    $result = $conn->query($query); 

    // Obter nr de encomenda
    $res = mysqli_query($conn, "SELECT OrdID FROM Orders ORDER BY Date DESC");
    $row = mysqli_fetch_row($res);
    $ordID = $row[0]; 
    
    // Registar produtos encomendados 
    foreach( $_SESSION['cart'] as $sku => $qtd ){
        
        $query = "INSERT INTO OrdProducts VALUE ('$ordID','$sku',$qtd)";
        $result = $conn->query($query); 
    }
        
    // Esvaziar carrinho
    unset($_SESSION['cart']);

    print "<div class='order-confirmation'>";
        print translate('Order Confirmation');
    print "</div>";

?>

    <footer>
        <p>&copy; Microgreens Porto <?php echo date("Y");?>. <?php print translate(all_rights);?></p>
    </footer>
</body>
</html>
