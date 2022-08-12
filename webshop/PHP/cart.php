<?php 
    include_once 'header.php'; 
    require_once 'setupDB.php';
?>

<!-- Cart Items Details -->
<div class="content-container">
            <!-- Personalization -->
            <div class="grid-title">
                <?php 
                    if (isset($_SESSION["vorname"])) {
                        echo "<h1>Hallo " . $_SESSION["vorname"] . ", das ist dein Warenkorb!</h1>";
                    } 
                    else {
                        echo "<h1>Hallo, das ist dein Warenkorb!</h1>";
                    }                            
                    ?>
                </div>

            <!-- Cart -->
            <div class="small-container cart-page">
                <table id="warenkorb">
                    <tr>
                        <th>Artikel</th>
                        <th>Menge</th>
                        <th>Einzelpreis in €</th>
                        <th>Gesamtpreis in €</th>
                        <th>Artikel entfernen</th>                        
                    </tr>
                    <?php  
                        for($i = 0 ; $i < count($_SESSION["warenkorb"]) ; $i++) {
                            $cID = $_SESSION["warenkorb"][$i];
                        
                            $sql1 = "SELECT name, preis, anzahl FROM artikel WHERE aid = '$cID';";
                            $result = $conn -> query($sql1);
                            $data = mysqli_fetch_assoc($result);
                            $name = $data["name"];
                            $preis = $data["preis"];
                            $anzahl = $data["anzahl"];
                        
                            echo "
                                <tr>
                                    <td><span class='itemName'>$name</span></td>
                                    <td><input type='number' class='itemAmount' value='1'></td>
                                    <td>$preis</td>
                                    <td></td>
                                    <form action='addToCart.php' method='post'>
                                        <td><button type='button' name='removeItem' value='$cID' class='remove-button'>Entfernen</td>
                                    </form>
                                </tr>
                            ";
                        }
                    ?>
                </table>
                <table>
                    <tr>                        
                        <td style="background: #FFE047; font-weight: bold; font-size: 16px; padding-left: 10px;">Gesamt:</td>
                        <td style="background: #FFE047; font-weight: bold;"><span id="totalPrice"></span> €</td>
                    </tr>
                </table>   
            </div> 
        </div>

<?php include_once 'footer.php'; ?>
