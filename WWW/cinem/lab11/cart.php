<!DOCTYPE html>
<?php 
    session_start();
    if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
    }
    if ( isset($_GET['buy']) )
    {      
        $_SESSION['cart'][$_GET['buy']] += 1;
        header("Location: cart.php");
    }
?>
<?php include("header.php");?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microgreens Porto - <?php print translate(Cart);?></title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>

<?php printHeaderMenu();?>
    
<?php
    print "<h1>".translate("Cart-title")."</h1>\n";
    
    $conn = ligaDB();

    print "<div class='table-wrapper'>";
        print "<table class='generic-table'>";
            print "  <tr>";
                $fields = array('Sku','Name','Nome_cientifico','Price','Quantity','Total');
                
                foreach( $fields as $c ) {
                    print "    <th>" .translate($c). "</th>\n";
                }
            print "  </tr>\n";
            
            $nprod = $total = 0;
            $row = null;
            
            foreach( $_SESSION['cart'] as $sku => $quant)
            {  
                $fields = "Sku, Name, Nome_cientifico, Price";
                $fields .= ", '$quant' as Quantidade, Price * $quant as Total";
                $query = "SELECT $fields FROM Produtos WHERE Sku='$sku'";  
                
                // Consulta BD
                $result = mysqli_query($conn, $query);
                if ( ! $result )
                echo "erro sql\n";
                
                $row = mysqli_fetch_assoc($result);
                
                // Print row content
                print "  <tr>\n"; 
                    foreach ( $row as $val ){
                        print "<td>$val</td>";
                    }
                print "  </tr>";
                
                $nprod += $row['Quantidade'];
                $total += $row['Total'];
            }
            
            print "  <tr> <th colspan=4>Total</th> " . "  <td>$nprod</td> <td>$total &euro;</td></tr>\n"; 
        print "</table>";
    print "</div>";

    // Submeter encomenda
    print "<h2>". translate("Order"). "</h2>";
    submitOrder();
?>

    <footer>
        <p>&copy; Microgreens Porto <?php echo date("Y");?>. <?php print translate(all_rights);?></p>
    </footer>
</body>
</html>
