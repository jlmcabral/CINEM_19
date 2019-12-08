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
    $filter = $_GET['filter'];
    if ($filter != "") $query .= " WHERE CONCAT (Produtos.Sku,Produtos.Nome,Produtos.Nome_cientifico) LIKE '%$filter%'";
    $orderBy = $_GET['order'];
    if ($orderBy != "") $query .= " ORDER BY Produtos.$orderBy";
    
    print "<p>$orderBy</p>";

    print "<form method=GET action=products.php>";
    print "  <input type=hidden name='order' value='$orderBy'>";
    print "  Filtro:";
    print "  <input name='filter' value='".$_GET['filter']."' size=8>";
    print "  <input type=submit value='>'>";
    print "</form>";


    print "<p>$query</p>";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        
        print " <table> \n";
        $row = $result->fetch_assoc();
        print "<tr> \n";
        foreach($row as $name => $val) {
            print "<th>". orderTableBySelectingTableHeader( $name, $filter ) ."</th> \n";
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

function orderTableBySelectingTableHeader( $orderField, $filter ) 
{   
    $order = $orderField . "&amp;filter=$filter";
    return "<a href='?order=$order'> $orderField</a>"; 
}



?>