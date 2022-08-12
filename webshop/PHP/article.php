<?php

include('setupDB.php');

$name = $_POST['produktname'];     // [...] müsste aus formular3.html Inhalt nehmen
$preis = $_POST['preis'];
$amount = $_POST['anzahl'];
$description = $_POST['beschreibung'];
$bildPath = $_FILES['foto']['tmp_name'];    // der Pfad der Datei, die hochgeladen wird

//preparation of insert statement
$tname = 'artikel';
$name1 = 'name';
$name2 = 'preis';
$name3 = 'anzahl';
$name4 = 'beschreibung';
$name5 = 'bild';

//function to insert a new user
function insertArticle($p, $n1, $n2, $n3, $n4, $b) {
    $blob = file_get_contents($b); // der Inhalt des Bildes mit dem Path $b
    $sql = "INSERT INTO artikel(name, preis, anzahl, beschreibung, bild) VALUES('$n1', '$n2', '$n3', '$n4', 0x".bin2hex($blob).")";

    if (!mysqli_query($p, $sql)) {
        die("Hinzufügen des Bildes ist fehlgeschlagen: " . mysqli_error());
    }
    echo ($n1 . " wurde erfolgreich hinzugefügt! <br>");
  }

$f1 = $name;
$f2 = $preis;
$f3 = $amount;
$f4 = $description;
$f5 = $bildPath;

//execution of the insertion function
insertArticle($conn, $f1, $f2, $f3, $f4, $f5);

// close the connection
$conn -> close();
?>
