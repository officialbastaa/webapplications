<?php
include_once 'header.php'; 
require_once 'functions.inc.php';

                if (isset($_POST["add"])) {
                    $id = $_POST["add"];
                    if (in_array($id, $_SESSION["warenkorb"])) {
                        header("location: ../PHP/products.php?error=itemalreadyadded");                    
                        exit();                        
                    } else {
                        array_push($_SESSION["warenkorb"], $id);
                        header("location: ../PHP/products.php?error=itemadded");
                        exit();
                    }
                }

                if (isset($_POST["removeItem"])) { 
                    $id = $_POST["removeItem"];    
                    // unset($_SESSION["warenkorb"][$id]);              
                    // $_SESSION["warenkorb"] = array_diff($_SESSION["warenkorb"], $id);
                }
                ?>
