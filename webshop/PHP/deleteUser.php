<?php
include_once 'header.php';
include('setupDB.php');

if (isset($_POST["deleteClicked"])) {
    //State the Query for the Order
    $email = $_SESSION['email'];
    $sql1 = "DELETE FROM nutzer WHERE email = '$email';";
    $result = $conn -> query($sql1);
    session_unset();
    session_destroy();

    header("location: ../PHP/index.php?error=userdeleted");
    exit();
    }


 ?>
