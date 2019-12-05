<?php 
	$n = $_GET["foto"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>

<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF8">


<?php    
 echo "<title>Album Fotografico - Foto $n</title>";
?>
  </head>
  <body>
    
<?php 

	if($n=="") {
	 echo "<h1>Fotografias</h1>\n";
	 echo " <table>\n";
	 for ($n=0; $n<10; ) {
	  echo " <tr>\n";
	  for( $col=0; $col<3 && $n<10; $col++, $n++) {
	    $mini="/~jml/cinem/lab8/img/minis/Imagem_0$n.jpg";
            echo " <td>\n";
	    echo " <a href='?foto=$n' title='Fotografia $n'>\n";
	    echo " <img src='$mini' alt='Foto $n'>\n";
	    echo " </a>\n";
	    echo " </td>\n"; 
	  }
	 echo "</tr>\n";
	 }
	echo "</table>\n";
	}
	else 
	{


	if ($n<9) {
		$next = ($n+1);
	}
	else {
		$next = 9;
	}
	
	if ($n>1) {
		$previous = ($n-1);
	}
	else {
		$previous = 0;
	}

	echo "<h1>Fotografia $n</h1>";
	echo "<img src='/~jml/cinem/lab8/img/Imagem_0$n.jpg'
		 alt='Fotografia $n'>";

	echo "<a href='?foto=$next'> <img src='/~jml/cinem/lab8/next.png' alt='seguinte'> </a>";
	echo "<a href='?foto=$previous'> <img src='/~jml/cinem/lab8/previous.png' alt='anterior'> </a>";
	
	echo "<a href='?foto=' title='&Iacute;dice'>\n";
	echo " <img src='/~jml/cinem/lab8/up.png' alt='&Iacute;ndice'>\n";
	echo "</a>";
	}
?>

  </body>
</html>
