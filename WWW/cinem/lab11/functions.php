<html>

<table>
    <tr>
        <td>test</td>
        <td>test1</td>
        <td>test1</td>
    </tr>
    <tr>
        <td>test</td>
        <td>test1</td>
        <td>test1</td>
    </tr>
</table>

</html>

<?php 

// Returns a connection to the DB
private function ligaDB()
{
    $connection = new mysqli("ave.dee.isep.ipp.pt", "1140471", "admin", "cinem1140471");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}



public function listProdutos($conn)
{
    $query = "SELECT * FROM Produtos";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        
        print " <table> \n";
        $row = $result->fetch_assoc();

        print "<tr> \n";
        foreach($row as $name => $val) {
            print "<th>$name<th> \n";
        }
        print "</tr> \n";
        $result->data_seek(0);


        while ( $row = $result->fetch_row()) {
            print "<tr> \n";
            
            foreach ($row as $val) {
                print "<td>$val</td> \n";
            }
            
            print "</tr> \n";
        }//while
        
        print " </table> \n";
    }
    else
    {
        echo "0 resultados";
    }

    mysqli_close($conn);
}

?>