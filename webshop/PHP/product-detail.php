<?php

include_once 'header.php'; 
require_once 'functions.inc.php';
require_once 'setupDB.php';

?>

 <!-- Single Product Details -->
 <div class="hero" id="yellow">
        <!-- <div class="small-container single-product"> -->
            <!-- <div class="row">
                <div class="col-2"> -->
                    <?php
                        // $sql ="SELECT * FROM artikel "
                        if (isset($_POST["getToProduct"])){
                            $id = $_POST["getToProduct"];
                            $sql1 = "SELECT * FROM artikel WHERE aid = '$id'; ";
                            $result = $conn -> query($sql1);
                            $data = mysqli_fetch_assoc($result);
                            $name = $data["name"];
                            $preis = $data["preis"];
                            $beschreibung = $data["beschreibung"];
                            $bild = '<img src="data:image/jpeg;base64,'.base64_encode($data["bild"]).'" height="500" width="400"/>';
                            
                            echo "
                                <div class='small-container single-product'>
                                    <div class='row'>
                                        <div class='col-2'>
                                            <span>$bild</span>
                                        </div>
                                        <div class='col-2'>
                                            <h1>$name</h1>
                                            <h4>$preis €</h4>
                                            <button class='addToCart' type='button' id='$id' style='margin-bottom: 50px;'>Zum Warenkorb</button>      
                                            <input type='hidden'>
                                            <br>
                                            <h3>Product Details</h3>
                                            <br>
                                            <p>$beschreibung</p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                <!-- </div>
            </div> -->
        <!-- </div> -->
    </div>

<?php include_once 'footer.php'; ?>

