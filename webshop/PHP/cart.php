<?php include_once 'header.php'; ?>

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
                </table>
                <table>
                    <tr>
                        <!-- <hr> -->
                        <td style="background: #FFE047; font-weight: bold; font-size: 16px; padding-left: 10px;">Gesamt:</td>
                        <td style="background: #FFE047; font-weight: bold;"><span id="totalPrice"></span> €</td>
                    </tr>
                </table>   
            </div> 
            <button type="button" id="affentheater">Zum Warenkorb</button>                      
        </div>

<?php include_once 'footer.php'; ?>
