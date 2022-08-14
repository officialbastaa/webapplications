<?php
include('setupDB.php');
require_once ('functions.inc.php');

if (isset($_REQUEST["produktname"]) && isset($_REQUEST["preis"]) && isset($_REQUEST["anzahl"]) && isset($_FILES['foto']['tmp_name']) && isset($_REQUEST["beschreibung"]) ) {

  $name = $_REQUEST["produktname"];     // [...] müsste aus formular3.html Inhalt nehmen
  $preis = $_REQUEST["preis"];
  $amount = $_REQUEST["anzahl"];
  $description = $_REQUEST["beschreibung"];
  $bildPath = $_FILES['foto']['tmp_name'];    // der Pfad der Datei, die hochgeladen wird


  //function to insert a new user
  function insertArticle($p, $n1, $n2, $n3, $n4, $b) {
      $blob = file_get_contents($b); // der Inhalt des Bildes mit dem Path $b
      $sql = "INSERT INTO artikel(name, preis, anzahl, beschreibung, bild) VALUES('$n1', '$n2', '$n3', '$n4', 0x".bin2hex($blob).")";

      if (!mysqli_query($p, $sql)) {
          die("Hinzufügen des Bildes ist fehlgeschlagen: " . mysqli_error());
      }
      echo '{"nachricht": "Jo Klappt"}';
    }


  //execution of the insertion function
  insertArticle($conn, $name, $preis,$amount, $description, $bildPath);

}

// close the connection
$conn -> close();
?>
