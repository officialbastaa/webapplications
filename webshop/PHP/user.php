<?php
include('setupDB.php');

session_start();
// Holen: Name, Vorname, Email, Passwort
$name = $_POST['name'];         // [...] müsste aus formular2.html Inhalt nehmen
$vorname = $_POST['vorname'];
$email = $_POST['email'];
$password = $_POST['passwort'];

// Speichern: Name, Vorname, Email und Passwort als Session-Daten
$_SESSION['name'] = $name;
$_SESSION['vorname'] = $vorname;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

//preparation of insert statement
$tname = 'nutzer';
$name1 = 'name';
$name2 = 'vorname';
$name3 = 'email';
$name4= 'password';
$ins = "INSERT INTO $tname($name1, $name2, $name3, $name4) VALUES (?, ?, ?, ?)";
$ps = $conn -> prepare($ins);

// Für Übertragung des Namens zum Warenkorb (nicht fertig)
echo "Hallo, $vorname $name! Das hier ist dein Warenkorb.<br/>";

//function to insert a new user
function insertUser($p, $n1, $n2, $n3, $n4) {
    $p -> bind_param('ssss', $n1, $n2, $n3, $n4);
    if (!$p -> execute()) {
        die("Hinzufügen fehlgeschlagen: " . $conn -> error);
    }
    echo ($n1 . " " . $n2 .  " wurde erfolgreich hinzugefügt! <br>");
}


//Füllen der Database mit 2 Nutzern, falls sie leer ist
if ($result = $conn->query("SELECT * FROM $tname LIMIT 1")){

    if (!$obj = $result->fetch_object())
    {
      echo "Da die Tabelle Leer ist, werden noch 2 zusätzliche Nutzer hinzugefügt <br>";
      $f1 = 'Heufer-Umlauf';
      $f2 = 'Klaas';
      $f3 = 'klaas.hu@gmail.com';
      $f4 = '132456';

      $g1 = 'Schmitt';
      $g2 = 'Thomas';
      $g3 = 'thomas.schmitt@gmail.com';
      $g4 = 'Passwort123';

      insertUser($ps, $f1, $f2, $f3, $f4);
      insertUser($ps, $g1, $g2, $g3, $g4);
      echo "<br>";
    }
    $result->close();
}

$f1 = $name;
$f2 = $vorname;
$f3 = $email;
$f4 = $password;


//execution of the insertion function
insertUser($ps, $f1, $f2, $f3, $f4);

// close the connection
$conn -> close();
?>
