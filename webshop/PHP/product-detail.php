<?php

include_once 'header.php';
require_once 'functions.inc.php';
require_once 'setupDB.php';

?>

<!-- Single Product Details -->
<div class="hero" id="yellow">
    <?php
        if (isset($_POST["getToProduct"])){
            $id = $_POST["getToProduct"];
            $sql1 = "SELECT * FROM artikel WHERE aid = '$id'; ";
            $result = $conn -> query($sql1);
            $data = mysqli_fetch_assoc($result);
            $name = $data["name"];
            $preis = $data["preis"];
            $beschreibung = $data["beschreibung"];
            $bild = '<img src="data:image/jpeg;base64,'.base64_encode($data["bild"]).'" height="500" width="450"/>';

            echo "
                <div class='small-container single-product'>
                    <div class='row'>
                        <div class='col-2'>
                            <span>$bild</span>
                        </div>
                        <div class='col-2'>
                            <h1>$name</h1>
                            <h4>$preis €</h4>
                            <form action='addToCart.php' method='post'>
                                <input type='number' class='itemAmount' name='quantity' value='1'>
                                <button type='submit' name='add' value='$id' style='margin-bottom: 50px;'>Zum Warenkorb hinzufügen</button>
                            </form>
                            <br>
                            <h3>Produkt Details</h3>
                            <br>
                            <p>$beschreibung</p>
                        </div>
                    </div>
                </div>
            ";
        }
    ?>
</div>

<?php include_once 'footer.php'; ?>
