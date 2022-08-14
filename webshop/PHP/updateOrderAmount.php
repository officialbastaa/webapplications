<?php
  session_start();

  $newCartAmount  = $_REQUEST["newCartAmount"];
  $decodedArray = json_decode($newCartAmount);
  $_SESSION["anzahl"] = $decodedArray;

  // echo '{"nachricht": "Anzahl wurde angepasst"}';
  exit();

 ?>
