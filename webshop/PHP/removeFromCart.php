<?php
include_once 'header.php'; 
require_once 'functions.inc.php';

                if (isset($_POST["removeItem"])) { 
                    $id = $_POST["removeItem"];  
                    $newCart = array();
                    for($i = 0 ; $i < count($_SESSION["warenkorb"]) ; $i++) {
                        if ($_SESSION["warenkorb"][$i] === $id) {

                        } else {
                            array_push($newCart, $_SESSION["warenkorb"][$i]);
                        }
                    }  
                    $_SESSION["warenkorb"] = $newCart;          
                    header("location: ../PHP/cart.php?error=itemremoved");                    
                    exit();                        

                }
?>
