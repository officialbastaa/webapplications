<?php

include('setupDB.php');

$name = $_POST['name'];     // [...] müsste aus formular3.html Inhalt nehmen
$preis = $_POST['preis'];
$amount = $_POST['anzahl'];
$description = $_POST['beschreibung'];
$image = $_POST['bild'];

//preparation of insert statement
$tname = 'artikel';
$name1 = 'name';
$name2 = 'preis';
$name3 = 'anzahl';
$name4 = 'beschreibung';
$name5 = 'bild';
$ins = "INSERT INTO $tname($name1, $name2, $name3, $name4, $name5) VALUES (?, ?, ?, ?, ?)";
$ps = $conn -> prepare($ins);

//function to insert a new user
function insertArticle($p, $n1, $n2, $n3, $n4, $n5) {
    $p -> bind_param('sdisb', $n1, $n2, $n3, $n4, $n5);
    if (!$p -> execute()) {
        die("Hinzufügen fehlgeschlagen: " . $conn -> error);
    }
    echo ($n1 . " wurde erfolgreich hinzugefügt! <br>");
}

$f1 = $name;
$f2 = $preis;
$f3 = $amount;
$f4 = $description;
$f5 = $image;

//execution of the insertion function
insertArticle($ps, $f1, $f2, $f3, $f4, $f5);

// close the connection
$conn -> close();
?>
