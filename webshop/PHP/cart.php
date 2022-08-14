<?php
    include_once 'header.php';
    require_once 'setupDB.php';
?>

<!-- Cart Items Details -->
<div class="content-container">
<?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "itemremoved") {
                echo "<h2 id='response' style='color: green; text-align: center'>Der Artikel wurde aus dem Warenkorb entfernt!</h2><br>";
            }
            else if ($_GET["error"] == "orderplaced") {
                echo "<h2 style='color: green; text-align: center'>Bestellung wurde erfolgreich abgeschickt!</h2><br>";
            }
            else if ($_GET["error"] == "emptycart") {
                echo "<h2 style='color: red; text-align: center'>Bestellung konnte nicht abgeschickt werden: Keine Artikel im Warenkorb</h2><br>";
            }
            else if ($_GET["error"] == "cartamountstoohigh") {
                echo "<h2 style='color: red; text-align: center'>Wir haben </h2><br>";
            }
            else {
              $artikelname = $_GET["error"];
              echo "<h2 style='color: red; text-align: center'>Wir haben von $artikelname nicht mehr diese Menge im Lager. Bitte wähle eine kleinere Anzahl</h2><br>";
            }
        }
    ?>
            <!-- Personalization -->
            <div class="grid-title">
                <?php

                    if (!isset($_SESSION["id"])) {
                      header("location: ../PHP/index.php?error=notloggedin");
                      exit();
                    }

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
                            $cAmount = $_SESSION["anzahl"][$i];
                            $sql1 = "SELECT name, preis, anzahl FROM artikel WHERE aid = '$cID';";
                            $result = $conn -> query($sql1);
                            $data = mysqli_fetch_assoc($result);
                            $name = $data["name"];
                            $preis = $data["preis"];
                            $anzahl = $data["anzahl"];

                            echo "
                                <tr>
                                    <td><span class='itemName'>$name</span></td>
                                    <td><input type='number' class='itemAmount' value='$cAmount'></td>
                                    <td>$preis</td>
                                    <td></td>
                                    <form action='removeFromCart.php' method='post'>
                                        <td><button type='submit' name='removeItem' value='$cID'>Entfernen</td>
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
                <br>
                <form action='order.php' method='post'>
                  <button type="submit" name="placeOrder" id="placeOrder" style="float: right;">Artikel Bestellen</button>
                </form>
                <script>
                    window.addEventListener("load", init);

                    function init() {
                        document.getElementById("placeOrder").addEventListener("click", updateArticleQuantity);
                    }

                    function updateArticleQuantity() {
                      var cartAmount = [];
                      var amountInputs = document.getElementsByClassName("itemAmount")
                      for (var i=0; i < amountInputs.length; i++){
                        var currentInput = amountInputs[i]
                        var currentAmount = currentInput.value;
                        cartAmount.push(currentAmount);

                      }

                      var packagedArray = JSON.stringify(cartAmount);

                      var ajaxRequest = new XMLHttpRequest();
                      ajaxRequest.addEventListener("error", ajaxFehler);
                      ajaxRequest.open("post", "updateOrderAmount.php");
                      var daten = new FormData();
                      daten.append("newCartAmount", packagedArray);
                      ajaxRequest.send(daten);
                    }
                    function ajaxFehler(event) {
                        alert(event.target.statusText);
                    }
                </script>
            </div>
        </div>

<?php include_once 'footer.php'; ?>
