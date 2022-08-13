<?php
include_once 'header.php';
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
if (isset($_POST["placeOrder"])) {

  for($i = 0 ; $i < count($_SESSION["warenkorb"]) ; $i++) {
    $cNid = $_SESSION["id"];
    $cAid = $_SESSION["warenkorb"][$i];
    $cAmount = $_SESSION["anzahl"][$i];
    $date = date("d.m.y h:i:s");

    insertOrder($ps, $cNid, $cAid, $cAmount, $date);

    $sql1 = "SELECT anzahl FROM artikel WHERE aid = '$cAid'; ";
    $result = $conn -> query($sql1);
    $data = mysqli_fetch_assoc($result);
    $dbAmount = $data["anzahl"];

    $newAmount = $dbAmount - $cAmount;

    $sql2 = "UPDATE artikel SET anzahl = '$newAmount' WHERE aid = '$cAid';";
    $result = $conn -> query($sql2);


  }
  $_SESSION["warenkorb"] = array();
  $_SESSION["anzahl"] = array();

  header("location: ../PHP/cart.php?error=orderplaced");
  exit();

}





/*
//execution of the insertion function
insertOrder($ps, $f1, $f2, $f3, $f4);
*/





// close the connection
$conn -> close();
?>
