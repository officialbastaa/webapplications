<?php include_once 'header.php'; 
    require_once 'functions.inc.php';
    require_once 'setupDB.php';
    ?>

<!-- Featured Products -->
<div class="content-container">
            <div class="grid-title">
                <h1>Unsere Sorten</h1>
            </div>        
            <div class="grid">
                <div class="small-container">
                    <div class="row">
                    <?php
                            $sql1 = "SELECT * FROM artikel;";
                            $result = $conn -> query($sql1);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row["aid"];
                                $name = $row["name"];
                                $preis = $row["preis"];
                                $beschreibung = $row["beschreibung"];
                                $bild = '<img src="data:image/jpeg;base64,'.base64_encode($row["bild"]).'" height="450" width="100"/>';

                                echo "
                                <div class='col-3'>
                                    <span>$bild</span>
                                    <h4>$name</h4>
                                    <p class='price'>€$preis</p>
                                    <p>$beschreibung</p>
                                    <form action='product-detail.php' method='post'>
                                        <button type='submit' name='getToProduct' value='$id'>Zum Produkt</button>
                                        <input type='hidden' name='product_id' value='$id'>
                                    </form>
                                </div>
                                ";
                            }                        
                        ?>                                            
                    </div>    
                </div>
            </div>
        </div>

<?php include_once 'footer.php'; ?>

