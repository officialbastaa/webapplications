<?php
include_once 'header.php';
include('setupDB.php');

//preparation of insert statement
$tname = 'bestellungen';
$name1 = 'nid';
$name2 = 'aid';
$name3 = 'anzahl';
$name4 = 'bestelldatum';
$name5 = 'bestaetigt';

$ins = "INSERT INTO $tname($name1, $name2, $name3, $name4, $name5) VALUES (?, ?, ?, ?, ?)";
$ps = $conn -> prepare($ins);

//function to insert a new Order
function insertOrder($p, $n1, $n2, $n3, $n4, $n5) {
    $p -> bind_param('iiiss', $n1, $n2, $n3, $n4, $n5);
    if (!$p -> execute()) {
        die("Hinzufügen fehlgeschlagen: " . $conn -> error);
    }
    echo ( "Bestellung wurde erfolgreich hinzugefügt! <br>");
}

if (isset($_POST["placeOrder"])) {

  if (empty($_SESSION["warenkorb"])) {
    header("location: ../PHP/cart.php?error=emptycart");
    exit();
  }

  for($i = 0 ; $i < count($_SESSION["warenkorb"]) ; $i++) {

    $cAid = $_SESSION["warenkorb"][$i];
    $cAmount = $_SESSION["anzahl"][$i];

    // Get the database amount of the current article
    $sql1 = "SELECT anzahl, name FROM artikel WHERE aid = '$cAid'; ";
    $result = $conn -> query($sql1);
    $data = mysqli_fetch_assoc($result);

    $dbAmount = $data["anzahl"];
    $cName = $data["name"];


    //check if the updated cart amounts are less than the db amounts
    if ($dbAmount < $cAmount) {
      header("location: ../PHP/cart.php?error=$cName");
      exit();
    }

  }

  for($i = 0 ; $i < count($_SESSION["warenkorb"]) ; $i++) {
    $cNid = $_SESSION["id"];
    $cAid = $_SESSION["warenkorb"][$i];
    $cAmount = $_SESSION["anzahl"][$i];
    $date = date("d.m.y h:i:s");
    $confirmed = "Nein";

    // Get the database amount of the current article
    $sql1 = "SELECT anzahl FROM artikel WHERE aid = '$cAid'; ";
    $result = $conn -> query($sql1);
    $data = mysqli_fetch_assoc($result);
    $dbAmount = $data["anzahl"];


    insertOrder($ps, $cNid, $cAid, $cAmount, $date, $confirmed);

    $newAmount = $dbAmount - $cAmount;

    $sql2 = "UPDATE artikel SET anzahl = '$newAmount' WHERE aid = '$cAid';";
    $result = $conn -> query($sql2);


  }
  $_SESSION["warenkorb"] = array();
  $_SESSION["anzahl"] = array();

  header("location: ../PHP/cart.php?error=orderplaced");
  exit();

}


// close the connection
$conn -> close();
?>
