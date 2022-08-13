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
// date("y.m.d h:i:s");






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
