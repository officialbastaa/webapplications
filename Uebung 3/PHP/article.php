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

//Füllen der Database mit 3 Artikeln, falls sie leer ist
if ($result = $conn->query("SELECT * FROM $tname LIMIT 1")){

    if (!$obj = $result->fetch_object())
    {
      echo "Da die Tabelle Leer ist, werden noch 3 zusätzliche Artikel hinzugefügt <br>";
      $h1 = 'Ganze Bohne';
      $h2 = '19.99';
      $h3 = '13';
      $h4 = 'Ganze Kaffeebohnen, sehr gut.';
      $h5 = 'To be Implemented';

      $i1 = 'Espresso Bohne';
      $i2 = '24.99';
      $i3 = '20';
      $i4 = 'Sehr starker Kaffee, nur in geringen Dosierungen Trinken';
      $i5 = 'To be Implemented';

      $j1 = 'Gemahlene Bohne';
      $j2 = '9.99';
      $j3 = '55';
      $j4 = 'Bereits gemahlene Kaffeebohnen, perfekt für herkömmliche Kaffeemaschinen.';
      $j5 = 'To be Implemented';

      //execution of the insertion function
      insertArticle($ps, $h1, $h2, $h3, $h4, $h5);
      insertArticle($ps, $i1, $i2, $i3, $i4, $i5);
      insertArticle($ps, $j1, $j2, $j3, $j4, $j5);
      echo "<br>";
    }
    $result->close();
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
