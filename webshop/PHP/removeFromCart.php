<?php
include_once 'header.php';
require_once 'functions.inc.php';

                if (isset($_POST["removeItem"])) {
                    $id = $_POST["removeItem"];
                    $newCart = array();
                    $newAmount = array();
                    for($i = 0 ; $i < count($_SESSION["warenkorb"]) ; $i++) {
                        if ($_SESSION["warenkorb"][$i] === $id) {

                        } else {
                            array_push($newCart, $_SESSION["warenkorb"][$i]);
                            array_push($newAmount, $_SESSION["anzahl"][$i]);
                        }
                    }
                    $_SESSION["warenkorb"] = $newCart;
                    $_SESSION["anzahl"] = $newAmount;
                    header("location: ../PHP/cart.php?error=itemremoved");
                    exit();

                }
?>
