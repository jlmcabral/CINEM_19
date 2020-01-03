<?php 

// Returns a connection to the DB
function ligaDB() 
{
    $connection = new mysqli("ave.dee.isep.ipp.pt", "1140471", "admin", "cinem1140471");
    if ($connection->connect_error)
    {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}

function filterOnLeftMenu()
{   
    print "<div>";
        print "<p>".translate(Filter)."</p>";
    print "</div>";

    print "<form method=GET action=products.php>";
    print "  <input type=hidden name='order' value='".$_SESSION['order']."'>";
    print "  <input name='filter' value='".$_SESSION['filter']."' size=25>";
    print "  <input type=submit value='>'>";
    print "</form>";
}

function orderOnLeftMenu()
{   
    $result = queryProducts();

    print "<div class='order-by-section'>";
        print "<div>";
            print "<p>".translate('Order By').":</p>";
        print "</div>";
        
        $row = $result->fetch_assoc();
        
        print "<div class='order-options'>";
        foreach($row as $name => $val) {
            print "<div>";
            print "<a href='?order=$name'>".translate($name)."</a>"; 
            print "</div>";
        }
        print "</div>";
    print "</div>";
}

function queryProducts()
{
    $conn = ligaDB();
    $query = "SELECT * FROM Produtos";
    
    $filter = $_SESSION['filter'];
    if ($filter != "") $query .= " WHERE CONCAT (Produtos.Sku,Produtos.Name,Produtos.Nome_cientifico) LIKE '%$filter%'";
    $orderBy = $_SESSION['order'];
    if ($orderBy != "") $query .= " ORDER BY Produtos.$orderBy";
      
    $result = $conn->query($query);
    // print "<p>$query</p>";

    mysqli_close( $conn );
    
    return $result;
}


function listProducts()
{
    $result = queryProducts();
    
    if($result->num_rows > 0 ) 
    {  
        print "<div class='products-row'>";
        
        // Loop through all the products retrieved from the DB
        for ($i = 0; $i < $result->num_rows; $i++)
        {   
            $row = $result->fetch_assoc();
    
            print "<div class='product-element-wrapper'>";

                print "<a href='product-page.php?sku=".$row['Sku']."'>";
                    print "<div class='product-element'>";
                        print "<div>";
                            print "<img src='img/".$row['Sku'].".jpg'>";
                        print "</div>";
                        print "<div>";
                            print "<p>".translate($row['Name'])."</p>";
                        print "</div>";
                        print "<div>";
                            print "<p>".$row['Sku']."</p>";
                        print "</div>";
                        print "<div>";
                            print "<p>".$row['Price']." &euro;</p>";
                        print "</div>";
                    print "</div>";
                print "</a>";

            print "</div>";
        }
        print "</div>";
    }
    else {
        print "<div>".translate("No results")."</div>";
    }

    mysqli_close( $conn );
}

function getProductDetails($sku)
{   
    $conn = ligaDB();
    $query = "SELECT * FROM Produtos WHERE Sku = '$sku'";

    $result = $conn->query($query);

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        
        print "<div  class='product-container'>";
            print "<div>";
                print "<img src='img/".$row['Sku']."_g.jpg'>";
            print "</div>";
            print "<div class='table-wrapper'>";
                print "<table class='generic-table'>";
                    print "<tr>";
                    foreach($row as $fname => $val) {
                        print "<th>".translate($fname)."</th><td>".translate($val)."</td><tr>";
                    }
                    print "</tr>";
                print " </table>";
            print "</div>";
        print "</div>";

    }
    else
    {
        print translate("No data");
    }
    mysqli_close( $conn );
}

// Get orders per user and show state
function getOrders() {

    $conn = ligaDB();
    $query = "SELECT DISTINCT ClientID FROM Orders";
    
    $usersWithOrders = $conn->query($query);

    if ($usersWithOrders->num_rows > 0)
    {   
        for ($i=0; $i < $usersWithOrders->num_rows; $i++)
        { 
            $user = $usersWithOrders->fetch_assoc();
        
            $client = $user['ClientID'];
            print "<div>";
                print translate('Orders of')."$client:";
            print "</div>";

            $query = "SELECT * FROM Orders WHERE ClientID = '$client'";
            $ordersByUser = $conn->query($query);
            
            print "<div>";
                print "<div class='table-wrapper'>";
                print "<table class='generic-table'>";
                    print "  <tr>";
                        $fields = array('OrdID','Date','ClientID','State');
                            
                        foreach( $fields as $field ) {
                            print "    <th>" .translate($field). "</th>";
                        }
                    print "  </tr>";
                        
                    for ($j=0; $j < $ordersByUser->num_rows; $j++)
                    { 
                        $order = $ordersByUser->fetch_assoc();
                        
                        print "  <tr>"; 
                        foreach ( $order as $fname => $val ){
                            print "<td>$val</td>";
                        }
                        print "  </tr>";
                    }
                        
                    print "</table>";
                print "</div>";
            print "</div>";
        }
    }

    mysqli_close( $conn );
}

function previousPage()
{
    print "<a href='#' onclick='history.go(-1)'>".translate("Previous page")."</a>\n";
}

function translate( $word )
{
    include ("ling.php");
    if (isset( $Langs[$word][$_SESSION['lang']] ))
        return $Langs[$word][$_SESSION['lang']];
    return $word;
}

function submitOrder() {

    print "<div class='submit-order'>";
        print "<form action='order.php' method=GET>";
            print "<div class='justify-right'>";
                print translate("Email").    ": <input name=email> <br>";
            print "</div>";
            print "<div class='justify-right'>";
                print translate("Name").     ": <input name=name> <br>";
            print "</div>";
            print "<div class='justify-right'>";
                print translate("Address").  ": <input name=address> <br>";
            print "</div>";
            print "<div class='justify-right'>";
                print translate("Phone").": <input name=phone> <br>";
            print "</div>";
            
            print "<input type=submit value='".translate("ToOrder")."'>";
        print "</form>";
    print "</div>";
}

?>
