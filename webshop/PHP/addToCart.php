<?php
include_once 'header.php';
require_once 'functions.inc.php';
include('setupDB.php');

                if (!isset($_SESSION["id"])) {
                  header("location: ../PHP/products.php?error=notloggedin");
                  exit();
                }

                if (isset($_POST["add"])) {
                    $id = $_POST["add"];
                    $amount = $_POST["quantity"];

                    $sql1 = "SELECT anzahl FROM artikel WHERE aid = '$id'; ";
                    $result = $conn -> query($sql1);
                    $data = mysqli_fetch_assoc($result);
                    $totalAmount = $data["anzahl"];



                    if (in_array($id, $_SESSION["warenkorb"])) {
                        header("location: ../PHP/products.php?error=itemalreadyadded");
                        exit();
                    }
                    elseif ($totalAmount < $amount) {
                        header("location: ../PHP/products.php?error=quantitytoohigh");
                        exit();
                    }
                    else {
                        array_push($_SESSION["warenkorb"], $id);
                        array_push($_SESSION["anzahl"], $amount);
                        header("location: ../PHP/products.php?error=itemadded");
                        exit();
                    }
                }
                ?>
