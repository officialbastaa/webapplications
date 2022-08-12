<?php
    include_once 'header.php';
    require_once 'functions.inc.php';
    require_once 'setupDB.php';
?>

<!-- Featured Products -->
<div class="content-container">
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "itemalreadyadded") {
                echo "<h2 style='color: red; text-align: center'>Der Artikel befindet sich bereits im Warenkorb!</h2><br>";
            }
            else if ($_GET["error"] == "itemadded") {
                echo "<h2 style='color: green; text-align: center'>Der Artikel wurde zum Warenkorb hinzugefügt!</h2><br>";
            }
            elseif ($_GET["error"] == "notloggedin") {
                echo "<h2 style='color: red; text-align: center'>Sie müssen sich einloggen um Artikel zum Warenkorb hinzuzufügen</h2><br>";
            }

        }
    ?>
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
                            $bild = '<img src="data:image/jpeg;base64,'.base64_encode($row["bild"]).'" height="375" width="50"/>';

                            echo "
                                <div class='col-3'>
                                    <span>$bild</span>
                                    <h4>$name</h4>
                                    <p class='price'>$preis €</p>
                                    <br>
                                    <form action='product-detail.php' method='post'>
                                    <button type='submit' name='getToProduct' value='$id'>Zum Produkt</button>
                                    </form>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>

<?php include_once 'footer.php'; ?>
