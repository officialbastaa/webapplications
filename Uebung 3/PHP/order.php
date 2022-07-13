<?php
include('setupDB.php');
/*
$nid = $_POST[];
$aid = $_POST[];
$anzahl = $_POST[];
$bestelldatum = date("d.m.y h:i:s");
*/
//preparation of insert statement
$tname = 'bestellungen';
$name1 = 'nid';
$name2 = 'aid';
$name3 = 'anzahl';
$name4 = 'bestelldatum';

$ins = "INSERT INTO $tname($name1, $name2, $name3, $name4) VALUES (?, ?, ?, ?)";
$ps = $conn -> prepare($ins);

//function to insert a new Order
function insertOrder($p, $n1, $n2, $n3, $n4) {
    $p -> bind_param('iiis', $n1, $n2, $n3, $n4);
    if (!$p -> execute()) {
        die("Hinzufügen fehlgeschlagen: " . $conn -> error);
    }
    echo ( "Bestellung wurde erfolgreich hinzugefügt! <br>");
}

//Erstellung von 5 bestellungen, falls Tabelle leer ist
if ($result = $conn->query("SELECT * FROM $tname LIMIT 1")){

    if (!$obj = $result->fetch_object())
    {
      echo "Da die Tabelle Leer ist, werden 5 Bestellungen hinzugefügt <br>";

      $f1 = '1';
      $f2 = '1';
      $f3 = '3';
      $f4 = date("y.m.d h:i:s");

      $g1 = '1';
      $g2 = '3';
      $g3 = '5';
      $g4 = date("y.m.d h:i:s");

      $h1 = '1';
      $h2 = '2';
      $h3 = '1';
      $h4 = date("y.m.d h:i:s");

      $i1 = '2';
      $i2 = '2';
      $i3 = '4';
      $i4 = date("y.m.d h:i:s");

      $j1 = '2';
      $j2 = '1';
      $j3 = '10';
      $j4 = date("y.m.d h:i:s");
      //execution of the insertion function
      insertOrder($ps, $f1, $f2, $f3, $f4);
      insertOrder($ps, $g1, $g2, $g3, $g4);
      insertOrder($ps, $h1, $h2, $h3, $h4);
      insertOrder($ps, $i1, $i2, $i3, $i4);
      insertOrder($ps, $j1, $j2, $j3, $j4);
      echo "<br>";
    }
    $result->close();
}





/*
$f1 = $nid;
$f2 = $aid;
$f3 = $anzahl;
$f4 = $bestelldatum;
//execution of the insertion function
insertOrder($ps, $f1, $f2, $f3, $f4);
*/





// close the connection
$conn -> close();
?>
