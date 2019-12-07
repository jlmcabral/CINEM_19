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


function listProducts()
{
    $conn = ligaDB();
    $query = "SELECT * FROM Produtos";
    $ordem = $_GET['order'];
    if ($ordem != "") $query .= "ORDER BY $order";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        
        print " <table> \n";
        $row = $result->fetch_assoc();
        print "<tr> \n";
        foreach($row as $name => $val) {
            print "<th>$name</th> \n";
        }
        print "</tr> \n";
        $result->data_seek(0);
        
        while ( $row = $result->fetch_row()) {
            print "<tr> \n";
            foreach ($row as $val) {
                print "<td>$val</td> \n";
            }
            print "<td> <a href='product-page.php?sku=$row[0]'> +info </a> </td>\n";
            print "</tr> \n";
        }//while
        print " </table> \n";
    }
    else
    {
        echo "0 resultados";
    }

    mysqli_close( $conn );
}

function getProductDetails( $sku )
{
    $conn = ligaDB();
    $query = "SELECT * FROM Produtos WHERE Sku = '$sku'";

    $result = $conn->query($query);

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        print " <table> \n";
        print "<tr> \n";
        foreach($row as $fname => $val) {
            print "<tr><th>$fname</th><td>$val</td><tr>\n";
        }
        print "</tr> \n";
        print " </table> \n";
    }
    else
    {
        echo "Sem dados sobre este produto";
    }
    mysqli_close( $conn );
}

function previousPage( $label )
{
    print "<a href='#' onclick='history.go(-1)'> $label </a>\n";
}

function orderTable( $name ) 
{
   return "<a href='?order=$name'"; 
}

?>